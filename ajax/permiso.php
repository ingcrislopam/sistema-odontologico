<?php
    require_once "../modelos/Permiso.php";

    $permiso = new Permiso();

    $idpermiso = isset($_POST["idpermiso"])? limpiarCadena($_POST["idpermiso"]):"";
    $nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if (empty($idpermiso)){
                $rspta=$permiso->insertar($nombre, $descripcion);
                echo $rspta ? "Permiso registrado" : "Permiso no se pudo registrar";
            }
            else {
                $rspta=$permiso->editar($idpermiso, $nombre, $descripcion);
                echo $rspta ? "Permiso actualizado" : "Permiso no se pudo actualizar";
            }
        break;

        case 'eliminar':
            $rspta = $permiso->eliminar($idpermiso);
            echo $rspta ? "Permiso eliminado" : "Permiso no se pudo eliminar";
        break;

        case 'desactivar':
            $rspta = $permiso->desactivar($idpermiso);
            echo $rspta ? "Permiso desactivado" : "Permiso no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $permiso->activar($idpermiso);
            echo $rspta ? "Permiso activado" : "Permiso no se pudo activar";
        break;

        case 'mostrar':
            $rspta = $permiso->mostrar($idpermiso);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta = $permiso->listar();
            //Vamos a declarar un array
            $data = Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpermiso.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpermiso.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idpermiso.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idpermiso.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->nombre,
                    "2"=>$reg->descripcion,
                    "3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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
    }

?>