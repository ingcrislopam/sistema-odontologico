<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/conexion.php";

    class Paciente{
        //Implementamos nuestro constructor
        public function __construct(){

        }

        //Implementamos un método para insertar registros
        public function insertar($cedula, $nombres, $apellidos, $direccion, $fecha_nacimiento, $sexo){
            $sql = "INSERT INTO paciente (cedula, nombres, apellidos, direccion, fecha_nacimiento, sexo condicion) 
            VALUES ('$cedula', '$nombres', '$apellidos', '$direccion', '$fecha_nacimiento', '$sexo', '1')";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para editar registros
        public function editar($id_paciente, $cedula, $nombres, $apellidos, $direccion, $fecha_nacimiento, $sexo){
            $sql = "UPDATE paciente SET cedula='$cedula', nombres='$nombres', apellidos='$apellidos', direccion='$direccion', fecha_nacimiento='$fecha_nacimiento', sexo='$sexo' 
            WHERE id_paciente='$id_paciente'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para eliminar registros
        public function eliminar($id_paciente){
            $sql = "DELETE FROM paciente WHERE id_paciente='$id_paciente'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para desactivar pacientes
        public function desactivar($id_paciente){
            $sql = "UPDATE paciente SET condicion='0'
            WHERE id_paciente='$id_paciente'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para activar pacientes
        public function activar($id_paciente){
            $sql = "UPDATE paciente SET condicion='1'
            WHERE id_paciente='$id_paciente'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para mostrar los datos de un registro a modificar
        public function mostrar($id_paciente){
            $sql = "SELECT * FROM paciente WHERE id_paciente = '$id_paciente'";
            return ejecutarConsultaSimpleFila($sql);
        }

        //Implementamos un método para listar los registros
        public function listar(){
            $sql = "SELECT id_paciente, cedula, nombres, apellidos, direccion, TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, sexo, condicion FROM paciente";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para listar los registros y mostrar en el select
        public function select(){
            $sql = "SELECT id_paciente, CONCAT(nombres, ' ', apellidos) as nomPaciente FROM paciente WHERE condicion=1";
            return ejecutarConsulta($sql);
        }
    }
?>