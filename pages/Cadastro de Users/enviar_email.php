<?php
require 'vendor/autoload.php'; // Certifique-se de que o autoload do Composer está incluído
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verifique se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];

    // Conectar ao banco de dados
    $conn = new mysqli("localhost", "root", "root", "bd_sustentech");

    // Verifique se a conexão foi bem-sucedida
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Preparar a consulta para verificar se o e-mail existe
    $stmt = $conn->prepare("SELECT cd_cliente FROM tb_usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    
    // Executar a consulta
    $stmt->execute();
    $result = $stmt->get_result(); // Obter o resultado da consulta

    // Verificar se o e-mail existe
    if ($result->num_rows === 1) {
        $token = bin2hex(random_bytes(50));
        // Atualizar o token no banco de dados
        $stmt = $conn->prepare("UPDATE tb_usuarios SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        $mail = new PHPMailer(true);
        try {
            // Configurações do PHPMailer
            $mail->isSMTP();
            $mail->Host = 'localhost'; // Servidor SMTP local
            $mail->SMTPAuth = false; // Desativa a autenticação
            $mail->Port = 25; // Porta padrão

            $mail->setFrom('juliana.brrs002@gmail.com', 'Seu Nome'); // Defina um remetente válido
            ; // Defina o remetente
            $mail->addAddress($email); // Defina o destinatário

            $resetLink = "http://localhost/redefinir_senha.php?token=" . $token;
            $mail->isHTML(true);
            $mail->Subject = 'Redefinição de Senha';
            $mail->Body = "Clique no link para redefinir sua senha: <a href='$resetLink'>$resetLink</a>";

            $mail->send(); // Tente enviar o e-mail
            echo 'Um link de redefinição foi enviado para seu e-mail.';
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    } else {
        echo "E-mail não encontrado."; // Mensagem se o e-mail não estiver no banco de dados
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>
