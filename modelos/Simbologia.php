<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/conexion.php";

    class Simbologia{
        //Implementamos nuestro constructor
        public function __construct(){

        }

        //Implementamos un método para insertar registros
        public function insertar($nombre, $descripcion){
            $sql = "INSERT INTO simbologia (nombre, descripcion, condicion) 
            VALUES ('$nombre', '$descripcion', '1')";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para editar registros
        public function editar($id_simbologia, $nombre, $descripcion){
            $sql = "UPDATE simbologia SET nombre='$nombre', descripcion='$descripcion' 
            WHERE id_simbologia='$id_simbologia'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para eliminar registros
        public function eliminar($id_simbologia){
            $sql = "DELETE FROM simbologia WHERE id_simbologia='$id_simbologia'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para desactivar simbologias
        public function desactivar($id_simbologia){
            $sql = "UPDATE simbologia SET condicion='0'
            WHERE id_simbologia='$id_simbologia'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para activar simbologias
        public function activar($id_simbologia){
            $sql = "UPDATE simbologia SET condicion='1'
            WHERE id_simbologia='$id_simbologia'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para mostrar los datos de un registro a modificar
        public function mostrar($id_simbologia){
            $sql = "SELECT * FROM simbologia WHERE id_simbologia = '$id_simbologia'";
            return ejecutarConsultaSimpleFila($sql);
        }

        //Implementamos un método para listar los registros
        public function listar(){
            $sql = "SELECT * FROM simbologia";
            return ejecutarConsulta($sql);
        }
    }
?>