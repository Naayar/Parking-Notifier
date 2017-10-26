<title>
	Parking Notifier - SA - list
</title>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<div class="table-responsive">
		  <table class="table table-hover table-bordered table-striped">
		  	<div class="page-header">
		  		<h2>Lista de empresas</h2>
		  	</div>
		  	<thead>
		    	<tr>
		    		<th> <?= $this->Paginator->sort('id',['label' => 'Id']) ?></th>
		    		<th> <?= $this->Paginator->sort('name',['label' => 'Nombre']) ?></th>
		    		<th> <?= $this->Paginator->sort('phone', ['label' => 'Teléfono']) ?></th>
		    		<th> <?= $this->Paginator->sort('ciudad_name', ['label' => 'Ciudad']) ?></th>
		    	</tr>
		  	</thead>
		  	<tbody>
		    	<?php foreach ($company as $com): ?>
				<tr>
				  <td><?= $com->id ?></td>
				  <td><?= $com->name ?></td>
				  <td><?= $com->phone ?></td>
				  <td><?= $com->ciudad->name ?></td>
				  <td class="actions">
				  	<?=  $this->Html->link(('Detalle'), array('controller' => 'company', 'action' => 'view', $com->id), ['class' => 'btn btn-primary']); ?>
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
</div>