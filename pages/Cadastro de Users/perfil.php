<?php
include 'conexao.php'; 
session_start();


if (!isset($_SESSION['cd_cliente'])) {
    header("Location: login.php");
    exit();
}

$cd_cliente = $_SESSION['cd_cliente'];

try {
    $queryUser = "SELECT * FROM tb_usuarios WHERE cd_cliente = ?";
    $stmtUser = $pdo->prepare($queryUser);
    $stmtUser->execute([$cd_cliente]);
    $userData = $stmtUser->fetch(PDO::FETCH_ASSOC);


    if (!$userData) {
        echo "Usuário não encontrado.";
        exit();
    }

   
    $queryProducts = "SELECT * FROM tb_produto WHERE tb_usuarios_cd_cliente = ?";
    $stmtProducts = $pdo->prepare($queryProducts);
    $stmtProducts->execute([$cd_cliente]);
    $products = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #F1FAF1;
        }

        .container {
            font-family: "DM Sans", sans-serif;
            max-width: 900px;
            background-color: #ffffff;
            margin: 50px auto;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 35px;
            color: #0D7E2E;
            text-align: center;
        }

        h2 {
            font-size: 30px;
            color: #0D7E2E;
            border-bottom: 2px solid #0D7E2E;
            padding-bottom: 10px;
            margin-top: 30px;
            text-align: left;
        }

        .button-group {
            margin-top: 20px;
        }

        .btn {
            background-color: green;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        .user-info{
            font-size: 22px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo(a), <?php echo htmlspecialchars($userData['nm_cliente']); ?>.</h1>
        <div class="user-info">
            <p><strong>Nome do Usuário:</strong> <?php echo htmlspecialchars($userData['nm_cliente']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
            <p><strong>Telefone:</strong> <?php echo htmlspecialchars($userData['nr_telefone']); ?></p>
            <p><strong>Endereço:</strong> <?php echo htmlspecialchars($userData['nm_endereco'] . ", " . $userData['nr_endereco']); ?></p>
            <p><strong>CEP:</strong> <?php echo htmlspecialchars($userData['nr_cep']); ?></p>
        </div>
        <div class="button-group">
        <button onclick="location.href='Cadastro Produtos/cadastro_produtos'" class="btn">Cadastrar Produtos</button>
        <button onclick="location.href='editar_dados.php'" class="btn">Editar Dados</button>
        <button onclick="location.href='redefinir_senha.php'" class="btn">Redefinir Senha</button>
    <div>
    <div>
        <h2>Meus Produtos</h2>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h3><?php echo htmlspecialchars($product['nm_produto']); ?></h3>
                    <p><strong>Marca:</strong> <?php echo htmlspecialchars($product['nm_marca']); ?></p>
                    <p><strong>Data de Compra:</strong> <?php echo htmlspecialchars($product['dt_compra']); ?></p>
                    <p><strong>Condição:</strong> <?php echo htmlspecialchars($product['condicao_produto']); ?></p>
                    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($product['ds_produto']); ?></p>
                    <p><strong>Valor:</strong> R$ <?php echo number_format($product['vl_produto'], 2, ',', '.'); ?></p>
                </div> 
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum produto cadastrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
