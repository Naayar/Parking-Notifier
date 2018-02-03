<?php foreach ($users as $user): ?>
<title>
	Parking Notifier - Detalle de admin - <?= $user->name ?>
</title>
<div class="row">
		
	<div class=" col-md-4 col-md-offset-2">	
		<div class="page-header center-block">
			<h2 class=""><?= $user->name.' '.$user->lastName ?></h2>
		</div>
	</div>
	<div class="col-md-4 visible-md visible-lg">
		<div class="page-header pull-right">
			<?php echo $this->Html->link('Volver', array('controller' => 'Users', 'action' => 'index'), ['class' => 'btn btn-primary']); ?>
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
		<?= $this->Html->link(__('Editar'), array('controller' => 'Users', 'action' => 'edit', $user->id), ['class' => 'btn btn-primary']); ?>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
			<?php if ($user->active) {
      			echo 'Desactivar';
      		}else{
      			echo 'Activar';
      		} ?>
        	<?php  ?>
		</button>
	</div>
	</div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Desactivar usuario</h4>
      </div>
      <div class="modal-body">
        <p>Esta seguro que desea desactivar el usuario <strong><?= $user->name. " ". $user->lastName ?></strong></p>
      </div>
      <div class="modal-footer">
      	<div class="col-xs-6">
        	<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
      	</div>
      	<div class="col-xs-6">
      		<?php if ($user->active) {
      			echo $this->Form->postButton('Desactivar', ['controller' => 'Users', 'action' => 'delete', $user->id],['class' => 'btn btn-danger pull-left', 'data' => ['active' => 0]]);
      		}else{
      			echo $this->Form->postButton('Activar', ['controller' => 'Users', 'action' => 'delete', $user->id],['class' => 'btn btn-danger pull-left', 'data' => ['active' => 1]]);
      		} ?>
        	<?php  ?>
      	</div>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>