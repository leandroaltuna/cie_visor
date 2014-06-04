<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 5
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA P5 - Capitulo V

$P5_Tot_E = array(
	'name'	=> 'P5_Tot_E',
	'id'	=> 'P5_Tot_E',
	'maxlength'	=> 2,
	'class' => 'input2',		
);

$P5_Tot_P = array(
	'name'	=> 'P5_Tot_P',
	'id'	=> 'P5_Tot_P',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_LD = array(
	'name'	=> 'P5_Tot_LD',
	'id'	=> 'P5_Tot_LD',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_CTE = array(
	'name'	=> 'P5_Tot_CTE',
	'id'	=> 'P5_Tot_CTE',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_MC = array(
	'name'	=> 'P5_Tot_MC',
	'id'	=> 'P5_Tot_MC',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_P1 = array(
	'name'	=> 'P5_Tot_P1',
	'id'	=> 'P5_Tot_P1',
	'maxlength'	=> 2,
	'class' => 'input2',			
);

$P5_Tot_R = array(
	'name'	=> 'P5_Tot_R',
	'id'	=> 'P5_Tot_R',
	'maxlength'	=> 2,
	'class' => 'input2',
);

$P5_Opin = array(
	'name'	=> 'P5_Opin',
	'id'	=> 'P5_Opin',
	'style' => 'text-transform: uppercase;',
	'maxlength'	=> 1,
	'class' => 'input2',
	'disabled' => 'disabled',
);

// FIN TABLA P5 - Capitulo V

// TABLA P5_F - Capitulo V

$P5_cantNroPiso = array(
	'name'	=> 'P5_cantNroPiso',
	'id'	=> 'P5_cantNroPiso',
	'class' => 'input1',	
	'maxlength'	=> 2,
);

$P5_NroPiso = array(
	'name'	=> 'P5_NroPiso',
	'id'	=> 'P5_NroPiso',
	'disabled' => 'disabled',
	'class' => 'input1',	
);

// $P5_Foto = array(
// 	'name'	=> 'P5_Foto',
// 	'id'	=> 'P5_Foto',
// 	'disabled' => 'disabled',
// 	'class' => 'input98p',
// );

$P5_Escala = array(
	'name'	=> 'P5_Escala',
	'id'	=> 'P5_Escala',
);

// FIN TABLA P5_F - Capitulo V

// TABLA P5_N - Capitulo V

$P5_Ed_Nro = array(
	'name'	=> 'P5_Ed_Nro',
	'id'	=> 'P5_Ed_Nro',
);

$P5_TotAmb = array(
	'name'	=> 'P5_TotAmb',
	'id'	=> 'P5_TotAmb',
	'maxlength'	=> 2,
	'class' => 'input2',		
);

// TABLA P5_N - Capitulo V


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 5
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$attr = array('class' => 'form-vertical form-auth','id' => 'cap5_f');

echo form_open($this->uri->uri_string(),$attr);

echo '

<div id="cap_5" class="panel panel-info">
	  	    				<div class="panel-heading">Capitulo V: Esquema de distribución de las edificaciones con ambientes</div>


	  	    				<h3><input type="text" id="p5_focus" name="p5_focus" value="-" style="width:7px; border:0px;" readonly="true" />Resumen</h3>
							

		  	    			<table class="table table-bordered">
		  	    				<tbody><tr>
		  	    					<th>EDIFICACIONES</th>
		  	    					<td>'.form_input($P5_Tot_E).'<div class="help-block error"></div></td>
		  	    				</tr>
		  	    				<tr>
		  	    					<th>PATIOS</th>
		  	    					<td>'.form_input($P5_Tot_P).'<div class="help-block error"></div></td>
		  	    				</tr>		  	    				
		  	    				<tr>
		  	    					<th>LOZAS DEPORTIVAS</th>
		  	    					<td>'.form_input($P5_Tot_LD).'<div class="help-block error"></div></td>
		  	    				</tr>		  	    				
		  	    				<tr>
		  	    					<th>CISTERNA - TANQUE ELEVADO</th>
		  	    					<td>'.form_input($P5_Tot_CTE).'<div class="help-block error"></div></td>
		  	    				</tr>			  	    				
		  	    				<tr>
		  	    					<th>MURO DE CONTENCIÓN</th>
		  	    					<td>'.form_input($P5_Tot_MC).'<div class="help-block error"></div></td>
		  	    				</tr>			  	  		  	    				
		  	    				<tr>
		  	    					<th>PORTADA DE INGRESO, PORTÓN</th>
		  	    					<td>'.form_input($P5_Tot_P1).'<div class="help-block error"></div></td>
		  	    				</tr>			  	 		  	    				
		  	    				<tr>
		  	    					<th>RAMPA</th>
		  	    					<td>'.form_input($P5_Tot_R).'<div class="help-block error"></div></td>
		  	    				</tr>				  	    				
		  	    				<tr style="display:none">
		  	    					<th>OPINIÓN</th>
		  	    					<td>'.form_input($P5_Opin).'<div class="help-block error"></div></td>
		  	    				</tr>			  	    				
		  	    			</tbody></table>

							<h3>Pisos</h3>

							<div><p style="display:inline;">Número de pisos: </p> '.form_input($P5_cantNroPiso).'<div class="help-block error"></div> </div>

	  	    				<table id="cap5_detalle" class="table table-bordered">

	  	    				</table>


	  	    			</div>

';
echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close();
 ?>

<script type="text/javascript">

$(document).ready(function(){


//cap5
$.each( <?php echo json_encode($cap5_i->row()); ?>, function(fila, valor) {
	   $('#' + fila).val(valor);
});

$('#P5_cantNroPiso').val(<?php echo $cap5_f; ?>);

$('#P5_cantNroPiso').change(function(event) {
	$('#cap_5 table').remove('#cap5_detalle');
	var ahua = $(this).val();
	var edi = document.getElementById('P5_Tot_E').value;
	
	if ( ahua > 0 && ahua != 99 && edi != 99)
	{
		for(var i=1; i<=ahua;i++)
		{
			var asd = '<table id="cap5_detalle" class="table table-bordered">';
			asd+='<thead><tr>';
			asd+='<thead><tr>';
			asd+='<th colspan="2">Piso N° <input type="text" class="span3 embc' + i + '" readonly="true" name="P5_NroPiso[]" id="P5_NroPiso' + '_p_' + i + '" value="' + i + '" ></th>';
			asd+='</tr></thead>';
			asd+='<tbody id="piso' + i + '">';
			asd+='<tr><td colspan="2"><input type="text" readonly="true" class="input98p" name="P5_Foto[]" id="P5_Foto' + '_p_' + i + '" value="" ></td></tr>';
				for (var j=1;j<=edi;j++){
					asd+='<tr class="detalle"><th>Edificación N° <input type="text" readonly="true" class="span3 embc' + i + '" name="P5_Ed_Nro[]" id="P5_Ed_Nro' + '_p_' + i + '_e_' + j + '" value="' + j + '" ></th>';
					asd+='<td>Cantidad de Ambientes: <input type="text" class="input2 totamb" maxlength="2" name="P5_TotAmb[]" id="P5_TotAmb' + '_p_' + i + '_a_' + j + '" value="" ><div class="help-block error"></div></td></tr>';
				}
			asd+='</tbody></table>';
			$('#cap_5').append(asd);
		}

		var as = 1;
		$.getJSON(urlRoot('index.php')+'/consistencia/cap5/cap5_f/', {codigo:'<?php echo $cod; ?>',predio:<?php echo $pr; ?>}, function(data, textStatus) {

			$.each(data, function(i, datos) {

				// $('#P5_NroPiso' + '_p_' + as).val(datos.P5_NroPiso);
				$('#P5_Foto' + '_p_' + as).val(datos.P5_Foto);
				
				$.getJSON(urlRoot('index.php')+'/consistencia/cap5/cap5_n/', {codigo:datos.id_local,predio:datos.Nro_Pred,piso:datos.P5_NroPiso}, function(data, textStatus) {
						var ad = 1;
						$.each(data, function(i, valor) {
							$('#P5_Ed_Nro' + '_p_' + valor.P5_NroPiso + '_e_' + ad).val(valor.P5_Ed_Nro);
							$('#P5_TotAmb' + '_p_' + valor.P5_NroPiso + '_a_' + ad).val(valor.P5_TotAmb);
							ad++;
						});
				});

				as++;
			});

		});

	}else if (ahua == 99 && edi == 99 ) {
		i = 1;
		j = 1;
		var asd = '<table id="cap5_detalle" class="table table-bordered">';
			asd+='<thead><tr>';
			asd+='<thead><tr>';
			asd+='<th colspan="2">Piso N° <input type="text" class="span3 embc' + i + '" readonly="true" name="P5_NroPiso[]" id="P5_NroPiso' + '_p_' + i + '" value="99" ></th>';
			asd+='</tr></thead>';
			asd+='<tbody id="piso' + i + '">';
			asd+='<tr><td colspan="2"><input type="text" readonly="true" class="input98p" name="P5_Foto[]" id="P5_Foto' + '_p_' + i + '" value="" ></td></tr>';
				
			asd+='<tr class="detalle"><th>Edificación N° <input type="text" readonly="true" class="span3 embc' + i + '" name="P5_Ed_Nro[]" id="P5_Ed_Nro' + '_p_' + i + '_e_' + j + '" value="99" ></th>';
			asd+='<td>Cantidad de Ambientes: <input type="text" class="input3 totamb" maxlength="3" name="P5_TotAmb[]" id="P5_TotAmb' + '_p_' + i + '_a_' + j + '" value="999" ><div class="help-block error"></div></td></tr>';
				
			asd+='</tbody></table>';
			$('#cap_5').append(asd);
	}

	$('#P5_TotAmb_p_1_a_1').focus();

});
$('#P5_cantNroPiso').trigger('change');


$('#P5_Tot_E').change(function(event) {
	$('#cap5_detalle > tbody > tr').remove('.detalle');
	var ahua = $(this).val();
	var n_pisos = $('#P5_cantNroPiso').val();

	if ( ahua > 0 && ahua != 99 && n_pisos != 99 ) 
	{
		for(var i=1; i<=n_pisos;i++)
		{
			var asd = "";
				for (var j=1;j<=ahua;j++){
					asd+='<tr class="detalle"><th>Edificación N° <input type="text" readonly="true" class="span3 embc' + i + '" name="P5_Ed_Nro[]" id="P5_Ed_Nro' + '_p_' + i + '_e_' + j + '" value="' + j + '" ></th>';
					asd+='<td>Cantidad de Ambientes: <input type="text" class="input2 totamb" maxlength="2" name="P5_TotAmb[]" id="P5_TotAmb' + '_p_' + i + '_a_' + j + '" value="" ><div class="help-block error"></div></td></tr>';
				}
			$('tbody#piso'+i).append(asd);
		}

		for (var i=1; i<=n_pisos;i++)
		{
			$.getJSON(urlRoot('index.php')+'/consistencia/cap5/cap5_n/', {codigo:'<?php echo $cod; ?>',predio:<?php echo $pr; ?>,piso:i}, function(data, textStatus) {
					var ad = 1;
					$.each( data, function(i, valor) {
						$('#P5_Ed_Nro' + '_p_' +  valor.P5_NroPiso + '_e_' + ad).val(valor.P5_Ed_Nro);
						$('#P5_TotAmb' + '_p_' + valor.P5_NroPiso + '_a_' + ad).val(valor.P5_TotAmb);
						ad++;
					});
			});
		}
		
	}else if ( ahua == 99 && n_pisos == 99 ) {
		i = 1;
		j = 1;
		var asd = "";
		asd+='<tr class="detalle"><th>Edificación N° <input type="text" readonly="true" class="span3 embc' + i + '" name="P5_Ed_Nro[]" id="P5_Ed_Nro' + '_p_' + i + '_e_' + j + '" value="99" ></th>';
		asd+='<td>Cantidad de Ambientes: <input type="text" class="input3 totamb" maxlength="3" name="P5_TotAmb[]" id="P5_TotAmb' + '_p_' + i + '_a_' + j + '" value="999" ><div class="help-block error"></div></td></tr>';
		$('tbody#piso'+i).append(asd);
	}
	
});


$("#cap5_f").validate({	
	    rules: {
			P5_Tot_E: {
				digits:true,
				range:[0,99],
				required: true,
			},
			P5_Tot_P: {
				digits:true,
				valrango:[1,99,0],
			},
			P5_Tot_LD: {
				digits:true,
				valrango:[1,99,0],
			},
			P5_Tot_CTE: {
				digits:true,
				valrango:[1,99,0],
			},
			P5_Tot_MC: {
				digits:true,
				valrango:[1,99,0],
			},
			P5_Tot_P1: {
				digits:true,
				valrango:[1,99,0],
			},
			P5_Tot_R: {
				digits:true,
				valrango:[1,99,0],
			},
			P5_Opin: {
				valtexto:['M','R','D','E',9],
			},
			P5_cantNroPiso: {
				digits:true,
				range:[0,99],
				required: true,
			},
			'P5_TotAmb[]':{
				digits:true,
				range:[0,99],
				required:true,
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
			    	var cap5_data = $("#cap5_f").serializeArray();
				    cap5_data.push(
				        {name: 'ajax',value:1},
				        {name: 'id_local',value:$("input[name='id_local']").val()},      
				        {name: 'Nro_Pred',value:$("input[name='Nro_Pred']").val()},
				        {name: 'user_id',value:parseInt($("input[name='user_id']").val())}   
				    );
					
			        var bcar = $( "#cap5_f :submit" );
			         bcar.attr("disabled", "disabled");
			        $.ajax({
			            url: CI.site_url + "/consistencia/cap5",
			            type:'POST',
			            data:cap5_data,
			            dataType:'json',
			            success:function(json){							
							alert(json.msg);
							bcar.removeAttr('disabled');
							$('#ctab5').removeClass('active');
							$('#ctab6 a').trigger('click');
							window.scrollTo(0, 0);
			            }
			        });     			          	
	    }	    
});


});
</script>