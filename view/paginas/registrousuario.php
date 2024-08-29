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
            <h4 class="text-center mt-4">DATOS DEL USUARIO</h4>
            <?php
            $agregar = ControladorFormularios::ctrRegistroUsuario();
            if ($agregar == "ok") {
                echo '<script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>';
                echo '<div class="alert alert-success">El usuario ha sido Registrado</div>';
                echo '<script>
        setTimeout(function(){
            window.location = "index.php?paginas=usuarios"
        },1000);
    </script>';
            } 
            ?>

            <form method="post">

                <fieldset class="personales">
                    <legend class="text-center mt-5 ">Datos</legend>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-tie fa-lg"></i></span>
                        <input type="text" class="form-control p-3" placeholder="Nombre del Usuario" name="registroNombre" aria-label="Nombre" aria-describedby="basic-addon1" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-envelope fa-lg"></i></span>
                        <input type="email" class="form-control p-3" placeholder="Correo Electronico" id="email" name="registroEmail" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <span class="input-group-text" id="basic-addon3"><i class="fa-solid fa-id-card fa-lg"></i></span>

                        <input type="text" class="form-control p-3" placeholder="Número telefónico" name="registroTelefono" aria-label="Telefono" aria-describedby="basic-addon3" pattern="\d+" inputmode="numeric" required>
                    </div>



                    <div class="mb-5 contenedor-formularios">
                        <label class="mt-3 mb-3 titulo-lista">Puesto:</label>
                        <div class="mt-3">
                            <input type="radio" id="Odontologo" name="registroRol" value="Odontologo" required>
                            <label for="Consultorio 1">Odontologo</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="Asistente" name="registroRol" value="Asistente" required>
                            <label for="Consultorio 2">Asistente</label>
                        </div>
                        <div class="mt-3">
                            <input type="radio" id="Invitado" name="registroRol" value="Invitado" required>
                            <label for="Consultorio 3">Invitado</label>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        </div>
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key fa-lg"></i></span>
                        <input type="text" class="form-control p-3" placeholder="Contraseña de Acceso" name="registroPassword" aria-label="Nombre" aria-describedby="basic-addon1" required>
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