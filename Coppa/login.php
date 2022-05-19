
<?php
    session_start();
    include_once("conectar.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tbusuario WHERE email LIKE '$email' AND senha LIKE '$senha'";
    $resultado = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($resultado) == 1){
        $registro = mysqli_fetch_array($resultado);

            $_SESSION['nome'] = $nome;
            header('Location: biblioteca.html');

        } else{
            header('Location: login.html');

        }

?>