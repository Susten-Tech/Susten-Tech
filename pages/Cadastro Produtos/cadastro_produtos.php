<?php
$servidor = "localhost";
$user = "root";
$password = "root";
$banco = "bd_Sustentech";

// Criando a conexão
$conn = new mysqli($servidor, $user, $password,  $banco);

// Verifique se a conexão falhou
if ($conn->connect_error) {
    echo "<p style='color:red; text-align:center; font-size:25px;'>Erro de conexão!</p>";
    echo "<h2 style='color:green; text-align:center; font-size:25px'><a href='usuario.html'>VOLTAR</a></h2>";
    exit(); // Encerra a execução do script se a conexão falhar
}

// Verifique se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenha os dados do formulário e escape os valores para evitar SQL Injection
    $nm_produto = $conn->real_escape_string($_POST["nm_produto"]);
    $nm_marca = $conn->real_escape_string($_POST["nm_marca"]);
    $dt_compra = $conn->real_escape_string($_POST["dt_compra"]);
    $marca_componentes = $conn->real_escape_string($_POST["marca_componentes"]);
    $modelo_produto = $conn->real_escape_string($_POST["modelo_produto"]);
    $condicao_produto = $conn->real_escape_string($_POST["condicao_produto"]);
    $ds_produto = $conn->real_escape_string($_POST["ds_produto"]);
    $vl_produto = $conn->real_escape_string($_POST["vl_produto"]);

    // Query de inserção no banco corrigida
    $insert = "INSERT INTO tb_produto 
                (nm_produto, nm_marca, dt_compra, marca_componentes, modelo_produto, condicao_produto, ds_produto, vl_produto) 
                VALUES 
                ('$nm_produto', '$nm_marca', '$dt_compra', '$marca_componentes', '$modelo_produto', '$condicao_produto', '$ds_produto', '$vl_produto')";

    // Executar a query
    $query = mysqli_query($conn, $insert);

    if ($query) {
        echo "Inserido com sucesso";
    } else {
        echo "Erro ao inserir: " . mysqli_error($conn);
    }
}

$conn->close();
?>
