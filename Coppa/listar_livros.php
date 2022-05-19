<?php
 // Inclui o conectar.php para conectar ao BD:
 include_once("conecta.php");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="cadastros.css">
    <title>Resultado da Pesquisa por Cidade</title>
</head>
<body>
    <main> 
            <div class="menu">
                <div class="logo">
                        <h1>Biblioteca</h1>
                </div>
                <nav>
                    <a href="biblioteca.html">Voltar</a>
                    <a href="cadastrar_aluno.html">Cadastrar alunos</a>
                    <a href="cadastrar_livros.php">Cadastrar livros</a>
                    <a href="cadastrar_area.php">Cadastrar areas</a>
                    <a href="deslogar.php">Sair</a>
                </nav>
            </div>

            <div class="conteudo">
<!-- Criando tabela e cabeçalho de dados: -->
 <table border="1" style='width:50%'>
 <tr>
 <th>TITULO</th>
 <th>AUTOR</th>
 <th>AREA</th>
 </tr>
 
 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
 $sql = "SELECT titulo, autor, tbarea.nome FROM tblivro INNER JOIN tbarea ON tblivro.id_area = tbarea.id_area";
 $resultado = mysqli_query($conexao,$sql) ; //or die("Erro ao retornar dados");
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $titulo = $registro['titulo'];
   $autor = $registro['autor'];
   $area = $registro['nome'];
   
   echo "<tr>";
   echo "<td>".$titulo."</td>";
   echo "<td>".$autor."</td>";
   echo "<td>".$area."</td>";
   echo "</tr>";
 }
 mysqli_close($conexao);
 echo "</table>";
?>
    </div>
    </main>

<script>/* Seu JavaScript funciona aqui! */ </script>
</body>
</html>





