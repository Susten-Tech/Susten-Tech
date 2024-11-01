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
</head>
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
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-left: 20px;
        flex-grow: 1;
    }
 
    .product {
        background-color: #0d7e2e;
        border: 1px solid #0d7e2e;
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
    }
 
    .product img {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        width: 250px;
        height: 150px;
    }
</style>
<body>
<!-- BARRA DE NAVEGAÇÃO -->
<nav class="navbar">
    <div class="navbar-container">
        <div class="nav-logo">
            <a href="#"><img class="image" src="../NavBar/imagens/sustentech_logo.png" alt="sustentech logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="../../index.html">Início</a></li>
            <li><a href="produtos.html">Produtos</a></li>
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
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Data Compra</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Condição</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servidor = "localhost";
                $user = "root";
                $password = "root";
                $banco = "bd_sustentech";
 
                // Criando a conexão
                $conn = new mysqli($servidor, $user, $password, $banco);
 
                // Verifique se a conexão falhou
                if ($conn->connect_error) {
                    echo "<p style='color:red; text-align:center; font-size:25px;'>Erro de conexão!</p>";
                    echo "<h2 style='color:green; text-align:center; font-size:25px'><a href='usuario.html'>VOLTAR</a></h2>";
                    exit(); // Encerra a execução do script se a conexão falhar
                }
 
                $select = "SELECT * FROM tb_produto";
                $query = mysqli_query($conn, $select); 
                while ($result = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $result['cd_produto']; ?></td>
                        <td><?php echo $result['nm_produto']; ?></td> 
                        <td><?php echo $result['nm_marca']; ?></td>
                        <td><?php echo $result['dt_compra']; ?></td>
                        <td><?php echo $result['modelo_produto']; ?></td>
                        <td><?php echo $result['condicao_produto']; ?></td>
                        <td><?php echo $result['ds_produto']; ?></td>
                        <td><?php echo $result['vl_produto']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <section class="products">
            <div class="product">
                <p>Smartphone</p>
                <p>Motorola Moto G04S 4G</p>
            </div>
            <div class="product">
                <p>Desktop</p>
                <p>Processador AMD RYZEN 3 3200G</p>
            </div>
            <div class="product">
                <p>Desktop</p>
                <p>Teclado para PC</p>
            </div>
            <div class="product">
                <p>Desktop</p>
                <p>Memória RAM</p>
            </div>
            <div class="product">
                <img src="https://img.freepik.com/psd-gratuitas/televisao-antiga-isolada_23-2151437106.jpg?ga=GA1.1.1657079513.1717265908&semt=ais_hybrid" alt="TV">
                <p>Televisão</p>
                <p>Relíquia</p>
            </div>
        </section>
    </div>
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <img class="image1" src="../../img/logo.png" alt="">
                <p class="emo">Desafie o padrão: menos consumo, mais inovação.</p>
            </div>
            <div class="col">
                <nav>
                    <h5 class="text-color">Contato</h5>
                    <div class="link-chato">
                        <a class="nav-link">(13) 91234-5678</a>
                        <a class="nav-link">sustentech.contato@gmail.com</a>
                        <a class="nav-link" href="../Fale Conosco/fale_conosco.html">Fale Conosco</a>
                    </div>
                </nav>
            </div>
            <div class="col">
                <nav>
                    <h5 class="text-color">Redes Sociais</h5>
                    <div class="link-chato2">
                        <a class="nav-link" href="https://www.instagram.com/sustentech_lvlc?igsh=MWhhZXdwNHg0NXU3eA=="><img class="png" src="../Rodapé/img/instagram.png" alt=""> Instagram</a>
                        <a class="nav-link" href=""><img class="png" src="../Rodapé/img/facebook.png" alt=""> Facebook</a>
                        <a class="nav-link" href=""><img class="png" src="../Rodapé/img/tiktok.png" alt=""> Tiktok</a>
                        <a class="nav-link" href=""><img class="png" src="../Rodapé/img/discordia.png" alt=""> Discord</a>
                        <a class="nav-link" href="https://github.com/Susten-Tech/Sustentech"><img class="png" src="../Rodapé/img/github.png" alt=""> Github</a>
                    </div>
                </nav>
            </div>
            <div class="col text-center">
                <nav>
                    <h5 class="text-color">Navegação</h5>
                    <a class="nav-link" href="../Pagina Inicial/pagina_inicial.html">Página inicial</a>
                    <a class="nav-link" href="../Produtos/produtos.html">Produtos</a>
                    <a class="nav-link" href="../Cadastro de users/usuarios.html">Cadastro</a>
                    <a class="nav-link" href="../Sobre Nos/sobre_nos.html">Sobre Nós</a>
                    <a class="nav-link" href="../Sugestoes/sugestoes.html">Sugestões</a>
                </nav>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
