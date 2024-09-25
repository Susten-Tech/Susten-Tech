<?php

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

}else{
    echo "Método inválido. Use POST";
}
    
if ($stmt->execute()) {
    echo "Dados inseridos com sucesso!";
}else{
    echo "Erro ao inserir dados:
" . $conexao->error;
}

   
?>