<?php 
    require 'db.php';
    $message = '';
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmar_password'])) {
        if ($_POST['password'] === $_POST['confirmar_password']) {
            $sql = "INSERT INTO usuario (email, password) VALUES(:email , :password)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                $message = 'Usuario creado';
            } else {
                $message = 'Error al crear usuario';
            }
        } else {
            $message = 'Las contraseñas no coinciden';
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
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Registro</title>
</head>

<body>
    <?php require 'partials/header.php' ; ?>
    <?php if(!empty($message)): ?>
        <p> <?= $message ?> </p>
    <?php endif; ?>


    <h1 class="titulo">Crear Usuario</h1><p>O <a href="login.php">Iniciar Sesion</a></p>

    <form action="registro.php" method="post">
        <input type="text" name="email" placeholder="ingrese su email">
        <input type="password" name="password" placeholder="ingrese su contraseña">
        <input type="password" name="confirmar_password" placeholder="confirme su contraseña">
        <input type="submit" name="enviar" value="Enviar"> 
    </form>

</body>
</html>