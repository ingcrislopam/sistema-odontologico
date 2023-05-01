<?php
    require_once "../modelos/Ficha_medica.php";
    // nuevo codigo
    require_once "../modelos/Tratamiento.php";
    // nuevo codigo

    $ficha_medica = new Ficha_medica();
    $tratamiento = new Tratamiento();

    $id_ficha_medica = isset($_POST["id_ficha_medica"])? limpiarCadena($_POST["id_ficha_medica"]):"";
    $id_paciente = isset($_POST["id_paciente"])? limpiarCadena($_POST["id_paciente"]):"";
    $fecha = isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
    $motivo_consulta = isset($_POST["motivo_consulta"])? limpiarCadena($_POST["motivo_consulta"]):"";
    $enfermedad_problema_actual = isset($_POST["enfermedad_problema_actual"])? limpiarCadena($_POST["enfermedad_problema_actual"]):"";
    $antecedentes_personales_familiares = isset($_POST["antecedentes_personales_familiares"])? limpiarCadena($_POST["antecedentes_personales_familiares"]):"";
    $signos_vitales = isset($_POST["signos_vitales"])? limpiarCadena($_POST["signos_vitales"]):"";
    $examen_sistema_estomatognatico = isset($_POST["examen_sistema_estomatognatico"])? limpiarCadena($_POST["examen_sistema_estomatognatico"]):"";
    $planes_diagnostico = isset($_POST["planes_diagnostico"])? limpiarCadena($_POST["planes_diagnostico"]):"";
    $diagnostico = isset($_POST["diagnostico"])? limpiarCadena($_POST["diagnostico"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if (empty($id_ficha_medica)){
                $rspta=$ficha_medica->insertar($id_paciente, $fecha, $motivo_consulta, $enfermedad_problema_actual, $antecedentes_personales_familiares, $signos_vitales, $examen_sistema_estomatognatico, $planes_diagnostico, $diagnostico);
                echo $rspta ? "Ficha medica registrada" : "Ficha medica no se pudo registrar";
            }
            else {
                $rspta=$ficha_medica->editar($id_ficha_medica, $id_paciente, $fecha, $motivo_consulta, $enfermedad_problema_actual, $antecedentes_personales_familiares, $signos_vitales, $examen_sistema_estomatognatico, $planes_diagnostico, $diagnostico);
                echo $rspta ? "Ficha medica actualizada" : "Ficha medica no se pudo actualizar";
            }
        break;

        case 'eliminar':
            $rspta = $ficha_medica->eliminar($id_ficha_medica);
            echo $rspta ? "Ficha medica eliminada" : "Ficha medica no se pudo eliminar";
        break;

        case 'desactivar':
            $rspta = $ficha_medica->desactivar($id_ficha_medica);
            echo $rspta ? "Ficha medica desactivada" : "Ficha medica no se pudo desactivar";
        break;

        case 'activar':
            $rspta = $ficha_medica->activar($id_ficha_medica);
            echo $rspta ? "Ficha medica activada" : "Ficha medica no se pudo activar";
        break;

        case 'mostrar':
            $rspta = $ficha_medica->mostrar($id_ficha_medica);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta = $ficha_medica->listar();
            //Vamos a declarar un array
            $data = Array();
           
            while ($reg=$rspta->fetch_object()){
                $rspta_t = $tratamiento->mostrar_tratamientos($reg->id_ficha_medica);
                $templist = "";
                while($trat=$rspta_t->fetch_object()){
                    $templist .= "<b>Fecha: </b>" . $trat->fecha . " -- <b>Diagnostico: </b>" . $trat->diagnosticos_complicaciones . "\n";
                }
                $data[]=array(
                    "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_ficha_medica.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id_ficha_medica.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->id_ficha_medica.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id_ficha_medica.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->nombresPaciente,
                    "2"=>$reg->fecha,
                    "3"=>$reg->motivo_consulta,
                    "4"=>"<p style='white-space: pre;'>$templist</p>",
                    "5"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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

        case 'selectPaciente':
            require_once "../modelos/Paciente.php";
            $paciente = new Paciente();
            $rspta = $paciente->select();
            while ($reg = $rspta->fetch_object()) {
                echo '<option value=' . $reg->id_paciente . '>' . $reg->nomPaciente . '</option>';
            }
        break;
    }

?>