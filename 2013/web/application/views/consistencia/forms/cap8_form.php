<?php 


////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 8
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA P8 - Capitulo VIII

$Cant_Otras_Edif = array(
	'name'	=> 'Cant_Otras_Edif',
	'id'	=> 'Cant_Otras_Edif',
	'maxlength'	=> 3,
	'class'	=> 'input3',
	'disabled' => 'disabled',
);


$P8_2_Tipo = array(
	'name'	=> 'P8_2_Tipo',
	'id'	=> 'P8_2_Tipo',
	'maxlength'	=> 3,
	'class'	=> 'input3',
	'readonly' => 'true',
);

$P8_predio = array(
	'name'	=> 'P8_predio',
	'id'	=> 'P8_predio',
	'maxlength'	=> 2,
	'class'	=> 'input2',
);

$P8_2_Nro = array(
	'name'	=> 'P8_2_Nro',
	'id'	=> 'P8_2_Nro',
	'class'	=> 'input7',
	'readonly' => 'true',
);

$P8_area = array(
	'name'	=> 'P8_area',
	'id'	=> 'P8_area',
	'maxlength'	=> 6,
	'class'	=> 'input6',	
);

$P8_altura = array(
	'name'	=> 'P8_altura',
	'id'	=> 'P8_altura',
	'maxlength'	=> 6,
);

$P8_longitud = array(
	'name'	=> 'P8_longitud',
	'id'	=> 'P8_longitud',
	'maxlength'	=> 6,
);

$P8_ejecuto = array(
	'name'	=> 'P8_ejecuto',
	'id'	=> 'P8_ejecuto',
	'maxlength'	=> 1,
	'class'	=> 'input1',		
);

$P8_ejecuto_O = array(
	'name'	=> 'P8_ejecuto_O',
	'id'	=> 'P8_ejecuto_O',
	'disabled' => 'disabled',
);

$P8_Est_E = array(
	'name'	=> 'P8_Est_E',
	'id'	=> 'P8_Est_E',
	'maxlength'	=> 1,
	'class'	=> 'input1',			
);

$P8_Ant = array(
	'name'	=> 'P8_Ant',
	'id'	=> 'P8_Ant',
	'maxlength'	=> 1,
	'class'	=> 'input1',			
);

$P8_RecTec = array(
	'name'	=> 'P8_RecTec',
	'id'	=> 'P8_RecTec',
	'maxlength'	=> 1,
	'class'	=> 'input1',		
);

$P8_Est_PaLo = array(
	'name'	=> 'P8_Est_PaLo',
	'id'	=> 'P8_Est_PaLo',
	'maxlength'	=> 1,
	'class'	=> 'input1',
);

$P8_Obs = array(
	'name'	=> 'P8_Obs',
	'id'	=> 'P8_Obs',
	'class'	=> 'textarea98p',		
);

// FIN TABLA P8 - Capitulo VIII



////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 8
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

echo '

<div class="panel panel-info">
	  	    				<div class="panel-heading">CAPITULO VIII: CARACTERÍSTICAS DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</div>

							<div class="panel" style="background:#DDD;">
								<div id="panel_tipo_edificaciones_viii" style="margin-top:10px;margin-bottom:10px;">
									
								</div>
							</div>	 

							<div class="panel" style="background:#DDD;">
								<div id="panel_nro_tedificaciones_viii" style="margin-top:10px;margin-bottom:10px;">
									&nbsp;
								</div>
							</div>	  	    				

	  	    				<table class="table table-bordered">
		  	    				<thead>

			  	    					<tr><th colspan="3">SECCIÓN A: IDENTIFICACIÓN DE OTRAS EDIFICACIONES DEL LOCAL ESCOLAR</th>

		  	    				</tr></thead>
		  	    			</table>
		  	    			<table id="datos_generales_viii" class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th colspan="3">&nbsp;</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td class="dg_numero">1.</td>
		  	    						<td class="dg_texto">
		  	    							<strong>Número de </strong>
		  	    						</td>
		  	    						<td>
		  	    							<label>verificar Cap. 5</label>
		  	    							'.form_input($Cant_Otras_Edif).'
		  	    						</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>';

$attr = array('class' => 'form-vertical form-auth','id' => 'cap8_f');

echo form_open($this->uri->uri_string(),$attr);

echo '
		  	    			<table id="datos_otros_ed" class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th id="titulo_edificacion" colspan="3">&nbsp;</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr id="f1_edi">
		  	    						<td class="f1_c1_edi">2.</td>
		  	    						<td>
		  	    							<strong>Código de la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_2_Tipo).' - '.form_input($P8_2_Nro).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f2_edi">
		  	    						<td class="f2_c1_edi">2.1</td>
		  	    						<td id="area_edificacion">
		  	    							<strong>Area de </strong>
		  	    						</td>
		  	    						<td>
											<label>Area en m2</label>
											<table class="table table-bordered">
												<tbody><tr>
													<th style="text-align:center;">Enteros</th>
													<th style="text-align:center;">Decimales</th>
												</tr>
												<tr>
													</tr><tr>
														<td> '.form_input($P8_area).'<div class="help-block error"></div> </td>
														<td> 00 </td>
													</tr>
												
											</tbody></table>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f3_edi">
		  	    						<td>8.1</td>
		  	    						<td>
		  	    							<strong>Longitud del Muro de Contención</strong>
		  	    						</td>
		  	    						<td>
		  	    							En metros '.form_input($P8_longitud).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f4_edi">
		  	    						<td>8.2</td>
		  	    						<td>
		  	    							<strong>Altura del Muro de Contención</strong>
		  	    						</td>
		  	    						<td>
		  	    							En metros '.form_input($P8_altura).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f5_edi">
		  	    						<td class="f5_c1_edi">2.2</td>
		  	    						<td class="f5_c2_edi">
		  	    							<strong>Predio en el que se ubica la edificación</strong>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_predio).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f6_edi">
		  	    						<td class="f6_c1_edi">2.3</td>
		  	    						<td>
		  	    							<strong>¿Qué institución, organismo o empresa ejecutó la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_ejecuto).'<div class="help-block error"></div> (Especifique) '.form_input($P8_ejecuto_O).'
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f7_edi">
		  	    						<td class="f7_c1_edi">2.4</td>
		  	    						<td class="f7_c2_edi">
		  	    							<strong>Estado de conservación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td class="f7_c3_edi">
		  	    							'.form_input($P8_Est_E).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f8_edi">
		  	    						<td class="f8_c1_edi">2.5</td>
		  	    						<td class="f8_c2_edi">
		  	    							<strong>¿Cuál es la  antigüedad de la edificación?</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td class="f8_c3_edi">
		  	    							'.form_input($P8_Ant).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f9_edi">
		  	    						<td class="f9_c1_edi">6.6</td>
		  	    						<td>
		  	    							<strong>Estado de Conversación de Paredes y Losas del Tanque Elevado</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_Est_PaLo).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f10_edi">
		  	    						<td class="f10_c1_edi">2.6</td>
		  	    						<td>
		  	    							<strong>Recomendación técnica de la evaluación de la edificación</strong>
		  	    							<label>(Acepte sólo un código)</label>
		  	    						</td>
		  	    						<td>
		  	    							'.form_input($P8_RecTec).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr id="f11_edi">
			  	    					<td colspan="3">
			  	    							<div class="panel">
													<label>Observaciones:</label>
													'.form_textarea($P8_Obs).'
												</div>
			  	    					</td>
			  	    				</tr>
		  	    				</tbody>
		  	    			</table>
		  	    			'.form_submit('send', 'Guardar','class="btn btn-primary pull-right"').'

		  	    		</div>

';

echo form_close();
 ?>

<script type="text/javascript">

$(document).ready(function(){

	//longitud
	$('#datos_otros_ed > tbody > tr#f3_edi').hide();
	$('#P8_longitud').attr('disabled','disabled');
	
	//altura
	$('#datos_otros_ed > tbody > tr#f4_edi').hide();
	$('#P8_altura').attr('disabled','disabled');

	//tanque elevado
	$('#datos_otros_ed > tbody > tr#f9_edi').hide();
	$('#P8_Est_PaLo').attr('disabled','disabled');
	

	$('#ctab8').bind('click', function (e) {

		$.getJSON(urlRoot('index.php')+'/consistencia/cap5/cap5_i/', {codigo:'<?php echo $cod; ?>',predio:<?php echo $pr; ?>}, function(data, textStatus) {

			$('#panel_tipo_edificaciones_viii > div').remove('.btn-group');
			var cont = 0;
			$.each(data, function(i, datos) {	
				var asd ='<div class="btn-group">';
					asd+='<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Seleccione una Edificación <span class="caret"></span></a>';
					asd+='<ul class="dropdown-menu">';
				if (datos.P5_Tot_P > 0 && datos.P5_Tot_P < 99){
					asd+='<li id="' + datos.P5_Tot_P +'.cmb_P5_Tot_P" class="combo_ins1"><a href="" data-toggle="dropdown"> Patios del local escolar</a></li>';
					if (cont == 0) { 
						$('#P8_2_Tipo').val('P');
						$('#P8_2_Nro').val(1);
						$('#Cant_Otras_Edif').val(datos.P5_Tot_P);
						Get_Nro_Edif(datos.P5_Tot_P,'cmb_P5_Tot_P');
						cont = 1;
					}
				}
				if (datos.P5_Tot_LD > 0 && datos.P5_Tot_LD < 99){
					asd+='<li id="' + datos.P5_Tot_LD +'.cmb_P5_Tot_LD" class="combo_ins1"><a href="" data-toggle="dropdown"> Losas deportivas del local escolar</a></li>';
					if (cont == 0) { 
						$('#P8_2_Tipo').val('LD');
						$('#P8_2_Nro').val(1);
						$('#Cant_Otras_Edif').val(datos.P5_Tot_LD);
						Get_Nro_Edif(datos.P5_Tot_LD,'cmb_P5_Tot_LD');
						cont = 2;
					}
				}
				if (datos.P5_Tot_CTE > 0 && datos.P5_Tot_CTE < 99){
					asd+='<li id="' + datos.P5_Tot_CTE +'.cmb_P5_Tot_CTE" class="combo_ins1"><a href="" data-toggle="dropdown"> Cisternas y/o tanques del local escolar</a></li>';
					if (cont == 0) { 
						$('#P8_2_Tipo').val('CTE');
						$('#P8_2_Nro').val(1);
						$('#Cant_Otras_Edif').val(datos.P5_Tot_CTE);
						Get_Nro_Edif(datos.P5_Tot_CTE,'cmb_P5_Tot_CTE');
						cont = 3;
					}
				}
				if (datos.P5_Tot_MC > 0  && datos.P5_Tot_MC < 99){
					asd+='<li id="' + datos.P5_Tot_MC +'.cmb_P5_Tot_MC" class="combo_ins1"><a href="" data-toggle="dropdown"> Muros de contención del local escolar</a></li>';
					if (cont == 0) { 
						$('#P8_2_Tipo').val('MC');
						$('#P8_2_Nro').val(1);
						$('#Cant_Otras_Edif').val(datos.P5_Tot_MC);
						Get_Nro_Edif(datos.P5_Tot_MC,'cmb_P5_Tot_MC');
						cont = 4;
					}
				}
				asd+='</ul>';
				asd+='</div>';

				$('#panel_tipo_edificaciones_viii').html(asd);

			});
		});
	});


	$('#panel_tipo_edificaciones_viii').on('click','.combo_ins1',function(event){

		val= $(this).attr('id');
		array=val.split(".")

		//resetea form
		$('#cap8_f')[0].reset(); 
		$('#P8_ejecuto').trigger('change');
		//

		Get_Nro_Edif(array[0],array[1]);
		$('#panel_tipo_edificaciones_viii > div > ul > li.combo_ins1').removeClass('active');
		$(this).addClass('active');
	});

	function Get_Nro_Edif(numero,tipo){
		$('#panel_nro_tedificaciones_viii > div').remove('.btn-group');
		var asd ='<div class="btn-group">';

		var titulo = '';
		var codtipo = '';
		var contenido = '';

		switch(tipo)
		{
			case 'cmb_P5_Tot_P':
				titulo = 'Seleccione un Patio';
				codtipo = 'P.';
				contenido = 'Patio Nro: ';
				view_options('P');
				view_numeracion(2);
				break;

			case 'cmb_P5_Tot_LD':
				titulo = 'Seleccione una Losa Deportiva';
				codtipo = 'LD.';
				contenido = 'Losa deportiva Nro: ';
				view_options('LD');
				view_numeracion(4);
				break;

			case 'cmb_P5_Tot_CTE':
				titulo = 'Seleccione una Cisterna o Tanque';
				codtipo = 'CTE.';
				contenido = 'Cisterna y/o Tanque Nro: ';
				view_options('CTE');
				view_numeracion(6);
				break;

			case 'cmb_P5_Tot_MC':
				titulo = 'Seleccione un Muro de Contención';
				codtipo = 'MC.';
				contenido = 'Muro de contención Nro: ';
				view_options('MC');
				view_numeracion(8);
				break;
		}

		asd+='<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">' + titulo + '<span class="caret"></span></a>';
			asd+='<ul class="dropdown-menu">';
		for (var i=1; i<=numero; i++) {
			asd+='<li id="' + codtipo + i +'" class="combo_ins1"><a href="" data-toggle="dropdown">' + contenido + i + ' </a></li>';
		}
		asd+='</ul>';
		asd+='</div>';

		$('#panel_nro_tedificaciones_viii').html(asd);
		$('#Cant_Otras_Edif').val(numero);
	}

	function view_options(tipo){

		var gene_1 = '';
		var gene_2 = '';
		var cont_1 = '';
		var cont_2 = '';
		var cont_3 = '';
		var cont_4 = '';
		var cont_5 = '';
		var cont_6 = '';
		var cont_7 = '';
		

		switch (tipo){
			case 'P':
				gene_1='PATIOS DEL LOCAL ESCOLAR';
				gene_2='<strong>Número de patios del local escolar</strong>';
				cont_1='PATIO';
				cont_2='<strong>Area del Patio</strong>';
				cont_3='<strong>Predio en el que se ubica la edificación</strong>';
				cont_4='<strong>Estado de conservación de la edificación</strong><label>(Acepte sólo un código)</label>';
				cont_5='<?php echo form_input($P8_Est_E); ?><div class="help-block error"></div>';

				cont_6='<strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label>';
				cont_7='<?php echo form_input($P8_Ant); ?><div class="help-block error"></div>';

			break;

			case 'LD':
				gene_1='LOSAS DEPORTIVAS DEL LOCAL ESCOLAR';
				gene_2='<strong>Número de losas deportivas del local escolar</strong>';
				cont_1='LOSA DEPORTIVA';
				cont_2='<strong>Area de la Losa Deportiva</strong>';
				cont_3='<strong>Predio en el que se ubica la edificación</strong>';
				cont_4='<strong>Estado de conservación de la edificación</strong><label>(Acepte sólo un código)</label>';
				cont_5='<?php echo form_input($P8_Est_E); ?><div class="help-block error"></div>';
				cont_6='<strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label>';
				cont_7='<?php echo form_input($P8_Ant); ?><div class="help-block error"></div>';
			break;

			case 'CTE':
				gene_1='CISTERNAS Y/O TANQUES DEL LOCAL ESCOLAR';
				gene_2='<strong>Número de cisternas y/o tanques elevados del local escolar</strong>';
				cont_1='CISTERNA - TANQUE';
				cont_2='<strong>Area Construida de la Edificación</strong>';
				cont_3='<strong>Predio en el que se ubica la edificación</strong>';
				cont_4='<strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label>';
				cont_5='<?php echo form_input($P8_Ant); ?><div class="help-block error"></div>';
				cont_6='<strong>Estado de conservación de la edificación</strong><label>(Acepte sólo un código)</label>';
				cont_7='<?php echo form_input($P8_Est_E); ?><div class="help-block error"></div>';
			break;

			case 'MC':
				gene_1='MUROS DE CONTENCION DEL LOCAL ESCOLAR';
				gene_2='<strong>Número de muros de contención del local escolar</strong>';
				cont_1='MURO DE CONTENCION';
				cont_2='';
				cont_3='<strong>Predio en el que se ubica el Muro de Contención</strong>';
				cont_4='<strong>Estado de Conservación</strong><label>(Acepte sólo un código)</label>';
				cont_5='<?php echo form_input($P8_Est_E); ?><div class="help-block error"></div>';
				cont_6='<strong>¿Cuál es la  antigüedad de la edificación?</strong><label>(Acepte sólo un código)</label>';
				cont_7='<?php echo form_input($P8_Ant); ?><div class="help-block error"></div>';
			break;
		}

		$('#datos_generales_viii > thead > tr > th').html(gene_1);
		$('#datos_generales_viii > tbody > tr > td.dg_texto').html(gene_2);
		
		$('#titulo_edificacion').html(cont_1);
		if (tipo!='MC')	$('#area_edificacion').html(cont_2);
		$('#f5_edi > td.f5_c2_edi').html(cont_3);
		
		$('#f7_edi > td.f7_c2_edi').html(cont_4);
		$('#f7_edi > td.f7_c3_edi').html(cont_5);
		
		$('#f8_edi > td.f8_c2_edi').html(cont_6);
		$('#f8_edi > td.f8_c3_edi').html(cont_7);

		if (tipo!='CTE') { 
			$('#datos_otros_ed > tbody > tr#f9_edi').hide();
			$('#P8_Est_PaLo').attr('disabled','disabled');
		}else{ 
			$('#datos_otros_ed > tbody > tr#f9_edi').show();
			$('#P8_Est_PaLo').removeAttr('disabled');
		}

		if (tipo=='MC') { 
			//area
			$('#datos_otros_ed > tbody > tr#f2_edi').hide();
			$('#P8_area').attr('disabled','disabled');

			//Longitud
			$('#datos_otros_ed > tbody > tr#f3_edi').show();
			$('#P8_longitud').removeAttr('disabled');
			
			//Altura
			$('#datos_otros_ed > tbody > tr#f4_edi').show();
			$('#P8_altura').removeAttr('disabled');

		}else{ 
			//area
			$('#datos_otros_ed > tbody > tr#f2_edi').show();
			$('#P8_area').removeAttr('disabled');
			
			//Longitud
			$('#datos_otros_ed > tbody > tr#f3_edi').hide();
			$('#P8_longitud').attr('disabled','disabled');

			//Altura
			$('#datos_otros_ed > tbody > tr#f4_edi').hide();
			$('#P8_altura').attr('disabled','disabled');

		}

	}

	function view_numeracion(num){

		var princ = num-1;

		$('#datos_generales_viii > tbody > tr > td.dg_numero').html(princ);

		$('#f1_edi > td.f1_c1_edi').html(num);
		$('#f2_edi > td.f2_c1_edi').html(num+'.1');

		nn = ( num < 8) ? 2 : 3;
		$('#f5_edi > td.f5_c1_edi').html(num+'.'+nn);
		nn = ( num < 8) ? 3 : 4;
		$('#f6_edi > td.f6_c1_edi').html(num+'.'+nn);
		nn = ( num < 8) ? 4 : 5;
		$('#f7_edi > td.f7_c1_edi').html(num+'.'+nn);
		nn = ( num < 8) ? 5 : 6;
		$('#f8_edi > td.f8_c1_edi').html(num+'.'+nn);
		nn = ( num < 6) ? 6 : 7;
		$('#f10_edi > td.f10_c1_edi').html(num+'.'+nn);
		
	}


	$('#panel_nro_tedificaciones_viii').on('click','.combo_ins1',function(event){

		val= $(this).attr('id');
		array=val.split(".")
		
		//resetea form
		$('#cap8_f')[0].reset(); 
		$('#P8_ejecuto').trigger('change');
		//

		Get_Datos_Edif(array[0],array[1]);
		$('#panel_nro_tedificaciones_viii > div > ul > li.combo_ins1').removeClass('active');
		$(this).addClass('active');
	});

	function Get_Datos_Edif(tipo_edi,numero){

		$('#P8_2_Tipo').val(tipo_edi);
		$('#P8_2_Nro').val(numero);
		
		$.getJSON(urlRoot('index.php')+'/consistencia/cap8/cap8_i/', {codigo:'<?php echo $cod; ?>',predio:<?php echo $pr; ?>,tipo:tipo_edi,nro:numero}, function(data, textStatus) {

			$.each( data, function(fila, valor) {
				if (fila=='P8_area' || fila=='P8_altura' || fila=='P8_longitud'){ $('#' + fila).val(Math.round(valor)); }else{
					$('#' + fila).val(valor);
				}
				if (fila == 'P8_ejecuto') $('#P8_ejecuto').trigger('change');
			});
		});
	}

	$('#P8_ejecuto').change(function(event){

		$('#P8_ejecuto_O').attr('disabled','disabled');

		if ( $('#P8_2_Tipo').val() == 'CTE' || $('#P8_2_Tipo').val() == 'MC' ) {
			
			$('#P8_ejecuto_O').val('');
			if ( $('#P8_ejecuto').val() == 7 ) {
				$('#P8_ejecuto_O').removeAttr('disabled');
			}

		}
	});


	$("#cap8_f").validate({
	    rules: {
			P8_2_Nro:{
				digits:true,
				required: true,
			},
			P8_area:{
				digits:true,
				valrango:[0,999998,999999],
			},
			P8_predio:{
				digits:true,
				required: true,
				exactlength: 2,
			},
			//Patio
			P8_ejecuto:{
				digits:true,
				valrango:[1,7,9],
			},
			P8_Est_E:{
				digits:true,
				valrango:[1,4,9],
			},
			P8_Ant:{
				digits:true,
				valrango:[1,3,9],
			},
			P8_RecTec:{
				digits:true,
				valrango:[1,3,9],
			},

			//Cisterna - tanque
			P8_Est_PaLo:{
				digits:true,
				valrango:[1,5,9],
			},

			//Muro de Contencion
			P8_longitud:{
				digits:true,
				valrango:[0,999998,999999],
			},
			P8_altura:{
				digits:true,
				valrango:[0,999998,999999],
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
			    	var cap8_data = $("#cap8_f").serializeArray();
				    cap8_data.push(
				        {name: 'ajax',value:1},
				        {name: 'id_local',value:$("input[name='id_local']").val()},      
				        {name: 'Nro_Pred',value:$("input[name='Nro_Pred']").val()},
				        {name: 'user_id',value:parseInt($("input[name='user_id']").val())}
				    );
					
			        var bcar = $( "#cap8_f :submit" );
			         bcar.attr("disabled", "disabled");
			        $.ajax({
			            url: CI.site_url + "/consistencia/cap8",
			            type:'POST',
			            data:cap8_data,
			            dataType:'json',
			            success:function(data){
							alert(data.msg);
							bcar.removeAttr('disabled');
							$('#cap8_f')[0].reset(); 
							$('#P8_ejecuto').trigger('change');
							if (data.newnro > 0){
								Get_Nro_Edif(data.total,data.newtipo);	
								$('#P8_2_Tipo').val(data.codtipo);
								$('#P8_2_Nro').val(data.newnro);
								$('#Cant_Otras_Edif').val(data.total);
								$('#P8_2_Nro').focus();
							}
							window.scrollTo(0, 0);
			            }
			        });
		}
	});


});

</script>