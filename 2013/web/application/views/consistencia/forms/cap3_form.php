<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 3
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$P3_1_1_LugGeoref = array(
	'name'	=> 'P3_1_1_LugGeoref',
	'id'	=> 'P3_1_1_LugGeoref',
	'maxlength'	=> 1,
	'class' => 'input1',
);

$P3_1_3_NroPtos = array(
	'name'	=> 'P3_1_3_NroPtos',
	'id'	=> 'P3_1_3_NroPtos',
	'maxlength'	=> 2,
	'class' => 'input2',	
	'disabled' => 'disabled',
);


$P3_1_4_ArchGPS = array(
	'name'	=> 'P3_1_4_ArchGPS',
	'id'	=> 'P3_1_4_ArchGPS',
	'class' => 'input98p',		
	'disabled' => 'disabled',		
);

$RutaFoto = array(
	'name'	=> 'RutaFoto',
	'id'	=> 'RutaFoto',
	'class' => 'input98p',	
	'disabled' => 'disabled',		
);

$Observaciones = array(
	'name'	=> 'Observaciones',
	'id'	=> 'Observaciones',
	'class' => 'textarea98p',	
);

$CodigoPuntoGPS = array(
	'name'	=> 'CodigoPuntoGPS',
	'id'	=> 'CodigoPuntoGPS',
);

$LatitudPuntof = array(
	'name'	=> 'LatitudPunto_UltP',
	'id'	=> 'LatitudPunto_UltP',
	'class' => 'input10',		
	'maxlength'	=> 13,
	// 'disabled' => 'disabled',		
);

$LongitudPuntof = array(
	'name'	=> 'LongitudPunto_UltP',
	'id'	=> 'LongitudPunto_UltP',
	'class' => 'input10',			
	'maxlength'	=> 13,
	// 'disabled' => 'disabled',		
);

$AltitudPuntof = array(
	'name'	=> 'AltitudPunto_UltP',
	'id'	=> 'AltitudPunto_UltP',
	'class' => 'input10',		
	'maxlength'	=> 7,
	// 'disabled' => 'disabled',		
);


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAPITULO 3
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
$attr = array('class' => 'form-vertical form-auth','id' => 'cap3_f');

echo form_open($this->uri->uri_string(),$attr); 
echo '

<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Capítulo III. Georeferenciación del local escolar</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="3">Sección A:  georeferenciación del terreno con GPS</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>
											<strong>Lugar de georeferenciación</strong>
										</td>
										<td>
											<label>
												'.form_input($P3_1_1_LugGeoref).'
												<div class="help-block error"></div>
											</label>
										</td>
									</tr>
									<tr>
										<td>2.</td>
										<td>
											<strong>Rango de puntos</strong>
										</td>
										<td>
											<table class="table table-bordered">
												<tbody><tr>
													<td>Punto Inicial</td>
													<td>'.form_input($P3_1_3_NroPtos).'</td>
												</tr>
												<tr>
													<td>Punto Final</td>
													<td>'.form_input($P3_1_3_NroPtos).'</td>
												</tr>
											</tbody>


											</table>

											<p></p>
											<table class="table table-bordered" id="tcap3_n">
												</tbody>
													<tr>
													</tr>
												</tbody>
											</table>											
										</td>
									</tr>
									<tr>
										<td>3.</td>
										<td>
											<strong>Toma de última coordenada</strong>
										</td>

										<td>
											<table class="table table-bordered">
												<tbody><tr>
													<td></td>
													<th style="text-align:center;">Longitud</th>
													<th style="text-align:center;">Latitud</th>
													<th style="text-align:center;">Altitud (msnm)</th>
												</tr>
												<tr>
													<th>Punto Final</th>
													<td style="text-align:center;">'.form_input($LongitudPuntof).'<div class="help-block error"></div></td>
													<td style="text-align:center;">'.form_input($LatitudPuntof).'<div class="help-block error"></div></td>													
													<td style="text-align:center;">'.form_input($AltitudPuntof).'<div class="help-block error"></div></td>
													
												</tr>
											</tbody></table>
										</td>
									</tr>
									<tr>
										<td>4.</td>
										<td>
											<strong>
												Nombre del archivo gps
											</strong>
											<br>(sólo si utilizó equipo gps)
										</td>
										<td>'.form_input($P3_1_4_ArchGPS).' <div class="help-block error"></div></td>
									</tr>
									<tr>
										<td>5.</td>
										<td>
											<strong>Código de la fotografía del local escolar</strong>
										</td>
										<td>'.form_input($RutaFoto).'</td>
									</tr>
								</tbody>
							</table>

							<div class="panel">
								<label>Observaciones:</label>
								'.form_textarea($Observaciones).'
							</div>


						</div>

';
echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
?>



<script type="text/javascript">

$(function(){
//car
var xlat = null;
var xlong = null;
$.each( <?php echo json_encode($cap3_i->row()); ?>, function(fila, valor) {
	   $('#' + fila).val(valor);	
	   if(fila == 'LatitudPunto_UltP')
	   	xlat = valor;
	   if(fila == 'LongitudPunto_UltP')
	   	xlong = valor;   		   
	   // 
}); 
$("#map2").attr("href", CI.site_url + '/mapa/gps/?lat1=' + xlat+'&long1='+ xlong);		

var ahua = <?php echo $cap3_n->num_rows(); ?>;

	if(ahua > 0){
	  for(var i=1; i<=ahua;i++){
	    var asd = '<tr class="">';
	    asd +='<td><input disabled="disabled" type="text" class="span12 embc' + i + '" name="LatitudPunto' + '_' + i + '" id="LatitudPunto' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input disabled="disabled" type="text" class="span12 embc' + i + '" name="LongitudPunto' + '_' + i + '" id="LongitudPunto' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input disabled="disabled" type="text" class="span12 embc' + i + '" name="AltitudPunto' + '_' + i + '" id="AltitudPunto' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd += '</tr>';
	    $('#tcap3_n > tbody').append(asd);
	  }
	}

var as = 1;
var pts = '';
$.each( <?php echo json_encode($cap3_n->result()); ?>, function(i, data) {

	   $('#LatitudPunto' + '_' + as).val(data.LatitudPunto);
	   $('#LongitudPunto' + '_' +  as).val(data.LongitudPunto);
	   $('#AltitudPunto' + '_' +  as).val(data.AltitudPunto);
	   pts += 'lat' + as + '=' + data.LatitudPunto+'&long' + as + '='+ data.LongitudPunto + '&';
	   if(as == ahua){
		   // $('#LatitudPuntof').val(data.LatitudPunto);
		   // $('#LongitudPuntof').val(data.LongitudPunto);
		   // $('#AltitudPuntof').val(data.AltitudPunto);	 
		   // $("#map2").attr("href", CI.site_url + '/mapa/gps/?lat1=' + data.LatitudPunto+'&long1='+ data.LongitudPunto);		
		   $("#map2f").attr("href", CI.site_url + '/mapa/gps/diez/?' + pts);		
	   }
	   as++;
}); 



$("#cap3_f").validate({
		    rules: {           			         		         		         		                  	         		         	         	          		                                                                             
			    P3_1_1_LugGeoref: {
			            required: true,
			            valrango: [1,2,9],
			        },  
				P3_1_4_ArchGPS: {
			    		maxlength: 255, 
			    },  
			    LatitudPunto_UltP:{
			    	number:true,
			    },	
			    LongitudPunto_UltP:{
			    	number:true,
			    },		
			    AltitudPunto_UltP:{
			    	number:true,
			    },				    		    	        
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
				    	var cap3_data = $("#cap3_f").serializeArray();
					    cap3_data.push(
					        {name: 'ajax',value:1},
					        {name: 'id_local',value:$("input[name='id_local']").val()},      
					        {name: 'Nro_Pred',value:$("input[name='Nro_Pred']").val()},      
					        {name: 'user_id',value:$("input[name='user_id']").val()}      
					    );
						
				        var bcar = $( "#cap3_f :submit" );
				         bcar.attr("disabled", "disabled");
				        $.ajax({
				            url: CI.site_url + "/consistencia/cap3",
				            type:'POST',
				            data:cap3_data,
				            dataType:'json',
				            success:function(json){
								alert(json.msg);
								bcar.removeAttr('disabled');
								$('#ctab3').removeClass('active');
								$('#ctab4 a').trigger('click');
								window.scrollTo(0, 0);
				            }
				        });     			          	
		    }       
}); 






}); 
</script>


