<?php
        include_once("conecta.php");

        $aluno_nome = $_POST['nome'];
        $aluno_cpf = $_POST['cpf'];
        $aluno_email = $_POST['email'];
        $aluno_data = $_POST['data'];

        $sql = "INSERT INTO tbaluno (nome, email, cpf, data_nasc) VALUES ('$aluno_nome', '$aluno_email', '$aluno_cpf', '$aluno_data')";
        header("location: cadastrar_aluno.html");
        $resultado = mysqli_query($conexao,$sql);
        mysqli_close($conexao);

?>
