<?php
 
$hostname = "localhost";
$username = "root";
$password = 'Arlinda&helio2004';
$database = "bd_sustentech";
 
$conexao = new mysqli($hostname, $username, $password, $database);

if ($conexao->connect_error) {
    die("Falha na conexão: " .
$conexao->connect_error); 
}
 
?>