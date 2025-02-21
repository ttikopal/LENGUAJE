<?php
session_start(); // Aseguramos que la sesión esté iniciada

// Cargar el archivo XML
$xml = simplexml_load_file("usuarios.xml");

if ($xml === false) {
    echo "Error al cargar el archivo XML.";
    exit;
}

// Procesar la eliminación de un usuario
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    
    // Buscar el usuario en el XML y eliminarlo
    foreach ($xml->usuario as $usuario) {
        if ((string)$usuario->id === $idEliminar && (string)$usuario['tipo'] !== 'root') {
            // Eliminar el usuario (usando el método de SimpleXML)
            unset($usuario[0]);
            break;
        }
    }
    
    // Guardar el archivo XML después de la eliminación
    $xml->asXML("usuarios.xml");
    // Redirigir para evitar reenvíos de formulario al recargar
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Recorrer los perfiles de usuario y mostrarlos
echo "<h2>Lista de Perfiles de Usuario</h2>";
?>
<style>
    /* Estilo general para la página */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #f0f4f8, #e0e7ec);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #2c3e50;
    }

    /* Contenedor principal */
    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 2.4em;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: linear-gradient(45deg, #3498db, #8e44ad);
        -webkit-background-clip: text;
        color: transparent;
    }

    /* Estilo de la tabla */
    table {
        width: 90%;
        max-width: 1200px;
        margin-top: 30px;
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        border-collapse: collapse;
        transition: transform 0.3s ease;
    }

    table:hover {
        transform: scale(1.02);
    }

    th, td {
        padding: 18px 25px;
        text-align: left;
        font-size: 1.1em;
    }

    th {
        background-color: #2c3e50;
        color: #fff;
        font-weight: 700;
        letter-spacing: 1px;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #ecf0f1;
        cursor: pointer;
    }

    td {
        color: #34495e;
        font-size: 1em;
    }

    /* Botón de eliminar */
    .btn-eliminar {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 12px 18px;
        font-size: 1em;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-eliminar:hover {
        background-color: #c0392b;
        transform: translateY(-2px);
    }

    /* Columna de "Acciones" */
    td a {
        text-decoration: none;
    }

    /* Fondo de la página */
    .container {
        background-color: #ffffff;
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        max-width: 1300px;
        width: 100%;
    }

    /* Estilo de la tabla en dispositivos pequeños */
    @media (max-width: 768px) {
        table {
            width: 100%;
            font-size: 0.9em;
        }

        .btn-eliminar {
            padding: 8px 12px;
            font-size: 0.8em;
        }
    }
</style>

<div class="container">
    <?php
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
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
                <td>$tipo</td>";
        
        // Solo mostrar el botón de eliminar si el usuario no es root
        if ($tipo !== 'root') {
            echo "<td>
                    <a href='?eliminar=$id' onclick='return confirm(\"¿Estás seguro de eliminar este perfil?\")'>
                        <button class='btn-eliminar'>Eliminar</button>
                    </a>
                  </td>";
        } else {
            echo "<td>Administrador (No se puede eliminar)</td>";
        }
        
        echo "</tr>";
    }

    echo "</table>";
    ?>
</div>
