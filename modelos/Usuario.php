<?php
    //Incluímos inicialmente la conexión a la base de datos
    require "../config/conexion.php";

    class Usuario{
        //Implementamos nuestro constructor
        public function __construct(){

        }

        //Implementamos un método para insertar registros
        public function insertar($nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $permisos){
            $sql = "INSERT INTO usuario (nombres, apellidos, tipo_documento, num_documento, direccion, telefono, email, cargo, login, clave, condicion) 
            VALUES ('$nombres', '$apellidos', '$tipo_documento', '$num_documento', '$direccion', '$telefono', '$email', '$cargo', '$login', '$clave', '1')";
            //return ejecutarConsulta($sql);
            $idusuarionew=ejecutarConsulta_retornarID($sql);

		    $num_elementos=0;
		    $sw=true;

		    while ($num_elementos < count($permisos))
		    {
			    $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
			    ejecutarConsulta($sql_detalle) or $sw = false;
			    $num_elementos=$num_elementos + 1;
		    }

		    return $sw;
        }

        //Implementamos un método para editar registros
        public function editar($idusuario, $nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clave, $permisos){
            $sql = "UPDATE usuario SET nombres='$nombres', apellidos='$apellidos', tipo_documento='$tipo_documento', num_documento='$num_documento', direccion='$direccion', telefono='$telefono', email='$email', cargo='$cargo', login='$login', clave='$clave' 
            WHERE idusuario='$idusuario'";
            ejecutarConsulta($sql);

            //Eliminamos todos los permisos asignados para volverlos a registrar
		    $sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		    ejecutarConsulta($sqldel);

		    $num_elementos=0;
		    $sw=true;

		    while ($num_elementos < count($permisos))
		    {
			    $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
			    ejecutarConsulta($sql_detalle) or $sw = false;
			    $num_elementos=$num_elementos + 1;
		    }

		    return $sw;
        }

        //Implementamos un método para eliminar registros
        public function eliminar($idusuario){
            $sql = "DELETE FROM usuario WHERE idusuario='$idusuario'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para desactivar usuarios
        public function desactivar($idusuario){
            $sql = "UPDATE usuario SET condicion='0'
            WHERE idusuario='$idusuario'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para activar usuarios
        public function activar($idusuario){
            $sql = "UPDATE usuario SET condicion='1'
            WHERE idusuario='$idusuario'";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para mostrar los datos de un registro a modificar
        public function mostrar($idusuario){
            $sql = "SELECT * FROM usuario WHERE idusuario = '$idusuario'";
            return ejecutarConsultaSimpleFila($sql);
        }

        //Implementamos un método para listar los registros
        public function listar(){
            $sql = "SELECT idusuario, nombres, apellidos, tipo_documento, num_documento, direccion, telefono, email, condicion FROM usuario";
            return ejecutarConsulta($sql);
        }

        //Implementamos un método para listar los permisos marcados
        public function listarmarcados($idusuario){
            $sql = "SELECT * FROM usuario_permiso WHERE idusuario = '$idusuario'";
            return ejecutarConsulta($sql);
        }

        //Función para verificar el acceso al sistema
        public function verificar($login, $clave){
            $sql = "SELECT idusuario, nombres, apellidos, tipo_documento, num_documento, direccion, telefono, email, cargo, login FROM usuario WHERE login='$login' AND clave='$clave' AND condicion='1'";
            return ejecutarConsulta($sql);
        }
    }
?>