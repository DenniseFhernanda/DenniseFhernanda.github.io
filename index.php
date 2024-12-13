<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "ejemplo";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
            width: 300px;
            text-align: center;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="date"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #2a2a2a;
            color: white;
        }

        form input[type="submit"] {
            background-color: #40e0d0;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        form input[type="reset"] {
            background-color: #ffa500;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        form input[type="submit"]:hover {
            background-color: #30c6b0;
        }

        form input[type="reset"]:hover {
            background-color: #e69500;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .notification {
            background-color: #40e0d0;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 5px;
            font-size: 16px;
            width: 300px;
            margin: 10px auto;
            display: none;
        }
    </style>
    <script>
        function validateForm() {
            const codigo = document.forms["registroForm"]["codigo"].value;
            const nombre = document.forms["registroForm"]["nombre"].value;
            const precio = document.forms["registroForm"]["precio"].value;
            const fecha = document.forms["registroForm"]["fecha"].value;

            if (codigo === "" || nombre === "" || precio === "" || fecha === "") {
                alert("Todos los campos son obligatorios.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php
    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        echo "<div class='notification'>$mensaje</div>";
    }
    ?>

    <form name="registroForm" action="guardar_datos.php" method="post" onsubmit="return validateForm()">
        <input type="text" name="codigo" placeholder="Código del producto">
        <input type="text" name="nombre" placeholder="Nombre del producto">
        <input type="number" step="0.01" name="precio" placeholder="Precio del producto">
        <input type="date" name="fecha" placeholder="Fecha">
        <input type="submit" name="registro" value="Registrar">
        <input type="reset" value="Limpiar">
    </form>
    <p><a href="tabla_registros.php" style="color: #40e0d0;">Ver registros</a></p>
</body>
</html>




