<?php
    require_once "../modelos/Tratamiento.php";

    $tratamiento = new Tratamiento();

    $id_tratamiento = isset($_POST["id_tratamiento"])? limpiarCadena($_POST["id_tratamiento"]):"";
    $id_ficha_medica = isset($_POST["id_ficha_medica"])? limpiarCadena($_POST["id_ficha_medica"]):"";
    $fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
    $d18 = isset($_POST["d18"])? limpiarCadena($_POST["d18"]):"";
    $d17 = isset($_POST["d17"])? limpiarCadena($_POST["d17"]):"";
    $d16 = isset($_POST["d16"])? limpiarCadena($_POST["d16"]):"";
    $d15 = isset($_POST["d15"])? limpiarCadena($_POST["d15"]):"";
    $d14 = isset($_POST["d14"])? limpiarCadena($_POST["d14"]):"";
    $d13 = isset($_POST["d13"])? limpiarCadena($_POST["d13"]):"";
    $d12 = isset($_POST["d12"])? limpiarCadena($_POST["d12"]):"";
    $d11 = isset($_POST["d11"])? limpiarCadena($_POST["d11"]):"";
    $d21 = isset($_POST["d21"])? limpiarCadena($_POST["d21"]):"";
    $d22 = isset($_POST["d22"])? limpiarCadena($_POST["d22"]):"";
    $d23 = isset($_POST["d23"])? limpiarCadena($_POST["d23"]):"";
    $d24 = isset($_POST["d24"])? limpiarCadena($_POST["d24"]):"";
    $d25 = isset($_POST["d25"])? limpiarCadena($_POST["d25"]):"";
    $d26 = isset($_POST["d26"])? limpiarCadena($_POST["d26"]):"";
    $d27 = isset($_POST["d27"])? limpiarCadena($_POST["d27"]):"";
    $d28 = isset($_POST["d28"])? limpiarCadena($_POST["d28"]):"";
    $d48 = isset($_POST["d48"])? limpiarCadena($_POST["d48"]):"";
    $d47 = isset($_POST["d47"])? limpiarCadena($_POST["d47"]):"";
    $d46 = isset($_POST["d46"])? limpiarCadena($_POST["d46"]):"";
    $d45 = isset($_POST["d45"])? limpiarCadena($_POST["d45"]):"";
    $d44 = isset($_POST["d44"])? limpiarCadena($_POST["d44"]):"";
    $d43 = isset($_POST["d43"])? limpiarCadena($_POST["d43"]):"";
    $d42 = isset($_POST["d42"])? limpiarCadena($_POST["d42"]):"";
    $d41 = isset($_POST["d41"])? limpiarCadena($_POST["d41"]):"";
    $d31 = isset($_POST["d31"])? limpiarCadena($_POST["d31"]):"";
    $d32 = isset($_POST["d32"])? limpiarCadena($_POST["d32"]):"";
    $d33 = isset($_POST["d33"])? limpiarCadena($_POST["d33"]):"";
    $d34 = isset($_POST["d34"])? limpiarCadena($_POST["d34"]):"";
    $d35 = isset($_POST["d35"])? limpiarCadena($_POST["d35"]):"";
    $d36 = isset($_POST["d36"])? limpiarCadena($_POST["d36"]):"";
    $d37 = isset($_POST["d37"])? limpiarCadena($_POST["d37"]):"";
    $d38 = isset($_POST["d38"])? limpiarCadena($_POST["d38"]):"";
    $diagnosticos_complicaciones = isset($_POST["diagnosticos_complicaciones"])? limpiarCadena($_POST["diagnosticos_complicaciones"]):"";
    $procedimientos = isset($_POST["procedimientos"])? limpiarCadena($_POST["procedimientos"]):"";
    $prescripciones = isset($_POST["prescripciones"])? limpiarCadena($_POST["prescripciones"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if (empty($id_tratamiento)){
                $rspta=$tratamiento->insertar($id_ficha_medica, $fecha, $d18, $d17, $d16, $d15, $d14, $d13, $d12, $d11, $d21, $d22, $d23, $d24, $d25, $d26, $d27, $d28, $d48, $d47, $d46, $d45, $d44, $d43, $d42, $d41, $d31, $d32, $d33, $d34, $d35, $d36, $d37, $d38, $diagnosticos_complicaciones, $procedimientos, $prescripciones);
                echo $rspta ? "Tratamiento registrado" : "Tratamiento no se pudo registrar";
            }
            else {
                $rspta=$tratamiento->editar($id_tratamiento, $id_ficha_medica, $fecha, $d18, $d17, $d16, $d15, $d14, $d13, $d12, $d11, $d21, $d22, $d23, $d24, $d25, $d26, $d27, $d28, $d48, $d47, $d46, $d45, $d44, $d43, $d42, $d41, $d31, $d32, $d33, $d34, $d35, $d36, $d37, $d38, $diagnosticos_complicaciones, $procedimientos, $prescripciones);
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

        case 'selectSimbologia':
            require_once "../modelos/Simbologia.php";
            $simbologia = new Simbologia();
            $rspta = $simbologia->select();
            while ($reg = $rspta->fetch_object()) {
                echo '<option value=' . $reg->id_simbologia . '>' . $reg->nombre . '</option>';
            }
        break;
    }

?>