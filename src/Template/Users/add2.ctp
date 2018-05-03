<title>
	Parking Notifier - Registro usuario
</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Nuevo usuario</h2>
		</div>
		<?= $this->Form->create($user, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('codigo', ['label' => 'Código', 'autofocus']);
				echo $this->Form->input('cedula', ['label' => 'Identificación']);
				echo $this->Form->input('name', ['label' => 'Nombres']);
				echo $this->Form->input('lastName', ['label' => 'Apellidos']);
				echo $this->Form->input('phone', ['label' => 'Celular']);
				echo $this->Form->input('email', ['label' => 'Correo electrónico']);
				echo $this->Form->input('password', ['label' => 'Password']);
				echo $this->Form->input('clave', ['label' =>'Clave de Empresa', 'type' => 'password']);
			?>
		</fieldset>
		<?php echo $this->Html->link('Cancelar', array('controller' => 'Users', 'action' => 'login'), ['class' => 'btn btn-primary']); ?>
		<?= $this->Form->button('Crear', ['class' =>  'btn btn-danger pull-right']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>

