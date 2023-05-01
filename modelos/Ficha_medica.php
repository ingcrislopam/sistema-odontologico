<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/conexion.php";

    class Ficha_medica{
        //Implementamos nuestro constructor
        public function __construct(){

        }

        //Implementamos un método para insertar registros
        public function insertar($id_paciente, $fecha, $motivo_consulta, $enfermedad_problema_actual, $antecedentes_personales_familiares, $signos_vitales, $examen_sistema_estomatognatico, $planes_diagnostico, $diagnostico){
            $sql = "INSERT INTO ficha_medica (id_paciente, fecha, motivo_consulta, enfermedad_problema_actual, antecedentes_personales_familiares, signos_vitales, examen_sistema_estomatognatico, planes_diagnostico, diagnostico, condicion) 
            VALUES ('$id_paciente', '$fecha', '$motivo_consulta', '$enfermedad_problema_actual', '$antecedentes_personales_familiares', '$signos_vitales', '$examen_sistema_estomatognatico', '$planes_diagnostico', '$diagnostico', '1')";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para editar registros
        public function editar($id_ficha_medica, $id_paciente, $fecha, $motivo_consulta, $enfermedad_problema_actual, $antecedentes_personales_familiares, $signos_vitales, $examen_sistema_estomatognatico, $planes_diagnostico, $diagnostico){
            $sql = "UPDATE ficha_medica SET id_paciente='$id_paciente', fecha='$fecha', motivo_consulta='$motivo_consulta', enfermedad_problema_actual='$enfermedad_problema_actual', antecedentes_personales_familiares='$antecedentes_personales_familiares', signos_vitales='$signos_vitales', examen_sistema_estomatognatico='$examen_sistema_estomatognatico', planes_diagnostico='$planes_diagnostico', diagnostico='$diagnostico' 
            WHERE id_ficha_medica='$id_ficha_medica'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para eliminar registros
        public function eliminar($id_ficha_medica){
            $sql = "DELETE FROM ficha_medica WHERE id_ficha_medica='$id_ficha_medica'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para desactivar fichas medicas
        public function desactivar($id_ficha_medica){
            $sql = "UPDATE ficha_medica SET condicion='0'
            WHERE id_ficha_medica='$id_ficha_medica'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para activar fichas medicas
        public function activar($id_ficha_medica){
            $sql = "UPDATE ficha_medica SET condicion='1'
            WHERE id_ficha_medica='$id_ficha_medica'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para mostrar los datos de un registro a modificar
        public function mostrar($id_ficha_medica){
            $sql = "SELECT * FROM ficha_medica WHERE id_ficha_medica = '$id_ficha_medica'";
            return ejecutarConsultaSimpleFila($sql);
        }

        //Implementamos un método para listar los registros
        public function listar(){
            $sql = "SELECT f.id_ficha_medica, p.id_paciente, CONCAT(p.nombres, ' ', p.apellidos) as nombresPaciente, f.fecha, f.motivo_consulta, f.condicion FROM ficha_medica f INNER JOIN paciente p ON f.id_paciente=p.id_paciente ORDER BY f.fecha DESC";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para listar los registros y mostrar en el select
        public function select(){
            $sql = "SELECT f.id_ficha_medica, CONCAT(motivo_consulta, ' - ', CONCAT(p.nombres, ' ', p.apellidos)) as consulPaciente FROM ficha_medica f INNER JOIN paciente p ON f.id_paciente=p.id_paciente WHERE f.condicion=1";
            return ejecutarConsulta($sql);
        }
    }
?>