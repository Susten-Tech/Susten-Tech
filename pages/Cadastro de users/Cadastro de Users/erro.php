<?php
$mensagemErro = isset($_GET['mensagem']) ? $_GET['mensagem'] : "Ocorreu um erro inesperado!";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro no Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        a {
            text-decoration: none;
            color: blue;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #4CAF50; 
            color: white; 
            text-align: center;
            text-decoration: none; 
            border-radius: 5px; 
        }
        .button:hover {
            background-color: #45a049; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color: red;">Erro</h1>
        <p style="color: red; font-size: 20px;"><?php echo htmlspecialchars($mensagemErro); ?></p>
        <a href="usuarios.html" class="button">Voltar ao Cadastro</a>
    </div>
</body>
</html>
