<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "areesc");

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha solicitado un archivo para descargar
if (isset($_GET['tipo']) && isset($_GET['id'])) {
    $tipo = $_GET['tipo'];
    $id = (int)$_GET['id'];

    // Preparar y ejecutar la consulta SQL
    $stmt = $conn->prepare("SELECT $tipo FROM pdf WHERE ID_PDF = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($archivo);
    $stmt->fetch();
    $stmt->close();

    // Enviar el archivo al navegador
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=" . $tipo . ".pdf");
    echo $archivo;
    exit;
}

// Obtener todos los registros de la tabla PDF
$result = $conn->query("SELECT ID_PDF FROM pdf");

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Descargar Archivos PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5 mb-5">Descargar Archivos PDF</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Consentimiento</th>
                    <th>Odontograma</th>
                    <th>Historia Clínica</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['ID_PDF'] ?></td>
                        <td><a href="descargarDocumentos.php?tipo=Consentimiento&id=<?= $row['ID_PDF'] ?>" class="btn btn-primary"><i class="fa-solid fa-download"></i> Descargar</a></td>
                        <td><a href="descargarDocumentos.php?tipo=Odontograma&id=<?= $row['ID_PDF'] ?>" class="btn btn-primary"><i class="fa-solid fa-download"></i> Descargar</a></td>
                        <td><a href="descargarDocumentos.php?tipo=Historia_Clinica&id=<?= $row['ID_PDF'] ?>" class="btn btn-primary"><i class="fa-solid fa-download"></i> Descargar</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
