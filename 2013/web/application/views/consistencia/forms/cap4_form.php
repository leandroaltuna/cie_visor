<?php 

////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 4
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

// TABLA FRENTE_LINDEROS - Capitulo IV

$P4_1_Foto = array(
	'name'	=> 'P4_1_Foto',
	'id'	=> 'P4_1_Foto',
	'class' => 'input98p',
	'readonly'	=> 'true',
);

$P4_2_CantTram_Lfrente = array(
	'name'	=> 'P4_2_CantTram_Lfrente',
	'id'	=> 'P4_2_CantTram_Lfrente',
	'class' => 'input2',
	'maxlength'	=> 2,	
);

$P4_2_CantTram_Lderecho = array(
	'name'	=> 'P4_2_CantTram_Lderecho',
	'id'	=> 'P4_2_CantTram_Lderecho',
	'class' => 'input2',
	'maxlength'	=> 2,		
);

$P4_2_CantTram_Lfondo = array(
	'name'	=> 'P4_2_CantTram_Lfondo',
	'id'	=> 'P4_2_CantTram_Lfondo',
	'class' => 'input2',
	'maxlength'	=> 2,		
);

$P4_2_CantTram_Lizq = array(
	'name'	=> 'P4_2_CantTram_Lizq',
	'id'	=> 'P4_2_CantTram_Lizq',
	'class' => 'input2',
	'maxlength'	=> 2,		
);

$P4_1_Obs = array(
	'name'	=> 'P4_1_Obs',
	'id'	=> 'P4_1_Obs',
	'class' => 'textarea98p',
);

// FIN TABLA FRENTE_LINDEROS - Capitulo IV

// TABLA P4_2N - Capitulo IV

// $P4_2_LindTipo = array(
// 	'name'	=> 'P4_2_LindTipo',
// 	'id'	=> 'P4_2_LindTipo',
// );

// $P4_2_1A_NroTramo = array(
// 	'name'	=> 'P4_2_1A_NroTramo',
// 	'id'	=> 'P4_2_1A_NroTramo',
// );

// $P4_2_1A_i = array(
// 	'name'	=> 'P4_2_1A_i',
// 	'id'	=> 'P4_2_1A_i',
// );

// $P4_2_1A_f = array(
// 	'name'	=> 'P4_2_1A_f',
// 	'id'	=> 'P4_2_1A_f',
// );

// $P4_2_1B_LongTramo = array(
// 	'name'	=> 'P4_2_1B_LongTramo',
// 	'id'	=> 'P4_2_1B_LongTramo',
// );

// $P4_2_1C_Cerco = array(
// 	'name'	=> 'P4_2_1C_Cerco',
// 	'id'	=> 'P4_2_1C_Cerco',
// );

// $P4_2_1D_Estruc = array(
// 	'name'	=> 'P4_2_1D_Estruc',
// 	'id'	=> 'P4_2_1D_Estruc',
// );

// $P4_2_1E_EstCons = array(
// 	'name'	=> 'P4_2_1E_EstCons',
// 	'id'	=> 'P4_2_1E_EstCons',
// );

// $P4_2_1E_EstCons = array(
// 	'name'	=> 'P4_2_1E_EstCons',
// 	'id'	=> 'P4_2_1E_EstCons',
// );

// $P4_2_1F_Opin = array(
// 	'name'	=> 'P4_2_1F_Opin',
// 	'id'	=> 'P4_2_1F_Opin',
// );


// FIN TABLA P4_2N - Capitulo IV

////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CAP 4
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$attr = array('class' => 'form-vertical form-auth','id' => 'cap4_f');

echo form_open($this->uri->uri_string(),$attr); 

echo '

<div class="panel panel-info">
	  	    				<div class="panel-heading">
	  	    					<h5>Capitulo IV. Localización del predio y caracteristicas de sus linderos</h5>
	  	    				</div>

	  	    				<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
			  	    					<th>Sección A: Croquis de localización del predio</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>'.form_input($P4_1_Foto).'</td>
		  	    					</tr>
		  	    				</tbody>
		  	    			</table>

		  	    			<table class="table table-bordered">
		  	    				<thead>
		  	    					<tr>
		  	    						<th colspan="3">Sección B:  características de linderos</th>
		  	    					</tr>
		  	    				</thead>
		  	    				<tbody>
		  	    					<tr>
		  	    						<td>1.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero frente con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lfrente).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_frente" class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero frente (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">1C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">1F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    											  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>2.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero derecho con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lderecho).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_derecha"  class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero Derecho (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">2C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">2F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    												  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>3.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero fondo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lfondo).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_fondo" class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero fondo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">3C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">3F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td>4.</td>
		  	    						<td><strong>De cuántos tramos está conformado el lindero izquierdo con o sin cerco</strong></td>
		  	    						<td>
		  	    							<label>Nº total de tramos:</label>
		  	    							'.form_input($P4_2_CantTram_Lizq).'<div class="help-block error"></div>
		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td></td>
		  	    						<td colspan="2">

		  	    							<table id="lindero_izquierda" class="table table-bordered">
		  	    								<thead>
		  	    									<tr>
		  	    										<th style="text-align:center; vertical-align:middle;" colspan="8">
		  	    											Lindero izquierdo (especifique cada uno de los tramos en el cuadro)
		  	    										</th>
		  	    									</tr>
		  	    									<tr>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">N°</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4A. Nº de tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4B. Longitud del tramo (m)</th>
		  	    										<th colspan="1" style="text-align:center; vertical-align:middle;">4C. El tramo tiene cerco</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4D. El sistema estructural predominante del tramo es:</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4E. Estado de conservación del tramo</th>
		  	    										<th rowspan="2" style="text-align:center; vertical-align:middle;">4F. Opinión técnica del evaluador</th>
		  	    									</tr>
		  	    								</thead>
		  	    								<tbody>
		  	    									  	    								
		  	    								</tbody>
		  	    							</table>

		  	    						</td>
		  	    					</tr>
		  	    					<tr>
		  	    						<td colspan="3"><h4>OBSERVACIONES</h4> <br /> '.form_textarea($P4_1_Obs).'</td>
		  	    					</tr>

		  	    				</tbody>
		  	    			</table>
	  	    			</div>

';
echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
 ?>

<script type="text/javascript">

$(document).ready(function(){

	//cap4
	$.each( <?php echo json_encode($cap4_i->row()); ?>, function(fila, valor) {
		   $('#' + fila).val(valor);
	});

	//////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
	//Saltos de P4
	$(document).on("change",'.cerco',function() {
		var campo = $(this);
		var cod = campo.attr('id');
		array=cod.split("_");
		if (campo.val() == 2){
			$('.cerco_' + array[4] + '_' + array[5]).val('');
			$('.cerco_' + array[4] + '_' + array[5]).attr('readonly','readonly');
		}else{
			$('.cerco_' + array[4] + '_'+ array[5]).removeAttr('readonly');
		}
	});
	//////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////

	//cap4 N
		/**** FRENTE *****/
	$('#P4_2_CantTram_Lfrente').change(function(event) {

		$('#lindero_frente tr').remove('.lind');
		var ahua = $(this).val();
		if(ahua > 0 && ahua<=98){
			var asd = '';
			for(var i=1; i<=ahua;i++){
				asd += '<tr class="lind">';
				asd	+='<td>';
				asd +='<input type="text" class="input1" readonly="true" maxlength="2" name="P4_2_1A_NroTramo[]" id="P4_2_1A_NroTramo' + '_t1_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input2" readonly="true" maxlength="2" name="P4_2_1A_i[]" id="P4_2_1A_i' + '_t1_' + i + '" value="" > - <input type="text" class="input2" readonly="true" maxlength="2" name="P4_2_1A_f[]" id="P4_2_1A_f' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input6 long" maxlength="4" name="P4_2_1B_LongTramo[]" id="P4_2_1B_LongTramo' + '_t1_' + i + '" value=""><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco" maxlength="1" name="P4_2_1C_Cerco[]" id="P4_2_1C_Cerco' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t1_' + i + '" maxlength="1" name="P4_2_1D_Estruc[]" id="P4_2_1D_Estruc' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t1_' + i + '" maxlength="1" name="P4_2_1E_EstCons[]" id="P4_2_1E_EstCons' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t1_' + i + '" maxlength="1" name="P4_2_1F_Opin[]" id="P4_2_1F_Opin' + '_t1_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd += '</tr>';				
			}
			$('#lindero_frente > tbody').html(asd);
		}else if(ahua=='' || ahua==99 || ahua == 0){
			//
		}else{
			alert('Dato Incorrecto');
		}


		var as = 1;
		$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
				if (data.P4_2_LindTipo == 1){
					$('#P4_2_1A_NroTramo' + '_t1_' + as).val(data.P4_2_1A_NroTramo);
					$('#P4_2_1A_i' + '_t1_' + as).val(data.P4_2_1A_i);
					$('#P4_2_1A_f' + '_t1_' + as).val(data.P4_2_1A_f);
					$('#P4_2_1B_LongTramo' + '_t1_' + as).val(data.P4_2_1B_LongTramo);
					$('#P4_2_1C_Cerco' + '_t1_' +  as).val(data.P4_2_1C_Cerco);
					$('#P4_2_1D_Estruc' + '_t1_' +  as).val(data.P4_2_1D_Estruc);
					$('#P4_2_1E_EstCons' + '_t1_' +  as).val(data.P4_2_1E_EstCons);
					$('#P4_2_1F_Opin' + '_t1_' +  as).val(data.P4_2_1F_Opin);
					//ejecutar salto al cargar
					$('#P4_2_1C_Cerco' + '_t1_' +  as).trigger('change');
					as++;
				}
		});

		ordenar_tramos();
		$('#P4_2_1A_NroTramo_t1_1').focus();
	});
	
	$('#P4_2_CantTram_Lfrente').trigger('change');
	/***************/


	/**** DERECHA *****/
	$('#P4_2_CantTram_Lderecho').change(function(event) {

		$('#lindero_derecha tr').remove('.lind');
		var ahua = $(this).val();
		if(ahua > 0 && ahua<=98){
			for(var i=1; i<=ahua;i++){
				var asd = '<tr class="lind">';
				asd	+='<td>';
				asd +='<input type="text" class="input1" readonly="true" maxlength="2" name="P4_2_1A_NroTramo[]" id="P4_2_1A_NroTramo' + '_t2_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input2" readonly="true" maxlength="2" name="P4_2_1A_i[]" id="P4_2_1A_i' + '_t2_' + i + '" value="" > - <input type="text" class="input2" readonly="true" maxlength="2" name="P4_2_1A_f[]" id="P4_2_1A_f' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input6 long" maxlength="4" name="P4_2_1B_LongTramo[]" id="P4_2_1B_LongTramo' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco" maxlength="1" name="P4_2_1C_Cerco[]" id="P4_2_1C_Cerco' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t2_' + i + '" maxlength="1" name="P4_2_1D_Estruc[]" id="P4_2_1D_Estruc' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t2_' + i + '" maxlength="1" name="P4_2_1E_EstCons[]" id="P4_2_1E_EstCons' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t2_' + i + '" maxlength="1" name="P4_2_1F_Opin[]" id="P4_2_1F_Opin' + '_t2_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd += '</tr>';
				$('#lindero_derecha > tbody').append(asd);
			}
		}else if(ahua=='' || ahua==99 || ahua == 0){
			//
		}else{
			alert('Dato Incorrecto');
		}


		var as = 1;
		$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
				if (data.P4_2_LindTipo == 2){				
					$('#P4_2_1A_NroTramo' + '_t2_' + as).val(data.P4_2_1A_NroTramo);
					$('#P4_2_1A_i' + '_t2_' + as).val(data.P4_2_1A_i);
					$('#P4_2_1A_f' + '_t2_' + as).val(data.P4_2_1A_f);
					$('#P4_2_1B_LongTramo' + '_t2_' + as).val(data.P4_2_1B_LongTramo);
					$('#P4_2_1C_Cerco' + '_t2_' +  as).val(data.P4_2_1C_Cerco);
					$('#P4_2_1D_Estruc' + '_t2_' +  as).val(data.P4_2_1D_Estruc);
					$('#P4_2_1E_EstCons' + '_t2_' +  as).val(data.P4_2_1E_EstCons);
					$('#P4_2_1F_Opin' + '_t2_' +  as).val(data.P4_2_1F_Opin);
					//ejecutar salto al cargar
					$('#P4_2_1C_Cerco' + '_t2_' +  as).trigger('change');
					as++;
				}
		});
		ordenar_tramos();
		$('#P4_2_1A_NroTramo_t2_1').focus();
	});
	$('#P4_2_CantTram_Lderecho').trigger('change');
	/*************/



	/**** FONDO *****/
	$('#P4_2_CantTram_Lfondo').change(function(event) {

		$('#lindero_fondo tr').remove('.lind');
		var ahua = $(this).val();
		if(ahua > 0 && ahua<=98){
			for(var i=1; i<=ahua;i++){
				var asd = '<tr class="lind">';
				asd	+='<td>';
				asd +='<input type="text" class="input1" readonly="true" maxlength="2" name="P4_2_1A_NroTramo[]" id="P4_2_1A_NroTramo' + '_t3_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input2" readonly="true" maxlength="2" name="P4_2_1A_i[]" id="P4_2_1A_i' + '_t3_' + i + '" value="" > - <input type="text" class="input2" readonly="true" maxlength="2" name="P4_2_1A_f[]" id="P4_2_1A_f' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input6" maxlength="4" name="P4_2_1B_LongTramo[]" id="P4_2_1B_LongTramo' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco" maxlength="1" name="P4_2_1C_Cerco[]" id="P4_2_1C_Cerco' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t3_' + i + '" maxlength="1" name="P4_2_1D_Estruc[]" id="P4_2_1D_Estruc' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t3_' + i + '" maxlength="1" name="P4_2_1E_EstCons[]" id="P4_2_1E_EstCons' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t3_' + i + '" maxlength="1" name="P4_2_1F_Opin[]" id="P4_2_1F_Opin' + '_t3_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd += '</tr>';
				$('#lindero_fondo > tbody').append(asd);
			}
		}else if(ahua=='' || ahua==99 || ahua == 0){
			//
		}else{
			// alert('Dato Incorrecto');
		}


		var as = 1;
		$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
				if (data.P4_2_LindTipo == 3){				
					$('#P4_2_1A_NroTramo' + '_t3_' + as).val(data.P4_2_1A_NroTramo);
					$('#P4_2_1A_i' + '_t3_' + as).val(data.P4_2_1A_i);
					$('#P4_2_1A_f' + '_t3_' + as).val(data.P4_2_1A_f);
					$('#P4_2_1B_LongTramo' + '_t3_' + as).val(data.P4_2_1B_LongTramo);
					$('#P4_2_1C_Cerco' + '_t3_' +  as).val(data.P4_2_1C_Cerco);
					$('#P4_2_1D_Estruc' + '_t3_' +  as).val(data.P4_2_1D_Estruc);
					$('#P4_2_1E_EstCons' + '_t3_' +  as).val(data.P4_2_1E_EstCons);
					$('#P4_2_1F_Opin' + '_t3_' +  as).val(data.P4_2_1F_Opin);
					//ejecutar salto al cargar
					$('#P4_2_1C_Cerco' + '_t3_' +  as).trigger('change');
					as++;
				}
		});
		ordenar_tramos();
		$('#P4_2_1A_NroTramo_t3_1').focus();
	});
	$('#P4_2_CantTram_Lfondo').trigger('change');
	/**************/


	/**** IZQUIERDA *****/
	$('#P4_2_CantTram_Lizq').change(function(event) {

		$('#lindero_izquierda tr').remove('.lind');
		var ahua = $(this).val();
		if(ahua > 0 && ahua<=98){
			for(var i=1; i<=ahua;i++){
				var asd = '<tr class="lind">';
				asd	+='<td>';
				asd +='<input type="text" class="input1" readonly="true" maxlength="2" name="P4_2_1A_NroTramo[]" id="P4_2_1A_NroTramo' + '_t4_' + i + '" value="' + i + '" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input2" readonly="true" maxlength="2" name="P4_2_1A_i[]" id="P4_2_1A_i' + '_t4_' + i + '" value="" > - <input type="text" readonly="true" class="input2" maxlength="2" name="P4_2_1A_f[]" id="P4_2_1A_f' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input6" maxlength="4" name="P4_2_1B_LongTramo[]" id="P4_2_1B_LongTramo' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco" maxlength="1" name="P4_2_1C_Cerco[]" id="P4_2_1C_Cerco' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t4_' + i + '" maxlength="1" name="P4_2_1D_Estruc[]" id="P4_2_1D_Estruc' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t4_' + i +'" maxlength="1" name="P4_2_1E_EstCons[]" id="P4_2_1E_EstCons' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd +='<td><input type="text" class="input1 cerco' + '_t4_' + i + '" maxlength="1" name="P4_2_1F_Opin[]" id="P4_2_1F_Opin' + '_t4_' + i + '" value="" ><div class="help-block error"></div></td>';
				asd += '</tr>';
				$('#lindero_izquierda > tbody').append(asd);
			}
		}else if(ahua=='' || ahua==99 || ahua == 0){
			//
		}else{
			alert('Dato Incorrecto');
		}


		var as = 1;
		$.each( <?php echo json_encode($cap4_n->result()); ?>, function(i, data) {
				if (data.P4_2_LindTipo == 4){				
					$('#P4_2_1A_NroTramo' + '_t4_' + as).val(data.P4_2_1A_NroTramo);
					$('#P4_2_1A_i' + '_t4_' + as).val(data.P4_2_1A_i);
					$('#P4_2_1A_f' + '_t4_' + as).val(data.P4_2_1A_f);
					$('#P4_2_1B_LongTramo' + '_t4_' + as).val(data.P4_2_1B_LongTramo);
					$('#P4_2_1C_Cerco' + '_t4_' +  as).val(data.P4_2_1C_Cerco);
					$('#P4_2_1D_Estruc' + '_t4_' +  as).val(data.P4_2_1D_Estruc);
					$('#P4_2_1E_EstCons' + '_t4_' +  as).val(data.P4_2_1E_EstCons);
					$('#P4_2_1F_Opin' + '_t4_' +  as).val(data.P4_2_1F_Opin);
					//ejecutar salto al cargar
					$('#P4_2_1C_Cerco' + '_t4_' +  as).trigger('change');
					as++;
				}
		});
		ordenar_tramos();
		$('#P4_2_1A_NroTramo_t4_1').focus();
	});
	$('#P4_2_CantTram_Lizq').trigger('change');


	function ordenar_tramos(){

		fren = $('#P4_2_CantTram_Lfrente').val();
		der = $('#P4_2_CantTram_Lderecho').val();
		fon = $('#P4_2_CantTram_Lfondo').val();
		izq = $('#P4_2_CantTram_Lizq').val();

		var ad=1;
		for (var i=1; i<=fren; i++){
			$('#P4_2_1A_i' + '_t1_' + i).val(ad);
			$('#P4_2_1A_f' + '_t1_' + i).val(parseInt(ad+1));
			ad++;
		}

		for (var i=1; i<=der; i++){
			$('#P4_2_1A_i' + '_t2_' + i).val(ad);
			$('#P4_2_1A_f' + '_t2_' + i).val(parseInt(ad+1));
			ad++;
		}

		for (var i=1; i<=fon; i++){
			$('#P4_2_1A_i' + '_t3_' + i).val(ad);
			$('#P4_2_1A_f' + '_t3_' + i).val(parseInt(ad+1));
			ad++;
		}

		for (var i=1; i<=izq; i++){
			$('#P4_2_1A_i' + '_t4_' + i).val(ad);
			if (i<izq){
				$('#P4_2_1A_f' + '_t4_' + i).val(parseInt(ad+1));
			}else{
				$('#P4_2_1A_f' + '_t4_' + i).val(1);
			}
			ad++;
		}
		
	}
	/*************/

	
	//////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////
	//Graba
	$("#cap4_f").validate({
		    rules: {
				P4_2_CantTram_Lfrente: {
					digits:true,
					valrango:[0,98,99],
					required: true,
				},
				P4_2_CantTram_Lderecho: {
					digits:true,
					valrango:[0,98,99],
					required: true,
				},
				P4_2_CantTram_Lfondo: {
					digits:true,
					valrango:[0,98,99],
					required: true,
				},
				P4_2_CantTram_Lizq: {
					digits:true,
					valrango:[0,98,99],
					required: true,
				},
				'P4_2_1A_i[]':{
					digits:true,
					range:[1,99],
				},
				'P4_2_1A_f[]':{
					digits:true,
					range:[1,99],
				},
				'P4_2_1B_LongTramo[]':{
					digits:true,
					valrango:[1,9998,9999],
					required:true,
				},
				'P4_2_1C_Cerco[]':{
					digits:true,
					valrango:[1,2,9],
					required:true,
				},
				'P4_2_1D_Estruc[]':{
					digits:true,
					valrango:[1,4,9],
				},
				'P4_2_1E_EstCons[]':{
					digits:true,
					valrango:[1,4,9],
				},
				'P4_2_1F_Opin[]':{
					digits:true,
					valrango:[1,3,9],
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
				    	var cap4_data = $("#cap4_f").serializeArray();
					    cap4_data.push(
					        {name: 'ajax',value:1},
					        {name: 'id_local',value:$("input[name='id_local']").val()},      
					        {name: 'Nro_Pred',value:$("input[name='Nro_Pred']").val()},
					        {name: 'user_id',value:parseInt($("input[name='user_id']").val())}
					    );
						
				        var bcar = $( "#cap4_f :submit" );
				         bcar.attr("disabled", "disabled");
				        $.ajax({
				            url: CI.site_url + "/consistencia/cap4",
				            type:'POST',
				            data:cap4_data,
				            dataType:'json',
				            success:function(json){
								alert(json.msg);
								bcar.removeAttr('disabled');
								$('#ctab4').removeClass('active');
								$('#ctab5 a').trigger('click');
								window.scrollTo(0, 0);
				            }
				        });
			}
	});


}); 
</script>