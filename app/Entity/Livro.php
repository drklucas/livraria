<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Livro{

  /**
   * Identificador único do livro
   * @var integer
   */
  public $id_livro;

  /**
   * Título
   * @var string
   */
  public $titulo;

  /**
   * autor
   * @var string
   */
  public $autor;

/**
   * Preço
   * @var float
   */
  public $preco;




//GEtters and Setters ----------------------------------------------------------------------

  /**
   * Get identificador único do livro
   *
   * @return  integer
   */ 
  public function getId_livro()
  {
    return $this->id_livro;
  }

  /**
   * Set identificador único do livro
   *
   * @param  integer  $id_livro  Identificador único do livro
   *
   * @return  self
   */ 
  public function setId_livro($id_livro)
  {
    $this->id_livro = $id_livro;

    return $this;
  }

  /**
   * Get título
   *
   * @return  string
   */ 
  public function getTitulo()
  {
    return $this->titulo;
  }

  /**
   * Set título
   *
   * @param  string  $titulo  Título
   *
   * @return  self
   */ 
  public function setTitulo(string $titulo)
  {
    $this->titulo = $titulo;

    return $this;
  }

  /**
   * Get autor
   *
   * @return  string
   */ 
  public function getAutor()
  {
    return $this->autor;
  }

  /**
   * Set autor
   *
   * @param  string  $autor  autor
   *
   * @return  self
   */ 
  public function setAutor(string $autor)
  {
    $this->autor = $autor;

    return $this;
  }

  /**
   * Get preço
   *
   * @return  float
   */ 
  public function getPreco()
  {
    return $this->preco;
  }

  /**
   * Set preço
   *
   * @param  float  $preco  Preço
   *
   * @return  self
   */ 
  public function setPreco(float $preco)
  {
    $this->preco = $preco;

    return $this;
  }






  //Métodos db -----------------------------------------------------------------

  /**
   * Método responsável por cadastrar um novo livro no banco
   * @return boolean
   */
  public function cadastrar(){


    //INSERIR O LIVRO NO BANCO
    $obDatabase = new Database('livro');
    $this->id_livro = $obDatabase->insert([
                                      'titulo'    => $this->titulo,
                                      'autor'      => $this->autor,
                                      'preco'      =>$this->preco
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }


  
  /**
   * Método responsável por atualizar o livro no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('livro'))->update('id_livro = '.$this->id_livro,[
                                                                'titulo'    => $this->titulo,
                                                                'autor'      => $this->autor,
                                                                'preco'      =>$this->preco
                                                              ]);
  }


  /**
   * Método responsável por excluir o livro do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('livro'))->delete('id_livro = '.$this->id_livro);
  }

  /**
   * Método responsável por obter os livros do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getLivros($where = null, $order = null, $limit = null){
    return (new Database('livro'))->select($where, $order, $limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }


 /**
   * Método responsável por obter a quantidade dos livros do banco de dados
   * @param  string $where
   * @return integer
   */
  public static function getQuantidadeLivros($where = null){
    return (new Database('livro'))->select($where, null, null, 'COUNT(*) as qtd')
                                  ->fetchObject()
                                  ->qtd;
  }


  /**
   * Método responsável por buscar um livro com base em seu ID
   * @param  integer $id_livro
   * @return Livro
   */
  public static function getLivro($id_livro){
    return (new Database('livro'))->select('id_livro = '.$id_livro)
                                  ->fetchObject(self::class);
  }



}