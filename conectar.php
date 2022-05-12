<?php
$servername = "localhost";
$database = "tcc";
$username = "root";
$password = "";
// Cria conexão
$strcon = mysqli_connect($servername, $username, $password, $database);
// Verifica conexão
if (!$strcon) {
      die("Falha na Conexão: " . mysqli_connect_error());
}
 
echo "Sucesso na Conexão";
 

?>