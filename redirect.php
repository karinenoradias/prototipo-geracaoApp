<?php session_start();


$idP = $_POST['id'];
$emailP = $_POST['email'];
$senhaP = $_POST['senha'];

$_SESSION['id']=$idP;
$_SESSION['email']=$emailP;
$_SESSION['senha']=$senhaP;

echo "sessão iniciada";

?>

