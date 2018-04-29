<title>
	Parking Notifier - Historial de ingreso
</title>
<div class="row">
	<div class="col-sm-4 col-sm-offset-5">
		<div class="page-header">
			<h2>Historial de Ingresos</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-2 col-sm-offset-2">
		<h4>Elige una fecha</h4>
		<div class="panel panel-default">
		<div class="panel-body">
			<?php echo $this->Form->create(); ?>
			<div class="form-group">
				
			<select name="ano">
				<?php
					for ($i=2017; $i <= date('Y'); $i++) {
							echo "<option value='".$i."'>".$i."</option>";
					}
				 ?>
			</select>
			<select name="mes">
				<?php
				$meses= ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
					for ($i=0; $i <12 ; $i++) { 
							echo '<option value="'.$i.'">'.$meses[$i].'</option>';
					}
				 ?>
			</select>
			</div>
			<?php echo $this->Form->button('Enviar', $options = array('class' => 'btn btn-danger pull-right', 'id' => 'boton')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
		</div>
	</div>
	<div id="resultados" class="col-sm-6 clearfix">
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped" id="tabla">
				<?php if(isset($registros)): ?>
					<?php 	
					$a = null;
					foreach ($registros as $key ) {
						$a = count($key->id);
					}
					 ?>
					<?php if($a == 0): ?>
						<h4>No hay resultados</h4>
					<?php else: ?>
					<thead>
						<tr>
							<th>#</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th>Sucursal</th>
						</tr>
					</thead>
					<tbody id="tbody">
							<?php 
							foreach ($registros as $i) {?>
								<tr>
								<td><?php echo $i->id ?></td>
								<td><?php echo $i->entrada ?></td>
								<td><?php echo $i->salida ?></td>
								<td><?php echo $i->sucursal ?></td>
								</tr>
							<?php
							}
							 ?>
					</tbody>
					<?php endif; ?>
				<?php else: ?>
					<thead>
						<tr>
							<th>#</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th>Sucursal</th>
						</tr>
					</thead>
					<tbody id="tbody">
							<?php 
							foreach ($ingreso as $i) {?>
								<tr>
								<td><?php echo $i->id ?></td>
								<td><?php echo $i->entrada ?></td>
								<td><?php echo $i->salida ?></td>
								<td><?php echo $i->sucursal->name ?></td>
								</tr>
							<?php
							}
							 ?>
					</tbody>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>

