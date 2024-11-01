<?php
session_start(); // Inicie a sessão

$servidor = "localhost";
$user = "root";
$password = "root";
$bd = "bd_sustentech";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Criando conexão com o banco de dados
$conn = new mysqli($servidor, $user, $password, $bd);


// Verifique se o cliente está autenticado
if (!isset($_SESSION['cd_cliente'])) {
    echo "Você precisa estar logado para editar os dados.";
    exit;
}

$cd_cliente = $_SESSION['cd_cliente'];

// Consulta para buscar os dados do cliente
$sql = "SELECT * FROM tb_usuarios WHERE cd_cliente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cd_cliente);
$stmt->execute();
$resultado = $stmt->get_result();
$cliente = $resultado->fetch_assoc();

if (!$cliente) {
    echo "Cliente não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Informações do Cliente</h1>
    <form action="atualizar_dados.php" method="POST">
        <input type="hidden" name="cd_cliente" value="<?php echo $cliente['cd_cliente']; ?>">
        
        <label>Nome:</label>
        <input type="text" name="nm_cliente" value="<?php echo $cliente['nm_cliente']; ?>" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $cliente['email']; ?>" required><br>

        <label>Endereço:</label>
        <input type="text" name="nm_endereco" value="<?php echo $cliente['nm_endereco']; ?>" required><br>

        <label>Número:</label>
        <input type="text" name="nr_endereco" value="<?php echo $cliente['nr_endereco']; ?>" required><br>

        <label>CEP:</label>
        <input type="text" name="nr_cep" value="<?php echo $cliente['nr_cep']; ?>" required><br>

        <label>Estado:</label>
        <input type="text" name="sg_estado" value="<?php echo $cliente['sg_estado']; ?>" maxlength="2" required><br>

        <label>Telefone:</label>
        <input type="text" name="nr_telefone" value="<?php echo $cliente['nr_telefone']; ?>"><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
