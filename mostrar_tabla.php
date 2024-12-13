<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Guardados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Registros Guardados</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Fecha de Alta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $archivo = 'datos.txt';
                if (file_exists($archivo)) {
                    $lineas = file($archivo);
                    foreach ($lineas as $linea) {
                        $datos = explode(", ", $linea);
                        echo "<tr>";
                        foreach ($datos as $dato) {
                            $valor = explode(": ", $dato);
                            echo "<td>" . htmlspecialchars($valor[1]) . "</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No hay registros guardados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
