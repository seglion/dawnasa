<?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['name']) & isset($_POST['password'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            if ($name== 'admin' & $password == 'admin'){
            session_name('login');
            session_start();
            $_SESSION['name'] = $name;


            header('Location:index.php');

            }

    }
}






?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Nasa</title>
    <link rel="stylesheet" href="css\styles.css">
    <link rel="shortcut icon" href="assets\favicon.ico" type="image/x-icon">


</head>

<body>
    <div class="container">
        <div class="logo">
            <img id='logo' src="assets\Nasa_logo.svg" alt="Logo Nasa">
        </div>
        <div class="form">
            <form action="login.php" method="post">
                <label for="name">Usuario</label>
                <input type="text" name="name" id="name" placeholder="Name">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <button type="submit"> Login </button>
            </form>
        </div>
        <div class="newAccount">
            <a href="newaccount.php">Create a new Account</a>
        </div>

    </div>

</body>

</html>