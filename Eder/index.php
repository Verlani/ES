<?php

session_start();

include_once('conectar.php');

if(!isset($_SESSION['nome'])){
    header("Location: login.html");
}

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

    <main>
        <aside>
            <h1>Seja bem vindo ao melhor sistema de biblioteca do  
                <?php
                 echo "MUNDO ". $_SESSION['nome']." !";
                ?>
            </h1>
        </aside>

        <div class="esquerda">
            <h1>Funções do Sistema</h1>
        </div>

        <div class="direita">
            <ul>
                <li>Cadastrar Alunos</li>
                <li>Cadastrar Áreas</li>
                <li>Cadastrar Livros</li>
                <li>Gerenciar Empréstimos</li>
            </ul>
        </div>
    </main>
</body>
</html>