<?php

if (!isset($_SESSION["validarIngreso"])) {
    echo '<script> window.location = "index.php?paginas=inicio";</script>';
    exit();
} else {
    if ($_SESSION["validarIngreso"] != "ok") {
        echo '<script> window.location = "index.php?paginas=inicio";</script>';
        exit();
    }
}

$paciente = null;
$busquedaRealizada = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $criterio = $_POST["criterio"];
    $valor = $_POST["txtBuscar"];
    $paciente = ControladorFormularios::ctrSeleccionarPacientes($criterio, $valor);
    $busquedaRealizada = true;
}

if (!$busquedaRealizada) {
    $paciente = ControladorFormularios::ctrSeleccionarPacientes(null, null);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <title>AREESC Inicio</title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/stylelogin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="icon" href="img/iconoareescpestaña.svg">

    <style>
        .btn-group .btn {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-group .btn i {
            font-size: 1.5em;
        }

        .alert-success {
            font-size: 1.2em;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="tabla contenedor">
        <h2 class="text-center">Pacientes Registrados</h2>

        <div class="container mt-5">
            <!-- Botón Añadir Paciente -->
            <div class="text-center mb-4 boton-añadir-paciente">
                <a href="index.php?paginas=registropaciente" type="button" class="btn btn-outline-primary btn-lg" id="añadir-pacientes"><i class="fas fa-user-plus"></i> Añadir Paciente</a>
            </div>

            <!-- Barra de búsqueda -->
            <div class="container-form">
                <form method="post">
                    <label for="criterio">Buscar por:</label>
                    <select name="criterio" id="criterio">
                        <option value="id">ID</option>
                        <option value="nombre">Nombre</option>
                        <option value="telefono">Número telefónico</option>
                    </select>
                    <label for="buscar">Buscar</label>
                    <input type="text" id="buscar" name="txtBuscar">
                    <button type="submit">Buscar</button>
                </form>
            </div>


            <style>
      .container-form {
    max-width: 800px; /* Reducir el ancho máximo del contenedor */
    margin: 0 auto;
    padding: 15px; /* Reducir el padding */
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #cfe2ff;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centra los elementos horizontalmente */
}

label {
    margin-bottom: 6px; /* Reducir el margen inferior */
    font-size: 14px; /* Reducir el tamaño de la fuente */
    color: #333;
}

select, input[type="text"] {
    padding: 8px; /* Reducir el padding */
    margin-bottom: 10px; /* Reducir el margen inferior */
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px; /* Reducir el tamaño de la fuente */
}

select {
    width: 100%; /* Ajustar al ancho del formulario */
}

input[type="text"] {
    width: 100%; /* Ajustar al ancho del formulario */
}

button {
    padding: 8px 16px; /* Reducir el padding */
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 14px; /* Reducir el tamaño de la fuente */
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}


</style>
<br>
<br>
<br>
<br>



            <?php if ($busquedaRealizada && !$paciente): ?>
                <div class="alert alert-danger text-center mt-4" role="alert">
                    No se encontró al paciente.
                </div>
            <?php endif ?>

            <?php if ($paciente): ?>
                <table class="table table-bordered ">
                    <thead class="thead-light">
                        <tr class="table-primary">
                            <th class="col p-3">#</th>
                            <th class="col p-3">Nombre</th>
                            <th class="col p-3">Fecha de Registro</th>
                            <th class="col p-3">Estatus</th>
                            <th class="col p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($paciente as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value["id"]; ?></td>
                                <td><?php echo $value["nombre"]; ?></td>
                                <td><?php echo $value["f_Registro"]; ?></td>
                                <td><?php echo $value["estado"]; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <div class="px-1">
                                            <a href="index.php?paginas=editarPaciente&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                        </div>
                                        <form method='post' onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                            <input type="hidden" value=<?php echo $value["id"]; ?> name="eliminarRegistro">
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            <?php
                                            $eliminar = new ControladorFormularios();
                                            $eliminar->ctrEliminarRegistro();
                                            ?>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>

        </div>
    </div>

    <!-- jQuery (slim) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS (4.6.2 bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d3004808ad.js" crossorigin="anonymous"></script>

</body>

</html>