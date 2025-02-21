<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de campos
    $camposRequeridos = ['nombre', 'correo', 'contrasena', 'confirmar'];
    foreach ($camposRequeridos as $campo) {
        if (empty($_POST[$campo])) {
            header("Location: cuenta.php?error=campos_vacios");
            exit();
        }
    }

    if ($_POST["contrasena"] !== $_POST["confirmar"]) {
        header("Location: cuenta.php?error=contrasena");
        exit();
    }

    // Cargar o crear XML
    $xmlPath = "../datos/usuarios.xml";
    if (file_exists($xmlPath)) {
        $xml = simplexml_load_file($xmlPath);
        // Verificar correo único
        foreach ($xml->usuario as $usuario) {
            if ((string)$usuario->correo === $_POST["correo"]) {
                header("Location: cuenta.php?error=correo_existente");
                exit();
            }
        }
    } else {
        $xml = new SimpleXMLElement('<?xml version="1.0"?><usuarios></usuarios>');
    }

    // Añadir nuevo usuario
    $nuevoUsuario = $xml->addChild('usuario');
    $nuevoUsuario->addAttribute('tipo', 'usuario');
    $nuevoUsuario->addChild('nombre', htmlspecialchars($_POST["nombre"]));
    $nuevoUsuario->addChild('correo', htmlspecialchars($_POST["correo"]));
    $nuevoUsuario->addChild('password', password_hash($_POST["contrasena"], PASSWORD_DEFAULT));

    $xml->asXML($xmlPath);
    
    // Autologin
    $_SESSION["usuario"] = $_POST["nombre"];
    $_SESSION["correo"] = $_POST["correo"];
    $_SESSION["tipo"] = 'usuario';
    header("Location: index.php");
    exit();
}