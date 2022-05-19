<?php

include_once("conectar.php");

?>

<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Área</title>
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
    <form method="post" name="cadastroarea" action="cadastroarea.php">
        <fieldset class="forms">
            <legend>Cadastro da área</legend>
            <label>Nome <input class="campos" type="text" name="area_nome" placeholder="Digite a área"></label>
            <input class="botao" type="submit" name="botao" value="Enviar">
            <input class="botao" type="reset" name="botao" value="Resetar">
        </fieldset>
    </form>
</body>
</html>

<?php

if(isset($_POST['botao']) and $_POST['botao'] == "Enviar"){
    $area = $_POST['area_nome'];

$sql = "INSERT INTO tbarea(nome) VALUES ('$area')";

$resultado = mysqli_query($conectar, $sql);
mysqli_close($conectar);

if($resultado){
    echo "Área  cadatrada com sucesso!";
} else{
    echo "Erro ao cadastrar área!";
}
}