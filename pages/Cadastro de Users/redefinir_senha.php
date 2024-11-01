<!DOCTYPE html>
<html>
<head>
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="../Rodapé/rodape.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="../NavBar/navbar.css"> 
</head>
<body>
<nav class="navbar">
    <div class="navbar-container">
        <div class="nav-logo">
            <a href="#"><img class="image" src="../NavBar/imagens/sustentech_logo.png" alt="sustentech logo"></a>
        </div>
        <ul class="nav-links">
            <li><a href="../../index.html">Início</a></li>
            <li><a href="../Produtos/produtos.html">Produtos</a></li>
            <li class="dropdown">
                <a href=>Cadastro</a>
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

        <!--
    <div class="N">
        <input type="text" placeholder="Pesquisar...">
        <button>
            <img class="image" src="pages/NavBar/imagens/lupa.png" alt="ícone lupa">
        </button>
    </div>
    -->

        <div class="perfil-iconN">
            <a href="#"><img class="image" src="../NavBar/imagens/icone_perfil.png" alt="ícone perfil"></a>
        </div>
    </div>
</nav>




    <form action="process_reset_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label for="password">Nova Senha:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Redefinir Senha</button>
    </form>

<br>
    <!--RODAPÉ-->
<footer class="footer">
    <div class="containerR">
        <div class="footer-logoR">
            <img src="../Rodapé/img/sustentech_rodape.png" alt="Logo Sustentech" class="logoR">
        </div>
        <div class="footer-contactR">
            <h3>Contato</h3>
            <p>sustentech.contato@outlook.com.br</p>
            <p>sustentech.contato@gmail.com</p>
            <p>Fale Conosco</p>
            <div class="social-iconsR">
                <a href="https://www.instagram.com/sustentech_lvlc/?utm_source=ig_web_button_share_sheet" target="_blank" rel="noopener noreferrer">
                    <img src="../Rodapé/img/instagram.png" alt="Instagram" class="social-iconR">
                </a>
                <a href="https://github.com/Susten-Tech" target="_blank" rel="noopener noreferrer">
                    <img src="../Rodapé/img/github.png" alt="GitHub" class="social-iconR">
                </a>
            </div>
        </div>
        <div class="footer-navigationR">
            <h3>Navegação</h3>
            <ul>
                <li><a href="../../index.html">Página Inicial</a></li>
                <li><a href="../Produtos/produtos.php">Produtos</a></li>
                <li><a href="../Cadastro de users/usuarios.html">Cadastro</a></li>
                <li><a href="../Sobre Nos/sobre_nos.html">Sobre nós</a></li>
                <li><a href="../Sugestoes/sugestoes.html">Sugestões</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottomR">
        <a href="../Privacidade/privacidade.html">Política de Privacidade</a>
        <a href="../Termos/termos.html">Termos de Uso</a>
        <a href="../Locais de Descarte/locais_descarte.html">Locais de Descarte</a>


</body>
</html>
