<?php
$servidor = "localhost";
$user="root";
$password = "root";
$banco = "bd_Sustentech";
$conn = new mysqli($servidor, $user, $password,  $banco);

$insert = "INSERT INTO tb_vendedores VALUES (NULL,'$nm_cliente','$nm_endereco','$nr_endereco','$email','$nr_cep','$nr_telefone','$senha' '$ConfirmaSenha ')";

$query = mysqli_query($conn, $insert);
 
if ($query) {
    echo "Inserido com sucesso";
} else {
    echo "Erro ao inserir: " . mysqli_error($conexao);
}
 

if(!$conn){

 echo "<p style=' color:red; text-align:center; font-size:25px;'Erro de conexão!>/p>";
 echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuario.html'>VOLTAR<a></h2>";

}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
    $nm_cliente = $_POST ["nm_cliente"];
    $email = $_POST ["email"];
    $nm_endereco = $_POST ["nm_endereco"];
    $nr_endereco = $_POST ["nr_endereco"];
    $nr_cep = $_POST ["nr_cep"];
    $nr_telefone = $_POST ["nr_telefone"];
    $senha = $_POST ["senha"];
    $ConfirmaSenha = $_POST ["ConfirmaSenha"];

    if($senha === $ConfirmaSenha){

        $sql = "SELECT * FROM  tb_vendedores WHERE nm_cliente ='$nm_cliente'";
        $retorno = mysqli_query ($conn, $sql);
        $row =mysqli_fetch_assoc ($retorno);

        if($row){

            echo "<p style=' color:red; text-align:center; font-size:25px;'Usuário Já Existe!>/p>";
            echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuario.html'>VOLTAR<a></h2>";
        } else {

            $hashsenha = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO  tb_vendedores (nm_cliente, senha) values ('$nm_cliente' ,  '$hashsenha')";
        $retorno = mysqli_query ($conn, $sql);
        
        if($retorno ===true){
    echo "<p style=' color:green; text-align:center; font-size:25px;'Cadastro Realizado!>/p>";
    echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuario.html'>VOLTAR<a></h2>";
} else {
    echo "ERRO AO CADASTRAR USUÁRIO:". $conn->error;
    echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuario.html'>VOLTAR<a></h2>";
}


        }
} else {
    echo "<p style=' color:red; text-align:center; font-size:25px;'As senhas não coincidem !>/p>";
    echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuario.html'>VOLTAR<a></h2>";
}

}

$conn-> close();


?>