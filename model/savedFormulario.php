<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "areesc");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos a través del método POST
$Token = isset($_POST['token']) ? $_POST['token'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$F_Nacimiento = isset($_POST['F_Nacimiento']) ? $_POST['F_Nacimiento'] : "";
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$estado = isset($_POST['estado']) ? $_POST['estado'] : "";
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : "";
$consultorio = isset($_POST['consultorio']) ? $_POST['consultorio'] : "";

// Preparar la instrucción SQL
$sql = "INSERT INTO paciente (token, nombre, F_Nacimiento, sexo, telefono, estado, comentario, consultorio) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar y enlazar
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $Token, $nombre, $F_Nacimiento, $sexo, $telefono, $estado, $comentario, $consultorio);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Datos guardados";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

