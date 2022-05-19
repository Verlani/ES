<?php

include_once('conectar.php');

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
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
    <form method="post" name="cadastroaluno" action="cadastroaluno.php">
        <fieldset class="forms">
            <legend>Cadastro do Aluno</legend>
            <label>Nome <input class="campos" type="text" name="aluno_nome" placeholder="Digite seu nome"></label><br>
            <label>Email <input class="campos" type="email" name="aluno_email" placeholder="Digite seu email"></label><br>
            <label>CPF <input class="campos" type="number" name="aluno_cpf" maxlength="11" size="11" placeholder="Digite seu CPF"></label><br>
            <label>Data de nascimento <input class="campos" type="date" name="aluno_nascimento"></label><br>
            <input class="botao" type="submit" name="botao" value="Enviar">
            <input class="botao" type="reset" name="botao" value="Resetar">
        </fieldset>
    </form>
</body>
</html>

<?php

if(isset($_POST['botao']) and $_POST['botao'] == "Enviar") {
    $nome = $_POST['aluno_nome'];
    $email = $_POST['aluno_email'];
    $cpf = $_POST['aluno_cpf'];
    $data_nasc = $_POST['aluno_nascimento'];

$sql = "INSERT INTO tbaluno(nome, email, cpf, data_nasc) VALUES ('$nome', '$email', '$cpf', '$data_nasc')";

$resultado = mysqli_query($conectar, $sql);
mysqli_close($conectar);

if($resultado){
    echo "Usuário cadastrado com sucesso!";
} else{
    echo "Erro ao cadastrar usuário!";
}
}	