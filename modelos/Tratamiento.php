<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/conexion.php";

    class Tratamiento{
        //Implementamos nuestro constructor
        public function __construct(){

        }

        //Implementamos un método para insertar registros
        public function insertar($id_ficha_medica, $fecha, $diagnosticos_complicaciones, $procedimientos, $prescripciones){
            $sql = "INSERT INTO tratamiento (id_ficha_medica, fecha, diagnosticos_complicaciones, procedimientos, prescripciones, condicion) 
            VALUES ('$id_ficha_medica', '$fecha', '$diagnosticos_complicaciones', '$procedimientos', '$prescripciones', '1')";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para editar registros
        public function editar($id_tratamiento, $id_ficha_medica, $fecha, $diagnosticos_complicaciones, $procedimientos, $prescripciones){
            $sql = "UPDATE tratamiento SET id_ficha_medica='$id_ficha_medica', fecha='$fecha', diagnosticos_complicaciones='$diagnosticos_complicaciones', procedimientos='$procedimientos', prescripciones='$prescripciones' 
            WHERE id_tratamiento='$id_tratamiento'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para eliminar registros
        public function eliminar($id_tratamiento){
            $sql = "DELETE FROM tratamiento WHERE id_tratamiento='$id_tratamiento'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para desactivar tratamientos
        public function desactivar($id_tratamiento){
            $sql = "UPDATE tratamiento SET condicion='0'
            WHERE id_tratamiento='$id_tratamiento'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para activar tratamientos
        public function activar($id_tratamiento){
            $sql = "UPDATE tratamiento SET condicion='1'
            WHERE id_tratamiento='$id_tratamiento'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para mostrar los datos de un registro a modificar
        public function mostrar($id_tratamiento){
            $sql = "SELECT * FROM tratamiento WHERE id_tratamiento = '$id_tratamiento'";
            return ejecutarConsultaSimpleFila($sql);
        }

        //Implementamos un método para listar los registros
        public function listar(){
            $sql = "SELECT t.id_tratamiento, CONCAT(f.motivo_consulta, ' - ', CONCAT(p.nombres, ' ', p.apellidos)) as consultaPaciente, t.fecha, t.diagnosticos_complicaciones, t.procedimientos, t.prescripciones, t.condicion FROM tratamiento t INNER JOIN ficha_medica f ON t.id_ficha_medica=f.id_ficha_medica INNER JOIN paciente p ON f.id_paciente=p.id_paciente";
            return ejecutarConsulta($sql);
        }
    }
?>