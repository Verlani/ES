<?php

        include_once("conecta.php");

        $livro_titulo = $_POST['titulo'];
        $livro_autor = $_POST['autor'];
        $livro_status = $_POST['status'];
        $area = $_POST['area'];
        
        $sql = "INSERT INTO tblivro (titulo, autor, status, id_area) VALUES ('$livro_titulo', '$livro_autor', '$livro_status','$area')";
        header("location: cadastrar_livros.php");

        $resultado = mysqli_query($conexao,$sql);
        mysqli_close($conexao);

?>


