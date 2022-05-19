<?php

include_once('conectar.php');


?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
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

    <div id="titulolista">
        <h1>Livros Cadastrados</h1>
    </div>

    <table class="listadelivros">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Área</th>
            <th>Edição</th>
            <th>Exclusão</th>
        </tr>

        <?php

        $sql = "SELECT titulo, autor, nome from tblivro l inner join tbarea a on l.id_area = a.id_area";
        $resultado = mysqli_query($conectar, $sql);

        while($registro = mysqli_fetch_array($resultado)) {
            $titulo = $registro['titulo'];
            $autor = $registro['autor'];
            $area = $registro['nome'];
            
            echo "<tr>";
                echo "<td>".$titulo."</td>";
                echo "<td>".$autor."</td>";
                echo "<td>".$area."</td>"; 
                echo "<td><button class='botao' type='submit' name='editar' value='".$registro[0]."'>Editar</button></td>";
				echo "<td><button class='botao' type='submit' name='excluir' value='".$registro[0]."' onclick='return confirmaExclusao()'>Excluir</button></td>";
            echo "</tr>"; 
        }

        mysqli_close($conectar);
    echo "</table>"
?>   

</body>
</html>