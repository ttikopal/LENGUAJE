
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        header("Location: cuenta.php");
        exit();
    }

    $usuarioIngresado = trim($_POST["usuario"]);
    $passwordIngresada = trim($_POST["password"]);

    if (!file_exists("usuarios.xml")) {
        die("Error: No se encontró el archivo de usuarios.");
    }
  $xml = simplexml_load_file("usuarios.xml");
    if (!$xml) {
        die("Error al cargar el XML.");
    }

    // Variable de autenticación
    $autenticado = false;
    echo 3;
    
    foreach ($xml->usuario as $user) {
        
        // Verificar el nombre de usuario y la contraseña
        if (trim($user->nombre) == $usuarioIngresado && trim($user->password) == $passwordIngresada) {
            $_SESSION["usuario"] = trim((string) $user->nombre);
            $_SESSION["tipo"] = trim((string) $user['tipo']);
            // Guardar tipo de usuario

            $autenticado = true;

            // Limpiar buffer de salida antes de redirigir
            ob_clean();
            var_dump($_SESSION);
            // Verificar si el tipo de usuario es "root"
            if ($_SESSION["tipo"] == "root") {
                header("Location: admin_dashboard.php"); // Redirigir al panel de administración
            } else {
                //header("Location: index.html"); // Redirigir a la página normal
            }
        }
    }

    // Si la autenticación falla, redirigir a página de error
  //  header("Location: carrito.html");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Zapas God</title>
</head>
<body>
    <header id="header">
        <div class="envios">ENVÍOS GRATIS A TODA ESPAÑA 🇪🇸</div>
        <div id="header-contenedor">
            <div class="logo">
                <a href="tienda.html"><img src="./images/zapas god (3).png" alt="Logo de la tienda"></a>
            </div>
            <div class="links">
                <a href="tienda.html" class="inicio">Inicio</a>
                <a href="tienda.html" class="inicio">Zapatillas</a>
            </div>
            <div class="linksright">
                <a href="" class="inicio">Cuenta</a>
                <a href="" class=""><img src="./images/buscar.png" alt="logo-buscar" class="buscar"></a>
                <a href="carrito.html" class=""><img src="./images/carrito.png" alt="logo-buscar" class="buscar"></a>
            </div>
        </div>
    </header>
    <img src="images/FONDO.jpg" alt="FONDO" class="imagenfondo">

    <div class="content">
        <div class="productosDestacados2">Registrarse</div>
        <form action="registro.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
            <br>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>
            <br>
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" name="direccion" required>
            <br>
            <label for="provincia">Provincia:</label>
            <input type="text" id="provincia" name="provincia" required>
            <br>
            <label for="correo">Correo Electronico:</label>
            <input type="email" id="correo" name="correo" required>
            <br>
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="contraseña">Contrasena:</label>
            <input type="password" id="contraseña" name="contraseña" required>
            <br>
            <label for="confirmar_contraseña">Confirmar Contrasena:</label>
            <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" required>
            <br>
            <button type="submit">Registrarse</button>
        </form>
            <div class="productosDestacados">Iniciar sesion</div>
        <form action="cuenta.php" method="POST">
            <label for="usuario">Nombre de Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="contraseña">Contrasena:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Iniciar sesion</button>
        </form>
    </div>
</body>
</html>