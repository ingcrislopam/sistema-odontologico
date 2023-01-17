<?php
    require_once "../modelos/Simbologia.php";

    $simbologia = new Simbologia();

    $id_simbologia = isset($_POST["id_simbologia"])? limpiarCadena($_POST["id_simbologia"]):"";
    $nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if (empty($id_simbologia)){
                $rspta=$simbologia->insertar($nombre, $descripcion);
                echo $rspta ? "Simbologia registrada" : "Simbologia no se pudo registrar";
            }
            else {
                $rspta=$simbologia->editar($id_simbologia, $nombre, $descripcion);
                echo $rspta ? "Simbologia actualizada" : "Simbologia no se pudo actualizar";
            }
        break;

        case 'eliminar':
            $rspta = $simbologia->eliminar($id_simbologia);
            echo $rspta ? "Simbologia eliminada" : "Simbologia no se pudo eliminar";
        break;

        case 'desactivar':
            $rspta = $simbologia->desactivar($id_simbologia);
            echo $rspta ? "Simbologia desactivada" : "Simbologia no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $simbologia->activar($id_simbologia);
            echo $rspta ? "Simbologia activada" : "Simbologia no se pudo activar";
        break;

        case 'mostrar':
            $rspta = $simbologia->mostrar($id_simbologia);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta = $simbologia->listar();
            //Vamos a declarar un array
            $data = Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_simbologia.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_simbologia.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->id_simbologia.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id_simbologia.')"><i class="fa fa-check"></i></button>',
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