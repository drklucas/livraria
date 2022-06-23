<?php

require __DIR__.'/../vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//OBRIGA O USUÁRIO A ESTAR DESLOGADO
Login::requireLogout();


//MENSAGENS DE ALERTA
$alertaLogin = '';
$alertaCadastro = ''; 

//valida se existe ação (logar ou cadastrar)
if(isset($_POST['acao'])){

    switch($_POST['acao']){

        case 'logar':


           //busca usuario por nome
            $obUsuario = Usuario::getUsuarioPorNome($_POST['nome']);
            //valida instância e senha
            if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)){
                $alertaLogin = 'Nome ou senha inválidos';
                 break;
            }

            Login::login($obUsuario); 
           
            break;

              

        case 'cadastrar':
            //validação dos campos obrigatórios
            if(isset($_POST['nome'], $_POST['senha'])){


                //BUSCA USUÀRIO POR NOME
                $obUsuario = Usuario::getUsuarioPorNome($_POST['nome']);
                if($obUsuario instanceof Usuario){
                    $alertaCadastro='Esse nome já foi cadastrado';
                    break;
                }

                //NOVO USUÁRIO

                $obUsuario = new Usuario;
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obUsuario->cadastrar();
                
                //LOGA O USUÁRIO
               Login::login($obUsuario); 

            }
            break;    
    }
}



include __DIR__.'/../includes/header.php';
include __DIR__.'/../includes/formulario-login.php';
include __DIR__.'/../includes/footer.php';