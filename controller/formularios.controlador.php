<?php

class ControladorFormularios
{

    static public function ctrSeleccionarRegistros($item, $valor)
    {
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrSeleccionarPacientes($criterio = null, $valor = null)
    {
        $tabla = "paciente";

        if ($criterio && $valor) {
            $respuesta = ModeloFormularios::mdlSeleccionarPacientes($tabla, $criterio, $valor);
        } else {
            $respuesta = ModeloFormularios::mdlSeleccionarPacientes($tabla);
        }

        return $respuesta;
    }

    static public function ctrSeleccionarPacientes2($item = null, $valor = null)
    {
        $tabla = "paciente";
        $respuesta = ModeloFormularios::mdlSeleccionarPaciente2($tabla, $item, $valor);
        return $respuesta;
    }

    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"])) {
            $tabla = "usuarios";
            $item = "email";
            $valor = $_POST["ingresoEmail"];

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if ($respuesta && $respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {
                $_SESSION["validarIngreso"] = "ok";
                echo '<script>
                if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?paginas=pacientes";
      
                </script>';
            } else {
                echo '<script>
                if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                }
      
                </script>';

                echo '<div class = "alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
            }
        }
    }

    static public function ctrRegistroPaciente()
    {
        if (isset($_POST["registroNombre"])) {

            $tabla = "paciente";
            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "F_Nacimiento" => $_POST["registroNacimiento"],
                "sexo" => $_POST["registroSexo"],
                "telefono" => $_POST["registroTelefono"],
                "estado" => $_POST["registroEstado"],
                "comentario" => $_POST["registroComentario"],
                "consultorio" => $_POST["registroConsultorio"]
            );

            $respuesta = ModeloFormularios::mdlRegistroPaciente($tabla, $datos);
            return $respuesta;
        } else {

            $respuesta = "error_validacion";
            return $respuesta;
        }
    }

    static public function ctrRegistroUsuario()
    {
        if (isset($_POST["registroNombre"])) {

            $tabla = "usuarios";
            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "rol" => $_POST["registroRol"],
                "email" => $_POST["registroEmail"],
                "password" => $_POST["registroPassword"],
                "telefono" => $_POST["registroTelefono"]
            );

            $respuesta = ModeloFormularios::mdlRegistroUsuario($tabla, $datos);
            return $respuesta;
        } else {

            $respuesta = "error_validacion";
            return $respuesta;
        }
    }

    public function ctrEliminarRegistro()
    {
        if (isset($_POST["eliminarRegistro"])) {
            $tabla = "paciente";
            $valor = $_POST["eliminarRegistro"];
            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

            if ($respuesta == "ok") {
                echo '<script>
                if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                }
                window.location = "index.php?paginas=pacientes";
      
                </script>';
            }
        }
    }

    static public function ctrActualizarRegistro()
    {
        if (isset($_POST["actualizarNombre"])) {

            $tabla = "paciente";
            $datos = array(
                "id" => $_POST["idUsuario"],
                "nombre" => $_POST["actualizarNombre"],
                "F_Nacimiento" => $_POST["actualizarNacimiento"],
                "sexo" => $_POST["actualizarSexo"],
                "telefono" => $_POST["actualizarTelefono"],
                "estado" => $_POST["actualizarEstado"],
                "comentario" => $_POST["actualizarComentario"],
                "consultorio" => $_POST["actualizarConsultorio"]
            );

            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
            return $respuesta;
        } else {

            return "error_validacion";
        }
    }

    static public function ctrsubirArchivo()
    {
        if (isset($_POST["actualizarNombre"])) {

            $tabla = "paciente";
            $datos = array(
                "id" => $_POST["id"],
                "archivo" => $_POST["archivo"]
            );

            $respuesta = ModeloFormularios::mdlsubirArchivo($tabla, $datos);
            return $respuesta;
        }
    }

    static public function ctrBuscarPaciente()
    {

        if (isset($_POST["txtBuscar"])) {
            $nombreTabla = "paciente";
            $pacienteBuscar = $_POST["txtBuscar"];
            $respuesta = ModeloFormularios::mdlBuscarPaciente($nombreTabla, $pacienteBuscar);
            return $respuesta;
        }
    }

    static public function ctrBuscarUsuario()
    {

        if (isset($_POST["txtBuscar"])) {
            $nombreTabla = "usuarios";
            $usuarioBuscar = $_POST["txtBuscar"];
            $respuesta = ModeloFormularios::mdlBuscarUsuario($nombreTabla, $usuarioBuscar);
            return $respuesta;
        }
    }

    static public function ctrSeleccionarUsuarios($item, $valor)
    {
        $tabla = "usuarios";
        $respuesta = ModeloFormularios::mdlSeleccionarUsuarios($tabla, $item, $valor);
        return $respuesta;
    }
}