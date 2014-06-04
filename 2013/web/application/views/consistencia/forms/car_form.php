<?php 

////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CARATULA
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////

$departamento = array(
	'name'	=> 'departamento',
	'id'	=> 'departamento',
	'maxlength'	=> 200,
	'class' => 'input200',
);

$provincia = array(
	'name'	=> 'provincia',
	'id'	=> 'provincia',
	'maxlength'	=> 200,
	'class' => 'input200',
);

// $distrito = array(
// 	'name'	=> 'distrito',
// 	'id'	=> 'distrito',
// 	'maxlength'	=> 200,
// 	'class' => 'input200',
// );


$depArray = NULL;
foreach($dptos->result() as $d)
{
	$depArray[$d->CCDD]=strtoupper($d->Nombre);
}

$provArray = array(-1 => ' -'); 
$distArray = array(-1 => ' -'); 


$PC_A_4_CentroP = array(
	'name'	=> 'PC_A_4_CentroP',
	'id'	=> 'PC_A_4_CentroP',
	'maxlength'	=> 200,
	'class' => 'input200',
);

$PC_A_5_NucleoUrb = array(
	'name'	=> 'PC_A_5_NucleoUrb',
	'id'	=> 'PC_A_5_NucleoUrb',
	'maxlength'	=> 200,
	'class' => 'input200',
);

$PC_A_6_Ugel = array(
	'name'	=> 'PC_A_6_Ugel',
	'id'	=> 'PC_A_6_Ugel',
	'maxlength'	=> 200,
	'class' => 'input200',
);

$PC_A_7Dir_1_Tvia = array(
	'name'	=> 'PC_A_7Dir_1_Tvia',
	'id'	=> 'PC_A_7Dir_1_Tvia',
	'maxlength'	=> 1,
	'class' => 'input1',	
);

$PC_A_7Dir_2_Nomb = array(
	'name'	=> 'PC_A_7Dir_2_Nomb',
	'id'	=> 'PC_A_7Dir_2_Nomb',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_A_7Dir_3_Nro = array(
	'name'	=> 'PC_A_7Dir_3_Nro',
	'id'	=> 'PC_A_7Dir_3_Nro',
	'maxlength'	=> 4,
	'class' => 'input4',
);

$PC_A_7Dir_4_Piso = array(
	'name'	=> 'PC_A_7Dir_4_Piso',
	'id'	=> 'PC_A_7Dir_4_Piso',
	'maxlength'	=> 2,
	'class' => 'input3',
);

$PC_A_7Dir_5_Mz = array(
	'name'	=> 'PC_A_7Dir_5_Mz',
	'id'	=> 'PC_A_7Dir_5_Mz',
	'maxlength'	=> 3,
	'class' => 'input3',
);

$PC_A_7Dir_6_Lt = array(
	'name'	=> 'PC_A_7Dir_6_Lt',
	'id'	=> 'PC_A_7Dir_6_Lt',
	'maxlength'	=> 3,
	'class' => 'input3',
);

$PC_A_7Dir_7_Sect = array(
	'name'	=> 'PC_A_7Dir_7_Sect',
	'id'	=> 'PC_A_7Dir_7_Sect',
	'maxlength'	=> 3,
	'class' => 'input3',
);

$PC_A_7Dir_8_Zona = array(
	'name'	=> 'PC_A_7Dir_8_Zona',
	'id'	=> 'PC_A_7Dir_8_Zona',
	'maxlength'	=> 3,
	'class' => 'input3',
);

$PC_A_7Dir_9_Et = array(
	'name'	=> 'PC_A_7Dir_9_Et',
	'id'	=> 'PC_A_7Dir_9_Et',
	'maxlength'	=> 3,
	'class' => 'input3',
);

$PC_A_7Dir_10_Km = array(
	'name'	=> 'PC_A_7Dir_10_Km',
	'id'	=> 'PC_A_7Dir_10_Km',
	'maxlength'	=> 4,
	'class' => 'input3',
);

$PC_A_8_DirVerif = array(
	'name'	=> 'PC_A_8_DirVerif',
	'id'	=> 'PC_A_8_DirVerif',
	'maxlength'	=> 1,
	'class' => 'input1',
);

$PC_A_9_RefDir = array(
	'name'	=> 'PC_A_9_RefDir',
	'id'	=> 'PC_A_9_RefDir',
	'maxlength'	=> 200,
	'class' => 'input200',
);

$PC_B_1_CodLocal = array(
	'name'	=> 'PC_B_1_CodLocal',
	'id'	=> 'PC_B_1_CodLocal',
	'class' => 'input6',
	'maxlength'	=> 6,
	// 'disabled' => 'disabled',
);

$PC_B_2_CantEv = array(
	'name'	=> 'PC_B_2_CantEv',
	'id'	=> 'PC_B_2_CantEv',
	'maxlength'	=> 2,
	'class' => 'input2',	
);


// DETALLE - Sección C: Entrevista y Supervision

$PC_C_2_Rfinal_fecha = array(
	'name'	=> 'PC_C_2_Rfinal_fecha',
	'id'	=> 'PC_C_2_Rfinal_fecha',
	'maxlength'	=> 10,
	'class' => 'input10 fechap',
	'onKeyUp' => "javascript:this.value=formateafecha(this.value);",
);

// FIN DETALLE - Sección C: Entrevista y Supervision

$PC_C_1_NroVis = array(
	'name'	=> 'PC_C_1_NroVis',
	'id'	=> 'PC_C_1_NroVis',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Et_Fecha = array(
	'name'	=> 'PC_C_1_Et_Fecha',
	'id'	=> 'PC_C_1_Et_Fecha',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Et_Hini = array(
	'name'	=> 'PC_C_1_Et_Hini',
	'id'	=> 'PC_C_1_Et_Hini',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Et_Hfin = array(
	'name'	=> 'PC_C_1_Et_Hfin',
	'id'	=> 'PC_C_1_Et_Hfin',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Et_Fecha_Prox = array(
	'name'	=> 'PC_C_1_Et_Fecha_Prox',
	'id'	=> 'PC_C_1_Et_Fecha_Prox',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Et_Hora_Prox = array(
	'name'	=> 'PC_C_1_Et_Hora_Prox',
	'id'	=> 'PC_C_1_Et_Hora_Prox',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Et_Res = array(
	'name'	=> 'PC_C_1_Et_Res',
	'id'	=> 'PC_C_1_Et_Res',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Et_Res_O = array(
	'name'	=> 'PC_C_1_Et_Res_O',
	'id'	=> 'PC_C_1_Et_Res_O',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Jb_Fecha = array(
	'name'	=> 'PC_C_1_Jb_Fecha',
	'id'	=> 'PC_C_1_Jb_Fecha',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Jb_Hini = array(
	'name'	=> 'PC_C_1_Jb_Hini',
	'id'	=> 'PC_C_1_Jb_Hini',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Jb_Hfin = array(
	'name'	=> 'PC_C_1_Jb_Hfin',
	'id'	=> 'PC_C_1_Jb_Hfin',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Jb_Res = array(
	'name'	=> 'PC_C_1_Jb_Res',
	'id'	=> 'PC_C_1_Jb_Res',
	'maxlength'	=> 200,
	'width' => 300,
);

$PC_C_1_Jb_Res_O = array(
	'name'	=> 'PC_C_1_Jb_Res_O',
	'id'	=> 'PC_C_1_Jb_Res_O',
	'maxlength'	=> 200,
	'width' => 300,
);


///////////////////////////////////////////

$PC_C_2_Rfinal_resul = array(
	'name'	=> 'PC_C_2_Rfinal_resul',
	'id'	=> 'PC_C_2_Rfinal_resul',
	'class' => 'input1',
);

$PC_C_2_Rfinal_resul_O = array(
	'name'	=> 'PC_C_2_Rfinal_resul_O',
	'id'	=> 'PC_C_2_Rfinal_resul_O',
	'maxlength'	=> 200,
	'width' => 300,
	'disabled' => 'disabled',
);

$PC_D_EvT_dni = array(
	'name'	=> 'PC_D_EvT_dni',
	'id'	=> 'PC_D_EvT_dni',
	'maxlength'	=> 8,
	'class' => 'input8 dnic',
);

$PC_D_EvT_Nomb = array(
	'name'	=> 'PC_D_EvT_Nomb',
	'id'	=> 'PC_D_EvT_Nomb',
	'maxlength'	=> 200,
	'width' => 300,
	//'readonly' => true,
);

$PC_D_JBri_dni = array(
	'name'	=> 'PC_D_JBri_dni',
	'id'	=> 'PC_D_JBri_dni',
	'maxlength'	=> 8,
	'class' => 'input8 dnic',
);

$PC_D_JBri_Nomb = array(
	'name'	=> 'PC_D_JBri_Nomb',
	'id'	=> 'PC_D_JBri_Nomb',
	'maxlength'	=> 200,
	'width' => 300,
	//'readonly' => true,
);

$PC_D_CProv_dni = array(
	'name'	=> 'PC_D_CProv_dni',
	'id'	=> 'PC_D_CProv_dni',
	'maxlength'	=> 8,
	'class' => 'input8 dnic',
);

$PC_D_CProv_Nomb = array(
	'name'	=> 'PC_D_CProv_Nomb',
	'id'	=> 'PC_D_CProv_Nomb',
	'maxlength'	=> 200,
	'width' => 300,
	//'readonly' => true,
);

$PC_D_CDep_dni = array(
	'name'	=> 'PC_D_CDep_dni',
	'id'	=> 'PC_D_CDep_dni',
	'maxlength'	=> 8,
	'class' => 'input8 dnic',
);

$PC_D_CDep_Nomb = array(
	'name'	=> 'PC_D_CDep_Nomb',
	'id'	=> 'PC_D_CDep_Nomb',
	'maxlength'	=> 200,
	'width' => 300,
	//'readonly' => true,
);

$PC_D_SupN_dni = array(
	'name'	=> 'PC_D_SupN_dni',
	'id'	=> 'PC_D_SupN_dni',
	'maxlength'	=> 8,
	'class' => 'input8 dnic',
);

$PC_D_SupN_Nomb = array(
	'name'	=> 'PC_D_SupN_Nomb',
	'id'	=> 'PC_D_SupN_Nomb',
	'maxlength'	=> 200,
	'width' => 300,
	//'readonly' => true,
);

$PC_E_1_TPred = array(
	'name'	=> 'PC_E_1_TPred',
	'id'	=> 'PC_E_1_TPred',
	'class' => 'input2',
	'maxlength'	=> 2,
	// 'disabled' => 'disabled',
);

$PC_E_2_TPred_NoCol = array(
	'name'	=> 'PC_E_2_TPred_NoCol',
	'id'	=> 'PC_E_2_TPred_NoCol',
	'class' => 'input2',
	'maxlength'	=> 2,
	// 'disabled' => 'disabled',
);

$PC_E_3_TEdif = array(
	'name'	=> 'PC_E_3_TEdif',
	'id'	=> 'PC_E_3_TEdif',
	'class' => 'input2',
	'maxlength'	=> 2,
	// 'disabled' => 'disabled',
);

$PC_E_4_TPat = array(
	'name'	=> 'PC_E_4_TPat',
	'id'	=> 'PC_E_4_TPat',
	'class' => 'input2',
	'maxlength'	=> 2,
	// 'disabled' => 'disabled',
);

$PC_E_5_TLosa = array(
	'name'	=> 'PC_E_5_TLosa',
	'id'	=> 'PC_E_5_TLosa',
	'class' => 'input2',
	'maxlength'	=> 2,
	// 'disabled' => 'disabled',
);

$PC_E_6_TCist = array(
	'name'	=> 'PC_E_6_TCist',
	'id'	=> 'PC_E_6_TCist',
	'class' => 'input2',
	'maxlength'	=> 2,
	// 'disabled' => 'disabled',
);

$PC_E_7_TMurCon = array(
	'name'	=> 'PC_E_7_TMurCon',
	'id'	=> 'PC_E_7_TMurCon',
	'class' => 'input2',
	'maxlength'	=> 2,
	// 'disabled' => 'disabled',
);

/////////////////

// EXTRAS
$pcar_num = array(
	'name'	=> 'pcar_num',
	'id'	=> 'pcar_num',
	'class' => 'input2',
	'maxlength'	=> 2,
);


$boss_p_ct = ($pr!=1)? 'hide' : '';

////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
// CARATULA
////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////
$attr = array('class' => 'form-vertical form-auth','id' => 'car_f');

echo form_open($this->uri->uri_string(),$attr); 

echo '

<div class="panel panel-info">
							<div class="panel-heading">
								<h4 class="panel-title">Sección A: Ubicación Geográfica del local escolar</h4>
							</div>


								<ul class="list-group">
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">1. Departamento </div> '. form_dropdown('PC_A_1_Dep', $depArray, FALSE,'class="input200" id="PC_A_1_Dep"') .' </li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">2. Provincia </div> '. form_dropdown('PC_A_2_Prov', $provArray, FALSE,'class="input200" id="PC_A_2_Prov"') .' <div class="help-block error"></div></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">3. Distrito </div> '. form_dropdown('PC_A_3_Dist', $distArray, FALSE,'class="input200" id="PC_A_3_Dist"') .' <div class="help-block error"></div></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">4. Centro Poblado </div> '.form_input($PC_A_4_CentroP).'<div class="help-block error"></div></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">5. Nucleo Urbano </div> '.form_input($PC_A_5_NucleoUrb).' <div class="help-block error"></div></li>
									<li class="list-group-item"><div style="width:150px; margin-left:10px; float:left;">6. UGEL </div> '.form_input($PC_A_6_Ugel).' <div class="help-block error"></div></li>
								</ul>

						</div>

';


echo '

<div class="panel">
									<div class="panel-heading">7. Dirección del local escolar (Para tipo de via circule solo un codigo)</div>

								  	<label class="checkbox-inline">
										'.form_input($PC_A_7Dir_1_Tvia).' <div class="help-block error"></div> 1. Avenida , 2. Jiron , 3. Calle , 4. Pasaje , 5. Carretera, 6. Autopista , 7. Otro
									</label>
						</div>

';


echo '

<table class="table table-bordered">
							<thead>

								<tr>
									<th>Nombre de la via</th>
									<th>N° de Puerta</th>
									<th>Piso</th>
									<th>Mz.</th>
									<th>Lote</th>
									<th>Sector</th>
									<th>Zona</th>
									<th>Etapa</th>
									<th>Km</th>
								</tr>

							</thead>
							<tbody>

								<tr>
									<td>'.form_input($PC_A_7Dir_2_Nomb).'<div class="help-block error"></div></td>
									<td>'.form_input($PC_A_7Dir_3_Nro).'<div class="help-block error"></div></td>
									<td>'.form_input($PC_A_7Dir_4_Piso).'<div class="help-block error"></div></td>
									<td>'.form_input($PC_A_7Dir_5_Mz).'</td>
									<td>'.form_input($PC_A_7Dir_6_Lt).'</td>
									<td>'.form_input($PC_A_7Dir_7_Sect).'</td>
									<td>'.form_input($PC_A_7Dir_8_Zona).'</td>
									<td>'.form_input($PC_A_7Dir_9_Et).'</td>
									<td>'.form_input($PC_A_7Dir_10_Km).'</td>
								</tr>

							</tbody>
						</table>

';

echo '

<ul class="list-group">
							<li class="list-group-item">
								8. La dirección del colegio del local escolar del DOC.CIE.03.06
								<label class="checkbox-inline">
									'.form_input($PC_A_8_DirVerif).' <div class="help-block error"></div>
								</label>
							</li>
							<li class="list-group-item">
								9. Referencia de la dirección del local escolar
								'.form_input($PC_A_9_RefDir).'<div class="help-block error"></div>
							</li>
						</ul>

';

echo '

<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección B: Identificación del local escolar</h5>
							</div>

							<h6>Evaluador Tecnico</h6>

							<ul class="list-group">
								<li class="list-group-item">1. Transcriba el codigo del local DOC.CIE.03.06 '.form_input($PC_B_1_CodLocal).'</li>
								<li class="list-group-item">2. Cuantos códigos de local escolar registrados en el DOC.CIE.03.06 se evaluaran en esta cedula censal '.form_input($PC_B_2_CantEv).'<div class="help-block error"></div></li>
							</ul>

						</div>

';


echo '

<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección C: Entrevista y Supervision</h5> 
							</div>

							<div>Número de visitas: '.form_input($pcar_num).'<div class="help-block error"></div></div>

							<h6>1. Evaluación y Supervisión</h6>

							<table class="table table-bordered"  id="pcar_c_n">
								<thead>

									<tr>
										<th style="text-align:center;vertical-align:middle;" rowspan="3">Visitas</th>

										<th style="text-align:center;" colspan="6">Evaluador Técnico</th>
										<!-- <th>Piso</th> -->
										<!-- <th>Mz.</th>
										<th>Lote</th>
										<th>Sector</th>
										<th>Zona</th> -->
										<th style="text-align:center;" colspan="4">Jefe de Brigada</th>
									</tr>
									<tr>

										<th style="text-align:center;vertical-align:middle;" rowspan="2">Fecha</th>
										<th style="text-align:center;" colspan="2">Hora</th>
										<th style="text-align:center;" colspan="2">Próxima Visita</th>
										<th style="text-align:center;vertical-align:middle;" rowspan="2">Resultado de la visita (*)</th>
										<th style="text-align:center;vertical-align:middle;" rowspan="2">Fecha</th>
										<th style="text-align:center;" colspan="2">Hora</th>
										<th style="text-align:center;vertical-align:middle;" rowspan="2">Resultado de la visita (*)</th>


									</tr>

									<tr>

										<th style="text-align:center;">De</th>
										<th style="text-align:center;">A</th>
										<th style="text-align:center;">Fecha</th>
										<th style="text-align:center;">Hora</th>
										<th style="text-align:center;">De</th>
										<th style="text-align:center;">A</th>

									</tr>

								</thead>
								<tbody>

								</tbody>
							</table>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th colspan="2">2.Resultado final de la evaluacion tecnica</th>
										<th style="text-align:center;">(*) Codigos de Resultado</th>
									</tr>								
								</thead>
								<tbody>
									<tr>
										<td>Fecha: </td>
										<td>'.form_input($PC_C_2_Rfinal_fecha).'<div class="help-block error"></div></td>
										<td rowspan="2">
											<ul>
												<li>1. Completa</li>
												<li>2. Incompleta</li>
												<li>3. Rechazo</li>
												<li>4. Local cerrado/desocupado</li>
												<li>5. Otro (Especifique)</li>
											</ul>
										</td>
									</tr>
									<tr>
										<td>Resultado: </td>
										<td>'.form_input($PC_C_2_Rfinal_resul).' - Especifique '.form_input($PC_C_2_Rfinal_resul_O).'<div class="help-block error"></div></td>
									</tr>
								</tbody>
							</table>

							<!-- <table class="table table-bordered" style="width:600px;">
								<thead>
									<tr>
										<th colspan="2" style="text-align:center;">(*) Codigos de Resultado</th>
									</tr>
								</thead>
								<tbody>
									<td>
										<ul>
											<li>1.Completa</li>
											<li>2.Rechazo</li>
											<li>3.Incompleta</li>
											<li>4.Local cerrado/desocupado</li>
											<li>5.Otro</li>
										</ul>
									</td>
									<td>Otro '.form_input($PC_C_2_Rfinal_resul_O).'<div class="help-block error"></div></td>
								</tbody>
							</table> -->

						</div>

';


echo '

<div class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección D: Funcionarios de la evaluacion técnica</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th style="text-align:center;">Cargo</th>
										<th style="text-align:center;">DNI</th>
										<th style="text-align:center;">Nombres y Apellidos</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Evaluador Técnico</td>
										<td>'.form_input($PC_D_EvT_dni).' <div class="help-block error"></div></td>
										<td>'.form_input($PC_D_EvT_Nomb).'<div class="help-block error"></div></td>
									</tr>

									<tr>
										<td>Jefe de Brigada</td>
										<td>'.form_input($PC_D_JBri_dni).' <div class="help-block error"></div></td>
										<td>'.form_input($PC_D_JBri_Nomb).'</td>
									</tr>

									<tr>
										<td>Coordinador Provincial</td>
										<td>'.form_input($PC_D_CProv_dni).' <div class="help-block error"></div></td>
										<td>'.form_input($PC_D_CProv_Nomb).'</td>
									</tr>

									<tr>
										<td>Coordinador Departamental</td>
										<td>'.form_input($PC_D_CDep_dni).' <div class="help-block error"></div></td>
										<td>'.form_input($PC_D_CDep_Nomb).'</td>
									</tr>

									<tr>
										<td>Supervisor Nacional</td>
										<td>'.form_input($PC_D_SupN_dni).' <div class="help-block error"></div></td>
										<td>'.form_input($PC_D_SupN_Nomb).'</td>
									</tr>

								</tbody>
							</table>

						</div>

';


echo '

<div style="height:160px;" class="panel panel-info">
							<div class="panel-heading">
								<h5 class="panel-title">Sección E: Resumen</h5>
							</div>

							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="' . $boss_p_ct . '" style="text-align:center;">1.Total de predios</th>
										<th class="' . $boss_p_ct . '" style="text-align:center;">2.Total de predios no colindantes</th>
										<th style="text-align:center;">3.Total de edificaciones</th>
										<th style="text-align:center;">4.Total de patios</th>
										<th style="text-align:center;">5.Total de lozas deportivas</th>
										<th style="text-align:center;">6.Total de cisternas - Tanques elevados</th>
										<th style="text-align:center;">7.Total de Muros de contencion</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="' . $boss_p_ct . '">'.form_input($PC_E_1_TPred).'<div class="help-block error"></div></td>
										<td class="' . $boss_p_ct . '">'.form_input($PC_E_2_TPred_NoCol).'<div class="help-block error"></div></td>
										<td>'.form_input($PC_E_3_TEdif).'<div class="help-block error"></div></td>
										<td>'.form_input($PC_E_4_TPat).'<div class="help-block error"></div></td>
										<td>'.form_input($PC_E_5_TLosa).'<div class="help-block error"></div></td>
										<td>'.form_input($PC_E_6_TCist).'<div class="help-block error"></div></td>
										<td>'.form_input($PC_E_7_TMurCon).'<div class="help-block error"></div></td>
									</tr>
								</tbody>
							</table>

						</div>

';

echo form_submit('send', 'Guardar','class="btn btn-primary pull-right"');
echo form_close(); 
?>


<script type="text/javascript">

$(function(){

$('#car_f').bind('submit', function() {
         $(this).find('#PC_A_1_Dep,#PC_A_2_Prov,#PC_A_3_Dist').removeAttr('disabled');
    });


if(<?php echo $cod_area; ?> == '2'){
	$("#PC_A_5_NucleoUrb").val('');
	$("#PC_A_5_NucleoUrb").attr('disabled','disabled');
}

$(".dnic").keyup(function() {
	var idf = $(this).attr('id');
	var idx = idf.substring(0, idf.length - 4);

	if($(this).val().length == 8){
						var asd = {
					        dni: $(this).val(),
					        ajax:1
					    };

				        $.ajax({
				            url: CI.site_url + "/ajaxx/consistencia_ajax/get_ajax_dnic/" + $(this).val(),
				            type:'POST',
				            data:asd,
				            dataType:'json',
				            success:function(json){
				            	$('#' + idx + '_Nomb').val(json.nombre1.trim() + ' ' + json.nombre2.trim() + ' ' + json.ap_paterno.trim() + ' ' + json.ap_materno.trim() )
				            }
				        });  
	}else{
		$('#' + idx + '_Nomb').val('');
	}
});



$(document).on("change",'.caraaf, .carbbf',function() {
	if($(this).val() == '<?php echo date('Y-m-d'); ?>')
		$(this).val('');
});

//datepicker

$('#PC_C_2_Rfinal_resul').change(function(event) {

	if($(this).val() == 5){
		$('#PC_C_2_Rfinal_resul_O').removeAttr('disabled');
		// $('#ctab1').show();
		// $('#ctab2').show();
		// $('#ctab3').show();
		// $('#ctab4').show();	
		// $('#ctab5').hide();
		// $('#ctab6').hide();
		// $('#ctab7').hide();
		// $('#ctab8').hide();
		// $('#ctab9').hide();	
	}else if($(this).val() == 3){
		// $('#ctab1').hide();
		// $('#ctab2').hide();
		// $('#ctab3').hide();
		// $('#ctab4').hide();
		// $('#ctab5').hide();
		// $('#ctab6').hide();
		// $('#ctab7').hide();
		// $('#ctab8').hide();
		// $('#ctab9').hide();	
		$('#PC_C_2_Rfinal_resul_O').val('');
		$('#PC_C_2_Rfinal_resul_O').attr('disabled','disabled');		
	}else{
		// $('#ctab1').show();
		// $('#ctab2').show();
		// $('#ctab3').show();
		// $('#ctab4').show();
		// $('#ctab5').show();
		// $('#ctab6').show();
		// $('#ctab7').show();
		// $('#ctab8').show();
		// $('#ctab9').show();			
		$('#PC_C_2_Rfinal_resul_O').val('');
		$('#PC_C_2_Rfinal_resul_O').attr('disabled','disabled');
	}

});

//val car_n
$(document).on("change",'.car_res',function() {
		var pre = $(this).attr('id');
		var tex = pre.substring(0,14);
		var nro;

		if(pre.length == 15){
		 	nro = pre.substring(14,15);
		}
		else if(pre.length == 16){
			nro = pre.substring(14,16);
		}			

	if($(this).val() == 5){
		 if(tex == 'PC_C_1_Et_Res_')
		 	$('#PC_C_1_Et_Res_O_' + nro).removeAttr('readonly');
		 else if(tex == 'PC_C_1_Jb_Res_')
		 	$('#PC_C_1_Jb_Res_O_' + nro).removeAttr('readonly');
	}else{
		 if(tex == 'PC_C_1_Et_Res_'){
		 	$('#PC_C_1_Et_Res_O_' + nro).val('');
		 	$('#PC_C_1_Et_Res_O_' + nro).attr('readonly','readonly');
		 }else if(tex == 'PC_C_1_Jb_Res_'){
		 	$('#PC_C_1_Jb_Res_O_' + nro).val('');
		 	$('#PC_C_1_Jb_Res_O_' + nro).attr('readonly','readonly');	
		 }
	}

});


//car
$("#PC_A_1_Dep").change(function(event) {
        var sel = null;
        var urlx = null;

        sel = $("#PC_A_2_Prov");
        selcap1 = $("#P1_C_2_ProvCod");
        urlx = CI.site_url + "/ajaxx/consistencia_ajax/get_ajax_prov/" + $(this).val();

        var form_data = {
            dep: $(this).val(),
            ajax:1
        };

        $.ajax({
            url: urlx,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                selcap1.empty();
                $("#PC_A_3_Dist").empty();
                 sel.append('<option value="-1">-</option>');
                $.each(json_data, function(i, data){
                    	sel.append('<option value="' + data.CCPP + '">' + data.Nombre + '</option>');
                    	selcap1.append('<option value="' + data.CCPP + '">' + data.Nombre + '</option>');
                });
                 // sel.trigger('change');     	  
                 // selcap1.trigger('change');     	  
            }
        });           
});


$("#PC_A_2_Prov").change(function(event) {
        var sel = null;
        var dep = null;
        var urlx = null;
        dep = $("#PC_A_1_Dep");
        sel = $("#PC_A_3_Dist");
        urlx = CI.site_url + "/ajaxx/consistencia_ajax/get_ajax_dist/" + dep.val() + "/" + $(this).val();  
           
        var form_data = {
            prov: $(this).val(),
            dep: dep.val(),
            ajax:1
        };

        $.ajax({
            url: urlx,
            type:'POST',
            data:form_data,
            dataType:'json',
            success:function(json_data){
                sel.empty();
                sel.append('<option value="-1">-</option>');
                $.each(json_data, function(i, data){
                    	sel.append('<option value="' + data.CCDI + '">' + data.Nombre + '</option>');
                });   	
               // sel.trigger('change');                   
            }
        });           
});



if(<?php echo $car_i->num_rows() ?> == 1){

$.each( <?php

			$datos = $car_i->row();

			foreach ($datos as &$value)
			{
				$value = utf8_encode($value);
			}

			echo json_encode($datos); 
			// echo json_encode($car_i->row()); 

		?>, function(fila, valor) {
											if(fila == 'PC_A_1_Dep' || fila == 'PC_C_2_Rfinal_resul'){
													// if(valor == null && fila == 'PC_A_1_Dep'){
	   									// 				valor = '<?php echo $fdep; ?>';	
	   									// 			}
	   												$('#' + fila).val(valor);
	   												$('#' + fila).trigger('change');	
                                             }else if(fila == 'PC_A_2_Prov'){
                                                    var interval_PP = setInterval(function(){
                                                       if($('#PC_A_2_Prov option:nth-child(2)').length){
                                                            clearInterval(interval_PP);
		 													// if(valor == null){
			   										// 			valor = '<?php echo $fprov; ?>';	
			   										// 		}                                                           
                                                            $('#PC_A_2_Prov').val(valor);
                                                            $('#PC_A_2_Prov').trigger('change');
                                                        }
                                                    }, 1000); 

                                            }else if(fila == 'PC_A_3_Dist'){
                                                    var interval_DI = setInterval(function(){
                                                        if($('#PC_A_3_Dist option:nth-child(2)').length){
                                                            clearInterval(interval_DI);
		 													// if(valor == null){
			   										// 			valor = '<?php echo $fdis; ?>';	
			   										// 		} 
			   													$('#PC_A_3_Dist').val(valor);                                                            
                                                        }
                                                    }, 1000);        

                                            }else if(fila == 'PC_C_2_Rfinal_fecha'){
	   											$('#' + fila).val(makeday(valor));	
                                            }else{
                                            	$('#' + fila).val(valor);
                                            }             	
}); 
}else{

	   										$('#PC_A_1_Dep').val('<?php echo $fdep; ?>');
	   										$('#PC_A_1_Dep').trigger('change');	
   
                                            var interval_PP = setInterval(function(){
                                                       if($('#PC_A_2_Prov option:nth-child(2)').length){
                                                            clearInterval(interval_PP);                                                        
                                                            $('#PC_A_2_Prov').val('<?php echo $fprov; ?>');
                                                            $('#PC_A_2_Prov').trigger('change');
                                                        }
                                                    }, 1000); 


                                            var interval_DI = setInterval(function(){
                                                        if($('#PC_A_3_Dist option:nth-child(2)').length){
                                                            clearInterval(interval_DI);
			   													$('#PC_A_3_Dist').val('<?php echo $fdis; ?>');                                                            
                                                        }
                                                    }, 1000);        


}
$('#PC_A_1_Dep').attr('disabled','disabled');	
$('#PC_A_2_Prov').attr('disabled','disabled');		
$('#PC_A_3_Dist').attr('disabled','disabled');	

//car N

$('#pcar_num').val((<?php echo $car_n->num_rows(); ?> > 0) ? <?php echo $car_n->num_rows(); ?> : '' );

$('#pcar_num').keyup(function(event) {

$('#pcar_c_n tr').remove('.entrev');
	var ahua = $(this).val();
	if(ahua >= 0 && ahua<=10){
	  for(var i=1; i<=ahua;i++){
	    var asd = '<tr class="entrev">';
	    asd +='<td><input type="text" class="input1 embc' + i + '" maxlength="1" readonly name="PC_C_1_NroVis[]" id="PC_C_1_NroVis_' + i + '" value="' + i + '" ></td>';
	    asd +='<td><input type="text" class="input10 embc' + i + ' fechap" onKeyUp="javascript:this.value=formateafecha(this.value);"  maxlength="10" name="PC_C_1_Et_Fecha[]" id="PC_C_1_Et_Fecha_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input5 embc' + i + '" maxlength="5" name="PC_C_1_Et_Hini[]" onKeyUp="javascript:this.value=makehour(this.value);" id="PC_C_1_Et_Hini_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input5 embc' + i + '" maxlength="5" name="PC_C_1_Et_Hfin[]" onKeyUp="javascript:this.value=makehour(this.value);" id="PC_C_1_Et_Hfin_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input10 embc' + i + ' fechap caraaf" onKeyUp="javascript:this.value=formateafecha(this.value);" maxlength="10" name="PC_C_1_Et_Fecha_Prox[]" id="PC_C_1_Et_Fecha_Prox_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input5 embc' + i + '" maxlength="5" name="PC_C_1_Et_Hora_Prox[]" onKeyUp="javascript:this.value=makehour(this.value);" id="PC_C_1_Et_Hora_Prox_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input1 embc' + i + ' car_res" maxlength="1" name="PC_C_1_Et_Res[]" id="PC_C_1_Et_Res_' + i + '" value="" > - Especifique <div class="help-block error"></div><input type="text" class="input10 embc' + i + '" readonly maxlength="80" name="PC_C_1_Et_Res_O[]" id="PC_C_1_Et_Res_O' + '_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input10 embc' + i + ' fechap carbbf" onKeyUp="javascript:this.value=formateafecha(this.value);" maxlength="10" name="PC_C_1_Jb_Fecha[]" id="PC_C_1_Jb_Fecha_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input5 embe' + i + '" maxlength="5" name="PC_C_1_Jb_Hini[]" onKeyUp="javascript:this.value=makehour(this.value);" id="PC_C_1_Jb_Hini_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input5 embe' + i + '" maxlength="5" name="PC_C_1_Jb_Hfin[]" onKeyUp="javascript:this.value=makehour(this.value);" id="PC_C_1_Jb_Hfin_' + i + '" value="" ><div class="help-block error"></div></td>';
	    asd +='<td><input type="text" class="input1 embc' + i + ' car_res" maxlength="1" name="PC_C_1_Jb_Res[]" id="PC_C_1_Jb_Res_' + i + '" value="" > - Especifique <div class="help-block error"></div><input type="text" class="input10 embc' + i + '" readonly maxlength="80" name="PC_C_1_Jb_Res_O[]" id="PC_C_1_Jb_Res_O' + '_' + i + '" value="" ></div></td>';
	    asd += '</tr>';
	    $('#pcar_c_n > tbody').append(asd);
	  }
	}else if(ahua==''){
		//
	}else{
		//alert('10 Entrevistas máximo');
	}


var as = 1;
$.each( <?php echo json_encode($car_n->result()); ?>, function(i, data) {
	   $('#PC_C_1_Et_Fecha_' +  as).val(makeday(data.PC_C_1_Et_Fecha));
	   $('#PC_C_1_Et_Hini_' +  as).val(data.PC_C_1_Et_Hini);
	   $('#PC_C_1_Et_Hfin_' +  as).val(data.PC_C_1_Et_Hfin);
	   $('#PC_C_1_Et_Fecha_Prox_' +  as).val(makeday(data.PC_C_1_Et_Fecha_Prox));
	   $('#PC_C_1_Et_Hora_Prox_' +  as).val(data.PC_C_1_Et_Hora_Prox);
	   $('#PC_C_1_Et_Res_' +  as).val(data.PC_C_1_Et_Res);
	   $('#PC_C_1_Et_Res_' +  as).trigger('change');
	   $('#PC_C_1_Et_Res_O_' +  as).val(data.PC_C_1_Et_Res_O);
	   $('#PC_C_1_Jb_Res_' +  as).val(data.PC_C_1_Jb_Res);
	   $('#PC_C_1_Jb_Res_' +  as).trigger('change');
	   $('#PC_C_1_Jb_Res_O_' +  as).val(data.PC_C_1_Jb_Res_O);
	   $('#PC_C_1_Jb_Fecha_' +  as).val(makeday(data.PC_C_1_Jb_Fecha));
	   $('#PC_C_1_Jb_Hini_' +  as).val(data.PC_C_1_Jb_Hini);
	   $('#PC_C_1_Jb_Hfin_' +  as).val(data.PC_C_1_Jb_Hfin);
	   as++;
}); 
// $('.fechap').datepicker({ dateFormat: 'yy-mm-dd' });
});

$('#pcar_num').trigger('keyup');
// $('#pcar_num').trigger('change');

$("#car_f").validate({
		    rules: {  
		    	PC_A_2_Prov:{
		    		valueNotEquals:'-1',
		    	},
		    	PC_A_3_Dist:{
		    		valueNotEquals:'-1',
		    	},
		    	PC_A_7Dir_2_Nomb:{
					letnum: true,
		    		required:true,
		    	},
		    	PC_A_9_RefDir:{
					letnum: true,
		    		required:true,
		    	},
		    	PC_A_6_Ugel:{
					letnum: true,
		    		required:true,
		    	},
				PC_A_4_CentroP: {
						letnum: true,
						required:true,
			        },  	
			    PC_A_5_NucleoUrb:{
						letnum: true,
						required:true,
			       },
				PC_A_7Dir_1_Tvia: {
			    		valrango: [1,7,9],
			    		required: true,
			        },  				    	
				PC_A_8_DirVerif: {
			    		valrango: [1,2,9],
			    		// required: true,
			        },  			                     			         		         		         		                  	         		         	         	          		                                                                             		    	
				PC_C_2_Rfinal_resul: {
			    		range: [1,5],
						valcaresu: ['PC_C_1_Et_Res_', 'pcar_num'],
			    		required: true,
			        },  	
				PC_C_2_Rfinal_resul_O:{
			    		requeridodis: true,
				},		        	   
			    PC_A_7Dir_4_Piso: {
			    		range: [0,10],
			    		required: true,
			    },             			
			    PC_B_2_CantEv:{
			    		range: [1,99],
			    		// required: true,
			    },
			    pcar_num:{
			    	required: true,
			    	range:[1,10],
			    },
			    PC_A_7Dir_3_Nro:{
			    	letnum:true,
			    	required: true,
			    },    		         	
			    'PC_C_1_Et_Fecha[]':{
			    	carperuDate:true,
			    	required:true,
			    },	       
			    'PC_C_1_Et_Fecha_Prox[]':{
			    	carperuDate:true,
			    	//required:true,
			    },  		              
			    'PC_C_1_Et_Res[]':{
			    		range: [1,5],
			    		required: true,			    	
			    }, 		       	   
			    'PC_C_1_Jb_Res[]':{
			    		range: [1,5],
			    		// required: true,			    	
			    },                    	
				PC_D_EvT_dni: {
			    		digits: true,
			    		required: true,
			        },  
				PC_D_EvT_Nomb: {
			    		required: true,
			        },  			        
				PC_D_JBri_dni: {
			    		digits: true,
			    	},  
			    PC_D_CProv_dni: {
			    		digits: true,
			    	},  
			    PC_D_CDep_dni: {
			    		digits: true,
			    	},  
			    PC_D_SupN_dni: {
			    		digits: true,
			    	},  
			    'PC_C_1_Et_Hini[]':{
			    		hora: true,
			    },  
			    'PC_C_1_Et_Hfin[]':{
			    		hora: true,
			    },  
			    'PC_C_1_Et_Hora_Prox[]':{
			    		hora: true,
			    }, 
			    'PC_C_1_Jb_Hini[]':{
			    		hora: true,
			    }, 
			    'PC_C_1_Jb_Hfin[]':{
			    		hora: true,
			    }, 			    
			    'PC_C_1_Et_Res_O[]':{
			    	requeridodis:true,
			    },
			    'PC_C_1_Jb_Fecha[]':{
			    	peruDate:true,
			    },
			    PC_C_2_Rfinal_fecha:{
			    	carperuDate:true,
			    	valcaresu: ['PC_C_1_Et_Fecha_', 'pcar_num'],
			    },
			    PC_E_1_TPred:{
			    	valrango:[0,30,99],
			    	minimo_car:['PC_C_2_Rfinal_resul'],
			    	required:true,
			    },
			    PC_E_2_TPred_NoCol:{
			    	range:[0,20],
			    	required:true,
			    	minor_car:['PC_E_1_TPred'],
			    },
			    PC_E_3_TEdif:{
			    	range:[0,62],
			    	required:true,
			    },
			    PC_E_4_TPat:{
			    	range:[0,62],
			    	required:true,
			    },
			    PC_E_5_TLosa:{
			    	range:[0,62],
			    	required:true,
			    },		
			    PC_E_6_TCist:{
			    	range:[0,62],
			    	required:true,
			    },	
			    PC_E_7_TMurCon:{
			    	range:[0,62],
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
				    	var car_data = $("#car_f").serializeArray();
					    car_data.push(
					        {name: 'ajax',value:1},
					        {name: 'id_local',value:$("input[name='id_local']").val()},      
					        {name: 'Nro_Pred',value:$("input[name='Nro_Pred']").val()},      
					        {name: 'user_id',value:parseInt($("input[name='user_id']").val())}      
					    );
						
				        var bcar = $( "#car_f :submit" );
				         bcar.attr("disabled", "disabled");
				        $.ajax({
				            url: CI.site_url + "/consistencia/car",
				            type:'POST',
				            data:car_data,
				            dataType:'json',
				            success:function(json){
								alert(json.msg);
								bcar.removeAttr('disabled');
								$('#PC_A_1_Dep').attr('disabled','disabled');	
								$('#PC_A_2_Prov').attr('disabled','disabled');		
								$('#PC_A_3_Dist').attr('disabled','disabled');									
								if(parseInt($('#PC_C_2_Rfinal_resul').val()) != 3){
									$('#ctab').removeClass('active');
									$('#ctab1 a').trigger('click');
									window.scrollTo(0, 0);
								}
				            }
				        });     			          	
		    }       
}); 



// $('.fechap').datepicker({ dateFormat: 'yy-mm-dd' });

}); 
</script>