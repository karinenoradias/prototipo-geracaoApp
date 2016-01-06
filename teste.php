
<?php

include('bd/elemento.php');


$acao = $_POST['action'];
$projeto = $_POST['projeto'];
$idElemento = $_POST['idElemento'];
$tipo = $_POST['tipo'];

$elemento = new Elemento();


   
    switch($acao) {
        case 'insert' : $elemento -> setElemento($projeto, $idElemento, $tipo); break;
        case 'getIdElemento': $elemento-> getIdElemento($idElemento, $projeto); break;
        case 'getTipo': $elemento-> getTipo($idElemento, $tipo); break;
        case 'delete': $elemento-> deleteElemento ($idElemento, $projeto); break;
    }


?>