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

    //Cargamos los items al select d18
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d18").html(r);
        $('#d18').selectpicker('refresh');
    });

    //Cargamos los items al select d17
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d17").html(r);
        $('#d17').selectpicker('refresh');
    });

    //Cargamos los items al select d16
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d16").html(r);
        $('#d16').selectpicker('refresh');
    });

    //Cargamos los items al select d15
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d15").html(r);
        $('#d15').selectpicker('refresh');
    });

    //Cargamos los items al select d14
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d14").html(r);
        $('#d14').selectpicker('refresh');
    });

    //Cargamos los items al select d13
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d13").html(r);
        $('#d13').selectpicker('refresh');
    });

    //Cargamos los items al select d12
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d12").html(r);
        $('#d12').selectpicker('refresh');
    });

    //Cargamos los items al select d11
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d11").html(r);
        $('#d11').selectpicker('refresh');
    });

    //Cargamos los items al select d21
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d21").html(r);
        $('#d21').selectpicker('refresh');
    });

    //Cargamos los items al select d22
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d22").html(r);
        $('#d22').selectpicker('refresh');
    });

    //Cargamos los items al select d23
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d23").html(r);
        $('#d23').selectpicker('refresh');
    });

    //Cargamos los items al select d24
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d24").html(r);
        $('#d24').selectpicker('refresh');
    });

    //Cargamos los items al select d25
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d25").html(r);
        $('#d25').selectpicker('refresh');
    });

    //Cargamos los items al select d26
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d26").html(r);
        $('#d26').selectpicker('refresh');
    });

    //Cargamos los items al select d27
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d27").html(r);
        $('#d27').selectpicker('refresh');
    });

    //Cargamos los items al select d28
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d28").html(r);
        $('#d28').selectpicker('refresh');
    });

    //Cargamos los items al select d48
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d48").html(r);
        $('#d48').selectpicker('refresh');
    });

    //Cargamos los items al select d47
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d47").html(r);
        $('#d47').selectpicker('refresh');
    });

    //Cargamos los items al select d46
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d46").html(r);
        $('#d46').selectpicker('refresh');
    });

    //Cargamos los items al select d45
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d45").html(r);
        $('#d45').selectpicker('refresh');
    });

    //Cargamos los items al select d44
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d44").html(r);
        $('#d44').selectpicker('refresh');
    });

    //Cargamos los items al select d43
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d43").html(r);
        $('#d43').selectpicker('refresh');
    });

    //Cargamos los items al select d42
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d42").html(r);
        $('#d42').selectpicker('refresh');
    });

    //Cargamos los items al select d41
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d41").html(r);
        $('#d41').selectpicker('refresh');
    });

    //Cargamos los items al select d31
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d31").html(r);
        $('#d31').selectpicker('refresh');
    });

    //Cargamos los items al select d32
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d32").html(r);
        $('#d32').selectpicker('refresh');
    });

    //Cargamos los items al select d33
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d33").html(r);
        $('#d33').selectpicker('refresh');
    });

    //Cargamos los items al select d34
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d34").html(r);
        $('#d34').selectpicker('refresh');
    });

    //Cargamos los items al select d35
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d35").html(r);
        $('#d35').selectpicker('refresh');
    });

    //Cargamos los items al select d36
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d36").html(r);
        $('#d36').selectpicker('refresh');
    });

    //Cargamos los items al select d37
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d37").html(r);
        $('#d37').selectpicker('refresh');
    });

    //Cargamos los items al select d38
    $.post("../ajax/tratamiento.php?op=selectSimbologia", function(r){
        $("#d38").html(r);
        $('#d38').selectpicker('refresh');
    });
}

//Funci+on limpiar
function limpiar(){
    $("#id_tratamiento").val("");
    $("#id_ficha_medica").val("");
    $("#fecha").val("");
    $("#d18").val("");
    $("#d17").val("");
    $("#d16").val("");
    $("#d15").val("");
    $("#d14").val("");
    $("#d13").val("");
    $("#d12").val("");
    $("#d11").val("");
    $("#d21").val("");
    $("#d22").val("");
    $("#d23").val("");
    $("#d24").val("");
    $("#d25").val("");
    $("#d26").val("");
    $("#d27").val("");
    $("#d28").val("");
    $("#d48").val("");
    $("#d47").val("");
    $("#d46").val("");
    $("#d45").val("");
    $("#d44").val("");
    $("#d43").val("");
    $("#d42").val("");
    $("#d41").val("");
    $("#d31").val("");
    $("#d32").val("");
    $("#d33").val("");
    $("#d34").val("");
    $("#d35").val("");
    $("#d36").val("");
    $("#d37").val("");
    $("#d38").val("");
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
        $("#d18").val(data.d18);
        $('#d18').selectpicker('refresh');
        $("#d17").val(data.d17);
        $('#d17').selectpicker('refresh');
        $("#d16").val(data.d16);
        $('#d16').selectpicker('refresh');
        $("#d15").val(data.d15);
        $('#d15').selectpicker('refresh');
        $("#d14").val(data.d14);
        $('#d14').selectpicker('refresh');
        $("#d13").val(data.d13);
        $('#d13').selectpicker('refresh');
        $("#d12").val(data.d12);
        $('#d12').selectpicker('refresh');
        $("#d11").val(data.d11);
        $('#d11').selectpicker('refresh');
        $("#d21").val(data.d21);
        $('#d21').selectpicker('refresh');
        $("#d22").val(data.d22);
        $('#d22').selectpicker('refresh');
        $("#d23").val(data.d23);
        $('#d23').selectpicker('refresh');
        $("#d24").val(data.d24);
        $('#d24').selectpicker('refresh');
        $("#d25").val(data.d25);
        $('#d25').selectpicker('refresh');
        $("#d26").val(data.d26);
        $('#d26').selectpicker('refresh');
        $("#d27").val(data.d27);
        $('#d27').selectpicker('refresh');
        $("#d28").val(data.d28);
        $('#d28').selectpicker('refresh');
        $("#d48").val(data.d48);
        $('#d48').selectpicker('refresh');
        $("#d47").val(data.d47);
        $('#d47').selectpicker('refresh');
        $("#d46").val(data.d46);
        $('#d46').selectpicker('refresh');
        $("#d45").val(data.d45);
        $('#d45').selectpicker('refresh');
        $("#d44").val(data.d44);
        $('#d44').selectpicker('refresh');
        $("#d43").val(data.d43);
        $('#d43').selectpicker('refresh');
        $("#d42").val(data.d42);
        $('#d42').selectpicker('refresh');
        $("#d41").val(data.d41);
        $('#d41').selectpicker('refresh');
        $("#d31").val(data.d31);
        $('#d31').selectpicker('refresh');
        $("#d32").val(data.d32);
        $('#d32').selectpicker('refresh');
        $("#d33").val(data.d33);
        $('#d33').selectpicker('refresh');
        $("#d34").val(data.d34);
        $('#d34').selectpicker('refresh');
        $("#d35").val(data.d35);
        $('#d35').selectpicker('refresh');
        $("#d36").val(data.d36);
        $('#d36').selectpicker('refresh');
        $("#d37").val(data.d37);
        $('#d37').selectpicker('refresh');
        $("#d38").val(data.d38);
        $('#d38').selectpicker('refresh');
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