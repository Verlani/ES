<?php

    include_once('conectar.php');

    for($i = 0; $i < sizeof($_POST['lista']); $i++){ 
        $id_reserva = $_POST['lista'][$i];
    
        $sql = "UPDATE tbreserva set status = '0' where id_reserva = '$id_reserva'";
        $resultado = mysqli_query($conectar, $sql);
        
        if($resultado) {
            $sql = "UPDATE tblivro l inner join tbreserva r on r.id_res_livro = l.id_livro set l.status = '1' where id_reserva = '$id_reserva'";
            $resultado = mysqli_query($conectar, $sql);
            }
        }
        
        mysqli_close($conectar);

        header('location: devolucao.php');

?>