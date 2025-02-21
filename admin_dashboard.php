<?php
session_start(); // Aseguramos que la sesión esté iniciada
// Cargar el archivo XML
$xml = simplexml_load_file("usuarios.xml");

if ($xml === false) {
    echo "Error al cargar el archivo XML.";
    exit;
}

// Recorrer los perfiles de usuario y mostrarlos
echo "<h2>Lista de Perfiles de Usuario</h2>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>";

foreach ($xml->usuario as $usuario) {
    $id = (string)$usuario->id;
    $nombre = (string)$usuario->nombre;
    $email = (string)$usuario->email;
    $tipo = (string)$usuario['tipo'];
    
    echo "<tr>
            <td>$id</td>
            <td>$nombre</td>
            <td>$email</td>
            <td>$tipo</td>
          </tr>";
}

echo "</table>";
?>