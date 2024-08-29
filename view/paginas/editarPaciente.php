<?php

if (!isset($_SESSION["validarIngreso"])) {
    echo '<script> window.location = "index.php?paginas=inicio";</script>';
} else {

    if ($_SESSION["validarIngreso"] != "ok") {

        echo '<script> window.location = "index.php?paginas=inicio";</script>';
        return;
    }
}

$usuarios = ControladorFormularios::ctrSeleccionarPacientes2(null, null);

?>

<?php

if (isset($_GET["id"])) {

    $item = "id";
    $valor = $_GET["id"];
    $usuario = ControladorFormularios::ctrSeleccionarPacientes2($item, $valor);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>AREESC</title>

    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/stylelogin.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="icon" href="img/iconoareescpestaña.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

</head>

<body>

    <div class="contenedor-registro-pacientes mt-10">
        <div class="formulario-registro-pacientes">
            <h4 class="text-center mt-4">DATOS</h4>

            <?php
            $mensajeError = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["actualizarNombre"]) || empty($_POST["actualizarNacimiento"]) || empty($_POST["actualizarSexo"]) || empty($_POST["actualizarTelefono"]) || empty($_POST["actualizarConsultorio"]) || empty($_POST["actualizarEstado"])) {
                    $mensajeError = 'Por favor, complete todos los campos requeridos.';
                } else {
                    $actualizar = ControladorFormularios::ctrActualizarRegistro();
                    if ($actualizar == "ok") {
                        echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
                        echo '<div class="alert alert-success">El usuario ha sido actualizado</div>';
                        echo '<script>
                setTimeout(function(){
                    window.location = "index.php?paginas=pacientes";
                }, 2000);
            </script>';
                    }
                }
            }

            if (!empty($mensajeError)) {
                echo '<div class="alert alert-danger">' . $mensajeError . '</div>';
            }
            ?>

            <form method="post">

                <fieldset class="personales">
                    <legend class="text-center mt-5 ">PERSONALES</legend>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-tie fa-lg"></i></span>
                        <input type="hidden" name="idUsuario" value="<?php echo $usuario['id']; ?>">
                        <input type="text" class="form-control p-3" value="<?php echo $usuario['nombre']; ?>" placeholder="Nombre Completo" name="actualizarNombre" aria-label="Nombre" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-calendar fa-lg"></i></span>
                        <input type="date" class="form-control p-3" value="<?php echo $usuario['F_Nacimiento']; ?>" placeholder="Fecha de Nacimiento" aria-label="Fecha de Nacimiento" name="actualizarNacimiento" aria-describedby="basic-addon2">
                    </div>

                    <div class="mb-3">
                        <label class="mt-3 mb-3 titulo-lista">Género</label>
                        <div class="mt-3">
                            <input type="radio" id="masculino" name="actualizarSexo" value="masculino" <?php if ($usuario['sexo'] == 'masculino') echo 'checked'; ?>>
                            <label for="masculino">Masculino</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="femenino" name="actualizarSexo" value="femenino" <?php if ($usuario['sexo'] == 'femenino') echo 'checked'; ?>>
                            <label for="femenino">Femenino</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="otro" name="actualizarSexo" value="otro" <?php if ($usuario['sexo'] == 'otro') echo 'checked'; ?>>
                            <label for="otro">Prefiere no decirlo</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-id-card fa-lg"></i></span>
                        <input type="text" class="form-control p-3" value="<?php echo $usuario['telefono']; ?>" placeholder="Número telefónico" name="actualizarTelefono" aria-label="Telefono" aria-describedby="basic-addon3">
                    </div>
                </fieldset>

                <fieldset class="estado mt-2 mb-5">
                    <legend class="text-center mt-5">ESTADO</legend>

                    <div class="mb-5 contenedor-formularios">
                        <label class="mt-3 mb-3 titulo-lista">Consultorio</label>
                        <div class="mt-3">
                            <input type="radio" id="Consultorio 1" name="actualizarConsultorio" value="Consultorio 1" <?php if ($usuario['consultorio'] == 'Consultorio 1') echo 'checked'; ?>>
                            <label for="en_tratamiento">Consultorio 1</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="Consultorio 2" name="actualizarConsultorio" value="Consultorio 2" <?php if ($usuario['consultorio'] == 'Consultorio 2') echo 'checked'; ?>>
                            <label for="sin_tratamiento">Consultorio 2</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="Consultorio 3" name="actualizarConsultorio" value="Consultorio 3" <?php if ($usuario['consultorio'] == 'Consultorio 3') echo 'checked'; ?>>
                            <label for="finalizado">Consultorio 3</label>
                        </div>
                    </div>

                    <div class="mb-5 contenedor-formularios">
                        <label class="mt-3 mb-3 titulo-lista">Estado</label>
                        <div class="mt-3">
                            <input type="radio" id="en_tratamiento" name="actualizarEstado" value="En tratamiento" <?php if ($usuario['estado'] == 'En tratamiento') echo 'checked'; ?>>
                            <label for="en_tratamiento">En tratamiento</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="sin_tratamiento" name="actualizarEstado" value="Sin tratamiento" <?php if ($usuario['estado'] == 'Sin tratamiento') echo 'checked'; ?>>
                            <label for="sin_tratamiento">Sin tratamiento</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="finalizado" name="actualizarEstado" value="Tratamiento Finalizado" <?php if ($usuario['estado'] == 'Tratamiento Finalizado') echo 'checked'; ?>>
                            <label for="finalizado">Tratamiento Finalizado</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="Comentario" name="actualizarComentario" aria-label="Comentario"><?php echo $usuario['comentario']; ?></textarea>
                    </div>
                </fieldset>

                <div class="text-center mb-10">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled  -->
    <script src="https://kit.fontawesome.com/d3004808ad.js" crossorigin="anonymous"></script>

</body>

</html>