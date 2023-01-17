var tabla;

//Función que se ejecutar al inicio
function init(){
    mostrarform(false);
	listar();

    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	})
}

//Funci+on limpiar
function limpiar(){
    $("#id_simbologia").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
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
                    url: '../ajax/simbologia.php?op=listar',
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
        url: "../ajax/simbologia.php?op=guardaryeditar",
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

function mostrar(id_simbologia){
    $.post("../ajax/simbologia.php?op=mostrar",{id_simbologia : id_simbologia}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#id_simbologia").val(data.id_simbologia);
        $("#nombre").val(data.nombre);
        $("#descripcion").val(data.descripcion);
    })
}

//Función para desactivar registros
function desactivar(id_simbologia){
    bootbox.confirm("¿Está seguro de desactivar la simbologia?", function(result){
        if(result){
            $.post("../ajax/simbologia.php?op=desactivar", {id_simbologia : id_simbologia}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(id_simbologia){
    bootbox.confirm("¿Está seguro de activar la simbologia?", function(result){
        if(result){
            $.post("../ajax/simbologia.php?op=activar", {id_simbologia : id_simbologia}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para eliminar registros
function eliminar(id_simbologia){
    bootbox.confirm("¿Está seguro de eliminar la simbologia?", function(result){
        if(result){
            $.post("../ajax/simbologia.php?op=eliminar", {id_simbologia : id_simbologia}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();