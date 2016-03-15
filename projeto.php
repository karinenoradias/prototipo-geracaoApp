<?php

include('bd/projeto.php');


$acao = $_POST['action'];
$usuario = $_POST['usuario'];
$nome = $_POST['nome'];


$projeto = new Projeto();
  
    switch($acao) {
        case 'novo': $projeto -> setProjeto($usuario, $nome); 
        			 $idP = $projeto -> getIdProjeto($usuario);
        			 echo $idP;
        break;
       
    }
       
?>