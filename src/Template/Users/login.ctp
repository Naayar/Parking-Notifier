<title>
	Parking Notifier - Login
</title>
<div class="row">
	<div class="col-md-4 col-md-offset-4 login">
		<?= $this->Form->create() ?>
		<fieldset>
			<div class="page-header">
			<?= $this->Flash->render('auth') ?>
				<h2>Ingresa tus datos</h2>
			</div>
			<div class="form-group">
				<?= $this->Form->input('email', ['class' => 'form-control input-lg', 'placeholder' => 'Correo', 'label' => false, 'required']) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('password', ['class' => 'form-control input-lg', 'placeholder' => 'contraseña', 'label' => false, 'required']) ?>
			</div>
			<div class="row">
				<div class="col-md-6 col-xs-6">
					<?php echo $this->Form->button('Iniciar Sesión', ['class' => 'btn btn-primary btn-lg btn-block']); ?>
					<div class="pull-right"><?php echo $this->Html->link("Olvidaste la contraseña?", array('controller' => 'Users', 'action' => 'recover')); ?></div>
				</div>
		<?= $this->Form->end() ?> 
				<div class="col-md-6 col-xs-6">
					<?=  $this->Html->link('Registrate', array('controller' => 'Users', 'action' => 'add2'), ['class' => 'btn btn-success btn-lg btn-block' ]); ?>

				</div>
			</div>
		</fieldset>	
	</div>
</div>