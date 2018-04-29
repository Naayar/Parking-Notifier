<title>
	Parking Notifier - Admin - Mis Notificaciones
</title>
<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="table-responsive">
			  <table class="table table-hover table-bordered table-striped">
			  	<div class="page-header">
			  		<h3>Mis notificaciones</h3>
			  	</div>
			  	<thead>
			    	<tr>
			    		<th> <?= $this->Paginator->sort('id',['label' => 'ID']) ?></th>
			    		<th> <?= $this->Paginator->sort('fecha',['label' => 'Fecha']) ?></th>
			    	</tr>
			  	</thead>
			  	<tbody>
			    	<?php foreach ($notify as $noti): ?>
			    		<?php foreach ($noti->notificacion as $key): ?>
					<tr>
					  <td><?= $key->id ?></td>
					  <td><?= $key->fecha ?></td>
					  <td class="actions">
					  	<?=  $this->Html->link(('Detalle'), array('controller' => 'notificacion', 'action' => 'view2', $key->id), ['class' => 'btn btn-primary']); ?>
					  </td>
					</tr>
			    		<?php endforeach ?>
			    	<?php endforeach; ?>
			  	</tbody>
			  </table>
			</div>
		</div>
	</div>