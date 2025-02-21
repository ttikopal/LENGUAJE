<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: cuenta.php");
    exit();
}

// Lógica de actualización de perfil aquí
?>

<!DOCTYPE html>
<html>
<body>
    <form action="actualizar_perfil.php" method="POST">
        <input type="text" name="nombre" value="<?= $_SESSION["usuario"] ?>">
        <input type="email" name="correo" value="<?= $_SESSION["correo"] ?>">
        <input type="password" name="nueva_contrasena" placeholder="Nueva contraseña">
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>