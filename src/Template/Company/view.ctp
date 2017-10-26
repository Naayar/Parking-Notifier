<title>
	Parking Notifier - SA - Empresas
</title>
<div class="row">
	<div class=" col-md-4 col-md-offset-2">	
		<div class="page-header center-block">
			<h2 class=""><?= $company->name.' '.$company->lastName ?></h2>
		</div>
	</div>
	<div class="col-md-4">	
		
	</div>
</div>
<div class="row">
	<div class="col-md-4 col-md-offset-2">
		<ul class="list-group">
		  <li class="list-group-item"><p class="text-danger">Id:</p><?= ' '.$company->id ?></li>
		  <li class="list-group-item"><p class="text-danger">Nombres:</p><?= ' '. $company->name ?></li>
		  <li class="list-group-item"><p class="text-danger">Teléfono:</p><?= ' '. $company->phone ?></li>
		  <li class="list-group-item"><p class="text-danger">Creado:</p><?= ' '.$company->created ?></li>
		  <li class="list-group-item"><p class="text-danger">Modificado:</p><?= ' '. $company->modified ?></li>
		  <li class="list-group-item"><p class="text-danger">Ciudad:</p><?= ' '. $company->ciudad->name ?></li>
		</ul>
		<div class="pull-right">
			<?= $this->Html->link(__('Editar'), array('controller' => 'Company', 'action' => 'edit', $company->id), ['class' => 'btn btn-danger']); ?>
		</div>
	</div>
	<div class="col-md-4">
		<div class="table-responsive">
		  <table class="table table-hover table-bordered table-striped">
			<div class="pull-right">
				<?= $this->Html->link(__('Nueva'), array('controller' => 'Sucursal', 'action' => 'add', $company->id), ['class' => 'btn btn-danger']); ?>
			</div>
		  	<h4 class="">Sucursales</h4>
		  	<thead>
		    	<tr>
		    		<th>Nombre</th>
		    		<th></th>
		    	</tr>
		  	</thead>
		  	<tbody>
		    	<?php foreach ($sucursal as $sucu): ?>
				<tr>
				  <td><?= $sucu->name ?></td>
				  <td class="actions">
				  	<?=  $this->Html->link(('Detalle'), array('controller' => 'sucursal', 'action' => 'view', $sucu->id), ['class' => 'btn btn-primary']); ?>
				  	<?= $this->Html->link('Nuevo Admin', array('controller' => 'Users', 'action' => 'add', $sucu->id,$company->id ), ['class' => 'btn btn-primary']); ?>
				  </td>
				</tr>
		    	<?php endforeach; ?>
		  	</tbody>
		  </table>
		</div>
	</div>
</div>