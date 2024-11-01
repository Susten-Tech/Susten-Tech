<!DOCTYPE html>
<html>
<head>
    <title>Redefinir Senha</title>
</head>
<body>
    <form action="process_reset_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label for="password">Nova Senha:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Redefinir Senha</button>
    </form>
</body>
</html>
