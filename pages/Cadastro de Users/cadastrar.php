<?php
$servidor = "localhost";
$user = "root";
$password = "root";
$bd = "bd_sustentech";

$conn = new mysqli($servidor, $user, $password, $bd);

if ($conn->connect_error) {
    die("<p style='color:red; text-align:center; font-size:25px;'>Erro de conexão!</p>");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nm_empresa = trim($_POST["nm_empresa"]);
    $cnpj_empresa = trim($_POST["cnpj_empresa"]);
    $nm_endereco = trim($_POST["nm_endereco"]);
    $nr_endereco = trim($_POST["nr_endereco"]);
    $nr_cep = trim($_POST["nr_cep"]);
    $nr_telefone = trim($_POST["nr_telefone"]);
    $nm_responsavel = trim($_POST["nm_responsavel"]);
    $cargo_responsavel = trim($_POST["cargo_responsavel"]);
    $email_responsavel = trim($_POST["email_responsavel"]);
    $senha = $_POST["senha"];
    $ds_servico = trim($_POST["ds_servico"]);
    $ConfirmaSenha = $_POST["ConfirmaSenha"];

    if ($senha === $ConfirmaSenha) {

        $sql = "SELECT * FROM tb_empresa WHERE nm_empresa = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nm_empresa);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            
            $mensagemErro = "Empresa já cadastrada!";
            header("Location: erro.php?mensagem=" . urlencode($mensagemErro));
            exit();
        } else {
            
            $hashsenha = password_hash($senha, PASSWORD_BCRYPT);

            $insert = "INSERT INTO tb_empresa (nm_empresa, cnpj_empresa, nr_endereco, nm_endereco, nr_cep, nr_telefone, nm_responsavel, cargo_responsavel, email_responsavel, senha, ds_servico) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert);
            $stmt->bind_param("sssssssssss", $nm_empresa, $cnpj_empresa, $nr_endereco, $nm_endereco, $nr_cep, $nr_telefone, $nm_responsavel, $cargo_responsavel, $email_responsavel, $hashsenha, $ds_servico);

            if ($stmt->execute()) {
                
                header("Location: perfil.php");
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
