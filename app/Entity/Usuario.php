<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

  /**
   * Identificador único do usuário
   * @var integer
   */
  public $id_user;

  /**
   * Nome
   * @var string
   */
  public $nome;

  /**
   * senha
   * @var string
   */
  public $senha;




  //GETTERS AND SETTERS ----------------------------------------------------------

  
  
  /**
   * Get identificador único do usuário
   *
   * @return  integer
   */ 
  public function getId_user()
  {
    return $this->id_user;
  }

  /**
   * Set identificador único do usuário
   *
   * @param  integer  $id_user  Identificador único do usuário
   *
   * @return  self
   */ 
  public function setId_user($id_user)
  {
    $this->id_user = $id_user;

    return $this;
  }



  /**
   * Get nome
   *
   * @return  string
   */ 
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Set nome
   *
   * @param  string  $nome  Nome
   *
   * @return  self
   */ 
  public function setNome(string $nome)
  {
    $this->nome = $nome;

    return $this;
  }

  /**
   * Get senha
   *
   * @return  string
   */ 
  public function getSenha()
  {
    return $this->senha;
  }

  /**
   * Set senha
   *
   * @param  string  $senha  senha
   *
   * @return  self
   */ 
  public function setSenha(string $senha)
  {
    $this->senha = $senha;

    return $this;
  }

  /**
   * Método responsável por cadastrar um novo usuario no banco
   * @return boolean
   */
  public function cadastrar(){


    //INSERIR A VAGA NO BANCO
    $obDatabase = new Database('usuario');
    $this->id_user = $obDatabase->insert([
                                      'nome'    => $this->nome,
                                      'senha'      => $this->senha
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }


  //MÉTODOS  ------------------------------------------------------------------

  /**
   * Método responsável por atualizar o usuario no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('usuario'))->update('id_user = '.$this->id_user,[
                                                                'nome'    => $this->nome,
                                                                'senha'      => $this->senha
                                                              ]);
  }

  /**
   * Método responsável por excluir o usuario do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('usuario'))->delete('id_user = '.$this->id_user);
  }

  /**
   * Método responsável por obter os usuarios do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getUsuarios($where = null, $order = null, $limit = null){
    return (new Database('usuario'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

   /**
   * Método responsável por obter os usuarios do banco de dados
   * @param  string $where
   * @return integer
   */
  public static function getQuantidadeUsuarios($where = null){
    return (new Database('usuario'))->select($where, null, null, 'COUNT(*) as qtd')
                                  ->fetchObject()
                                  ->qtd;
  }




  /**
   * Método responsável por buscar um usuario com base em seu ID
   * @param  integer $id_user
   * @return Usuario
   */
  public static function getUsuario($id_user){
    return (new Database('usuario'))->select('id_user = '.$id_user)
                                  ->fetchObject(self::class);
  }


  /**
   * Método responsável por retornar uma instância de um usuário com base em seu Nome
   * @param string $nome
   * @return Usuario
   */
  public static function getUsuarioPorNome($nome){
      return (new Database('usuario'))->select('nome LIKE "'.$nome.'"')->fetchObject(self::class);
  }


}