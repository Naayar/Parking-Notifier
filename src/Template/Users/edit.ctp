<title>
	Parking Notifier - Editar admin 
</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Editar usuario admin</h2>
		</div>
		<?= $this->Form->create($user, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('name', ['label' => 'Nombres']);
				echo $this->Form->input('lastName', ['label' => 'Apellidos']);
				echo $this->Form->input('phone', ['label' => 'Celular']);
				echo $this->Form->input('email', ['label' => 'Correo electrónico']);
			?>
		</fieldset>
		<?= $this->Form->button('Guardar', ['class' =>  'btn btn-danger pull-right']) ?>
		<?php echo $this->Html->link('Cancelar', array('controller' => 'Users', 'action' => 'view', $user->id), ['class' => 'btn btn-primary']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>