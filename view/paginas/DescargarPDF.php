<?php
$conn = new mysqli("localhost", "usuario", "contraseña", "areesc");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id = intval($_GET['id']);
    $tipo = $_GET['tipo'];

    switch ($tipo) {
        case 'consentimiento':
            $campo = 'Consentimiento';
            $nombre_archivo = 'Consentimiento.pdf';
            break;
        case 'odontograma':
            $campo = 'Odontograma';
            $nombre_archivo = 'Odontograma.pdf';
            break;
        case 'historia':
            $campo = 'Historia_Clinica';
            $nombre_archivo = 'Historia_Clinica.pdf';
            break;
        default:
            die("Tipo de archivo no válido.");
    }

    $sql = "SELECT $campo FROM pdf WHERE ID_PDF = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($archivo);
    $stmt->fetch();

    if ($archivo) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $nombre_archivo);
        echo $archivo;
    } else {
        echo "No se encontró el archivo.";
    }

    $stmt->close();
} else {
    echo "Parámetros inválidos.";
}

$conn->close();
