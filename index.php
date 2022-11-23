<?php
    include('conexao.php');

    if(isset($_POST['email']) || isset($_POST['senha'])){
        if(strlen($_POST['email'])==0){
            echo "<span class'texto'>Preencha seu e-mail<span>";
        }else if(strlen($_POST['senha'])==0){
            echo "<span class='texto'>Preencha sua senha<span>";
        }else{
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->error);
            
            $quantidade = $sql_query->num_rows;
            if($quantidade==1){
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $usuario['id'];

                header("Location: dados.php");
            }else{
                echo "<span class='texto'>Falha ao logar. E-mail ou senha incorretos.</span>";
            }

        }

        if($email=="admin" && $senha=="admin"){
            header('location:admin.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <script src="https://fontawesome.com/v6/docs/web/" ></script>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,800;1,200;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
   <style>
    .texto{
        margin-top: -100px;
        color: white;
        background: red;
        height: 40px;
        display: flex;
        align-items: center;
        border-radius: 4px;

    }
   </style>
</head>
    <body>
        <main class="container">
            <h2>Login</h2>
            <form action="" method="POST">
                <div class="input-field">
                    <input type="text" name="email" id="email" placeholder="E-mail">
                    <div class="underline"></div>
                </div>
                <div class="input-field">
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                    <div class="underline"></div>
                </div>

                <input type="submit" value="Continue">
            </form>

            <div class="footer">
                <span>Não possui cadastro?</span>
                <div class="social-fields">
                    <div class="social-field twitter">
                        <a href="cadastro.php">
                            Cadastre-se! 
                        </a>
                    </div>
                    <div class="social-field facebook">
                        <a href="#">
                            <i class="fa-brands fa-facebook-f"></i>
                            Entre com o Facebook
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>