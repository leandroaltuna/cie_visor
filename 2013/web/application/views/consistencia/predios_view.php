
<?php 
$pr_view = ($pr == 0)? 'No se encontraron' : $pr;
 ?>
<h4 class="fx_fix">Codigo de local: <?php echo $cod; ?> <button type="button" class="btn btn-success" id="prbtn">+</button> - Predio <?php echo $pr_view; ?></h4>


<?php 
/////////////////////////////////////////////////////////////////////////////////
//PREDIOS

// $P1_B_1_TPred = array(
//   'name'  => 'P1_B_1_TPred',
//   'id'  => 'P1_B_1_TPred',
//   'maxlength' => 1,
// );

$P1_B_2A_PredNoCol = array(
  'name'  => 'P1_B_2A_PredNoCol',
  'id'  => 'P1_B_2A_PredNoCol',
  'maxlength' => 1,
);



echo'
      <div id="prediosini" class="hide">';

$attr = array('class' => 'form-vertical form-auth','id' => 'predios_add');
echo form_open($this->uri->uri_string(),$attr); 

echo'
            <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="text-align:center;">1.</td>
                    <td><strong>AGREGAR NUEVO PREDIO</strong></td>
                    <td>
                      <label>El predio es colindante</label>
                      <select id="P1_B_2A_PredNoCol" class="input200 valid" name="P1_B_2A_PredNoCol">
                      <option value="0">Si</option>
                      <option value="1">No</option>
                      </select>
                    </td>
                  </tr>
                </tbody>
            </table>';

echo form_submit('send', 'Agregar','class="btn btn-primary"');
echo form_close(); 
echo '</div>';

?>





<ul id="predios" class="predios_views">
</ul>

<script type="text/javascript">

$("#nav_capit2").css({top: 142});

$( "#menu_nav2" ).hide();
$(".fx_fix").css({top: 70});
$("ul.predios_views").css({top: 110});




$(function(){

  // if(<?php echo $level ?> == 1){
    $('input,select,textarea').attr('disabled','disabled');
    $('.btn-primary').hide();
  // }

$(document).on("keyup",'.btn-primary',function(e) {    
      var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
      if(key == 13)
      $(this).trigger('click');
   }); 



  $(window).keydown(function(event){
      if(event.keyCode == 13) {
          event.preventDefault();
          return false;
      }
  });


  // $('input,select,textarea').keydown( function(e) {
$(document).on("keyup",'input,select,textarea',function(e) {    
      var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
      if(key == 13)
      $(this).trigger('change');
   }); 




// $('input,select,textarea').keyup( function(e) {
$(document).on("keyup",'input,select,textarea',function(e) {

    var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    var inputs = $(this).closest('form').find(":input:not(:disabled, [readonly='readonly'],:hidden)");
    if(key == 13) {
      inputs.eq( inputs.index(this)+1).focus(); 
      
    }
    else if (key == 27) {
      inputs.eq( inputs.index(this)-1).focus(); 
    }
  }); 


// jQuery Validator


$.extend(jQuery.validator.messages, {
     required: "Campo obligatorio",
    // remote: "Please fix this field.",
     email: "Ingrese un email válido",
    // url: "Please enter a valid URL.",
     date: "Ingrese una fecha válida",
    // dateISO: "Please enter a valid date (ISO).",
     number: "Solo se permiten números",
     digits: "Solo se permiten números",
    range: jQuery.validator.format("Por favor ingrese un valor  entre {0} y {1}."),
    // creditcard: "Please enter a valid credit card number.",
    // equalTo: "Please enter the same value again.",
    // accept: "Please enter a value with a valid extension.",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    // minlength: jQuery.validator.format("Please enter at least {0} characters."),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    // range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});

$.validator.addMethod("menorque", function(value, element, arg) {
    flag = false;
    if(value == '' || value == 999 || parseInt($('#' + arg[0] + element.id.substring(18,19)).val()) >= parseInt(value) ){
      flag = true;
    }
    return flag;
}, "El numero de aulas debe ser menor al numero de alumnos");


$.validator.addMethod("hora", function(value, element, arg) {
    var regeX = /^([01]\d|2[0-3]):?([0-5]\d)$/;
    flag = false;
    if(value == '' || regeX.test(value.trim())){
      flag = true;
    }
    return flag;
}, "Ingrese la hora correctamente");

$.validator.addMethod("letnum", function(value, element, param) {
  return value.match(new RegExp("^[A-Za-z0-9 _ñÑ]*[A-Za-z0-9ñÑ][A-Za-z0-9 _ñÑ]*$"));
}, "Caracteres no permitidos");

$.validator.addMethod("telef", function(value, element, param) {
  return value.match(new RegExp("^[0-9#*]*$"));
}, "Ingrese un telefono valido");

$.validator.addMethod("requeridodis", function(value, element, arg) {
    flag = false;
    if(value != '' || element.disabled || element.readOnly){
      flag = true;
    }
    return flag;
}, "El campo es requerido");

$.validator.addMethod("minor", function(value, element, arg) {
    flag = false;
    if(parseInt(value) <= parseInt($('#' + arg[0]).val())){
      flag = true;
    }
    return flag;
}, "Debe ser menor que la pregunta {1}");
$.validator.addMethod("minor_car", function(value, element, arg) {
    flag = false;
    if( (parseInt(value) < parseInt($('#' + arg[0]).val())) || parseInt($('#' + arg[0]).val()) == 0 ){
      flag = true;
    }
    return flag;
}, "Debe ser menor que el Total de Predios");
$.validator.addMethod("year", function(value, element, param) {
    return this.optional(element) || ( (value > 1950 && value <= CI.year) || value == 9999 ) ;
}, "Ingrese un año válido");

$.validator.addMethod("valueEquals", function (value, element, param) {
    return param == value;
}, "Acepta la declaración de veracidad?");

$.validator.addMethod("peruDate",function(value, element) {
    var regeX = /^\d\d?\/\d\d?\/\d\d\d\d$/;
    flag = false;
    if(value == '' || regeX.test(value.trim())){
      flag = true;
    }
    return flag;
}, "Ingrese fecha: dd/mm/yyyy");

$.validator.addMethod("carperuDate",function(value, element) {
    var regeX = /^\d\d?\/\d\d?\/\d\d\d\d$/;
    flag = false;
    reus = value.split("/");
    if(value == '' || (regeX.test(value.trim()) && parseInt(reus[1]) >= 9 && parseInt(reus[1]) <= 12 &&  parseInt(reus[2]) == 2013 ) || (regeX.test(value.trim()) && parseInt(reus[1]) >= 1 && parseInt(reus[1]) < 4 &&  parseInt(reus[2]) == 2014 ) ){
      flag = true;
    }
    return flag;
}, "Ingrese fecha: dd/mm/yyyy");

$.validator.addMethod("valcaresu", function(value, element, arg){
    flag = false;
    var nro = $('#' + arg[1]).val();
    var cox = $('#' + arg[0] + nro).val()
    if( cox.localeCompare(value) == 0){
      flag = true;
    }
    return flag;
 }, "El resultado final debe coincidir con el resultado de la ultima visita");  



 $.validator.addMethod("validName", function(value, element) {
    return this.optional(element) || /^[a-zA-ZàáâäãåąćęèéêëìíîïłńòóôöõøùúûüÿýżźñçčšžÀÁÂÄÃÅĄĆĘÈÉÊËÌÍÎÏŁŃÒÓÔÖÕØÙÚÛÜŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/.test(value);
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

 $.validator.addMethod("val3", function(value, element,arg){
    var length = arg.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(arg[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un valor entre {0}, {1} y {2}");

 $.validator.addMethod("valdia", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','99')
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un día válido");


 $.validator.addMethod("valmes", function(value, element){
    var dias = new Array('01','02','03','04','05','06','07','08','09','10','11','12','99');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido");


 $.validator.addMethod("valmescen", function(value, element){
    var dias = new Array('08','09');
    var length = dias.length;
    var flag = false;
    for(var i = 0; i < length; i++) {
        if(dias[i] == value)
          flag = true;
    }
   return flag;
}, "Seleccione un mes válido(08,09)");

$.validator.addMethod("valnone", function(value, element, arg){
    var flag = true;
    if(value == 1){
        for(var i = 0; i<=arg.length; i++){
            if($('#' + arg[i]).val() == 1)
              flag = false;
        }
    }
    return flag;
 }, "Si ya selecciono una alternativa no debe seleccionar este item");  


$.validator.addMethod("valzero", function(value, element, arg){
    flag = false;
    if(value == 0 && (!element.readOnly)){
        for(var i = 0; i<=arg.length; i++){
               if($('#' + arg[i]).val() == 1 || $('#' + arg[i]).val() == 9)
               flag = true;
        }
    }else{
      flag = true;
    }
    return flag;
 }, "Debe ingresar al menos una opción, no pueden ser 0 todas las opciones.");  


$.validator.addMethod("valnueves", function(value, element, arg){
    flag = true;
    contador = 0;
    if((!element.readOnly)){
        for(var i = 0; i<=arg.length; i++){
              if($('#' + arg[i]).val() == 9) 
                contador += 1;
        }
        if( contador > 0 && contador < arg.length ){
            flag = false;
        }          
    }
    return flag;
 }, "Existe 9, Todas las opciones deben ser omisión.");


$.validator.addMethod("valninguno", function(value, element, arg){
    flag = true;
    if(value == 1){
        for(var i = 0; i<=arg.length; i++){
               if($('#' + arg[i]).val() == 1 || $('#' + arg[i]).val() == 9)
               flag = false;
        }
    }else{
      flag = true;
    }
    return flag;
 }, "Selecciono la opción ( NINGUNO / NO TIENE ), todas las opciones anteriores deben ser 0."); 


$.validator.addMethod("valzerototal", function(value, element, arg){
    flag = false;
    if(value == 0 && (!element.readOnly)){
        for(var i = 0; i<=arg.length; i++){
               if($('#' + arg[i]).val() > 0)
               flag = true;
        }
    }else{
      flag = true;
    }
    return flag;
 }, "Debe ingresar al menos una opción, no pueden ser 0 todas las opciones.");  

$.validator.addMethod("valningunototal", function(value, element, arg){
    flag = true;
    if(value == 1){
        for(var i = 0; i<=arg.length; i++){
               if($('#' + arg[i]).val() > 0)
               flag = false;
        }
    }else{
      flag = true;
    }
    return flag;
 }, "Selecciono la opción ( NINGUNO / NO TIENE ), todas las opciones anteriores deben ser 0."); 


 $.validator.addMethod("valrango", function(value, element,arg){
    var flag = false;
        if(((value >= arg[0] && value<=arg[1]) || value == arg[2]) || value=='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");

 $.validator.addMethod("minimo_car", function(value, element,arg){
    var flag = true;

    var result = $('#'+arg[0]).val();

    if ( result < 3 && value == 0 )
      flag = false;
   return flag;
}, "Por favor ingrese un valor mayor a 0");


 $.validator.addMethod("valjango", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2])
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}");


 $.validator.addMethod("valrucc", function(value, element,arg){
    var flag = false;
        if((value >= arg[0] && value<=arg[1]) || value == arg[2] || value == arg[3] || value == arg[4] && value!='')
          flag = true;
   return flag;
}, "Seleccione un valor entre {0}, {1} o {2}, {3}, {4}");

$.validator.addMethod("valtexto", function(value, element,arg){
   var flag = false;
       if(value.toUpperCase() == arg[0] || value.toUpperCase() == arg[1] || value.toUpperCase() == arg[2] || value.toUpperCase() == arg[3] || value.toUpperCase() == arg[4])
         flag = true;
  return flag;
}, "Seleccione un valor entre {0}, {1} o {2}, {3}, {4}");



// jQuery Validator

	// function(i, data){
	// 	function( fila, valor )
  $.each( <?php echo json_encode($predios->result()); ?>, function(i, data) {
	  	var ahua = 'Principal';
	  	var act = (<?php echo $pr; ?> == data.Nro_Pred)? 'class="active"' : '';
	  	if(data.Nro_Pred != 1){
	  		ahua = (data.P1_B_2A_PredNoCol==0 || data.P1_B_2A_PredNoCol==null)? 'Colindante' : 'No Colindante';
	  	}

		$('#predios').append('<li ' + act + '><a target="_self"  href="' + CI.site_url + '/consistencia/local/' + data.id_local + '/' + data.Nro_Pred + '/' + <?php echo $user_id; ?> + '">'+ data.Nro_Pred  + ' - ' + ahua + '</a></li>')
	});

}); 
</script>
<?php 


if($pr!=0){


echo form_hidden('id_local', $cod); 
echo form_hidden('Nro_Pred', $pr); 
echo form_hidden('user_id', $user_id); 
?>


<?php if(($predio_b->row()->P1_B_2A_PredNoCol == 0 || is_null($predio_b->row()->P1_B_2A_PredNoCol) ) && $pr!=1){
  ?>

<div class="row-fluid" id="pesc_tabs" style="margin-top:10px">
  <div class="span12" id="insidetabs" style="text-align:center">
    <div class="tabbable"> <!-- Only required for left/right tabs -->
      <ul class="nav nav-tabs" style="text-align:center">
      <!--   <li id="ctab"><a href="#tabc" data-toggle="tab">Carátula</a></li> -->
        <li id="ctab1"><a href="#tab1" data-toggle="tab">Capítulo I</a></li>
<!--         <li id="ctab2"><a href="#tab2" data-toggle="tab">Capítulo II</a></li>
        <li id="ctab3"><a href="#tab3" data-toggle="tab">Capítulo III</a></li>
        <li id="ctab4"><a href="#tab4" data-toggle="tab">Capítulo IV</a></li>
        <li id="ctab5"><a href="#tab5" data-toggle="tab">Capítulo V</a></li>
        <li id="ctab6"><a href="#tab6" data-toggle="tab">Capítulo VI</a></li>
        <li id="ctab7"><a href="#tab7" data-toggle="tab">Capítulo VII</a></li>
        <li id="ctab8"><a href="#tab8" data-toggle="tab">Capítulo VIII</a></li>
        <li id="ctab9"><a href="#tab9" data-toggle="tab">Capítulo IX</a></li> -->
      </ul>
      <div class="tab-content">
<!--         <div class="tab-pane" id="tabc">
          <p><?php //$this->load->view('consistencia/forms/car_form'); ?></p>
        </div>   -->

        <div class="tab-pane" id="tab1">
          <p><?php $this->load->view('consistencia/forms/cap1_form'); ?></p>
        </div>  
<!-- 
        <div class="tab-pane" id="tab2">
          <p><?php //$this->load->view('consistencia/forms/cap2_form'); ?></p>
        </div>

        <div class="tab-pane" id="tab3">
          <p><?php //$this->load->view('consistencia/forms/cap3_form'); ?></p>
        </div>

        <div class="tab-pane" id="tab4">
          <p><?php //$this->load->view('consistencia/forms/cap4_form'); ?></p>
        </div>

        <div class="tab-pane" id="tab5">
          <p><?php //$this->load->view('consistencia/forms/cap5_form'); ?></p>
        </div>

        <div class="tab-pane" id="tab6">
          <p><?php //$this->load->view('consistencia/forms/cap6_form'); ?></p>
        </div>

        <div class="tab-pane" id="tab7">
          <p><?php //$this->load->view('consistencia/forms/cap7_form'); ?></p>
        </div>

        <div class="tab-pane" id="tab8">
          <p><?php //$this->load->view('consistencia/forms/cap8_form'); ?></p>
        </div>  

        <div class="tab-pane" id="tab9">
          <p><?php //$this->load->view('consistencia/forms/cap9_form'); ?></p>
        </div>  --> 

      </div>
    </div>
  </div>
</div>


<?php } elseif($predio_b->row()->P1_B_2A_PredNoCol == 1 || $pr == 1){
  ?>

<div class="row-fluid" id="pesc_tabs" style="margin-top:10px">
	<div class="span12" id="insidetabs" style="text-align:center">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		  <ul id='nav_capit2' class="nav nav-tabs fix_navcap">
		    <li id="ctab"><a href="#tabc" data-toggle="tab">Carátula</a></li>
		    <li id="ctab1"><a href="#tab1" data-toggle="tab">Capítulo I</a></li>
		    <li id="ctab2"><a href="#tab2" data-toggle="tab">Capítulo II</a></li>
		    <li id="ctab3"><a href="#tab3" data-toggle="tab">Capítulo III</a></li>
		    <li id="ctab4"><a href="#tab4" data-toggle="tab">Capítulo IV</a></li>
		    <li id="ctab5"><a href="#tab5" data-toggle="tab">Capítulo V</a></li>
		    <li id="ctab6"><a href="#tab6" data-toggle="tab">Capítulo VI</a></li>
		    <li id="ctab7"><a href="#tab7" data-toggle="tab">Capítulo VII</a></li>
		    <li id="ctab8"><a href="#tab8" data-toggle="tab">Capítulo VIII</a></li>
		    <!-- <li id="ctab9"><a href="#tab9" data-toggle="tab">Capítulo IX</a></li> -->
		  </ul>
		  <div class="tab-content fix_tabcontent">
		    <div class="tab-pane" id="tabc">
		      <p><?php $this->load->view('consistencia/forms/car_form'); ?></p>
		    </div>	

		    <div class="tab-pane" id="tab1">
		      <p><?php $this->load->view('consistencia/forms/cap1_form'); ?></p>
		    </div>	

		    <div class="tab-pane" id="tab2">
		      <p><?php $this->load->view('consistencia/forms/cap2_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab3">
		      <p><?php $this->load->view('consistencia/forms/cap3_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab4">
		      <p><?php $this->load->view('consistencia/forms/cap4_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab5">
		      <p><?php $this->load->view('consistencia/forms/cap5_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab6">
		      <p><?php $this->load->view('consistencia/forms/cap6_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab7">
		      <p><?php $this->load->view('consistencia/forms/cap7_form'); ?></p>
		    </div>

		    <div class="tab-pane" id="tab8">
		      <p><?php $this->load->view('consistencia/forms/cap8_form'); ?></p>
		    </div>  

		    <!-- <div class="tab-pane" id="tab9">
		      <p><?php #$this->load->view('consistencia/forms/cap9_form'); ?></p>
		    </div>   -->

		  </div>
		</div>
	</div>
</div>

<?php 
}
//end if pr=0
}
?>




<script type="text/javascript">

//PREDIOS ADD
$(function(){

$('#prbtn').click(function(){
      $('#prediosini').toggle();
  });



$("#predios_add").submit(function() {

});

$("#predios_add").validate({
        rules: {                                                                                                                                                                                                   
              
        },

        messages: {   
      //FIN MESSAGES
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
            var strc = ($("#P1_B_2A_PredNoCol").val() == 0)? '' : 'NO '
            if (confirm('Esta seguro de agregar el predio - ' + strc + ' COLINDANTE?')) {
                    var pradd_data = {
                      id_local: $("input[name='id_local']").val(),
                      user_id: $("input[name='user_id']").val(),
                      P1_B_2A_PredNoCol: $("#P1_B_2A_PredNoCol").val(),
                      ajax:1
                    };    
                
                    var bcar = $( "#predios_add :submit" );
                     bcar.attr("disabled", "disabled");
                    $.ajax({
                        url: CI.site_url + "/consistencia/consistencia/add_predio",
                        type:'POST',
                        data:pradd_data,
                        dataType:'json',
                        success:function(json){
                            bcar.removeAttr('disabled');
                            alert(json.msg);
                            location.reload();
                        }
                    });    
            }
        }       
}); 

}); 













//*******************************************************
  function IsNumeric(valor) 
  { 
    var log=valor.length; var sw="S"; 
    for (x=0; x<log; x++) 
    { v1=valor.substr(x,1); 
    v2 = parseInt(v1); 
    //Compruebo si es un valor numérico 
    if (isNaN(v2)) { sw= "N";} 
    } 
    if (sw=="S") {return true;} else {return false; } 
  }

  function IsRange(dia, mes) 
  {
    var sw=0;
    switch(mes)
    {
      case '01':
        if (dia<=31){ sw=1; }
        break;    
      case '02':
        if (dia<=29){ sw=1; }
        break;          
      case '03':
        if (dia<=31){ sw=1; }
        break;
      case '04':
        if (dia<=30){ sw=1; }
        break;
      case '05':
        if (dia<=31){ sw=1; }
        break;
      case '06':
        if (dia<=30){ sw=1; }
        break;
      case '07':
        if (dia<=31){ sw=1; }
        break;
      case '08':
        if (dia<=31){ sw=1; }
        break;
      case '09':
          if (dia<=30){ sw=1; }
        break;
      case '10':
        if (dia<=31){ sw=1; }
        break;
      case '11':
        if (dia<=30){ sw=1; }
        break;
      case '12':
        if (dia<=31){ sw=1; }
        break;
    }
    
    if (sw==1) {return true;} else {return false; } 
  }

  var primerslap=false; 
  var segundoslap=false; 

  function formateafecha(fecha) 
  { 
    var long = fecha.length; 
    var dia; 
    var mes; 
    var ano;
    var d = new Date();
    var diaactual = d.getDate();
    var mesactual = d.getMonth()+1;
    var anoactual = d.getFullYear();
    if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
    if ((IsNumeric(dia)==true) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
    else { fecha=""; primerslap=false;} 
    } 
    else 
    { dia=fecha.substr(0,1); 
    if (IsNumeric(dia)==false) 
    {fecha="";} 
    if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
    } 
    if ((long>=5) && (segundoslap==false)) 
    { mes=fecha.substr(3,2); dia=fecha.substr(0,2);
    if ((IsNumeric(mes)==true) && (mes!="00") && (IsRange(dia,mes)==true)) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
    else { fecha=fecha.substr(0,3);; segundoslap=false;} 
    } 
    else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
    if (long>=7) 
    { ano=fecha.substr(6,4); 
    if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
    else { if (long==10){ if ((ano==0) || (ano>anoactual)) { fecha=fecha.substr(0,6); } } } 
    }
    // if (long==5)
    // {
    //   if (mes==mesactual){
    //     if (dia>diaactual){ fecha=fecha.substr(0,3);; segundoslap=false; }
    //   }else if(mes>mesactual){ fecha=fecha.substr(0,3);; segundoslap=false; }
    // }

    if (long==10)
    {
      dia=fecha.substr(0,2);
      mes=fecha.substr(3,2);
      // if ((ano!=2013)){ fecha=""; }
      // if ((ano<=2013) && (mes<9)){ fecha=""; }
      // if ((ano==2013) && (mes==9) && (dia<9)){ fecha=""; }
    }
    if (long>=10) 
    { 
      fecha=fecha.substr(0,10); 
      dia=fecha.substr(0,2); 
      mes=fecha.substr(3,2); 
      ano=fecha.substr(6,4); 
      // Año no viciesto y es febrero y el dia es mayor a 28 
      // if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
    } 
    return (fecha); 
  }





  function makeday(s){
    ns = '';
    if(s != null && s != undefined && s != ''){
    ss = s.split("-");
    ns = ss[2] + '/' + ss[1] + '/' + ss[0];
    }
    return ns;
  }

  function makehour(s){
    ns = '';
    if(s != null && s != undefined && s != ''){
      if(s.length == 2){
        ns = s + ':';
      }else{
        ns = s;
      }
    }
    return ns;
  }

$.ctrl = function(key, callback, args) {
    $(document).keydown(function(e) {
        if(!args) args=[]; // IE barks when args is null 
        if(e.keyCode == key.charCodeAt(0) && e.ctrlKey) {
            callback.apply(this, args);
            return false;
        }
    });        
};



$.ctrl('0', function() {
  $('#ctab a').trigger('click');
});
$.ctrl('1', function() {
  $('#ctab1 a').trigger('click');
});
$.ctrl('2', function() {
  $('#ctab2 a').trigger('click');
});
$.ctrl('3', function() {
  $('#ctab3 a').trigger('click');
});
$.ctrl('4', function() {
  $('#ctab4 a').trigger('click');
});
$.ctrl('5', function() {
  $('#ctab5 a').trigger('click');
});
$.ctrl('6', function() {
  $('#ctab6 a').trigger('click');
});
$.ctrl('7', function() {
  $('#ctab7 a').trigger('click');
});
$.ctrl('8', function() {
  $('#ctab8 a').trigger('click');
});
$.ctrl('9', function() {
  $('#ctab9 a').trigger('click');
});




$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  e.target // activated tab
  e.relatedTarget // previous tab
  window.scrollTo(0, 0);

  var mxflag = 0;
  if(parseInt(<?php echo $pr; ?>) == 1)
    mxflag = 1;

  if(e.delegateTarget.hash == "#tabc"){
    $("#PC_A_4_CentroP").focus();  
  }else if(e.delegateTarget.hash == "#tab1"){
    if(mxflag == 1)
      $("#P1_A_1_Cant_IE").focus();
    else
      $("#P1_B_3_InmCod").focus();
  }else if(e.delegateTarget.hash == "#tab2"){
    if(mxflag == 1)
      $("#P2_A_1_Clima").focus();
    else
      $("#P2_B_1_Topo").focus();    
  }else if(e.delegateTarget.hash == "#tab3"){
    $("#P3_1_1_LugGeoref").focus();
  }else if(e.delegateTarget.hash == "#tab4"){
    $("#P4_2_CantTram_Lfrente").focus();
  }else if(e.delegateTarget.hash == "#tab5"){
    $("#P5_Tot_E").focus();
  }else if(e.delegateTarget.hash == "#tab6"){
    $("#Nro_Ed_VI").focus();
  }else if(e.delegateTarget.hash == "#tab7"){
    $("#Nro_Ed_VII").focus();
  }else if(e.delegateTarget.hash == "#tab8"){
    $("#P8_2_Tipo").focus();
  }

});

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47317828-1', 'inei.gob.pe');
  ga('send', 'pageview');

</script>