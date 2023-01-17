var tabla;

//Función que se ejecutar al inicio
function init(){
    mostrarform(false);
	listar();

    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	})

    //Cargamos los items al select paciente
    $.post("../ajax/ficha_medica.php?op=selectPaciente", function(r){
        $("#id_paciente").html(r);
        $('#id_paciente').selectpicker('refresh');
    });
}

//Funci+on limpiar
function limpiar(){
    $("#id_ficha_medica").val("");
    $("#id_paciente").val("");
    $("#fecha").val("");
    $("#motivo_consulta").val("");
    $("#enfermedad_problema_actual").val("");
    $("#antecedentes_personales_familiares").val("");
    $("#signos_vitales").val("");
    $("#examen_sistema_estomatognatico").val("");
    $("#planes_diagnostico").val("");
    $("#diagnostico").val("");
}

//Función mostrar formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
    }
    else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
    }
}

//Función cancelarform
function cancelarform(){
    limpiar();
    mostrarform(false);
}

//Función listar
function listar(){
    tabla = $('#tbllistado').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax":
                {
                    url: '../ajax/ficha_medica.php?op=listar',
                    type : "get",
                    dataType : "json",
                    error: function(e){
                        console.log(e.responseText);
                    } 
                },
        "bDestroy": true,
        "iDisplayLength": 5,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }).DataTable();
}

//Función para guardar o editar
function guardaryeditar(e){
    e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/ficha_medica.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

        success: function(datos){
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

function mostrar(id_ficha_medica){
    $.post("../ajax/ficha_medica.php?op=mostrar",{id_ficha_medica : id_ficha_medica}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#id_ficha_medica").val(data.id_ficha_medica);
        $("#id_paciente").val(data.id_paciente);
        $('#id_paciente').selectpicker('refresh');
        $("#fecha").val(data.fecha);
        $("#motivo_consulta").val(data.motivo_consulta);
        $("#enfermedad_problema_actual").val(data.enfermedad_problema_actual);
        $("#antecedentes_personales_familiares").val(data.antecedentes_personales_familiares);
        $("#signos_vitales").val(data.signos_vitales);
        $("#examen_sistema_estomatognatico").val(data.examen_sistema_estomatognatico);
        $("#planes_diagnostico").val(data.planes_diagnostico);
        $("#diagnostico").val(data.diagnostico);
    })
}

//Función para desactivar registros
function desactivar(id_ficha_medica){
    bootbox.confirm("¿Está seguro de desactivar la ficha medica?", function(result){
        if(result){
            $.post("../ajax/ficha_medica.php?op=desactivar", {id_ficha_medica : id_ficha_medica}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id_ficha_medica){
    bootbox.confirm("¿Está seguro de activar la ficha medica?", function(result){
        if(result){
            $.post("../ajax/ficha_medica.php?op=activar", {id_ficha_medica : id_ficha_medica}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para eliminar registros
function eliminar(id_ficha_medica){
    bootbox.confirm("¿Está seguro de eliminar la ficha medica?", function(result){
        if(result){
            $.post("../ajax/ficha_medica.php?op=eliminar", {id_ficha_medica : id_ficha_medica}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();