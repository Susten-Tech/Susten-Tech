<?php

include 'conexão.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = htmlspecialchars($_POST['nome']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $usuario = htmlspecialchars($_POST['usuario']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    echo "<h1>Dados Recebidos:</h1>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Telefone:</strong> $telefone</p>";
    echo "<p><strong>Usuário:</strong> $usuario</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Mensagem:</strong> $mensagem</p>";

    
    $stmt = $conexao->prepare("INSERT INTO tb_faleconosco (nome, telefone, usuario, email, senha, mensagem) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $telefone, $usuario, $email, $senha, $mensagem);

    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }

    $stmt->close(); 
} else {
    echo "Método inválido. Use POST";
}
?>