<?php
    include_once("conecta.php");

    $area = $_POST['area'];
    if(isset($_POST['enviar'])){ 
        $sql = "INSERT INTO tbarea (nome) VALUES ('$area')";
    }
    
    $resultado = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

?>