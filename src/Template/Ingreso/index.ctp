<title>
	Parking Notifier - Historial de Registros
</title>
<div class="row">
	<div class="col-sm-4 col-sm-offset-2">
		<div class="page-header">
			<h2>Historial de Registros</h2>
		</div>
	</div>
</div>
<div id="registroos" class="col-sm-8  col-sm-offset-2 clearfix">
	<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped" id="tablar">
				<?php if(isset($ingreso)): ?>
				<?php 
				$a = count($ingreso);
				if($a == 0){?>
					<h4>No hay registros</h4>
				<?php }else{ ?>
				<thead>
						<tr>
							<th>#</th>
							<th>Codigo</th>
							<th>Placa</th>
							<th>Entrada</th>
							<th>Salida</th>
						</tr>
				</thead>
				<tbody id="tbody">
							<?php 
							$num=1;
							foreach ($ingreso as $i) 
								{?>
							<?php
								$user=$i->user;
								$vehi=$user->vehiculo;
								$cod=$i->user->codigo;
								?>
									<tr>
									<td><?php echo $num ?></td>
									<td><?php echo $cod ?></td>
									<?php
								foreach ($vehi as $ve ) { 
									?>
									<td><?php echo $ve->placa?></td>
								<?php
								}
								 ?>
									<td><?php echo $i->entrada ?></td>
									<td><?php echo $i->salida ?></td>
								<?php
								?>
									</tr>
							<?php
							$num++;
							}
							 ?>
					</tbody>
					<?php } ?>
					<?php endif; ?>
			</table>	
	</div>
</div>