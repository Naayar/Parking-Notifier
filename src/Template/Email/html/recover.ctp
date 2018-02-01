<div class="row">
	<div class="col-sm-8 col-sm-offset-1 reset">
		<div class="page-header">
			<h2>Restablecer Contraseña</h2>
		</div>
		<h3>Hola <?php echo $name ?></h3>
		<p>Hemos recibido una solitud para cambiar tu contraseña. Por favor ingresa <?php echo $this->Html->link('aquí', ['controller' => 'Users', 'action' => 'resetPassword', 'token' => $token, 'id' => $user, '_full' => true]); ?> para establecer una nueva contraseña.</p>
	</div>
</div>