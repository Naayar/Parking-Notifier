<title>
	Parking Notifier - Mis vehiculos
</title>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header">
	  		<h2>Mis vehiculos</h2>
	  	</div>
	  	<?php foreach ($vehiculo as $v): ?>
		  	<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<ul class="list-group">
						<li class="list-group-item"><p class="text-danger">Placa:</p><?= ' '.$v->placa ?></li>
						<li class="list-group-item"><p class="text-danger">Marca:</p><?= ' '. $v->marca ?></li>
						<li class="list-group-item"><p class="text-danger">Tipo:</p><?= ' '.$v->tipo ?></li>
						<li class="list-group-item"><p class="text-danger">Modificado:</p><?= ' '. $v->modified ?></li>
					</ul>
				</div>
				<div class="pull-right">
					<?= $this->Html->link(__('Editar'), array('controller' => 'vehiculo', 'action' => 'edit', $v->id), ['class' => 'btn btn-primary']); ?>
				</div>
		  	</div>
	  	<?php endforeach ?>
	</div>
</div>