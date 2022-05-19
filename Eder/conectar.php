<?php

$servername = "localhost";
$database = "bdbiblioteca";
$username = "root";
$password = "";
// Create connection
$conectar = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conectar) {
      die("Falha na Conexão: " . mysqli_connect_error());
}