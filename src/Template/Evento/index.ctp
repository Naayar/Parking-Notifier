<title>
	Parking Notifier - SA - Eventos
</title>
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="page-header">
			<h2>Eventos</h2>
		</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>Descripción</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($evento as $e): ?>
					<tr>
						<td>
							<?= $this->Html->link($e->descripcion, array('controller' => 'evento', 'action' => 'edit', $e->id), ['class' => 'btn btn-primary btn-block']); ?>
						</td>
						<td>
							<?= $this->Form->postlink('Eliminar', ['controller' => 'Evento', 'action' => 'delete', $e->id], ['confirm' => 'Eliminar evento ?', 'class' => 'btn btn-danger pull-right']) ?>
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>