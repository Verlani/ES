<?php

include_once('conectar.php');

?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devoluções</title>
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
        <h1>Devolução de Livros</h1>
    </div>

    <fieldset class="tablesdevolucao">
    <form name="cadastro" action="devolver.php" method="post">
        <legend>Livros Empretados</legend>
        <table class="tabelaesquerda">
            <tr>
                <th><input type="checkbox"></th>
                <th>Livro</th>
                <th>Aluno</th>
                <th>Data de Retirada</th>
                <th>Data para Devolução</th>
            </tr>

 <?php

    $sql = "SELECT id_reserva, titulo, nome, data_retirada, data_entrega from tbreserva R inner join tbaluno A on r.id_res_matricula = a.matricula inner join tblivro L on r.id_res_livro = l.id_livro where r.status = '1'";
    $resultado = mysqli_query($conectar, $sql);

    while($registro = mysqli_fetch_array($resultado)) {
        $livro = $registro['titulo'];
        $aluno = $registro['nome'];
        $data_retirada = $registro['data_retirada'];
        $data_entrega = $registro['data_entrega'];

            echo "<tr>";
                    echo "<td><input type='checkbox' value='".$registro['id_reserva']."' name='lista[]'></td>";
                    echo "<td>".$livro."</td>";
                    echo "<td>".$aluno."</td>";
                    echo "<td>".$data_retirada."</td>";
                    echo "<td>".$data_entrega."</td>";
            echo "</tr>";
    }

        echo "</table>";
?>

        <input class="botao" type="submit" name="botao" value="Devolver Livro">
        <input class="botao"type="reset" name="botao" value="Cancelar">
    </form>

    <form>
        <legend>Livros Devolvidos</legend>
        <table class="tabeladireita">
            <tr>
                <th>Livro</th>
                <th>Aluno</th>
                <th>Data de Retirada</th>
                <th>Data para Devolução</th>
            </tr>

<?php

    $sql = "SELECT titulo, nome, data_retirada, data_entrega from tbreserva R inner join tbaluno A on r.id_res_matricula = a.matricula inner join tblivro L on r.id_res_livro = l.id_livro where r.status = '0'";
    $resultado = mysqli_query($conectar, $sql);

    while($registro = mysqli_fetch_array($resultado)) {
        $livro = $registro['titulo'];
        $aluno = $registro['nome'];
        $data_retirada = $registro['data_retirada'];
        $data_entrega = $registro['data_entrega'];

        echo "<tr>";
                    echo "<td>".$livro."</td>";
                    echo "<td>".$aluno."</td>";
                    echo "<td>".$data_retirada."</td>";
                    echo "<td>".$data_entrega."</td>";
            echo "</tr>";
    }

        echo "</table>";
?>
    </table>
    </form>
    </fieldset>
</body>
</html>