<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/conexion.php";

    class Tratamiento{
        //Implementamos nuestro constructor
        public function __construct(){

        }

        //Implementamos un método para insertar registros
        public function insertar($id_ficha_medica, $fecha, $d18, $d17, $d16, $d15, $d14, $d13, $d12, $d11, $d21, $d22, $d23, $d24, $d25, $d26, $d27, $d28, $d48, $d47, $d46, $d45, $d44, $d43, $d42, $d41, $d31, $d32, $d33, $d34, $d35, $d36, $d37, $d38, $diagnosticos_complicaciones, $procedimientos, $prescripciones){
            $sql = "INSERT INTO tratamiento (id_ficha_medica, fecha, d18, d17, d16, d15, d14, d13, d12, d11, d21, d22, d23, d24, d25, d26, d27, d28, d48, d47, d46, d45, d44, d43, d42, d41, d31, d32, d33, d34, d35, d36, d37, d38, diagnosticos_complicaciones, procedimientos, prescripciones, condicion) 
            VALUES ('$id_ficha_medica', '$fecha', '$d18', '$d17', '$d16', '$d15', '$d14', '$d13', '$d12', '$d11', '$d21', '$d22', '$d23', '$d24', '$d25', '$d26', '$d27', '$d28', '$d48', '$d47', '$d46', '$d45', '$d44', '$d43', '$d42', '$d41', '$d31', '$d32', '$d33', '$d34', '$d35', '$d36', '$d37', '$d38', '$diagnosticos_complicaciones', '$procedimientos', '$prescripciones', '1')";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para editar registros
        public function editar($id_tratamiento, $id_ficha_medica, $fecha, $d18, $d17, $d16, $d15, $d14, $d13, $d12, $d11, $d21, $d22, $d23, $d24, $d25, $d26, $d27, $d28, $d48, $d47, $d46, $d45, $d44, $d43, $d42, $d41, $d31, $d32, $d33, $d34, $d35, $d36, $d37, $d38, $diagnosticos_complicaciones, $procedimientos, $prescripciones){
            $sql = "UPDATE tratamiento SET id_ficha_medica='$id_ficha_medica', fecha='$fecha', d18='$d18', d17='$d17', d16='$d16', d15='$d15', d14='$d14', d13='$d13', d12='$d12', d11='$d11', d21='$d21', d22='$d22', d23='$d23', d24='$d24', d25='$d25', d26='$d26', d27='$d27', d28='$d28', d48='$d48', d47='$d47', d46='$d46', d45='$d45', d44='$d44', d43='$d43', d42='$d42', d41='$d41', d31='$d31', d32='$d32', d33='$d33', d34='$d34', d35='$d35', d36='$d36', d37='$d37', d38='$d38', diagnosticos_complicaciones='$diagnosticos_complicaciones', procedimientos='$procedimientos', prescripciones='$prescripciones' 
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
            $sql = "SELECT t.id_tratamiento, CONCAT(f.motivo_consulta, ' - ', CONCAT(p.nombres, ' ', p.apellidos)) as consultaPaciente, t.fecha, t.diagnosticos_complicaciones, t.procedimientos, t.prescripciones, t.condicion FROM tratamiento t INNER JOIN ficha_medica f ON t.id_ficha_medica=f.id_ficha_medica INNER JOIN paciente p ON f.id_paciente=p.id_paciente ORDER BY t.fecha DESC";
            //$sql = "SELECT t.id_tratamiento, CONCAT(f.motivo_consulta, ' - ', CONCAT(p.nombres, ' ', p.apellidos)) as consultaPaciente, t.fecha, t.d18, t.d17, t.d16, t.d15, t.d14, t.d13, t.d12, t.d11, t.diagnosticos_complicaciones, t.procedimientos, t.prescripciones, t.condicion FROM tratamiento t INNER JOIN ficha_medica f ON t.id_ficha_medica=f.id_ficha_medica INNER JOIN paciente p ON f.id_paciente=p.id_paciente INNER JOIN simbologia s ON t.d18=s.id_simbologia AND t.d17=s.id_simbologia AND t.d16=s.id_simbologia AND t.d15=s.id_simbologia AND t.d14=s.id_simbologia AND t.d13=s.id_simbologia AND t.d12=s.id_simbologia AND t.d11=s.id_simbologia";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para mostrar los tratamiento por cada ficha médica - nuevo codigo
        public function mostrar_tratamientos($id_ficha_medica){
            $sql = "SELECT fecha, diagnosticos_complicaciones FROM tratamiento WHERE id_ficha_medica = '$id_ficha_medica' ORDER BY fecha DESC";
            return ejecutarConsulta($sql);
        }
    }
?>