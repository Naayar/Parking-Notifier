<title>
	Parking Notifier - ResetPass
</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Editar usuario</h2>
		</div>
		<?= $this->Form->create($user, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->hidden('codigo', ['label' => 'Código']);
				echo $this->Form->hidden('name', ['label' => 'Nombres']);
				echo $this->Form->hidden('lastName', ['label' => 'Apellidos']);
				echo $this->Form->hidden('phone', ['label' => 'Celular']);
				echo $this->Form->hidden('email', ['label' => 'Correo electrónico']);
				echo $this->Form->input('password', ['label' => 'Contraseña', 'value' => '', 'placeholder' => 'Dejar en blanco si no deseas editar']);
			?>
		</fieldset>
		<?= $this->Form->button('Guardar', ['class' =>  'btn btn-danger pull-right']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>
