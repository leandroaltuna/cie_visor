
function goToByScroll(id){

    id = id.replace("link", "");

    $('html,body').animate({
        scrollTop: $("#"+id).offset().top},
        'slow');
}



function getObjects(obj, key, val) {
    var objects = [];
    for (var i in obj) {
        if (!obj.hasOwnProperty(i)) continue;
        if (typeof obj[i] == 'object') {
            objects = objects.concat(getObjects(obj[i], key, val));
        } else if (i == key && obj[key] == val) {
            objects.push(obj);
        }
    }
    return objects;
}


function inArray(needle, haystack) {
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}
function dig_especial(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

$(function(){



$( "#impre_buton" ).hide();

$('a.toggles').click(function(e) {
    e.preventDefault();
    $('a.toggles i').toggleClass('icon-chevron-left icon-chevron-right');

    $('#ap-sidebar').animate({
        width: 'toggle'
    }, 0);
    $('#ap-content').toggleClass('span12 span10');
    $('#ap-content').toggleClass('no-sidebar');
});


$("input:checkbox.seg-cp-checkbox").change(function() {
    if (!$(this).is(':checked')) {
        for (var i=0; i<gmarkers.length; i++) {

          if (gmarkers[i].mycategory.substring(0, 2) == $(this).attr('value')) {
            gmarkers[i].setVisible(false);
          }
        }
    }else{
        var form_data = {
            csrf_token_c: CI.cct,
            code: $(this).val(),
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/cp_ajax/get_cp/"+$(this).val(),
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){

                $.each(json_data, function(i, data){
	                var lat = data.LATITUD;
	                var lng = data.LONGITUD;
	                var point = new google.maps.LatLng(lat,lng);
	                var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>SITUACIÓN GEOGRÁFICA - " + data.CENTRO_POBLADO + "</h3><p><b>DEPARTAMENTO:</b> "+data.DEPARTAMENTO+"</p><p><b>PROVINCIA:</b> "+data.PROVINCIA+"</p><p><b>DISTRITO:</b> "+data.DISTRITO+"</p></div></div>";
	                var marker = createMarkerLEN(point, data.CENTRO_POBLADO, html, data.CCPP);
            	});
            }
        });

    }
});


$("input:checkbox.piloto-cp-checkbox").change(function() {
    if (!$(this).is(':checked')) {
        for (var i=0; i<gmarkers.length; i++) {
          if (gmarkers[i].mycategory == '1') {
            gmarkers[i].setVisible(false);
          }
        }
    }else{
        var form_data = {
            csrf_token_c: CI.cct,
            ajax:1
        };

        $.ajax({
            url: CI.base_url + "ajax/cp_ajax/get_cp_piloto",
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                $.each(json_data, function(i, data){
                    var lat = data.LATITUD;
                    var lng = data.LONGITUD;
                    var point = new google.maps.LatLng(lat,lng);
                    var html = "<div class='marker activeMarker'><div class='markerInfo activeInfo' style='display: block;'><h3>CCPP - " + data.CENTRO_POBLADO + "</h3><p><b>DEPARTAMENTO:</b> "+data.DEPARTAMENTO+"</p><p><b>PROVINCIA:</b> "+data.PROVINCIA+"</p><p><b>DISTRITO:</b> "+data.DISTRITO+"</p><p><b>POBLACION:</b> "+data.POBLACION+"</p><p><b>AREA:</b> "+data.AREA+"</p></div></div>";
                    var marker = createMarkerLEN(point, data.CENTRO_POBLADO, html, '1',data.DEPARTAMENTO);
                });
            }
        });

    }
});

$("#departamento2, #departamento3").change(function(event) {
        var sel = null;
        var selname = null;
        var val = null;
        var depa = null;
        switch(event.target.id){

            case 'departamento2':
                depa = $("#departamento2").val();
                sel = $("#provincia2");
                selname = "#provincia2";
                val= $("#provincia2").val();

                break;
            case 'departamento3':

                 depa = $("#departamento3").val();
                sel = $("#provincia3");
                selname = "#provincia3";
                val= $("#provincia3").val();

                break;
        }
        var form_data = {
            code: $(this).val(),
            ajax:1
        };
        if (depa>0) {


            $.ajax({
                url: CI.base_url + "index.php/convocatoria/registro/get_ajax_prov/" + $(this).val(),
                type:'POST',
                data:form_data,
                dataType:'json',
                success:function(json_data){
                    sel.empty();
                    $.each(json_data, function(i, data){
                        sel.append('<option value="' + data.CCPP + '">' + data.Nombre + '</option>');
                    });

                    $(selname + " option[value=" + val + "]").attr('selected', 'selected');

                    sel.change();
                }
            });
        };
}).change();

$("#nivel_instruccion").change(function(event){
    var nivel = $("#nivel_instruccion").val();
    var json_data=null;
    var selname = "#grado_alcanzado";
    var val = $("#grado_alcanzado").val();
    switch(nivel){
        case '4' :
            json_data = [{"id": "1","nombre" : "ESTUDIANTE"},
                    {"id": "2","nombre" : "EGRESADO"},
                    {"id": "3","nombre" : "BACHILLER"},
                    {"id": "4","nombre" : "TITULADO"},
                    {"id": "5","nombre" : "MAGISTER"},
                    {"id": "6","nombre" : "DOCTORADO"},
                    {"id": "7","nombre" : "ESTUDIOS DE MAESTRIA"},
                    {"id": "8","nombre" : "ESTUDIOS DE DOCTORADO"}];
                    $("#universidad").removeAttr('disabled');
                    $('#centro_estudios').attr("disabled", "disabled");
            break;
        case '5' :
            json_data =[{"id": "1","nombre" : "ESTUDIANTE"},
                    {"id": "2","nombre" : "EGRESADO"},
                    {"id": "4","nombre" : "TITULADO"}];
            $("#universidad").attr("disabled", "disabled");
            $("#centro_estudios").removeAttr('disabled');

            break;
    }
    if (json_data!=null) {
        $("#grado_alcanzado").empty();
        $.each(json_data, function(i, data){
                        $("#grado_alcanzado").append('<option value="' + data.id + '">' + data.nombre + '</option>');
        });

        $(selname + " option[value=" + val + "]").attr('selected', 'selected');
    }
}).change();

$("#grado_alcanzado").change(function(event){
    var nivel = $("#grado_alcanzado").val();
    var selname = "#grado_alcanzado";
    var val = $("#grado_alcanzado").val();
    switch(nivel){
        case '2' :
            $("#fecha_exp").removeAttr('disabled');
            $("#n_registro").removeAttr('disabled');
            break;
        case '3' :

            $("#fecha_exp").removeAttr('disabled');
            $("#n_registro").removeAttr('disabled');

            break;

        case '4' :

            $("#fecha_exp").removeAttr('disabled');
            $("#n_registro").removeAttr('disabled');

            break;
        case '5' :

            $("#fecha_exp").removeAttr('disabled');
            $("#n_registro").removeAttr('disabled');

            break;

        case '6' :
            $("#fecha_exp").removeAttr('disabled');
            $("#n_registro").removeAttr('disabled');
            break;

        default :

            $('#fecha_exp').attr("disabled", "disabled");
            $('#n_registro').attr("disabled", "disabled");
            break;
    }

}).change();


$("#departamento").change(function(event) {

        var code_odei = $(this).val();
        $("#departamentocoddepe option[value=" + code_odei + "]").attr('selected', 'selected');

        var coddepe=$('#departamentocoddepe').find('option:selected').text();
        var sele = $('#provincia_postu').val();
        var form_data = {
            code: coddepe,
            ajax:1
        };
        $.ajax({
            url: CI.base_url + "index.php/convocatoria/registro/get_ajax_prov_odei/" + coddepe,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){

                $("#provincia_postu").empty();
                $.each(json_data, function(i, data){
                    $("#provincia_postu").append('<option value="' + data.CCPP + '">' + data.Nombre + '</option>');
                });
                $("#provincia_postu  option[value=" + sele + "]").attr('selected', 'selected');
            }
        });
}).change();

$("#pais").change(function(event) {

        var pais = $(this).val();
        switch(pais){

            case '4028' :

                $("#departamento2").removeAttr('disabled');
                $("#provincia2").removeAttr('disabled');
                $("#distrito2").removeAttr('disabled');
                break;

            default :

                $('#departamento2').attr("disabled", "disabled");
                $('#provincia2').attr("disabled", "disabled");
                $('#distrito2').attr("disabled", "disabled");
                $('#provincia2').empty();
                $('#distrito2').empty();
                break;
        }
}).change();


$("#provincia2, #provincia3").change(function(event) {
        var sel = null;
        var dep = null;
         var selname = null;
         var val = null;
        switch(event.target.id){
            case 'provincia2':
                sel = $("#distrito2");
                dep = $("#departamento2");
                 selname = "#distrito2";
                val = $("#distrito2").val();
                break;
            case 'provincia3':
                sel = $("#distrito3");

                dep = $("#departamento3");
                selname = "#distrito3";
                val = $("#distrito3").val();
                break;
        }
        var form_data1 = {
            provincia: $(this).val(),
            departamento: dep.val(),
            ajax:1
        };
        $.ajax({
            url: CI.base_url + "index.php/convocatoria/registro/get_ajax/" + $(this).val() + "/" + dep.val(),
            type:'POST',
            data:form_data1,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                $.each(json_data, function(i, data){
                    sel.append('<option value="' + data.CCDI + '">' + data.Nombre + '</option>');
                });
                $(selname + " option[value=" + val + "]").attr('selected', 'selected');
            }
        });
}).change();

$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",

     date: "Ingrese una fecha válida",

     digits: "Solo se permiten números",

});
$.validator.addMethod("year", function(value, element, param) {
    return this.optional(element) || ( value > 1969 && value <= CI.year ) ;
}, "Ingrese un año válido");

$.validator.addMethod("nacimiento", function(value, element) {
}, "Ingrese un año válido");

$.validator.addMethod("valueEquals", function (value, element, param) {
    return param == value;
}, "Acepta la declaración de veracidad?");

$.validator.addMethod("peruDate",function(value, element) {
    return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
}, "Ingrese fecha: dd-mm-yyyy");

 $.validator.addMethod("validName", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð .-]+$/.test(value);
}, "Caracteres no permitidos");
 $.validator.addMethod("validName2", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð .-123456789]+$/.test(value);
}, "Caracteres no permitidos");
 $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Solo se permiten letras");

 $.validator.addMethod("exactlength", function(value, element, param) {
    return this.optional(element) || value.length == param;
}, jQuery.format("Ingrese {0} caracteres."));

 $.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg != value;
}, "Seleccione un valor");




$('#participo').change(function() {
    var ug = $('#proyectos_inei, #ultimo_ano, #cargos_inei, #ultimo_cargo');
    if($(this).val() == 1){
        ug.removeAttr('disabled');
    }else{
        ug.attr("disabled", "disabled");
    }
}).change();



$("#conv_registro").validate({
    rules: {
        declaracion:{
            required: true,
            valueEquals: 1,
         },
        fecha_exp:{
            required:true,
        },
        n_registro:{
            required:true,
            validName2: true,
        },
        ap_paterno: {
            required: true,
            validName: true,
         },
        ap_materno: {
            required: true,
            validName: true,
         },
        nombre1: {
            required: true,
            validName: true,
         },
        nombre2:{
            validName: true,
         },
        fecha_nac:{
            required: true,

         },
        nombre_via:{

           required: true,
           validName2: true
        },
        nro: {
            required:false,
            number:true,
            maxlength: 6
        },
        km: {
            required:false,
            number:true,
            maxlength: 6
        },
        mz: {
            required:false,
            validName2: true,
            maxlength: 6
        },
        interior: {
            required:false,
            maxlength: 6,
            validName2: true
        },
        dpto: {
            required:false,
            maxlength: 6,
            validName2: true
        },
        lote: {
            required:false,
            maxlength: 6,
            validName2: true
        },
        piso: {
            required:false,
            number:true,
            maxlength: 6
        },
        nombre_zona:{
           required:true,
           validName2: true
        },
        centro_estudios:{
           required:false,
           validName2: true
        },
        nro_tel:{
            required: false,
            digits: true,
         },
        nro_cel:{
            required: false,
            digits: true,
         },
        email:{
            required:true,
            email: true,
         },
        dni:{
            required: true,
            digits: true,
            exactlength: 8,
         },
        dni2:{
            required: true,
            digits: true,
            exactlength: 8,
            equalTo: "#dni",
         },
         periodo_alcanzado:{
            required: true,
            digits: true,
         },
        ruc:{

            digits: true,
            exactlength: 11,
         },
       ruc2:{

            digits: true,
            exactlength: 11,
            equalTo: "#ruc",
         },
          proyectos_inei: {
            valueNotEquals: -1,
         },
        pais: {
            valueNotEquals: -1,
         },
          ultimo_cargo: {
            valueNotEquals: -1,
         },
         centro_estudios:{
            required:true,
         },
        nivel_instruccion: {
            valueNotEquals: -1,
         },
        tipo_periodo: {
            valueNotEquals: -1,
         },
        t_via: {
            valueNotEquals: -1,
         },
        t_zona: {
            valueNotEquals: -1,
         },
         ocupacion: {
            valueNotEquals: -1,
        },
         participo: {
            valueNotEquals: -1,
        },
        disposicion:{
          valueNotEquals: -1,
        },

        grado_alcanzado:{
          valueNotEquals: -1,
        },
        universidad:{
            valueNotEquals: -1,
        },
        ofimatica:{
          valueNotEquals: -1,
        },

        velocidadpc:{
          valueNotEquals: -1,
        },

        impedimento:{
          valueNotEquals: -1,
        },
        cargo:{
          valueNotEquals: -1,
        },
        sexo: {
                 valueNotEquals: -1,
            },
        estado_civil: {
                 valueNotEquals: -1,
            },
        departamento: {
                 valueNotEquals: -1,
            },

        departamento2: {
                 valueNotEquals: -1,
            },
        provincia2: {
                 valueNotEquals: -1,
            },
        distrito2: {
                 valueNotEquals: -1,
            },
        departamento3: {
                 valueNotEquals: -1,
            },
        provincia3: {
                 valueNotEquals: -1,
            },
        distrito3: {
                 valueNotEquals: -1,
            },
        expe_gen_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },
        expe_gen_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
                 max: 12
            },
        expe_trab_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },
        expe_trab_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
                 max: 12
            },
        expe_manejo_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },
        expe_manejo_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
                 max: 12
            },
        ultimo_ano: {
                required:true,
                year:true,
                digits: true,
                exactlength: 4,
            },
    },
    messages: {


        declaracion:{
            valueEquals: "Acepta los términos?",
         },
        fecha_exp:{
            required: " Seleccione la fecha",
        },
        n_registro:{
            required:" Ingrese un número de registro",
        },
         cargo: {
            valueNotEquals: "Seleccione cargo",
         },
        ap_paterno: {
            required: "Ingresa Ap. paterno",
         },
        ap_materno:{
            required: "Ingresa Ap. materno",
         },
        nombre1:{
            required: "Ingresa nombre",
         },
         centro_estudios:{
            required: "Ingresa un centro de estudios",
         },
        nombre_zona:{
            required: "Ingrese Nombre de zona",
         },
        nombre_via:{
            required: "Ingrese Nombre de vía",
         },
        centro_estudios:{
            required:  "Ingrese Centro de Estudios",
         },
        ocupacion: {
            valueNotEquals: "Seleccione Profesión",
         },
         participo: {
            valueNotEquals: "Seleccione un valor",
        },
        pais: {
            valueNotEquals: "Seleccione un valor",
        },
         universidad:{
            valueNotEquals: "Seleccione una universidad",
         },
        nivel_instruccion: {
            valueNotEquals: "Seleccione Nivel de Instrucción",
         },
         ultimo_cargo:{
            valueNotEquals: "Seleccione un cargo",
         },
         proyectos_inei:{
            valueNotEquals: "Seleccione un proyecto",
         },
        periodo_alcanzado: {
            required: "Seleccione Periodo alcanzado",
         },
        tipo_periodo: {
            valueNotEquals: "Seleccione Tipo de periodo",
         },
        t_via: {
            valueNotEquals: "Seleccione Tipo de vía",
         },
       t_zona: {
            valueNotEquals: "Seleccione Tipo de zona",
         },

        nro_tel:{
            required: "Ingrese teléfono",
         },
        nro_cel:{
            required: "Ingrese celular",
         },
        dni:{
            required: "Ingrese dni",
            exactlength: "dni: 8 digitos",
         },
        dni2:{
            required: "Confime dni",
            exactlength: "dni: 8 digitos",
            equalTo: "No coinciden dnis",
         },
        ruc:{
            number:"Solo números",
            exactlength: "ruc: 11 digitos",
         },
        ruc2:{
            exactlength: "ruc: 11 digitos",
            equalTo: "No coinciden rucs",
         },
        disposicion: {
            valueNotEquals: "Seleccione disposición",
         },

        sexo: {
            valueNotEquals: "Seleccione sexo",
         },
        estado_civil: {
            valueNotEquals: "Seleccione estado civil",
         },
        departamento: {
            valueNotEquals: "Seleccione departamento",
         },
           grado_alcanzado: {
            valueNotEquals: "Seleccione grado alcanzado",
         },

        departamento2: {
            valueNotEquals: "Seleccione dpto. nacimiento",
         },
        provincia2: {
            valueNotEquals: "Seleccione prov. nacimiento",
         },
        distrito2: {
            valueNotEquals: "Seleccione dist. nacimiento",
         },
        departamento3: {
            valueNotEquals: "Seleccione dpto. domicilio",
         },
        provincia3: {
            valueNotEquals: "Seleccione prov. domicilio",
         },
        distrito3: {
            valueNotEquals: "Seleccione dist. domicilio",
         },
        email: "Ingrese un email válido",
        expe_gen_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            },
        expe_gen_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
                 max : 'Ingrese un mes válido'
            },
        expe_trab_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            },
        expe_trab_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
                 max : 'Ingrese un mes válido'
            },
        expe_manejo_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            },
        expe_manejo_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
                 max : 'Ingrese un mes válido'
            },
        ultimo_ano: {
                 exactlength: 'Ingrese un año válido',
            },
        nro: {
            number:"Solo se permiten números",
        },
        km: {
             number:"Solo se permiten números",
        },
        interior: {
             number:"Solo se permiten números",
        },
        dpto: {
            number:"Solo se permiten números",
        },
        lote: {
             number:"Solo se permiten números",
        },
        piso: {
             number:"Solo se permiten números",
        },
    },
    errorPlacement: function(error, element) {
        $(element).next().after(error);
    },
    invalidHandler: function(form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
          ? 'Por favor corrige estos errores:\n'
          : 'Por favor corrige los ' + errors + ' errores.\n';
        var errors = "";
        if (validator.errorList.length > 0) {
            for (x=0;x<validator.errorList.length;x++) {
                errors += "\n\u25CF " + validator.errorList[x].message;
            }
        }
        alert(message + errors);
      }
      validator.focusInvalid();
    },
    submitHandler: function(form) {
        reg_form();
    }
});

$("#conv_update").validate({
    rules: {
        declaracion:{
            required: true,
            valueEquals: 1,
         },
         pais: {
            valueNotEquals: -1,
         },
        ap_paterno: {
            required: true,
            validName: true,
         },
        fecha_exp:{
            required:true,
        },
        ap_materno: {
            required: true,
            validName: true,
         },
        nombre1: {
            required: true,
            validName: true,
         },
        n_registro:{
            required:true,
            validName2: true,
        },
        nombre2:{
            validName: true,
         },
        fecha_nac:{
            required: true,
            peruDate: true
          //  nacimiento:true
         },
        nombre_via:{

           required: true,
           validName2: true
        },
        nro: {
            required:false,
            number:true,
            maxlength: 6
        },
        km: {
            required:false,
            number:true,
            maxlength: 6
        },
        mz: {
            required:false,
            validName2: true,
            maxlength: 6
        },
        interior: {
            required:false,
            maxlength: 6,
            validName2: true
        },
        dpto: {
            required:false,
            maxlength: 6,
            validName2: true
        },
        lote: {
            required:false,
            maxlength: 6,
            validName2: true
        },
        piso: {
            required:false,
            number:true,
            maxlength: 6
        },
        nombre_zona:{
           required:true,
           validName2: true
        },
        centro_estudios:{
           required:false,
           validName2: true
        },
        nro_tel:{
            required: false,
            digits: true,
         },
        nro_cel:{
            required: false,
            digits: true,
         },
        email:{
            required:true,
            email: true,
         },
        dni:{
            required: true,
            digits: true,
            exactlength: 8,
         },
        dni2:{
            required: true,
            digits: true,
            exactlength: 8,
            equalTo: "#dni",
         },
         periodo_alcanzado:{
            required: true,
            digits: true,
         },
        ruc:{

            digits: true,
            exactlength: 11,
         },
       ruc2:{

            digits: true,
            exactlength: 11,
            equalTo: "#ruc",
         },
          proyectos_inei: {
            valueNotEquals: -1,
         },
          ultimo_cargo: {
            valueNotEquals: -1,
         },
         centro_estudios:{
            required:true,
         },
        nivel_instruccion: {
            valueNotEquals: -1,
         },
        tipo_periodo: {
            valueNotEquals: -1,
         },
        t_via: {
            valueNotEquals: -1,
         },
        t_zona: {
            valueNotEquals: -1,
         },
        disposicion:{
          valueNotEquals: -1,
        },

        grado_alcanzado:{
          valueNotEquals: -1,
        },
        universidad:{
            valueNotEquals: -1,
        },
        ofimatica:{
          valueNotEquals: -1,
        },
        ocupacion: {
            valueNotEquals: -1,
         },

        velocidadpc:{
          valueNotEquals: -1,
        },

        impedimento:{
          valueNotEquals: -1,
        },
        cargo:{
          valueNotEquals: -1,
        },
        sexo: {
                 valueNotEquals: -1,
            },
        estado_civil: {
                 valueNotEquals: -1,
            },
        departamento: {
                 valueNotEquals: -1,
            },

        departamento2: {
                 valueNotEquals: -1,
            },
        provincia2: {
                 valueNotEquals: -1,
            },
        distrito2: {
                 valueNotEquals: -1,
            },
        departamento3: {
                 valueNotEquals: -1,
            },
        provincia3: {
                 valueNotEquals: -1,
            },
        distrito3: {
                 valueNotEquals: -1,
            },
        expe_gen_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },
        expe_gen_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
                 max: 12
            },
        expe_trab_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },
        expe_trab_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
                 max: 12
            },
        expe_manejo_a: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
            },
        expe_manejo_m: {
            required:false,
                 digits: true,
                 minlength: 1,
                 maxlength: 2,
                 max: 12
            },
        ultimo_ano: {
                required:true,
                year:true,
                digits: true,
                exactlength: 4,
            },
    },
    messages: {

       cargo: {
            valueNotEquals: "Seleccione cargo",
         },
        declaracion:{
            valueEquals: "Acepta los términos?",
         },
        ap_paterno: {
            required: "Ingresa Ap. paterno",
         },
        ap_materno:{
            required: "Ingresa Ap. materno",
         },
        nombre1:{
            required: "Ingresa nombre",
         },
        n_registro:{
            required:" Ingrese un número de registro",
        },
         centro_estudios:{
            required: "Ingresa un centro de estudios",
         },
        nombre_zona:{
            required: "Ingrese Nombre de zona",
         },
        nombre_via:{
            required: "Ingrese Nombre de vía",
         },
        centro_estudios:{
            required:  "Ingrese Centro de Estudios",
         },
        ocupacion: {
            valueNotEquals: "Seleccione Profesión",
         },
         universidad:{
            valueNotEquals: "Seleccione una universidad",
         },
        nivel_instruccion: {
            valueNotEquals: "Seleccione Nivel de Instrucción",
         },
         ultimo_cargo:{
            valueNotEquals: "Seleccione un cargo",
         },
         proyectos_inei:{
            valueNotEquals: "Seleccione un proyecto",
         },
        periodo_alcanzado: {
            required: "Seleccione Periodo alcanzado",
         },
        tipo_periodo: {
            valueNotEquals: "Seleccione Tipo de periodo",
         },
        t_via: {
            valueNotEquals: "Seleccione Tipo de vía",
         },
       t_zona: {
            valueNotEquals: "Seleccione Tipo de zona",
         },

        nro_tel:{
            required: "Ingrese teléfono",
         },
        nro_cel:{
            required: "Ingrese celular",
         },
        dni:{
            required: "Ingrese dni",
            exactlength: "dni: 8 digitos",
         },
        dni2:{
            required: "Confime dni",
            exactlength: "dni: 8 digitos",
            equalTo: "No coinciden dnis",
         },
        ruc:{
            number:"Solo números",
            exactlength: "ruc: 11 digitos",
         },
        ruc2:{
            exactlength: "ruc: 11 digitos",
            equalTo: "No coinciden rucs",
         },
        disposicion: {
            valueNotEquals: "Seleccione disposición",
         },

        sexo: {
            valueNotEquals: "Seleccione sexo",
         },
         fecha_exp:{
            required: " Seleccione la fecha",
        },
        estado_civil: {
            valueNotEquals: "Seleccione estado civil",
         },
        departamento: {
            valueNotEquals: "Seleccione departamento",
         },
           grado_alcanzado: {
            valueNotEquals: "Seleccione grado alcanzado",
         },

        departamento2: {
            valueNotEquals: "Seleccione dpto. nacimiento",
         },
        provincia2: {
            valueNotEquals: "Seleccione prov. nacimiento",
         },
        distrito2: {
            valueNotEquals: "Seleccione dist. nacimiento",
         },
        departamento3: {
            valueNotEquals: "Seleccione dpto. domicilio",
         },
          pais: {
            valueNotEquals: "Seleccione un valor",
        },
        provincia3: {
            valueNotEquals: "Seleccione prov. domicilio",
         },
        distrito3: {
            valueNotEquals: "Seleccione dist. domicilio",
         },
        email: "Ingrese un email válido",
        expe_gen_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            },
        expe_gen_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
                 max : 'Ingrese un mes válido'
            },
        expe_trab_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            },
        expe_trab_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
                 max : 'Ingrese un mes válido'
            },
        expe_manejo_a: {
                 minlength: 'Ingrese un año válido',
                 maxlength: 'Ingrese un año válido',
            },
        expe_manejo_m: {
                 minlength: 'Ingrese un mes válido',
                 maxlength: 'Ingrese un mes válido',
                 max : 'Ingrese un mes válido'
            },
        ultimo_ano: {
                 exactlength: 'Ingrese un año válido',
            },
        nro: {
            number:"Solo se permiten números",
        },
        km: {
             number:"Solo se permiten números",
        },
        interior: {
             number:"Solo se permiten números",
        },
        dpto: {
            number:"Solo se permiten números",
        },
        lote: {
             number:"Solo se permiten números",
        },
        piso: {
             number:"Solo se permiten números",
        },
    },
    errorPlacement: function(error, element) {
        $(element).next().after(error);
    },
    invalidHandler: function(form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
          ? 'Por favor corrige estos errores:\n'
          : 'Por favor corrige los ' + errors + ' errores.\n';
        var errors = "";
        if (validator.errorList.length > 0) {
            for (x=0;x<validator.errorList.length;x++) {
                errors += "\n\u25CF " + validator.errorList[x].message;
            }
        }
        alert(message + errors);
      }
      validator.focusInvalid();
    },
    submitHandler: function(form) {
        update_form();
    }
});


function reg_form(){

    var id_cargo = $('#cargo').val();
    var id_universidad= $('#universidad').val();
    var proyectos_inei= $('#proyectos_inei').val();
    var ultimo_cargo= $('#ultimo_cargo').val();
    var ultimo_ano = $('#ultimo_ano').val();

    $("#cargo_presupuestal option[value=" + id_cargo + "]").attr('selected', 'selected');
    $("#cargo_adm option[value=" + id_cargo + "]").attr('selected', 'selected');

    var cargo_presupuestal = $('#cargo_presupuestal').find('option:selected').text();
    var cargo_adm = $('#cargo_adm').find('option:selected').text();

    var id_odei = $('#departamento').val();
    $("#departamentoccdd option[value=" + id_odei + "]").attr('selected', 'selected');
    $("#departamentoccpp option[value=" + id_odei + "]").attr('selected', 'selected');
    var departamentoccdd = $('#departamentoccdd').find('option:selected').text();

    var departamentoccpp = $('#provincia_postu').val();
    id_odei = id_odei.substr(0,2);

    var departamentoccpp2=$('#departamentoccpp').find('option:selected').text();
    var registro = $('#n_registro').val();

    var form_data = $('#conv_registro').serializeArray();

    form_data.push(
        {name: 'ajax',value:1},
        {name: 'nom_dep',value:$('#departamento option:selected').text()},
        {name: 'nom_prov',value:$('#provincia option:selected').text()},
        {name: 'nom_dist',value:$('#distrito option:selected').text()},
        {name: 'nom_dep_nac',value:$('#departamento2 option:selected').text()},
        {name: 'nom_prov_nac',value:$('#provincia2 option:selected').text()},
        {name: 'nom_dist_nac',value:$('#distrito2 option:selected').text()},
        {name: 'nom_dep_dom',value:$('#departamento3 option:selected').text()},
        {name: 'nom_prov_dom',value:$('#provincia3 option:selected').text()},
        {name: 'nom_dist_dom',value:$('#distrito3 option:selected').text()},
        {name: 'codigo_CredPresupuestario',value:cargo_presupuestal},
        {name: 'codigo_adm',value:cargo_adm},
        {name: 'codigo_convocatoria',value:id_cargo},
        {name: 'cod_depep',value:id_odei},
        {name: 'id_universidad',value:id_universidad},
        {name: 'proyectos_inei',value:proyectos_inei},
        {name: 'ultimo_cargo',value:ultimo_cargo},
        {name: 'ultimo_ano',value:ultimo_ano},
        {name: 'cod_prov',value:departamentoccpp},
        {name: 'cod_dist',value:'01'}
    );
    form_data = $.param(form_data);
    $.ajax({
        type: "POST",
        url: CI.base_url + "index.php/convocatoria/registro/save",
        data: form_data,
        dataType:'json',
        success: function(response){
            if (response.dni=='1'){
                alert("Ya se encuentra registrado, no puede volver a registrarse.");
            }else{

                $("#conv_registro :input").attr("disabled", true);
                var bsub = $( ":submit" );
                bsub.attr("disabled", "disabled");
                var form_data2 = {
                    provincia: departamentoccpp2,
                    departamento: departamentoccdd,
                    ajax:1
                };
                $.ajax({
                    type: "POST",
                    url: CI.base_url + "index.php/convocatoria/registro/get_ajax_direccion_odei/"+departamentoccdd+"/"+departamentoccpp2,
                    data: form_data2,
                    dataType:'json',
                    success: function(json_data){
                        $.each(json_data, function(i, data){
                            $( "#impre_buton" ).show();
                            $("#myModal").modal('show');
                            $("#id_direccion").html("<p>"+data.direccion.replace(/^\s+/g,'').replace(/\s+$/g,'')+"</p>");
                         });
                    }
                });
            }
        }
    });
}

function update_form(){

    var bsub = $( ":submit" );
    bsub.attr("disabled", "disabled");

    var id_cargo = $('#cargo').val();
    var id_universidad= $('#universidad').val();
    var proyectos_inei= $('#proyectos_inei').val();
    var ultimo_cargo= $('#ultimo_cargo').val();
    var ultimo_ano = $('#ultimo_ano').val();

    $("#cargo_presupuestal option[value=" + id_cargo + "]").attr('selected', 'selected');
    $("#cargo_adm option[value=" + id_cargo + "]").attr('selected', 'selected');
    var cargo_presupuestal = $('#cargo_presupuestal').find('option:selected').text();
    var cargo_adm = $('#cargo_adm').find('option:selected').text();

    var id_odei = $('#departamento').val();
    $("#departamentoccdd option[value=" + id_odei + "]").attr('selected', 'selected');
    $("#departamentoccpp option[value=" + id_odei + "]").attr('selected', 'selected');
    var departamentoccdd = $('#departamentoccdd').find('option:selected').text();
    var departamentoccpp = $('#provincia_postu').val();
    id_odei = id_odei.substr(0,2);


    var form_data = $('#conv_update').serializeArray();
    $("#conv_update :input").attr("disabled", true);
    form_data.push(
        {name: 'ajax',value:1},
        {name: 'nom_dep',value:$('#departamento option:selected').text()},
        {name: 'nom_prov',value:$('#provincia option:selected').text()},
        {name: 'nom_dist',value:$('#distrito option:selected').text()},
        {name: 'nom_dep_nac',value:$('#departamento2 option:selected').text()},
        {name: 'nom_prov_nac',value:$('#provincia2 option:selected').text()},
        {name: 'nom_dist_nac',value:$('#distrito2 option:selected').text()},
        {name: 'nom_dep_dom',value:$('#departamento3 option:selected').text()},
        {name: 'nom_prov_dom',value:$('#provincia3 option:selected').text()},
        {name: 'nom_dist_dom',value:$('#distrito3 option:selected').text()},
        {name: 'codigo_CredPresupuestario',value:cargo_presupuestal},
        {name: 'codigo_adm',value:cargo_adm},
        {name: 'codigo_convocatoria',value:id_cargo},
        {name: 'cod_depep',value:id_odei},
        {name: 'id_universidad',value:id_universidad},
        {name: 'proyectos_inei',value:proyectos_inei},
        {name: 'ultimo_cargo',value:ultimo_cargo},
        {name: 'ultimo_ano',value:ultimo_ano},
        {name: 'cod_prov',value:departamentoccpp},
        {name: 'cod_dist',value:'01'}
    );
    form_data = $.param(form_data);
    $.ajax({
        type: "POST",
        url: CI.base_url + "index.php/convocatoria/registro/update",
        data: form_data,
        success: function(response){
          $("#myModal").modal('show');
        }
    });
}

$("#form_contacto").validate({
    rules: {

        nombres:{
            required: true,
            validName: true,
         },
        correo:{
            required: true,
            email: true,
         },
         asunto:{
            required: true,
         },
        mensaje:{
            required: true,
            maxlength: 1000,
         },
    },

    messages: {

        nombres:{
            required: 'Ingrese NOMBRES',
            validName: 'Carácteres no permitidos',
         },
        correo:{
            required: 'Ingrese CORREO',
            email: 'Ingrese correo válido',
         },
         asunto:{
            required: 'Ingrese ASUNTO',
         },

        mensaje:{
            required: 'Ingrese MENSAJE',
         },



    },

    errorPlacement: function(error, element) {
        $(element).next().after(error);
    },
    invalidHandler: function(form, validator) {
      var errors = validator.numberOfInvalids();
      if (errors) {
        var message = errors == 1
          ? 'Por favor corrige estos errores:\n'
          : 'Por favor corrige los ' + errors + ' errores.\n';
        var errors = "";
        if (validator.errorList.length > 0) {
            for (x=0;x<validator.errorList.length;x++) {
                errors += "\n\u25CF " + validator.errorList[x].message;
            }
        }
        alert(message + errors);
      }
      validator.focusInvalid();
    },
    submitHandler: function(form) {
        reg_form_contacto();
    }
});

   $("#form_contacto").ready(function() {

        $("#nombres").keydown(function(event)
        {

            if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 32 ){
                     return;
            }

            else if ((event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 164 || event.keyCode == 165) {
                     return;
            }
            else {
                event.preventDefault();
            }
        });
  });
  $("#frm_registro").validate({
      rules: {

          fxinicio:{
              required: true,
          },


      },

      messages: {
          fxinicio: {
              required: "Ingresa Fecha de Inicio",
           },


      },
      errorPlacement: function(error, element) {
          $(element).next().after(error);
      },
      invalidHandler: function(form, validator) {
        var errors = validator.numberOfInvalids();
        if (errors) {
          var message = errors == 1
            ? 'Por favor corrige estos errores:\n'
            : 'Por favor corrige los ' + errors + ' errores.\n';
          var errors = "";
          if (validator.errorList.length > 0) {
              for (x=0;x<validator.errorList.length;x++) {
                  errors += "\n\u25CF " + validator.errorList[x].message;
              }
          }
          alert(message + errors);
        }
        validator.focusInvalid();
      },
      submitHandler: function(form) {
          reg_rta_form();
      }
  });


  function reg_rta_form(){

      var bsub = $( ":submit" );
      bsub.attr("disabled", "disabled");

      var form_data = $('#frm_registro').serializeArray();
      $("#frm_registro :input").attr("disabled", true);
      form_data.push(
          {name: 'ajax',value:1}
      );
      form_data = $.param(form_data);
      $.ajax({
          type: "POST",
          url: CI.base_url + "rutas/rta_registro",
          data: form_data,

          success: function(response){

              try {
                  var is_json = $.parseJSON(response);
              } catch (e) {
                  var is_html = response;
              }
              if(typeof is_json == 'object'){
                  $("#frm_registro :input").removeAttr('disabled');
                  $('.control-group').removeClass('error');
                  $(".help-block error").empty();
                  $.each(is_json, function(i, data){
                      $('#' + i).closest("div.control-group").addClass("error");
                      $('#' + i).siblings("div.help-block.error").html(data);
                  });
                  $("html, body").animate({ scrollTop: 0 }, "slow");
              }else{
                  $('#freg').empty();
                  $('#mymodal').modal({
                      backdrop : 'static',
                      keyboard: false
                  });
                 $("#mcontent").html(is_html);
              }
              bsub.removeAttr('disabled');
          }

      });
  }

  $("#eliminar").on("click",function(e){
        e.preventDefault();
        if (confirm("Desea eliminar la postulación ")) {
                var dni_registro = null;
                dni_registro = $("#dni").val();
                var form_data1 = {
                    dni: dni_registro,
                    ajax:1
                };
                $.ajax({
                    url: CI.base_url + "index.php/convocatoria/registro/delete/" + dni_registro,
                    type:'POST',
                    data:form_data1,
                    success:function(response){
                        alert(" Se elimino la postulación con DNI : "+ dni_registro );
                         var bsub = $( "#eliminar" );
                         bsub.attr("disabled", "disabled");
                         $("#conv_update :input").attr("disabled", true);
                    }
                });
        }
  });

});

