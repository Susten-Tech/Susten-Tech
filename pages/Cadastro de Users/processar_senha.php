<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn = new mysqli("localhost", "root", "root", "bd_sustentech");
    $stmt = $conn->prepare("UPDATE tb_usuarios  SET password = ?, reset_token = NULL WHERE reset_token = ?");
    $stmt->bind_param("ss", $newPassword, $token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Senha redefinida com sucesso!";
    } else {
        echo "Token inválido ou expirado.";
    }
}
?>
