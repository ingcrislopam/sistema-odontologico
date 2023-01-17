var tabla;

//Función que se ejecutar al inicio
function init(){
    mostrarform(false);
	listar();

    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	})

    //Cargamos los items al select paciente
    $.post("../ajax/tratamiento.php?op=selectFichaMedica", function(r){
        $("#id_ficha_medica").html(r);
        $('#id_ficha_medica').selectpicker('refresh');
    });
}

//Funci+on limpiar
function limpiar(){
    $("#id_tratamiento").val("");
    $("#id_ficha_medica").val("");
    $("#fecha").val("");
    $("#diagnosticos_complicaciones").val("");
    $("#procedimientos").val("");
    $("#prescripciones").val("");
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
                    url: '../ajax/tratamiento.php?op=listar',
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
        url: "../ajax/tratamiento.php?op=guardaryeditar",
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

function mostrar(id_tratamiento){
    $.post("../ajax/tratamiento.php?op=mostrar",{id_tratamiento : id_tratamiento}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#id_tratamiento").val(data.id_tratamiento);
        $("#id_ficha_medica").val(data.id_ficha_medica);
        $('#id_ficha_medica').selectpicker('refresh');
        $("#fecha").val(data.fecha);
        $("#diagnosticos_complicaciones").val(data.diagnosticos_complicaciones);
        $("#procedimientos").val(data.procedimientos);
        $("#prescripciones").val(data.prescripciones);
    })
}

//Función para desactivar registros
function desactivar(id_tratamiento){
    bootbox.confirm("¿Está seguro de desactivar el tratamiento?", function(result){
        if(result){
            $.post("../ajax/tratamiento.php?op=desactivar", {id_tratamiento : id_tratamiento}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id_tratamiento){
    bootbox.confirm("¿Está seguro de activar el tratamiento?", function(result){
        if(result){
            $.post("../ajax/tratamiento.php?op=activar", {id_tratamiento : id_tratamiento}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para eliminar registros
function eliminar(id_tratamiento){
    bootbox.confirm("¿Está seguro de eliminar el tratamiento?", function(result){
        if(result){
            $.post("../ajax/tratamiento.php?op=eliminar", {id_tratamiento : id_tratamiento}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();