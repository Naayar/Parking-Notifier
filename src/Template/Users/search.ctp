<title>
	Parking Notifier - SA - Busqueda 
</title>
<?php if (empty($search)): ?>

<div class="col-xs-4 col-xs-offset-4">
	<div class="page-header">
		<h2 style="text-align: center;">Ningun criterio de busqueda</h2>
	</div>
</div>
<?php else: ?>
<?php $a = null; ?>
<?php foreach ($users as $user): ?>
<?php $a = count($user->created); ?>
<?php endforeach ?>
<?php if ($a != 0): ?>

<div class="col-md-10 col-xs-8 col-xs-offset-1">
	<div class="table-responsive">
	  <table class="table table-hover table-bordered table-striped">
	  	<div class="page-header">
	  		<h2>Resultados de la búsqueda</h2>
	  	</div>
	  	<thead>
	    	<tr>
	    		<th> Código</th>
	    		<th> Nombre</th>
	    		<th> Apellido</th>
	    		<th> Celular</th>
	    		<th> Correo</th>
	    		<th> Empresa</th>
	    	</tr>
	  	</thead>
	  	<tbody>
	    	<?php foreach ($users as $user): ?>
			<tr>
			  <td><?= $user->codigo ?></td>
			  <td><?= $user->name ?></td>
			  <td><?= $user->lastName ?></td>
			  <td><?= $user->phone ?></td>
			  <td><?= $user->email ?></td>
			  <td><?= $user->company->name ?></td>
			  <td class="actions">
			  	<?=  $this->Html->link(('Detalle'), array('controller' => 'Users', 'action' => 'view', $user->id), ['class' => 'btn btn-primary']); ?>
			  </td>
			</tr>
	    	<?php endforeach; ?>
	  	</tbody>
	  </table>
	</div>
</div>
<?php else: ?>
		<div class="col-xs-3 col-xs-offset-4">
			<div class="page-header">
				<h2 style="text-align: center;">No hay resultados para '<?php echo $search ?>'</h2>
			</div>
		</div>
<?php endif ?>
<?php endif; ?>
