<title>
	Parking Notifier - Editar usuario 
</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Editar usuario</h2>
		</div>
		<?= $this->Form->create($user, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('codigo', ['label' => 'Código']);
				echo $this->Form->input('name', ['label' => 'Nombres']);
				echo $this->Form->input('lastName', ['label' => 'Apellidos']);
				echo $this->Form->input('phone', ['label' => 'Celular']);
				echo $this->Form->input('email', ['label' => 'Correo electrónico']);
				echo $this->Form->input('password', ['label' => 'Contraseña', 'value' => '', 'placeholder' => 'Dejar en blanco si no deseas editar']);
			?>
		</fieldset>
		<?= $this->Form->button('Guardar', ['class' =>  'btn btn-danger pull-right']) ?>
		<?php echo $this->Html->link('Cancelar', array('controller' => 'Users', 'action' => 'home'), ['class' => 'btn btn-primary']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>