<?php

namespace App\Session;

class Login{


private static function init(){
    //verifica status
    if(session_status() !== PHP_SESSION_ACTIVE){
        //inicia
        session_start();
    }
}


/**
 * método responsável por retornar os dados do usuário logado
 * @return array
 */
    public static function getUsuarioLogado(){
        //inicia a sessão
        self::init();

        //retorna os dados do usuário
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }



/**
 * Método responsável por logar o usuário 
 *@param Usuario $obUsuario
 */
public static function login($obUsuario){
    //inicia a sessão
    self::init();

    $_SESSION['usuario'] = [
        'id_user'=>$obUsuario->id_user,
        'nome'=>$obUsuario->nome
    ];


    //redireciona usuario index
    header('location: ../cruds/Livro/index.php');
    exit;
}


/**
 * 
 *Método responsável por deslogar o usuário
 */
public static function logout(){
    //INICIA A SESSÂO
    self::init();
    
    //REMOVE A SESSÂO USUÁRIO
    unset($_SESSION['usuario']);


    //REDIRECIONA O USUÁRIO PARA LOGIN
    header('location: ../cruds/login.php');
        exit;
}

/**
 * verifica se  o usuário está logado
 * @return boolean
 */
public static function isLogged(){
    self::init();

    return isset($_SESSION['usuario']['id_user']);
}

/**
 * obriga o usuário a loggar para acessar
 * https://localhost/livraria_bd/cruds/Livro/login.php
 */
public static function requireLogin(){
    if(!self::isLogged()){
        header('location: ../../cruds/login.php');
        exit;
    }
}

/**
 * obriga o usuário a deslogarr para acessar
 */
public static function requireLogout(){
    if(self::isLogged()){
        header('location: livraria_bd/cruds/Livro/index.php');
        exit;
    }
}



}