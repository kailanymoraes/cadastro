<?php
session_start();

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome']; 
            header("location: pagina_principal.php");
            exit;
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "usuário não encontratado!";
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
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <div class="container">
        <img src="icons/login.jpg" alt="login image">
        <form method="post">
            email: <input type="email" name="email" required> <br><br>
            senha: <input type="password" name="senha" required> <br><br>
            <input type="submit" value="entrar">
        </form>
        <a href="cadastro.php" class="cadastro-link">fazer cadastro</a>
    </div>
</body>
</html>