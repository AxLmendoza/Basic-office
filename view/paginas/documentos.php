<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Documentos</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/d3004808ad.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="contenedor-registro-pacientes mt-10">
    <div class="formulario-registro-pacientes">
        <h4 class="text-center mt-4">DOCUMENTOS</h4>

        <?php 

        $agregar =  ControladorFormularios::ctrsubirArchivo();
        if($agregar == "ok"){

            echo '<script>
            if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
            }
  
            </script>';
  
            echo '<div class = "alert alert-success">El usuario ha sido Registrado</div>
            
            <script>
            
            setTimeout(function(){
            window.location = "index.php?paginas=pacientes"
            },1000);

            </script>
            ';

        }
        ?>

        <form method="post" enctype="multipart/form-data">
            <fieldset class="personales mt-5">
                <legend class="text-center mt-5 mb-5">ARCHIVOS</legend>

                <div>
                    <h5 class="mb-1">Consentimiento</h5>
                    <div class="input-group mb-5">
                        <span class="input-group-text"><i class="fa-solid fa-file-pdf fa-lg"></i></span>
                        <input type="file" name="Consentimiento" class="form-control p-3" name="archivo" accept=".pdf" aria-label="Subir Consentimiento">
                        
                    </div>
                </div>

                <div>
                    <h5 class="mb-1">Odontograma</h5>
                    <div class="input-group mb-5">
                        <span class="input-group-text"><i class="fa-solid fa-file-image fa-lg"></i></span>
                        <input type="file" name="Odontograma" class="form-control p-3" accept=".jpg,.jpeg,.png" aria-label="Subir Odontograma">
                        
                    </div>
                </div>

                <div>
                    <h5 class="mb-1">Historia Clínica</h5>
                    <div class="input-group mb-5">
                        <span class="input-group-text"><i class="fa-solid fa-file fa-lg"></i></span>
                        <input type="file" name="Historia_Clinica" class="form-control p-3" aria-label="Subir Historia Clínica">
                        
                    </div>
                </div>

            </fieldset>

            <div class="text-center mt-4">
                <input type="hidden" name="idPaciente" value="<?php echo $_GET['id']; ?>"> <!-- Asumiendo que el ID del paciente se pasa por GET -->
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-upload"></i> Subir Archivos</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
