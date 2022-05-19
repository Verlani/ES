<?php

    $servername = "localhost";
    $database = "bdcadastro";
    $username = "root";
    $password = "";

    // Create connection
    $conexao = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if(!$conexao){
        die("Falha na conexão:" . mysqli_connect_error());
    }

?>