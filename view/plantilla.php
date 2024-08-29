<?php

    session_start();

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
    <div class="contenedor-navegacion">
        <div class="contenedor">
    <nav class="navbar navbar-expand-lg">

        <div class="contenido-logo">
            <i class="fa-solid fa-user-doctor fa-2xl" style="color: #ffffff"></i>
            <a href="index.php?paginas=index1">AREESC</a>
        </div>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class
            ="fa-solid fa-rectangle-list fa-2xl" ></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="navbar-nav contenido-navegacion">
            
    <!-- Botón de Inicio -->
    <li class="nav-item dropdown">
        <a class="nav-link <?php echo isset($_GET["paginas"]) && $_GET["paginas"] == 'inicio' ? 'active1' : 'no-active1'; ?>" 
           href="index.php?paginas=inicio" id="inicioDropdown" 
           role="button" aria-haspopup="true" aria-expanded="false">
           Inicio
        </a>
    </li>

    <!-- Botón de Pacientes -->
    <li class="nav-item dropdown">
        <a class="nav-link <?php echo isset($_GET["paginas"]) && $_GET["paginas"] == 'pacientes' ? 'active1' : 'no-active1'; ?>" 
           href="index.php?paginas=pacientes" id="pacientesDropdown" 
           role="button" aria-haspopup="true" aria-expanded="false">
           Pacientes
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link <?php echo isset($_GET["paginas"]) && $_GET["paginas"] == 'usuarios' ? 'active1' : 'no-active1'; ?>" 
           href="index.php?paginas=usuarios" id="usuariosDropdown" 
           role="button" aria-haspopup="true" aria-expanded="false">
           Usuarios
        </a>


    <li class="nav-item dropdown">
        <a class="nav-link <?php echo isset($_GET["paginas"]) && $_GET["paginas"] == 'salir' ? 'active1' : 'no-active1'; ?>" 
           href="index.php?paginas=salir" id="usuariosDropdown" 
           role="button" aria-haspopup="true" aria-expanded="false">
           Salir
        </a>
    </li>
</ul>


            

        </div>
    </nav>
</div>
</div>

<div class="container-fluid py-5">
        

            <?php
            #isset() determina si una variable esta definida y no el null
            if (isset($_GET["paginas"])) {
                if (
                    $_GET["paginas"] == "inicio" ||
                    $_GET["paginas"] == "pacientes" ||
                    $_GET["paginas"] == "usuarios" ||
                    $_GET["paginas"] == "documentos" ||
                    $_GET["paginas"] == "registropaciente" ||
                    $_GET["paginas"] == "registrousuario" ||
                    $_GET["paginas"] == "editarPaciente" ||
                    $_GET["paginas"] == "consultorio" ||
                    $_GET["paginas"] == "herramientas" ||
                    $_GET["paginas"] == "personal" ||
                    $_GET["paginas"] == "index1" ||
                    $_GET["paginas"] == "salir" 


                ) {
                    include("paginas/" . $_GET["paginas"] . ".php");
                } else {
                    include "paginas/error404.php";
                }
            } else {
                include "paginas/inicio.php";
            }
            ?>

        </div>
    </div>





    <footer class="footer">
        <div class="iconos-footer contenedor">
            <a href="#" class="icono-footer"> <i class="fa-brands fa-whatsapp fa-lg"></i>
            </a>
            <a href="#" class="icono-footer"> <i class="fa-brands fa-facebook fa-lg"></i>
            </a>
            <a href="#" class="icono-footer"> <i class="fa-brands fa-linkedin fa-lg"></i>
            </a>
            <a href="#" class="icono-footer"> <i class="fa-brands fa-tiktok fa-lg"></i>
            </a>
            <a href="#" class="icono-footer"> <i class="fa-brands fa-instagram fa-lg"></i>
            </a>
        </div>
        <div class="linea-decorativa"></div> <!-- Línea decorativa -->

        <div class="derechos-reservados">
            <p class="text-center">Todos los derechos reservados a: &copy DENTAL AREESC</p>
        </div>



    </footer>
   <!-- jQuery library -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

   <!-- Popper JS -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

   <!-- Latest compiled  -->
   <script src="https://kit.fontawesome.com/d3004808ad.js" crossorigin="anonymous"></script>

   <script src="js/app.js"></script>    

</body>

</html>