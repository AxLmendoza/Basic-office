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

$usuarios = ControladorFormularios::ctrSeleccionarUsuarios(null, null);

$busquedaRealizada = false;
$usuario = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente = ControladorFormularios::ctrBuscarUsuario();
    $busquedaRealizada = true;
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


</head>

<body>
    


<div class="tabla contenedor">
        <h2 class="text-center">Usuarios Registrados</h2>

        <div class="container mt-5">
            <!-- Botón Añadir Paciente -->
            <div class="text-center mb-4 boton-añadir-usuario">
                <a href="index.php?paginas=registrousuario" type="button" class="btn btn-outline-primary btn-lg" id="añadir-pacientes"><i class="fas fa-user-plus"></i> Añadir Usuario</a>
            </div>

           



            

            <?php if ($busquedaRealizada && !$usuario): ?>
                <div class="alert alert-danger text-center mt-4" role="alert">
                    No se encontró al usuario.
                </div>
            <?php endif ?>

            <?php if ($usuario): ?>
                <table class="table  table-bordered ">
                    <thead class="thead-light">
                        <tr class="table-primary">
                            <th class="col p-3">#</th>
                            <th class="col p-3">Nombre</th>
                            <th class="col p-3">Fecha de Registro</th>
                            <th class="col p-3">Rol</th>
                            <th class="col p-3">Número telefonico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $usuario["id"]; ?></td>
                            <td><?php echo $usuario["nombre"]; ?></td>
                            <td><?php echo $usuario["fecha"]; ?></td>
                            <td><?php echo $usuario["estado"]; ?></td>
                            <td>
                                <div class="btn-group">
                                    <div class="px-1">
                                        <a href="index.php?paginas=registrousuario&id=<?php echo $usuario["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                    </div>
                                    <form method='post' onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                        <input type="hidden" value=<?php echo $usuario["id"]; ?> name="eliminarRegistro">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        <?php
                                        $eliminar = new ControladorFormularios();
                                        $eliminar->ctrEliminarRegistro();
                                        ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php endif ?>

            <?php if (!$busquedaRealizada || !$usuario): ?>
                <!-- Tabla de pacientes solo se muestra si no se realizó una búsqueda exitosa -->
                <table class="table  table-bordered ">

                    <thead class="thead-light">
                        <tr class="table-primary">
                            <th class="col p-3">#</th>
                            <th class="col p-3">Nombre</th>
                            <th class="col p-3">Fecha de Registro</th>
                            <th class="col p-3">Rol</th>
                            <th class="col p-3">Número telefonico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $key => $value) : ?>
                            <tr>
                                <td><?php echo $value["id"]; ?></td>
                                <td><?php echo $value["nombre"]; ?></td>
                                <td><?php echo $value["fecha"]; ?></td>
                                <td><?php echo $value["rol"]; ?></td>
                                <td><?php echo $value["telefono"]; ?></td>
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