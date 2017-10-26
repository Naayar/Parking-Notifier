<title>
	Parking Notifier - SA - list
</title>
<div class="col-md-10 col-xs-8 col-xs-offset-1">
	<div class="table-responsive">
	  <table class="table table-hover table-bordered table-striped">
	  	<div class="page-header">
	  		<h2>Lista de usuarios</h2>
	  	</div>
	  	<thead>
	    	<tr>
	    		<th> <?= $this->Paginator->sort('codigo',['label' => 'Código']) ?></th>
	    		<th> <?= $this->Paginator->sort('name',['label' => 'Nombre']) ?></th>
	    		<th> <?= $this->Paginator->sort('lastName', ['label' => 'Apellidos']) ?></th>
	    		<th> <?= $this->Paginator->sort('phone', ['label' => 'Celular']) ?></th>
	    		<th> <?= $this->Paginator->sort('email', ['label' => 'Correo']) ?></th>
	    		<th> <?= $this->Paginator->sort('company_name', ['label' => 'Empresa']) ?></th>
	    		<th> <?= $this->Paginator->sort('role', ['label' => 'Rol']) ?></th>
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
			  <td><?= $user->role  ?></td>
			  <td class="actions">
			  	<?=  $this->Html->link(('Detalle'), array('controller' => 'Users', 'action' => 'view', $user->id), ['class' => 'btn btn-primary']); ?>
			  </td>
			</tr>
	    	<?php endforeach; ?>
	  	</tbody>
	  </table>
	  <div class="paginator">
	  	<ul class="pagination">
	  		<?= $this->Paginator->prev('< '. __('Anterior')) ?>
	  		<?= $this->Paginator->numbers() ?>
	  		<?= $this->Paginator->next(__('Siguiente') . ' >') ?>
	  	</ul>
	  	<p><?= $this->Paginator->counter() ?></p>
	  </div>
	</div>
</div>