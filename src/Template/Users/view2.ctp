<?php foreach ($users as $user): ?>
<title>
	Parking Notifier - Detalle usuario - <?= $user->name ?>
</title>
<div class="row">
	<div class=" col-md-4 col-md-offset-2">	
		<div class="page-header center-block">
			<h2><?= $user->name.' '.$user->lastName ?></h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<ul class="list-group">
		  <li class="list-group-item"><p class="text-danger">Id:</p><?= ' '.$user->id ?></li>
		  <li class="list-group-item"><p class="text-danger">Código:</p><?= ' '.$user->codigo ?></li>
		  <li class="list-group-item"><p class="text-danger">Nombres:</p><?= ' '. $user->name ?></li>
		  <li class="list-group-item"><p class="text-danger">Apellidos:</p><?= ' '.$user->lastName ?></li>
		  <li class="list-group-item"><p class="text-danger">Celular:</p><?= ' '. $user->phone ?></li>
		</ul>
	</div>
	<div class="col-md-4">
		<ul class="list-group">
		  <li class="list-group-item"><p class="text-danger">Correo:</p><?= ' '.$user->email ?></li>
		  <li class="list-group-item"><p class="text-danger">Rol:</p><?= ' '.$user->role ?></li>
		  <li class="list-group-item"><p class="text-danger">Acctivo: </p><?= $user->active ? 'Si' : 'No' ?></li>
		  <li class="list-group-item"><p class="text-danger">Empresa:</p><?= ' '.$user->company->name ?></li>
		</ul>
	<div class="pull-right">
		<?= $this->Html->link(__('Editar'), array('controller' => 'Users', 'action' => 'edit2', $user->id), ['class' => 'btn btn-danger']); ?>
	</div>
	</div>
</div>
<?php endforeach ?>