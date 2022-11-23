<?php
    include("conexao.php");
    $consulta = "SELECT id, email, senha FROM usuarios";
    $con = $mysqli->query($consulta) or die($mysqli->error);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <table border='1'>
            <tr>
                <td>Id: </td>
                <td>E-mail:</td>
                <td>Senha:</td>
            </tr>
            <?php

             $result_usuarios = "SELECT * FROM usuarios";
             $resultado_usuarios = mysqli_query($mysqli, $result_usuarios);
             while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){ ?>
            <tr>
                <td><?php echo $row_usuario["id"]; ?></td>
                <td><?php echo $row_usuario["email"]; ?></td>
                <td><?php echo $row_usuario["senha"]; ?></td>
                <td>
                    <a href="excluir.php?id="$row_usuario["id"]"">
                    <img src="lixo.jpg" width="20px"></td>
                    </a>
                        
            </tr>
            <?php } ?>
        </table>
    </body>
</html>