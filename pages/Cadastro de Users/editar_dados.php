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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Rodapé/rodape.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../NavBar/navbar.css"> 
    <style>
        /* Estilos gerais */
        body {
            background-color: #F1FAF1;
            font-family: "DM Sans", sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background-color: #0D7E2E; 
            width: 100%;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: auto;
        }

        /* Estilos do formulário */
        .container {
            max-width: 600px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: left;
            box-sizing: border-box;
            margin-top: 20px; /* Espaço entre a navbar e o formulário */
        }

        h1 {
            font-size: 32px;
            color: #0D7E2E;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #0D7E2E;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="nav-logo">
                <a href="#"><img class="image" src="../NavBar/imagens/sustentech_logo.png" alt="sustentech logo"></a>
            </div>
            <ul class="nav-links">
                <li><a href="../../index.html">Início</a></li>
                <li><a href="../Produtos/produtos.php">Produtos</a></li>
                <li class="dropdown">
                    <a href="#">Cadastro</a>
                    <ul class="dropdown-content">
                        <li><a href="../Cadastro de users/usuarios.html">Usuários</a></li>
                        <li><a href="../Cadastro de users/usuarios_empresas.html">Empresas</a></li>
                        <li><a href="../Cadastro Produtos/cadastro_produtos.html">Produtos</a></li>
                    </ul>
                </li>
                <li><a href="../Sobre Nos/sobre_nos.html">Sobre Nós</a></li>
                <li><a href="../Locais de Descarte/locais_descarte.html">Locais de Descarte</a></li>
                <li><a href="../Fale Conosco/fale_conosco.html">Fale Conosco</a></li>
                <li><a href="../Sugestoes/sugestoes.html">Sugestões</a></li>
            </ul>
            <div class="perfil-iconN">
                <a href="pages/Cadastro de Users/login.html"><img class="image" src="../NavBar/imagens/icone_perfil.png" alt="ícone perfil"></a>
            </div>
        </div>
    </nav>

    <!-- Formulário de edição do cliente -->
    <div class="container">
        <h1>Editar Informações do Cliente</h1>
        <form action="atualizar_dados.php" method="POST">
            <input type="hidden" name="cd_cliente" value="<?php echo $cliente['cd_cliente']; ?>">
            
            <label>Nome:</label>
            <input type="text" name="nm_cliente" value="<?php echo $cliente['nm_cliente']; ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $cliente['email']; ?>" required>

            <label>Endereço:</label>
            <input type="text" name="nm_endereco" value="<?php echo $cliente['nm_endereco']; ?>" required>

            <label>Número:</label>
            <input type="text" name="nr_endereco" value="<?php echo $cliente['nr_endereco']; ?>" required>

            <label>CEP:</label>
            <input type="text" name="nr_cep" value="<?php echo $cliente['nr_cep']; ?>" required>

            <label>Estado:</label>
            <input type="text" name="sg_estado" value="<?php echo $cliente['sg_estado']; ?>" maxlength="2" required>

            <label>Telefone:</label>
            <input type="text" name="nr_telefone" value="<?php echo $cliente['nr_telefone']; ?>">

            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
