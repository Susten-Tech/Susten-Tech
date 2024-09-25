<?php
$servidor = "localhost";
$user="root";
$password = "root";
$bd = "bd_Sustentech";
$conn = new mysqli($servidor, $user, $password, $bd);


$insert = "INSERT INTO tb_empresas VALUES (NULL,'$nm_empresa','$cnpj_empresa','$nr_endereco''$nm_endereco','$email','$nr_cep','$nr_telefone','$nm_responsavel','$cargo_responsavel','$email_responsavel','$ds_servico','$senha' '$ConfirmaSenha ')";

$query = mysqli_query($conn, $insert);
 
if ($query) {
    echo "Inserido com sucesso";
} else {
    echo "Erro ao inserir: " . mysqli_error($conexao);
}
 
if(!$conn){

 echo "<p style=' color:red; text-align:center; font-size:25px;'Erro de conexão!>/p>";
 echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuarios_empresas.html'>VOLTAR<a></h2>";

}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
    $nm_empresa = $_POST ["nm_empresa"];
    $cnpj_empresa = $_POST ["cnpj_empresa"];
    $nm_endereco = $_POST ["nm_endereco"];
    $nr_endereco = $_POST ["nr_endereco"];
    $nr_cep = $_POST ["nr_cep"];
    $email = $_POST ["email"];
    $nm_responsavel = $_POST ["nm_responsavel"];
    $cargo_responsavel = $_POST ["cargo_responsavel"];
    $email_responsavel = $_POST ["email_responsavel "];
    $ds_servico = $_POST ["ds_servico"];
    $senha = $_POST ["senha"];
    $ConfirmaSenha = $_POST ["ConfirmaSenha"];

    if($senha === $ConfirmaSenha){

        $sql = "SELECT * FROM  tb_empresa WHERE nm_empresa ='$nm_empresa'";
        $retorno = mysqli_query ($conn, $sql);
        $row =mysqli_fetch_assoc ($retorno);

        if($row){

            echo "<p style=' color:red; text-align:center; font-size:25px;'Usuário Já Existe!>/p>";
            echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuarios_empresas.html'>VOLTAR<a></h2>";
        } else {

            $hashsenha = password_hash($senha, PASSWORD_BCRYPT);
            $sql = "INSERT INTO  tb_vendedores (nm_cliente, senha) values ('$nm_empresa' ,  '$hashsenha')";
        $retorno = mysqli_query ($conn, $sql);
        
        if($retorno ===true){
    echo "<p style=' color:green; text-align:center; font-size:25px;'Cadastro Realizado!>/p>";
    echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuarios_empresas.html'>VOLTAR<a></h2>";
} else {
    echo "ERRO AO CADASTRAR USUÁRIO:". $conn->error;
    echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuarios_empresas.html'>VOLTAR<a></h2>";
}


        }
} else {
    echo "<p style=' color:red; text-align:center; font-size:25px;'As senhas não coincidem !>/p>";
    echo"<h2 style = 'color:green; text-align:center; font-size:25px'><a href= 'usuarios_empresas.html'>VOLTAR<a></h2>";
}

}

$conn-> close();


?>