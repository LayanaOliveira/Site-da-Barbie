<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="stylecadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,800;1,200;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <main class="container">
    <div class="titulo">
        <h1>Cadastro</h1>
    </div>
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

            <footer>
            <div class="social-field">
                        <a href="index.php">
                            Voltar para página de Login
                        </a>
                    </div>
            </footer>
            </main>

            <?php
              
                $email = filter_input(INPUT_POST, 'email');
                $senha = filter_input(INPUT_POST, 'senha');

                $conexao = mysqli_connect('localhost', 'root', '', 'login') or die('Erro ao conectar');
                $inserir = "INSERT INTO usuarios(email, senha) VALUES('$email', '$senha')";

                mysqli_query($conexao, $inserir) or die("Erro ao tentar cadastrar registro");
                mysqli_close($conexao);

            ?>
</body>
</html>