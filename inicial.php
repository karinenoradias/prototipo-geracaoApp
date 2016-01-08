<?php

include('bd/usuario.php');

$acao = $_POST['action'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario();
  
    switch($acao) {
        case 'novo' :$usuario -> setUsuario($email, $senha);  break;
        case 'logar': $id = $usuario -> getIdUsuario($email, $senha); 
        			  return $id;
        
        			break;
                  }


?>