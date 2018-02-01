<title>
	Parking Notifier - ResetPass
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 login">
		<div class="page-header">
			<h2>Restablecer Contraseña</h2>
		</div>
		<div class="form-group">
			<?php echo $this->Form->create(); ?>
			<?php echo $this->Form->input('password', ['name' => 'pass', 'class' => 'form-control', 'placeholder' => 'password', 'label' => 'Contraseña']); ?>
			<?php echo $this->Form->input('password', ['name' => 'pass1','class' => 'form-control', 'placeholder' => 'password', 'label' =>'Confirmar Contraseña']); ?>
		</div>
		<?php echo $this->Form->button('Enviar', ['class' => 'btn btn-danger btn-lg pull-right']); ?>
	</div>
</div>

