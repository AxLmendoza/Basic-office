<?php
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Conexión a la base de datos
    $conn = new mysqli("localhost", "root", "", "areesc");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO pdf (Consentimiento, Odontograma, Historia_Clinica) VALUES (?, ?, ?)");
    $stmt->bind_param("bbb", $consentimiento, $odontograma, $historia_clinica);

    $consentimiento = file_get_contents($_FILES['Consentimiento']['tmp_name']);
    $odontograma = file_get_contents($_FILES['Odontograma']['tmp_name']);
    $historia_clinica = file_get_contents($_FILES['Historia_Clinica']['tmp_name']);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $mensaje = "Archivos subidos y guardados exitosamente.";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la Subida</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info mt-4 text-center">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>
        <div class="text-center mt-4">
            <a href="index.html" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </div>
</body>
</html>
