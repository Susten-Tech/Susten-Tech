<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();
include 'conexao.php'; 

// Criando conexão com o banco de dados
$conn = new mysqli($servidor, $user, $password, $banco);

// Verificando conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nm_cliente = trim($_POST["nm_cliente"]);
    $email = trim($_POST["email"]);
    $nm_endereco = trim($_POST["nm_endereco"]);
    $nr_endereco = trim($_POST["nr_endereco"]);
    $sg_estado = trim($_POST["sg_estado"]);
    $nr_cep = trim($_POST["nr_cep"]);
    $nr_telefone = trim($_POST["nr_telefone"]);
    $senha = $_POST["senha"];
    $ConfirmaSenha = $_POST["ConfirmaSenha"];

    
    if ($senha === $ConfirmaSenha) {
        
        $hashsenha = password_hash($senha, PASSWORD_BCRYPT);

       
        $sql = "SELECT * FROM tb_usuarios WHERE nm_cliente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nm_cliente);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            
            $mensagemErro = "Usuário já existe!";
            header("Location: erro.php?mensagem=" . urlencode($mensagemErro));
            exit();
        } else {
            
            $insert = "INSERT INTO tb_usuarios (nm_cliente, nm_endereco, nr_endereco, sg_estado, email, nr_cep, nr_telefone, senha) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("ssssssss", $nm_cliente, $nm_endereco, $nr_endereco, $sg_estado, $email, $nr_cep, $nr_telefone, $hashsenha);

            if ($stmt->execute()) {
                
                header("Location: login.html"); 
                exit();
            } else {
            
                $mensagemErro = "Erro ao inserir: " . mysqli_error($conn);
                header("Location: erro.php?mensagem=" . urlencode($mensagemErro));
                exit();
            }
        }
    } else {
        $mensagemErro = "As senhas não coincidem!";
        header("Location: erro.php?mensagem=" . urlencode($mensagemErro));
        exit();
    }
}

$conn->close();
?>
