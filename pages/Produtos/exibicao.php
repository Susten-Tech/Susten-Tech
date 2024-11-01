<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="../NavBar/navbar.css">
    <link rel="stylesheet" href="../Rodapé/Rodapé.css">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: block;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-image img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        .product-info {
            padding: 15px;
            text-align: center;
        }

        .product-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .product-brand,
        .product-model,
        .product-condition,
        .product-description {
            font-size: 0.9em;
            color: #666;
            margin: 5px 0;
        }

        .product-price {
            font-size: 1.5em;
            font-weight: bold;
            color: #e53935;
            margin: 10px 0;
        }

        .buy-button {
            background-color: #0d7e2e;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .buy-button:hover {
            background-color: #65b307;
        }
    </style>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.buy-button');
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    alert('Produto adicionado ao carrinho!');
                });
            });
        });
    </script> -->
</head>
<body>
<!--BARRA DE NAVEGAÇÃO-->
<nav class="navbar">
    <div class="navbar-container">
        <div class="nav-logo">
            <a href="#"><img class="image" src="../NavBar/imagens/sustentech_logo.png" alt="sustentech logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="../../index.html">Início</a></li>
            <li><a href="../Produtos/produtos.php">Produtos</a></li>
            <li class="dropdown">
                <a href=>Cadastro</a>
                <ul class="dropdown-content">
                    <li><a href="../Cadastro de users/usuarios.html">Usuários</a></li>
                    <li><a href="../Cadastro de users/usuarios_empresas.html">Empresas</a></li>
                    <li><a href="../Cadastro Produtos/cadastro_produtos.html">Produtos</a></li>
                </ul>
            </li>
            <li><a href="../Sobre Nos/sobre_nos.html">Sobre Nós</a></li>
            <li><a href="../Locais de Descarte/locais_descarte.html">Locais de Reciclagem</a></li>
            <li><a href="../Fale Conosco/fale_conosco.html">Fale Conosco</a></li>
            <li><a href="../Sugestoes/sugestoes.html">Sugestões</a></li>
        </ul>
  
         <!--
        <div class="N">
            <input type="text" placeholder="Pesquisar...">
            <button>
                <img class="image" src="pages/NavBar/imagens/lupa.png" alt="ícone lupa">
            </button>
        </div>
        -->
  
        <div class="perfil-iconN">
            <a href="pages/Cadastro de Users/login.html"><img class="image" src="../NavBar/imagens/icone_perfil.png" alt="ícone perfil"></a>
        </div>
    </div>
  </nav>
  <br>
<section class="products">
    <div class="container">
        <?php
        $servidor = "localhost";
        $user = "root";
        $password = "root";
        $banco = "bd_Sustentech";

        // Criando a conexão
        $conn = new mysqli($servidor, $user, $password, $banco);

        // Verifique se a conexão falhou
        if ($conn->connect_error) {
            echo "<p style='color:red; text-align:center; font-size:25px;'>Erro de conexão!</p>";
            echo "<h2 style='color:green; text-align:center; font-size:25px'><a href='usuario.html'>VOLTAR</a></h2>";
            exit();
        }

        $select = "SELECT * FROM tb_produto";
        $query = mysqli_query($conn, $select); 
        while ($result = mysqli_fetch_array($query)) { ?>
            <div class="product-card">
                <div class="product-image">
                    <!-- Substitute with an actual product image URL or placeholder -->
                    <img src="notebook.jpg" alt="Product Image">
                </div>
                <div class="product-info">
                    <h2 class="product-title"><?php echo $result['nm_produto']; ?></h2>
                    <p class="product-brand">Marca: <?php echo $result['nm_marca']; ?></p>
                    <p class="product-model">Modelo: <?php echo $result['modelo_produto']; ?></p>
                    <p class="product-condition">Condição: <?php echo $result['condicao_produto']; ?></p>
                    <p class="product-description">Descrição:<?php echo $result['ds_produto']; ?></p>
                    <p class="product-description">Condição:<?php echo $result['vl_produto']; ?></p>
                    <a href="https://wa.me/5511911536540" target="_blank" style="text-decoration: none;">
    <button class="buy-button">Entrar em Contato</button>
</a>

                </div>
            </div>
        <?php } ?>
    </div>
</section>


</body>
</html>
