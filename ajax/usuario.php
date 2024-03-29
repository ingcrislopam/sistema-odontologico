<?php
    session_start();
    require_once "../modelos/Usuario.php";

    $usuario = new Usuario();

    $idusuario = isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
    $nombres = isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
    $apellidos = isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
    $tipo_documento = isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
    $num_documento = isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
    $direccion = isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
    $telefono = isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
    $email = isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
    $cargo = isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
    $login = isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
    $clave = isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            $clavehash=hash("SHA256",$clave);
            if (empty($idusuario)){
                $rspta=$usuario->insertar($nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clavehash, $_POST['permiso']);
                echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
            }
            else {
                $rspta=$usuario->editar($idusuario, $nombres, $apellidos, $tipo_documento, $num_documento, $direccion, $telefono, $email, $cargo, $login, $clavehash, $_POST['permiso']);
                echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
            }
        break;

        case 'eliminar':
            $rspta = $usuario->eliminar($idusuario);
            echo $rspta ? "Usuario eliminado" : "Usuario no se pudo eliminar";
        break;

        case 'desactivar':
            $rspta = $usuario->desactivar($idusuario);
            echo $rspta ? "Usuario desactivado" : "Usuario no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $usuario->activar($idusuario);
            echo $rspta ? "Usuario activado" : "Usuario no se pudo activar";
        break;

        case 'mostrar':
            $rspta = $usuario->mostrar($idusuario);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta = $usuario->listar();
            //Vamos a declarar un array
            $data = Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idusuario.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idusuario.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idusuario.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->nombres,
                    "2"=>$reg->apellidos,
                    "3"=>$reg->tipo_documento,
                    "4"=>$reg->num_documento,
                    "5"=>$reg->direccion,
                    "6"=>$reg->telefono,
                    "7"=>$reg->email,
                    "8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                    '<span class="label bg-red">Desactivado</span>'
                );
            }
            $results = array(
                "sEcho"=>1, //Información para el datatables
                "iTotalRecords"=>count($data), //enviamos el total de registros al datatable
                "iTotalDisplayRecords"=>count($data), //enviamos el total de registros a visualizar
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case 'permisos':
            //Obtenemos todos los permisos de la tabla permisos
		    require_once "../modelos/Permiso.php";
		    $permiso = new Permiso();
		    $rspta = $permiso->listar();

		    //Obtener los permisos asignados al usuario
		    $id=$_GET['id'];
		    $marcados = $usuario->listarmarcados($id);
		    //Declaramos el array para almacenar todos los permisos marcados
		    $valores=array();

		    //Almacenar los permisos asignados al usuario en el array
		    while ($per = $marcados->fetch_object())
			{
				array_push($valores, $per->idpermiso);
			}

		    //Mostramos la lista de permisos en la vista y si están o no marcados
		    while ($reg = $rspta->fetch_object())
			{
				$sw=in_array($reg->idpermiso,$valores)?'checked':'';
				echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
			}
        break;

        case 'verificar':
            $logina = $_POST['logina'];
            $clavea = $_POST['clavea'];

            //Hash SHA256 en la contraseña
            $clavehash = hash("SHA256", $clavea);

            $rspta = $usuario->verificar($logina, $clavehash);

            $fetch = $rspta->fetch_object();

            if (isset($fetch))
            {
                //Declaramos las variables de sesión
                $_SESSION['idusuario'] = $fetch->idusuario;
                $_SESSION['nombres'] = $fetch->nombres;
                $_SESSION['apellidos'] = $fetch->apellidos;
                $_SESSION['telefono'] = $fetch->telefono;
                $_SESSION['email'] = $fetch->email;
                $_SESSION['cargo'] = $fetch->cargo;
                $_SESSION['login'] = $fetch->login;

                //Obtenemos los permisos del usuario
                $marcados = $usuario->listarmarcados($fetch->idusuario);

                //Declaramos el array para almacenar todos los permisos marcados
                $valores = array();

                //Almacenamos los permisos marcados en el array
                while ($per = $marcados->fetch_object())
                {
                    array_push($valores, $per->idpermiso);
                }

                //Determinamos los accesos del usuario
                in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;
                in_array(2,$valores)?$_SESSION['consultorio']=1:$_SESSION['consultorio']=0;
                in_array(3,$valores)?$_SESSION['historial']=1:$_SESSION['historial']=0;
                in_array(4,$valores)?$_SESSION['mantenimiento']=1:$_SESSION['mantenimiento']=0;
                in_array(1,$valores)?$_SESSION['acceso']=1:$_SESSION['acceso']=0;
            }
            echo json_encode($fetch);
        break;

        case 'salir':
            //Limpiamos las variables de sesión
            session_unset();
            //Destruimos la sesión
            session_destroy();
            //Redireccionamos al login
            header("Location: ../index.php");
        break;
    }

?>