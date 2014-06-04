<script type="text/javascript">
	$(document).ready(function(){

		$("#ver").attr({
			disabled: true,
		});


//===============CONSULTA POR CODIGO DE LOCAL================
		$('#cod_local').keyup(function(event) {

			if($(this).val()==""){

			}else{

			}

		});

		

		$('#ver').click(function(){
			/*get_data();*/
		});

		//=========================EVENTOS=========================================


	});
</script>





<?php

	$label_class =  array('class' => 'control-label');

    $this->load->helper('my');

?>

<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_page.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/datatable/demo_table.css'); ?>">
<script src="<?php echo base_url('js/datatable/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		
        $('#ver').attr('disabled', false);

        $('#ver').click(function(event) {
            query_by_local($('#cod_local').val());
        });

	});


    function query_by_local(id_local){
        
        $.getJSON(urlRoot('index.php')+'/consistencia/procedure/QueryLocal/', {token: getToken(),id_local:id_local}, function(data, textStatus) {
            
                $('#NOM_PROV').attr('disabled', true);
                $('#PERIODO').attr('disabled', true);
                $('#NOM_SEDE').attr('disabled', false);

                $('#NOM_PROV').val(0);
                $('#PERIODO').val(0);
                $('#NOM_SEDE').val(0);


                table='<table id="lista" style="width:950px;" class="display">'+
                    '<thead>'+
                        '<tr>'+
                            '<th>Codigo de Local</th>'+
                            '<th>Departamento</th>'+
                            '<th>Provincia</th>'+
                            '<th>Distrito</th>'+
                            '<th>Instituciones Educativas</th>'+
                        '</tr>'+
                    '</thead>'+
                    '<tbody>';

                $.each(data, function(index, val) {

                    table+='<tr>'+
                        '<td class="center">'+val.codigo_de_local+'</td>'+
                        '<td>'+val.Departamento+'</td>'+
                        '<td>'+val.Provincia+'</td>'+
                        '<td>'+val.Distrito+'</td>'+
                        '<td>'+val.IE+'</td>'+
                    '</tr>';

                });    
                                        
                    table+='</tbody>'+
                    '</table>';

                    $('#table_container').html(table);

                    $('#lista').dataTable( {
                        "bJQueryUI": false,
                        "bFilter": false,
                        "bLengthChange": false,
                        "sPaginationType": "full_numbers",
                        "bScrollCollapse": false,
                        "sScrollY": "360px",
                        "oLanguage": {
                            "sEmptyTable": "El codigo de local se encuentra cerrado"
                        }
                    } );

        });    
    
    }


</script>

<div id="visor-content">


<div class="row-fluid ">

        <h4 align="center">VISOR DE CEDULA</h4>

        <div class="form-span10 row-fluid well top-conv" style="margin-left:0px;">

            <div class="span12" align="center">

                    <div style="font-weight:bold; padding:0 0 15px 0; font-size:14px;">Busqueda de Locales por Código de Local</div>

                    <div class="control-group">
                        
                        <div class="controls">
                            <input id="cod_local" style="width:70px;" maxlength="6" type="text" class="form-control">
                            <?php echo form_button('ver','Visualizar','class="btn btn-primary" id="ver" style="margin-left:15px;"'); ?>
                        </div>

                    </div>

            </div>

        </div>

    </div>
<div class="row-fluid">
  <div id="grid_content" class="span12" style="width: 900px;">
        <table id="editgrid"></table>
          <div class="span12" id="table_container">
               <!--AJAX-->
          </div>
  </div>
</div>




</div>