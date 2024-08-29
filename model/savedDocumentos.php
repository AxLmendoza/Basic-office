<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "usuario", "contraseña", "areesc");

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO pdf (Consentimiento, Odontograma, Historia_Clinica) VALUES (?, ?, ?)");
    $stmt->bind_param("bbb", $consentimiento, $odontograma, $historia_clinica);

    $consentimiento = file_get_contents($_FILES['Consentimiento']['tmp_name']);
    $odontograma = file_get_contents($_FILES['Odontograma']['tmp_name']);
    $historia_clinica = file_get_contents($_FILES['Historia_Clinica']['tmp_name']);

    if ($stmt->execute()) {
        echo "Archivos subidos y guardados exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>




<!--
+------------------+----------+------+-----+---------+----------------+
| Field            | Type     | Null | Key | Default | Extra          |
+------------------+----------+------+-----+---------+----------------+
| ID_PDF           | int(11)  | NO   | PRI | NULL    | auto_increment |
| Consentimiento   | longblob | NO   |     | NULL    |                |
| Odontograma      | longblob | NO   |     | NULL    |                |
| Historia_Clinica | longblob | NO   |     | NULL    |                |
+------------------+----------+------+-----+---------+----------------+
-->