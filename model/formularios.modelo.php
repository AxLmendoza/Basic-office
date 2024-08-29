<?php

require_once "conexion.php";

class ModeloFormularios
{

    static public function mdlSeleccionarRegistros($tabla, $item, $valor)
    {
        if ($item == null && $valor == null) {

            $stmt = Conexion::conectar()->prepare(
                "SELECT *, DATE_FORMAT(fecha, '%d/%M/%y') as fecha FROM $tabla ORDER BY id DESC"
            );
            $stmt->execute();
            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare(
                "SELECT *, DATE_FORMAT(fecha, '%d/%M/%y') as fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC"
            );

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);


            $stmt->execute();
            return $stmt->fetch();
        }
    }
    static public function mdlSeleccionarPaciente($tabla, $item, $valor)
    {
        if ($item == null && $valor == null) {

            $stmt = Conexion::conectar()->prepare(
                "SELECT *, DATE_FORMAT(f_Registro, '%d/%M/%y') as fecha FROM $tabla ORDER BY id DESC"
            );
            $stmt->execute();
            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare(
                "SELECT *, DATE_FORMAT(f_Registro, '%d/%M/%y') as fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC"
            );
 
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);


            $stmt->execute();
            return $stmt->fetch();
        }
}

    static public function mdlRegistroPaciente($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, F_Nacimiento, sexo, telefono, estado, comentario, consultorio) VALUES (:nombre, :F_Nacimiento, :sexo, :telefono, :estado, :comentario, :consultorio)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":F_Nacimiento", $datos["F_Nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $stmt->bindParam(":consultorio", $datos["consultorio"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";
        } else {

            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }



    static public function mdlSeleccionarPaciente2($tabla, $item, $valor)
    {
        if ($item == null && $valor == null) {

            $stmt = Conexion::conectar()->prepare(
                "SELECT *, DATE_FORMAT(f_Registro, '%d/%M/%y') as fecha FROM $tabla ORDER BY id DESC"
            );
            $stmt->execute();
            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare(
                "SELECT *, DATE_FORMAT(f_Registro, '%d/%M/%y') as fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC"
            );
 
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);


            $stmt->execute();
            return $stmt->fetch();
        }
}


    static public function mdlRegistroUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios(nombre, rol, email, telefono, password) VALUES (:nombre, :rol, :email, :telefono, :password)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";
        } else {

            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }

    static public function mdlActualizarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, F_Nacimiento=:F_Nacimiento, sexo=:sexo, telefono=:telefono, estado=:estado, comentario=:comentario, consultorio=:consultorio WHERE id=:id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":F_Nacimiento", $datos["F_Nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":comentario", $datos["comentario"], PDO::PARAM_STR);
        $stmt->bindParam(":consultorio", $datos["consultorio"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }



    static public function mdlEliminarRegistro($tabla, $valor)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }

    static public function mdlsubirArchivo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET archivo=:archivo WHERE id=:id");

        $stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_LOB);

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt = null;
    }

    public static function mdlBuscarPaciente($nombreTabla, $pacienteBuscar)
    {
        $respuesta = ModeloFormularios::mdlSeleccionarPaciente($nombreTabla, null, null);
        $pacienteEncontrado = null;
        if (isset($_POST["txtBuscar"])) {
            foreach ($respuesta as $key => $value) {
                if ($pacienteBuscar == $value["id"]) {
                    $pacienteEncontrado = $value;
                    break;
                }
            }
        }

        return $pacienteEncontrado;
    }
    public static function mdlSeleccionarPacientes($tabla, $item = null, $valor = null)
    {
        if ($item != null && $valor != null) {
            $valor = "%" . $valor . "%"; // Comodines para permitir coincidencias parciales
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item LIKE :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }


    public static function mdlSeleccionarUsuarios($tabla, $item = null, $valor = null)
    {
        if ($item != null && $valor != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    public static function mdlBuscarUsuario($nombreTabla, $usuarioBuscar)
    {
        $respuesta = ModeloFormularios::mdlSeleccionarPaciente($nombreTabla, null, null);
        $pacienteEncontrado = null;
        if (isset($_POST["txtBuscar"])) {
            foreach ($respuesta as $key => $value) {
                if ($usuarioBuscar == $value["id"]) {
                    $pacienteEncontrado = $value;
                    break;
                }
            }
        }

        return $pacienteEncontrado;
    }
}
