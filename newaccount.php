<?php
require('database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) & isset($_POST['password']) & isset($_POST['conpassword']) & isset($_POST['token'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        $token = $_POST['token'];
        if ($password == $conpassword) {
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $con->prepare("INSERT INTO users (username, password, token) VALUES (:name, :password, :token)");
            
                $stmt->execute([
                    ':name' => $name,
                    ':password' => $hashPass,
                    ':token' => $token
                ]);

                // Redirige al usuario después de crear la cuenta
                header('Location: login.php');
                
        } 
    }
}
?>






<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="css\styles.css">
    <link rel="shortcut icon" href="assets\favicon.ico" type="image/x-icon">


</head>

<body>
    <div class="container">
        <div class="logo">
            <img id='logo' src="assets\Nasa_logo.svg" alt="Logo Nasa">
        </div>
        <div class="form">
            <form action="" method="post">
                <label for="name">Usuario</label>
                <input type="text" name="name" id="name" placeholder="Name" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="conpassword">Confirm Password</label>
                <input type="password" name="conpassword" id="conpassword" placeholder="Confirm Password" required>
                <label for="token">Token</label>
                <input type="text" name="token" id="token" placeholder="Token">
                <button type="submit"> Create User </button>
            </form>
        </div>
        <div class="Login">
            <a href="login.php">Login</a>
        </div>

    </div>

</body>

</html>