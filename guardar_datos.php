<?php
// Datos de la conexión a la base de datos
$servername = "localhost"; // o la IP/servidor si es remoto
$username = "root"; // nombre de usuario para la base de datos
$password = ""; // contraseña para la base de datos (vacía por defecto en XAMPP)
$dbname = "base_data"; // nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($localhost, $root, $, $base_data
);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos del formulario están siendo recibidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $fecha_alta = $_POST['fecha_alta'];

    // Preparar la consulta SQL para insertar los datos en la tabla 'registros'
    $sql = "INSERT INTO registros (codigo, nombre, precio, fecha_alta) 
            VALUES ('$codigo', '$nombre', '$precio', '$fecha_alta')";

    // Ejecutar la consulta y verificar si se insertaron los datos correctamente
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro guardado con éxito.";
    } else {
        echo "Error al guardar el registro: " . $conn->error;
    }
} else {
    echo "No se ha recibido información del formulario.";
}

// Cerrar la conexión
$conn->close();
?>
