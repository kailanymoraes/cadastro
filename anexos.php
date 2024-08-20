<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    if ($_FILES['imagens']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, pathinfo_extension));

        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "o arquivo" . basename($_FILES["imagem"]["name"]).
                "foi enviado com sucesso.";
            } else {
                echo "desculpe, houve um erro ao enviar o seu arquivo.";
            }
        } else {
            echo "o arvivo não é uma imagem.";
        }
    } else {
        echo "erro no upload:" . $_FILES['image']['error'];
    }
} else {
    echo "nenhum arquivo enviado.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <p>Redirecionar para a galeria</p>
</body>
</html>