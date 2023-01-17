<?php
    require_once "../modelos/Tratamiento.php";

    $tratamiento = new Tratamiento();

    $id_tratamiento = isset($_POST["id_tratamiento"])? limpiarCadena($_POST["id_tratamiento"]):"";
    $id_ficha_medica = isset($_POST["id_ficha_medica"])? limpiarCadena($_POST["id_ficha_medica"]):"";
    $fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
    $diagnosticos_complicaciones = isset($_POST["diagnosticos_complicaciones"])? limpiarCadena($_POST["diagnosticos_complicaciones"]):"";
    $procedimientos = isset($_POST["procedimientos"])? limpiarCadena($_POST["procedimientos"]):"";
    $prescripciones = isset($_POST["prescripciones"])? limpiarCadena($_POST["prescripciones"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if (empty($id_tratamiento)){
                $rspta=$tratamiento->insertar($id_ficha_medica, $fecha, $diagnosticos_complicaciones, $procedimientos, $prescripciones);
                echo $rspta ? "Tratamiento registrado" : "Tratamiento no se pudo registrar";
            }
            else {
                $rspta=$tratamiento->editar($id_tratamiento, $id_ficha_medica, $fecha, $diagnosticos_complicaciones, $procedimientos, $prescripciones);
                echo $rspta ? "Tratamiento actualizado" : "Tratamiento no se pudo actualizar";
            }
        break;

        case 'eliminar':
            $rspta = $tratamiento->eliminar($id_tratamiento);
            echo $rspta ? "Tratamiento eliminado" : "Tratamiento no se pudo eliminar";
        break;

        case 'desactivar':
            $rspta = $tratamiento->desactivar($id_tratamiento);
            echo $rspta ? "Tratamiento desactivado" : "Tratamiento no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $tratamiento->activar($id_tratamiento);
            echo $rspta ? "Tratamiento activado" : "Tratamiento no se pudo activar";
        break;

        case 'mostrar':
            $rspta = $tratamiento->mostrar($id_tratamiento);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta = $tratamiento->listar();
            //Vamos a declarar un array
            $data = Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_tratamiento.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_tratamiento.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->id_tratamiento.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id_tratamiento.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->consultaPaciente,
                    "2"=>$reg->fecha,
                    "3"=>$reg->diagnosticos_complicaciones,
                    "4"=>$reg->procedimientos,
                    "5"=>$reg->prescripciones,
                    "6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

        case 'selectFichaMedica':
            require_once "../modelos/Ficha_medica.php";
            $ficha_medica = new Ficha_medica();
            $rspta = $ficha_medica->select();
            while ($reg = $rspta->fetch_object()) {
                echo '<option value=' . $reg->id_ficha_medica . '>' . $reg->consulPaciente . '</option>';
            }
        break;
    }

?>