<?php

    include_once('conectar.php');

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimos de Livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="cadastroaluno.php">Cadastro de Aluno</a>
            <a href="cadastroarea.php">Cadastro de Área</a>
            <a href="cadastrolivro.php">Cadastro de Livro</a>
            <a href="listadelivros.php">Lista de Livros</a>
            <a href="emprestimo.php">Empréstimos</a>
            <a href="devolucao.php">Devoluções</a>
            <a id="sair" href="logout.php">Sair</a>
        </nav> 
    </header>

    <form name="emprestimodelivros" method="post" action="concluiremprestimo.php">
        <fieldset class="forms">
            <legend>Empréstimos de Livros</legend>
                Aluno <select class="campos" name="aluno_nome">
                    <?php

                        $sql = "SELECT * FROM tbaluno";
                        $resultado = mysqli_query($conectar, $sql);

                        while ($registro = mysqli_fetch_array($resultado)) {
                            echo "<option value='".$registro['matricula']."'>";
                            echo $registro['nome'];
                            echo "</option>";
                        }

                    ?>
                </select>
                Data de Entrega <input class="campos" type="date" name="data_entrega"><br>
                Livros Disponíveis <br>
                    <?php

                        $sql = "SELECT * from tblivro WHERE status = '1'";
                        $resultado = mysqli_query($conectar, $sql);

                        while ($registro = mysqli_fetch_array($resultado)) {
                            echo "<input type='checkbox' name='lista[]' value='".$registro['id_livro']."'/>";
				            echo $registro['titulo'] . "<br/>";
                        }
                    ?>
                <input class="botao" type="submit" name="botao" value="Concluir">
                <input class="botao"type="reset" name="botao" value="Cancelar">
        </fieldset>
    </form>
</body>
</html>