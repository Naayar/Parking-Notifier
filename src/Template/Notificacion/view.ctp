<title>
	Parking Notifier - Admin - notificaciones
</title>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header">
			<h2>Detalle de notificación</h2>
		</div>
		<div class=""></div>
		<div class="well well-sm">
			<p class="text-danger">fecha:</p><?php echo ' '.$notificacion->fecha ?>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
					<div class="panel-heading">Encargado de seguridad</div>
					<ul class="list-group">
						<li class="list-group-item"><p class="text-danger">Código:</p><?= ' '.$userOrigen->codigo ?></li>
						<li class="list-group-item"><p class="text-danger">Nombre:</p><?= ' '. $userOrigen->name . ' '. $userOrigen->lastName ?></li>
						<li class="list-group-item"><p class="text-danger">Correo:</p><?= ' '.$userOrigen->email ?></li>
						<li class="list-group-item"><p class="text-danger">Celular:</p><?= ' '. $userOrigen->phone ?></li>
					</ul>
				</div>
				<div class="pull-right">
					<?= $this->Html->link(__('Detalle'), array('controller' => 'Users', 'action' => 'view2', $userOrigen->id), ['class' => 'btn btn-primary']); ?>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
				  <!-- Default panel contents -->
				  <div class="panel-heading">Usuario destino</div>
				  <ul class="list-group">
				    <li class="list-group-item"><p class="text-danger">Código:</p><?= ' '.$userDestino->codigo ?></li>
					<li class="list-group-item"><p class="text-danger">Nombre:</p><?= ' '. $userDestino->name . ' '. $userDestino->lastName ?></li>
					<li class="list-group-item"><p class="text-danger">Correo:</p><?= ' '.$userDestino->email ?></li>
					<li class="list-group-item"><p class="text-danger">Celular:</p><?= ' '. $userDestino->phone ?></li>
				  </ul>
				</div>
				<div class="pull-right">
					<?= $this->Html->link(__('Detalle'), array('controller' => 'Users', 'action' => 'view2', $userDestino->id), ['class' => 'btn btn-primary']); ?>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<h4>Eventos</h4>
			<div class="well">
				<?php foreach ($notificacion->evento as $e): ?>
					<ul class="list-group">
					    <li class="list-group-item"><?= $e->descripcion ?></li>
					</ul>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>