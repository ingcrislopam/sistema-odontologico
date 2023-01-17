<?php
    require_once "../modelos/Paciente.php";

    $paciente = new Paciente();

    $id_paciente = isset($_POST["id_paciente"])? limpiarCadena($_POST["id_paciente"]):"";
    $cedula = isset($_POST["cedula"])? limpiarCadena($_POST["cedula"]):"";
    $nombres = isset($_POST["nombres"])? limpiarCadena($_POST["nombres"]):"";
    $apellidos = isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
    $direccion = isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
    $fecha_nacimiento = isset($_POST["fecha_nacimiento"])? limpiarCadena($_POST["fecha_nacimiento"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if (empty($id_paciente)){
                $rspta=$paciente->insertar($cedula, $nombres, $apellidos, $direccion, $fecha_nacimiento);
                echo $rspta ? "Paciente registrado" : "Paciente no se pudo registrar";
            }
            else {
                $rspta=$paciente->editar($id_paciente, $cedula, $nombres, $apellidos, $direccion, $fecha_nacimiento);
                echo $rspta ? "Paciente actualizado" : "Paciente no se pudo actualizar";
            }
        break;

        case 'eliminar':
            $rspta = $paciente->eliminar($id_paciente);
            echo $rspta ? "Paciente eliminado" : "Paciente no se pudo eliminar";
        break;

        case 'desactivar':
            $rspta = $paciente->desactivar($id_paciente);
            echo $rspta ? "Paciente desactivado" : "Paciente no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $paciente->activar($id_paciente);
            echo $rspta ? "Paciente activado" : "Paciente no se pudo activar";
        break;

        case 'mostrar':
            $rspta = $paciente->mostrar($id_paciente);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta = $paciente->listar();
            //Vamos a declarar un array
            $data = Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_paciente.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_paciente.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->id_paciente.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id_paciente.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->cedula,
                    "2"=>$reg->nombres,
                    "3"=>$reg->apellidos,
                    "4"=>$reg->direccion,
                    "5"=>$reg->edad,
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
    }

?>