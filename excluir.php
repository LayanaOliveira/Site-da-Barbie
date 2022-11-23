<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <?php
                $usuario = 'root';
                $senha = '';
                $database = 'login';
                $host = 'localhost';
                $mysqli = new mysqli($host, $usuario, $senha, $database);

                session_start();
                
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                if(!empty($id)){
                $result_usuario = "DELETE FROM usuarios WHERE id='$id'";
                $resultado_usuario = mysqli_query($mysqli, $result_usuario);
                }
                header("location: admin.php");
            ?>
</body>
</html>