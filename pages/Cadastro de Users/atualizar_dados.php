<?php
$servidor = "localhost";
$user = "root";
$password = "root";
$bd = "bd_sustentech";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Criando conexão com o banco de dados
$conn = new mysqli($servidor, $user, $password,$bd);


$cd_cliente = $_POST['cd_cliente'];
$nm_cliente = $_POST['nm_cliente'];
$email = $_POST['email'];
$nm_endereco = $_POST['nm_endereco'];
$nr_endereco = $_POST['nr_endereco'];
$nr_cep = $_POST['nr_cep'];
$sg_estado = $_POST['sg_estado'];
$nr_telefone = $_POST['nr_telefone'];

$sql = "UPDATE tb_usuarios SET nm_cliente = ?, email = ?, nm_endereco = ?, nr_endereco = ?, nr_cep = ?, sg_estado = ?, nr_telefone = ? WHERE cd_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", $nm_cliente, $email, $nm_endereco, $nr_endereco, $nr_cep, $sg_estado, $nr_telefone, $cd_cliente);

if ($stmt->execute()) {
    echo "Informações atualizadas com sucesso.";
    header("Location: perfil.php?cd_cliente=$cd_cliente");
    exit;
} else {
    echo "Erro ao atualizar as informações: " . $conn->error;
}
?>
