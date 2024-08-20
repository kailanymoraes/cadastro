<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {

    header("localtion: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="./css/pagPrincipal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Jacquard+12+Charted&family=Jacquard+24+Charted&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<body>
    <h1>Bem-vindo(a), <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
    <p>você está logado.</p>
    <a href="logout.php"></a>
    <a href="anexos.php"></a>

    <h2>⭑☆ Galeria ☆⭑</h2>>
    <form action="anexos.php" method="post" enctype="multipart/from-data">
        <div class="buttons">
        <input type="file" name="image" accept="image/*">
        <button type="submit">Enviar imagem</button>
        </div>
        
    </form>
    <div class="galery">
        <?php 
        $files = glob("imagens/*.*");
        foreach($files as $file) {
            echo '<img src="' . $file . '" alt="imagem">';
        }
        ?>
    </div>
</body>
</html>