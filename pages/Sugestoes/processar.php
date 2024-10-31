<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $avaliacao = $_POST['avaliacao'] ?? '';
    $funcionalidades = $_POST['funcionalidades'] ?? '';
    $negativo = $_POST['negativo'] ?? '';
    $positivo = $_POST['positivo'] ?? '';
    $sugestao = $_POST['sugestao'] ?? '';

    
    $stmt = $conexao->prepare("INSERT INTO tb_sugestoes (avaliacao, funcionalidades, negativo, positivo, sugestao) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        $stmt->bind_param("sssss", $avaliacao, $funcionalidades, $negativo, $positivo, $sugestao);
        
        if ($stmt->execute()) {
            echo "Sugestão enviada com sucesso!";
        } else {
            echo "Erro ao enviar a sugestão: " . $stmt->error;
        }

        $stmt->close(); 
    } else {
        echo "Erro ao preparar a consulta: " . $conexao->error;
    }
} else {
    echo "Método não suportado.";
}
?>