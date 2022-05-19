
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Biblioteca</title>
</head>

<body>
    <main>
        <div class="menu">
            <div class="logo">
                <h1>Biblioteca</h1>
            </div>
            <nav>
                <a href="index.html">Home</a>
                <a href="#">Login</a>
                <a href="cadastro.html">Cadastrar-se</a>
            </nav>
        </div>
<?php
    include_once("conectar.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confsenha = $_POST['confsenha'];

    if($senha == $confsenha){
        $sql = "INSERT INTO tbusuario (nome, email, senha, confsenha) VALUES ('$nome', '$email', '$senha', '$confsenha')";
        header('location:index.html');
    }
    else{
        header('location:cadastro.html');
    }

    $resultado = mysqli_query($conexao,$sql);
    mysqli_close($conexao);

?>
    </main>
</body>
</html>