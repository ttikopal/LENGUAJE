<?php
session_start();
if ($_SESSION["tipo"] !== 'root') {
    header("Location: index.php");
    exit();
}

$xml = simplexml_load_file("../datos/usuarios.xml");

// Eliminar usuario
if (isset($_GET["eliminar"])) {
    $correo = $_GET["eliminar"];
    foreach ($xml->usuario as $index => $usuario) {
        if ((string)$usuario->correo === $correo && (string)$usuario['tipo'] !== 'root') {
            unset($xml->usuario[$index]);
            break;
        }
    }
    $xml->asXML("../datos/usuarios.xml");
    header("Location: gestion_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Usuarios Registrados</h2>
    <table>
        <?php foreach ($xml->usuario as $usuario): ?>
            <tr>
                <td><?= $usuario->nombre ?></td>
                <td><?= $usuario->correo ?></td>
                <td>
                    <?php if ((string)$usuario['tipo'] !== 'root'): ?>
                        <a href="?eliminar=<?= $usuario->correo ?>">Eliminar</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>