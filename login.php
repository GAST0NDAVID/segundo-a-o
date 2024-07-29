<?php
require 'db.php';

session_start();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM usuario WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $resultado = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if ($resultado && password_verify($_POST['password'], $resultado['password'])) {
        $_SESSION['usuario_id'] = $resultado['id'];
        header('Location: /inicio.php');
        exit();
    } else {
        $message = 'Credenciales no coinciden';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <?php require 'partials/header.php' ; ?>

    <h1 class="titulo">Iniciar Sesion</h1><p>O <a href="registro.php">Crear Usuario</a></p>
    

    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="ingrese su email">
        <input type="password" name="password" placeholder="ingrese su contraseña">
        <input type="submit" value="Enviar"> 
    </form>

</body>
</html>