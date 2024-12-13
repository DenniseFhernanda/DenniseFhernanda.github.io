<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "ejemplo";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

$consulta = "SELECT * FROM datos";
$resultado = mysqli_query($enlace, $consulta);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #40e0d0;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Registros en la Base de Datos</h1>
    <?php
    if (mysqli_num_rows($resultado) > 0) {
        echo "<table>";
        echo "<tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Fecha</th>
              </tr>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                    <td>{$fila['codigo']}</td>
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['precio']}</td>
                    <td>{$fila['fecha']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No hay datos registrados.</p>";
    }
    ?>
    <p><a href="index.php">Volver al formulario</a></p>
</body>
</html>

