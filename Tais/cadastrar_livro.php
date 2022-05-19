<?php 
        include_once("conectar.php");
    ?>

    <html>

    <head>
    <title>Cadastro de Livro</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
                   body{
                       background-image: url(book.jpg);
                       color: white;
                   }
                   a {
            color: white;
            text-decoration: none;
            transition: 0.1s;
           
            justify-content: space-around;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            height: 8vh;
        }
        
        a:hover {
            opacity: 0.7;
        }
                   </style>
    </head>

    <body>

        <header>
                <h1>Cadastro de Livro</h1>
        </header>

        <div id='cadastrolivro'>

        <form method="post" action="cadastrar_livro.php">

                    <br><label>
                        Titulo:
                        <input type="text" name="titulo" required>
                    </label><br>

                    <br><label>
                        Autor:
                        <input type="text" name="autor" required>
                    </label><br>

                    <br><label>
                        Área:

                        <select name="id_area" required>
                        <?php
                            $sql = "SELECT * FROM area";
                            $resultado=mysqli_query($conexao,$sql);
                            while($data=mysqli_fetch_array($resultado)){
                                $id=$data['id'];
                                $nome=$data['nome'];
                                echo "<option value='$id'>$nome</option>";
                            }
                        ?>
                        </select>
                    </label><br>

                    <br><br><button type="submit" name="Post" value="1">Cadastrar</button>

                </form>
            </div>
            <a href="listar_livros.php">LISTA DE LIVROS</a></br>
            <a href="index.html">PÁGINA INICIAL</a>
    </body>
    </html>

    <?php
        if(isset($_POST['Post'])){
            $titulo=$_POST['titulo'];
            $autor=$_POST['autor'];
            $idarea=$_POST['id_area'];
            $sql = "INSERT INTO livro (titulo, autor, status, id_area) VALUES ('$titulo','$autor','1','$idarea')";
            mysqli_query($conexao,$sql);
            mysqli_close($conexao);
            header('Location: listar_livros.php'); 
        }
    ?>
