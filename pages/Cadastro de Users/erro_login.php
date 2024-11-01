<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro de Login</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .error-container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }
        h1 {
            color: #e74c3c;
        }
        p {
            font-size: 18px;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            color: #fff;
            background-color: #28a745; 
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #218838; 
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Erro de Login</h1>
        <p><?php echo htmlspecialchars($_GET['mensagem']); ?></p>
        <a href="login.html">Voltar para o Login</a>
    </div>
</body>
</html>
