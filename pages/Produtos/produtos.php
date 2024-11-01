<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <link rel="stylesheet" href="../NavBar/navbar.css">
    <link rel="stylesheet" href="../Rodapé/Rodapé.css">
    <link rel="icon" type="image/png" href="../../img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        main {
            display: flex;
            padding: 20px;
        }

        .filter {
            width: 200px;
            height: 300px;
            background-color: #0d7e2e;
            padding: 20px;
            border-radius: 10px;
        }

        .filter h3 {
            color: white;
            margin-bottom: 10px;
        }

        .filter form label {
            display: block;
            color: white;
            margin: 10px 0;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-left: 20px;
            flex-grow: 1;
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
            padding: 15px;
        }

        .product-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        .product-brand,
        .product-condition {
            font-size: 0.9em;
            color: #666;
            margin: 5px 0;
        }

        .product img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        width: 250px;
        height: 200px;
        border-radius: 15px;
    }

    .square {
        cursor: pointer;
    }

    </style>
</head>
<body>
<!-- BARRA DE NAVEGAÇÃO -->
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
            <li><a href="../Locais de Descarte/locais_descarte.html">Locais de Reciclagem</a></li>
            <li><a href="../Fale Conosco/fale_conosco.html">Fale Conosco</a></li>
            <li><a href="../Sugestoes/sugestoes.html">Sugestões</a></li>
        </ul>
        <div class="perfil-iconN">
            <a href="#"><img class="image" src="../NavBar/imagens/icone_perfil.png" alt="ícone perfil"></a>
        </div>
    </div>
</nav>

<main>
    <aside class="filter">
        <h3>Filtro de Pesquisa</h3>
        <form>
            <label><input type="checkbox"> Smartphones</label>
            <label><input type="checkbox"> Notebook</label>
            <label><input type="checkbox"> Desktops</label>
            <label><input type="checkbox"> Fones de ouvido</label>
            <label><input type="checkbox"> Televisão</label>
            <label><input type="checkbox"> Monitores</label>
        </form>
    </aside>
    <div class="square" onclick="window.location.href='exibicao.php';">
    <section class="products">
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
            exit();
        }

        $select = "SELECT * FROM tb_produto";
        $query = mysqli_query($conn, $select); 
        while ($result = mysqli_fetch_array($query)) { ?>
            <div class="product-card">
                <div class="product" ><img src="notebook.jpg" alt="Mouse"></DIV>
                <h2 class="product-title"><?php echo $result['nm_produto']; ?></h2>
                <p class="product-brand">Marca: <?php echo $result['nm_marca']; ?></p>
                <p class="product-condition">Condição: <?php echo $result['vl_produto']; ?></p>
            </div>
        <?php } ?>
    </section>
    </div>
</main>

</body>
</html>
