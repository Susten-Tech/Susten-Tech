<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $avaliacao = $_POST['avaliacao'];
    $funcionalidades = $_POST['funcionalidades'];
    $negativo = $_POST['negativo'];
    $positivo = $_POST['positivo'];
    $sugestao = $_POST['sugestao'];

    

    echo "Obrigado pela sua sugestão!";
}
?>