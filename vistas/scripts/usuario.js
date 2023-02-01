var tabla;

//Función que se ejecutar al inicio
function init(){
    mostrarform(false);
	listar();

    $("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	})

    //Mostramos los permisos
	$.post("../ajax/usuario.php?op=permisos&id=",function(r){
        $("#permisos").html(r);
    });
}

//Funci+on limpiar
function limpiar(){
    $("#idusuario").val("");
    $("#nombres").val("");
    $("#apellidos").val("");
    $("#tipo_documento").val("");
    $("#num_documento").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#email").val("");
    $("#cargo").val("");
    $("#login").val("");
    $("#clave").val("");
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
                    url: '../ajax/usuario.php?op=listar',
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
        url: "../ajax/usuario.php?op=guardaryeditar",
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

function mostrar(idusuario){
    $.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idusuario").val(data.idusuario);
        $("#nombres").val(data.nombres);
        $("#apellidos").val(data.apellidos);
        $("#tipo_documento").val(data.tipo_documento);
        $("#tipo_documento").selectpicker('refresh');
        $("#num_documento").val(data.num_documento);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#email").val(data.email);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
    });
    $.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
        $("#permisos").html(r);
    });
}

//Función para desactivar registros
function desactivar(idusuario){
    bootbox.confirm("¿Está seguro de desactivar el usuario?", function(result){
        if(result){
            $.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para activar registros
function activar(idusuario){
    bootbox.confirm("¿Está seguro de activar el usuario?", function(result){
        if(result){
            $.post("../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

//Función para eliminar registros
function eliminar(idusuario){
    bootbox.confirm("¿Está seguro de eliminar el usuario?", function(result){
        if(result){
            $.post("../ajax/usuario.php?op=eliminar", {idusuario : idusuario}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();