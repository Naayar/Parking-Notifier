<title>
	Parking Notifier - SA - Sucursal
</title>
<div class="row">
	<div class=" col-md-4 col-md-offset-2">	
		<div class="page-header center-block">
			<h2 class=""><?= $sucursal->name ?></h2>
		</div>
	</div>
	<div class="col-md-4">	
		
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<ul class="list-group">
		  <li class="list-group-item"><p class="text-danger">Id:</p><?= ' '.$sucursal->id ?></li>
		  <li class="list-group-item"><p class="text-danger">Nombre:</p><?= ' '. $sucursal->name ?></li>
		  <li class="list-group-item"><p class="text-danger">Teléfono:</p><?= ' '. $sucursal->phone ?></li>
		  <li class="list-group-item"><p class="text-danger">Dirección:</p><?= ' '.$sucursal->addresss ?></li>
		</ul>
	</div>
	<div class="col-md-4">
		<ul class="list-group">
		  <li class="list-group-item"><p class="text-danger">Creado:</p><?= ' '.$sucursal->created ?></li>
		  <li class="list-group-item"><p class="text-danger">Modificado:</p><?= ' '. $sucursal->modified ?></li>
		  <li class="list-group-item"><p class="text-danger">Empresa:</p><?= ' '. $sucursal->company->name ?></li>
		</ul>
		<div class="pull-right">
			<?= $this->Html->link(__('Editar'), array('controller' => 'Sucursal', 'action' => 'edit', $sucursal->id), ['class' => 'btn btn-danger']); ?>
		</div>
	</div>
</div>