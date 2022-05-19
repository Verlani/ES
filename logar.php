<?php

session_start();

include_once('conectar.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

$sql = "SELECT nome, cpf from tbaluno where nome = '$nome' and cpf = '$cpf'";
$resultado = mysqli_query($conectar, $sql);

if(mysqli_num_rows($resultado) == 1) {
    $registro = mysqli_fetch_array($resultado);

    $_SESSION['nome'] = $nome;
    header('location: index.php');
}else{
    header('location: login.html');
}
?>