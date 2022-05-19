<?php

    include_once('conectar.php');
        
        $aluno = $_POST['aluno_nome'];
        $data_entrega = $_POST['data_entrega'];

        for($i = 0; $i < sizeof($_POST['lista']); $i++){ 
		    $id_livro = $_POST['lista'][$i];

        $sql = "INSERT INTO tbreserva (id_res_matricula, id_res_livro, data_retirada, data_entrega, status) values ('$aluno', '$id_livro', now(), '$data_entrega', '1')";
        $resultado = mysqli_query($conectar, $sql);
		
		    if($resultado){
			$sql = "UPDATE tblivro SET status = '0' WHERE id_livro = '$id_livro'";
			$resultado = mysqli_query($conectar, $sql);
            }
        }
        if($resultado){
        echo "Empréstimo bem sucedido.";
        } else{
        echo "Falha no empréstimo.";
        }

    mysqli_close($conectar);

    header('location: emprestimo.php');
    
?>