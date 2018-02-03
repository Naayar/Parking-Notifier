<div style="text-align: center;">
	<div style="background-color: #eee; display: inline-block;">
		<div style="text-align: center;">
			<h2>Restablecer Contraseña</h2>
		</div>
		<h3 align="left">Hola <?php echo $name ?></h3>
		<p style="" align="justify">Hemos recibido una solitud para cambiar tu contraseña. Por favor ingresa <?php echo $this->Html->link('aquí', ['controller' => 'Users', 'action' => 'resetPassword', 'token' => $token, 'id' => $user, '_full' => true]); ?> para establecer una nueva contraseña.<br><br>En caso de no haber solitado el restablecimiento de tu contraseña, por favor ignora este mensaje.<br><br>No responder a este correo. Mensaje enviado desde el sistema automatico de Parking Notifier </p>
	</div>
</div>