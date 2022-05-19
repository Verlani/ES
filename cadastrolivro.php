<?php

include_once("conectar.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro</title>
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
    <form method="post" name="cadastrolivro" action="cadastrolivro.php">
        <fieldset class="forms">
            <Legend>Cadastro de livro</Legend>
            <label>Título do Livro <input class="campos" type="text" name="livro_titulo" placeholder="Digite o título do livro"></label><br>
            <label>Autor <input class="campos" type="text" name="livro_autor" placeholder="Digite o nome do autor"></label><br>
            Área <select class="campos" name="livro_area">

			<?php

				$sql = "SELECT * FROM tbarea";
				$resultado = mysqli_query($conectar, $sql);

				while ($registro = mysqli_fetch_array($resultado)) {
					echo "<option value='".$registro['id_area']."'>";
					echo $registro['nome'];
					echo "</option>";
				}

			?>
		</select>
            </select><br>
            <input class="botao" type="submit" name="botao" value="Enviar">
            <input class="botao"type="reset" name="botao" value="Resetar">
        </fieldset>
    </form>
</body>
</html>

<?php

if(isset ($_POST['botao']) and $_POST['botao'] == "Enviar"){
    $titulo = $_POST['livro_titulo'];
    $autor = $_POST['livro_autor'];
    $area = $_POST['livro_area'];

    $sql = "INSERT INTO tblivro (titulo, autor, status, id_area) VALUES ('$titulo', '$autor', '1', '$area')";

    $resultado = mysqli_query($conectar, $sql);
    mysqli_close($conectar);

    if($resultado){
    echo "Livro cadatrado com sucesso!";
    } else{
    echo "Erro ao cadastrar livro!";
    }
}
?>