<?php
include 'conexão.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $usuario = htmlspecialchars($_POST['usuario']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dados Recebidos</title>
    <style>
        /* Estilo geral do corpo */
        body {
            background-color: #F1FAF1; /* Cor de fundo suave */
            font-family: 'Arial', sans-serif; /* Fonte padrão */
            color: #333; /* Cor do texto */
            margin: 0; /* Remove margens padrão */
            padding: 20px; /* Adiciona espaço interno */
        }

        /* Estilo do contêiner principal */
        .container {
            max-width: 600px; /* Largura máxima */
            margin: 0 auto; /* Centraliza o contêiner */
            background-color: #fff; /* Cor de fundo do contêiner */
            border-radius: 8px; /* Cantos arredondados */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Sombra leve */
            padding: 20px; /* Espaço interno */
        }

        /* Estilo do título */
        h1 {
            color: #0D7E2E; /* Cor do título */
            text-align: center; /* Centraliza o título */
            margin-bottom: 20px; /* Espaço abaixo do título */
        }

        /* Estilo dos parágrafos */
        p {
            line-height: 1.6; /* Altura da linha para melhor legibilidade */
            margin: 10px 0; /* Margem acima e abaixo dos parágrafos */
        }

        /* Estilo dos botões */
        button {
            background-color: #0D7E2E; /* Cor de fundo do botão */
            color: white; /* Cor do texto do botão */
            border: none; /* Remove borda padrão */
            padding: 10px 15px; /* Espaço interno do botão */
            border-radius: 5px; /* Cantos arredondados do botão */
            cursor: pointer; /* Muda o cursor ao passar por cima */
            transition: background-color 0.3s; /* Transição suave para a cor de fundo */
            display: block; /* Exibe como bloco para centralizar */
            margin: 20px auto; /* Centraliza o botão com margem */
            font-size: 16px; /* Tamanho da fonte */
        }

        /* Efeito ao passar o mouse sobre o botão */
        button:hover {
            background-color: #0056b3; /* Muda a cor de fundo ao passar o mouse */
        }

        /* Estilo para as mensagens de sucesso e erro */
        .success {
            color: #28a745; /* Verde para sucesso */
            font-weight: bold; /* Texto em negrito */
        }

        .error {
            color: #dc3545; /* Vermelho para erro */
            font-weight: bold; /* Texto em negrito */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Dados Recebidos:</h1>
    <p><strong>Nome:</strong> <?php echo $nome; ?></p>
    <p><strong>Telefone:</strong> <?php echo $telefone; ?></p>
    <p><strong>Usuário:</strong> <?php echo $usuario; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Mensagem:</strong> <?php echo $mensagem; ?></p>

    <?php
    $stmt = $conexao->prepare("INSERT INTO tb_faleconosco (nome, telefone, usuario, email, senha, mensagem) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $telefone, $usuario, $email, $senha, $mensagem);

    if ($stmt->execute()) {
        echo "<p class='success'>Dados inseridos com sucesso!</p>";
    } else {
        echo "<p class='error'>Erro ao inserir dados: " . $conexao->error . "</p>";
    }

    $stmt->close(); 
    ?>
</div>

</body>
</html>

<?php
} else {
    echo "Método inválido. Use POST";
}
?>
