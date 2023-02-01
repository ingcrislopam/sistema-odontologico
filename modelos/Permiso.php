<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/conexion.php";

    class Permiso{
        //Implementamos nuestro constructor
        public function __construct(){

        }

        //Implementamos un método para insertar registros
        public function insertar($nombre){
            $sql = "INSERT INTO permiso (nombre) 
            VALUES ('$nombre')";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para editar registros
        public function editar($idpermiso, $nombre){
            $sql = "UPDATE permiso SET nombre='$nombre' 
            WHERE idpermiso='$idpermiso'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para eliminar registros
        public function eliminar($idpermiso){
            $sql = "DELETE FROM permiso WHERE idpermiso='$idpermiso'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para desactivar simbologias
        public function desactivar($idpermiso){
            $sql = "UPDATE permiso SET condicion='0'
            WHERE idpermiso='$idpermiso'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para activar simbologias
        public function activar($idpermiso){
            $sql = "UPDATE permiso SET condicion='1'
            WHERE idpermiso='$idpermiso'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para mostrar los datos de un registro a modificar
        public function mostrar($idpermiso){
            $sql = "SELECT * FROM permiso WHERE idpermiso = '$idpermiso'";
            return ejecutarConsultaSimpleFila($sql);
        }

        //Implementamos un método para listar los registros
        public function listar(){
            $sql = "SELECT * FROM permiso";
            return ejecutarConsulta($sql);
        }
    }
?>