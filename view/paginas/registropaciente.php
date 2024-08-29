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

    <title>AREESC</title>

    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/stylelogin.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="icon" href="img/iconoareescpestaña.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

</head>

<body>

    <div class="contenedor-registro-pacientes mt-10">
        <div class="formulario-registro-pacientes">
            <h4 class="text-center mt-4">DATOS</h4>
            <?php
            $agregar = ControladorFormularios::ctrRegistroPaciente();
            if ($agregar == "ok") {
                echo '<script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>';
                echo '<div class="alert alert-success">El usuario ha sido Registrado</div>';
                echo '<script>
        setTimeout(function(){
            window.location = "index.php?paginas=pacientes"
        },1000);
    </script>';
            }
            ?>

            <form method="post">

                <fieldset class="personales">
                    <legend class="text-center mt-5 ">PERSONALES</legend>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-tie fa-lg"></i></span>
                        <input type="text" class="form-control p-3" placeholder="Nombre Completo" name="registroNombre" aria-label="Nombre" aria-describedby="basic-addon1" required>
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-calendar fa-lg"></i></span>

                        <input type="date" class="form-control  p-3" aria-label="Fecha de Nacimiento" name="registroNacimiento" aria-describedby="basic-addon2">
                    </div>

                    <div class="mb-3">
                        <label class="mt-3 mb-3 titulo-lista">Género</label>
                        <div class="mt-3">
                            <input type="radio" id="masculino" name="registroSexo" value="masculino">
                            <label for="masculino">Masculino</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="femenino" name="registroSexo" value="femenino">
                            <label for="femenino">Femenino</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="otro" name="registroSexo" value="otro">
                            <label for="otro">Prefiere no decirlo</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-id-card fa-lg"></i></span>

                        <input type="text" class="form-control p-3" placeholder="Número telefónico" name="registroTelefono" aria-label="Telefono" aria-describedby="basic-addon3" pattern="\d+" inputmode="numeric" required>
                    </div>
                </fieldset>

                <fieldset class="estado mt-2 mb-5">
                    <legend class="text-center mt-5">ESTADO</legend>


                    <div class="mb-5 contenedor-formularios">
                        <label class="mt-3 mb-3 titulo-lista">Consultorio</label>
                        <div class="mt-3">
                            <input type="radio" id="Consultorio 1" name="registroConsultorio" value="Consultorio 1" required>
                            <label for="Consultorio 1">Consultorio 1</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="Consultorio 2" name="registroConsultorio" value="Consultorio 2" required>
                            <label for="Consultorio 2">Consultorio 2</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="Consultorio 3" name="registroConsultorio" value="Consultorio 3" required>
                            <label for="Consultorio 3">Consultorio 3</label>
                        </div>
                    </div>



                    <div class="mb-5 contenedor-formularios">
                        <label class="mt-3 mb-3 titulo-lista">Estado</label>
                        <div class="mt-3">
                            <input type="radio" id="en_tratamiento" name="registroEstado" value="En tratamiento">
                            <label for="en_tratamiento">En tratamiento</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="sin_tratamiento" name="registroEstado" value="Sin tratamiento">
                            <label for="sin_tratamiento">Sin tratamiento</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="finalizado" name="registroEstado" value="Tratamiento Finalizado">
                            <label for="finalizado">Tratamiento Finalizado</label>
                        </div>
                    </div>



                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="Comentario" name="registroComentario" aria-label="Comentario"></textarea>
                    </div>


                </fieldset>


                <div class="text-center  mb-10">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Añadir</button>
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