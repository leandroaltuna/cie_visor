
<div class="well sidebar-nav cen-sidebar">
	<ul class="nav nav-list">
		<li class="nav-header">Reporte de Consistencia:</li>
		<li <?php echo ($option == 1) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/consistencia/avance_digitacion'); ?>">Avance de OTIN</a></li>	
		<li <?php echo ($option == 2) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/consistencia/avance_digitacion/index_userdig'); ?>">Avance de OTIN por Digitador</a></li>
		<li <?php echo ($option == 3) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/consistencia/avance_digitacion/index_coberotin'); ?>">Cobertura de OTIN</a></li>
		<li <?php echo ($option == 4) ? 'class="active"' : ''; ?> ><a href="<?php echo base_url('index.php/consistencia/avance_digitacion/index_estadsitua'); ?>">Estado Situacional</a></li>
	</ul>
</div>