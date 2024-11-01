<?php
session_start();
include 'conexao.php'; 


if (!isset($_SESSION['cd_cliente'])) {
    header("Location: usuarios.html"); 
    exit();
}

$cd_cliente = $_SESSION['cd_cliente']; 


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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="style.css"> 
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

        <h2>Meus Produtos</h2>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h3><?php echo htmlspecialchars($product['nm_produto']); ?></h3>
                    <p><strong>Marca:</strong> <?php echo htmlspecialchars($product['nm_marca']); ?></p>
                    <p><strong>Data de Compra:</strong> <?php echo htmlspecialchars($product['dt_compra']); ?></p>
                    <p><strong>Condição:</strong> <?php echo htmlspecialchars($product['condicao_produto']); ?></p>
                    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($product['ds_produto']); ?></p>
                    <p><strong>Valor:</strong> R$ <?php echo htmlspecialchars($product['vl_produto']); ?></p>
                </div> 
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum produto cadastrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
