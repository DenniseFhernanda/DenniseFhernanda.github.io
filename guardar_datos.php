<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "ejemplo";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (isset($_POST['registro'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];

    if (empty($codigo) || empty($nombre) || empty($precio) || empty($fecha)) {
        header("Location: index.php?mensaje=Por favor, complete todos los campos");
        exit;
    } else {
        $insertarDatos = "INSERT INTO datos (codigo, nombre, precio, fecha) VALUES('$codigo', '$nombre', '$precio', '$fecha')";
        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

        if ($ejecutarInsertar) {
            header("Location: tabla_registros.php?mensaje=Datos registrados correctamente");
        } else {
            header("Location: index.php?mensaje=Error al registrar los datos");
        }
    }
}
?>


