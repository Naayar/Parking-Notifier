<title>
	Parking Notifier - Medios
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
	  		<h2>Medios de notificación</h2>
	  	</div>
	  	<div class="panel panel-default">
			<div class="panel-heading">Mis medios</div>
	  	<?php foreach ($medio as $medios): ?>
	  		<?php foreach ($medios->medio as $key): ?>
			<ul class="list-group">
				<li class="list-group-item"><p class="text-danger">Nombre:</p><?= ' '.$key->nombre ?></li>
			</ul>
	  		<?php endforeach ?>
	  	<?php endforeach ?>
		</div>
		<div class="pull-right">
			<?= $this->Html->link(__('Editar'), array('controller' => 'Medio', 'action' => 'edit2', $current_user['id'] ), ['class' => 'btn btn-primary']); ?>
		</div>
	</div>
</div>