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
    $("#idpermiso").val("");
    $("#nombre").val("");
}

//Función mostrar formulario
function mostrarform(flag){
    limpiar();
    if(flag){
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }
    else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
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
                    url: '../ajax/permiso.php?op=listar',
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
        url: "../ajax/permiso.php?op=guardaryeditar",
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

function mostrar(idpermiso){
    $.post("../ajax/permiso.php?op=mostrar",{idpermiso : idpermiso}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idpermiso").val(data.idpermiso);
        $("#nombre").val(data.nombre);
    })
}

//Función para desactivar registros
function desactivar(idpermiso){
    bootbox.confirm("¿Está seguro de desactivar el permiso?", function(result){
        if(result){
            $.post("../ajax/permiso.php?op=desactivar", {idpermiso : idpermiso}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idpermiso){
    bootbox.confirm("¿Está seguro de activar el permiso?", function(result){
        if(result){
            $.post("../ajax/permiso.php?op=activar", {idpermiso : idpermiso}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para eliminar registros
function eliminar(idpermiso){
    bootbox.confirm("¿Está seguro de eliminar el permiso?", function(result){
        if(result){
            $.post("../ajax/permiso.php?op=eliminar", {idpermiso : idpermiso}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();