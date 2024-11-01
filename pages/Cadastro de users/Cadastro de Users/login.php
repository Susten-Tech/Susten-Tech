<?php
session_start(); 

include 'conexao.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);        
        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($senha, $user['senha'])) { 
                $_SESSION['cd_cliente'] = $user['cd_cliente']; 
                header("Location: perfil.php"); 
                exit();
            } else {
               
                $mensagemErro = "Senha incorreta.";
                header("Location: erro_login.php?mensagem=" . urlencode($mensagemErro));
                exit();
            }
        } else {
            
            $mensagemErro = "Usuário não encontrado.";
            header("Location: erro_login.php?mensagem=" . urlencode($mensagemErro));
            exit();
        }
        
    } else {
        $mensagemErro = "Por favor, preencha todos os campos.";
        header("Location: erro_login.php?mensagem=" . urlencode($mensagemErro));
        exit();
    }
}
?>
