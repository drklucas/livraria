<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Compra{

  /**
   * Identificador único da compra
   * @var integer
   */
  public $id_compra; 

  /**
   * Chave estrangeira da tabela livro
   * @var integer
   */
  public $cod_livro;

  /**
   * chave estrangeira da tabela usuario
   * @var integer
   */
  public $cod_usuario;

/**
   * quantidade
   * @var int
   */
  public $quantidade;

  /**
   * preço total
   * @var float
   */
  public $preco_total;




//GEtters and SETters ================================================


  /**
   * Get identificador único da compra
   *
   * @return  integer
   */ 
  public function getId_compra()
  {
    return $this->id_compra;
  }

  /**
   * Set identificador único da compra
   *
   * @param  integer  $id_compra  Identificador único da compra
   *
   * @return  self
   */ 
  public function setId_compra($id_compra)
  {
    $this->id_compra = $id_compra;

    return $this;
  }

  /**
   * Get chave estrangeira da tabela livro
   *
   * @return  integer
   */ 
  public function getCod_livro()
  {
    return $this->cod_livro;
  }

  /**
   * Set chave estrangeira da tabela livro
   *
   * @param  integer  $cod_livro  Chave estrangeira da tabela livro
   *
   * @return  self
   */ 
  public function setCod_livro($cod_livro)
  {
    $this->cod_livro = $cod_livro;

    return $this;
  }

  /**
   * Get chave estrangeira da tabela usuario
   *
   * @return  integer
   */ 
  public function getCod_usuario()
  {
    return $this->cod_usuario;
  }

  /**
   * Set chave estrangeira da tabela usuario
   *
   * @param  integer  $cod_usuario  chave estrangeira da tabela usuario
   *
   * @return  self
   */ 
  public function setCod_usuario($cod_usuario)
  {
    $this->cod_usuario = $cod_usuario;

    return $this;
  }

  /**
   * Get quantidade
   *
   * @return  int
   */ 
  public function getQuantidade()
  {
    return $this->quantidade;
  }

  /**
   * Set quantidade
   *
   * @param  int  $quantidade  quantidade
   *
   * @return  self
   */ 
  public function setQuantidade(int $quantidade)
  {
    $this->quantidade = $quantidade;

    return $this;
  }

//Métodos

  /**
   * Método responsável por cadastrar compra no banco
   * @return boolean
   */
  public function cadastrar(){


    //INSERIR   A COMPRA NO BANCO
    //id_compra cod_livro cod_usuario quantidade preco_total
    $obDatabase = new Database('compra');
    $this->id_compra = $obDatabase->insert([
                                      'cod_livro'      => $this->cod_livro,
                                      'cod_usuario'      =>$this->cod_usuario,
                                      'quantidade'     =>$this->quantidade,
                                      'preco_total'   =>$this->preco_total
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

/**
   * Método responsável por obter as compras do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getCompras(){
    return (new Database('compra'))->selectCompra()
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

 /**
   * Método responsável por obter as compras do banco de dados
   * @param  string $where
   * @return integer
   */
  public static function getQuantidadeCompras($where = null){
    return (new Database('compra'))->select($where, null, null, 'COUNT(*) as qtd')
                                  ->fetchObject()
                                  ->qtd;
  }



  /**
   * Método responsável por buscar uma compra com base em seu ID
   * @param  integer $id_compra
   * @return Compra
   */
  public static function getCompra($id_compra){
    return (new Database('compra'))->select('id_compra = '.$id_compra)
                                  ->fetchObject(self::class);
  }









}