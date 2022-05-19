<?php
include_once("conecta.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastros.css">
    <title>Cadastro de livros</title>
</head>
<body>

    <main>
        <div class="menu">
            <div class="logo">
                <h1>Biblioteca</h1>
            </div>
            <nav>
                <a href="biblioteca.html">Voltar</a>
                <a href="cadastrar_aluno.html">Cadastrar alunos</a>
                <a href="cadastrar_area.html">Cadastrar Areas</a>
                <a href="listar_livros.php">Listar livros</a>
                <a href="deslogar.php">Sair</a>
            </nav>
        </div>

        <div class="conteudo">
            <form name="cadastro_livro" action="cadastrar_livros2.php" method="post">
                    <h2>Cadastro</h2><br>
                    <label>Titulo: <input type="text" name="titulo" class="enviar" required><br></label>
                    <label>Autor:  <input type="text" name="autor" class="enviar" required><br></label>
                    <label>Status (0 ou 1): <input type="number" class="enviar" name="status" required><br></label>

                    <select name="area" class="enviar">
                    <?php

                        $sql = "SELECT * FROM tbarea";
                        $resultado = mysqli_query($conexao, $sql);

                        while ($registro = mysqli_fetch_array($resultado)) {

                            echo "<option value='".$registro['id_area']."'>";
                            echo $registro['nome'];
                            echo "</option>";
                        }
                    ?>
                    </select>

                    <spam><input type="submit" name="Enviar" value="Enviar" class="enviar"></spam>
                    <spam><input type="reset" name="Limpar" value="Limpar" class="enviar"></spam>
            </form>
        </div>
    </main>

</body>
</html>