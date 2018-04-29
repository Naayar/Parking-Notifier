<div >
	<div style="background-color: #eee; display: inline-block;">
		<div style="text-align: center;">
			<h2>Registro Exitoso</h2>
		</div>
		<div style="text-align: justify;">
			<h3 align="left">Hola <?php echo $name ?></h3>
			<p style="" align="justify"> El registro en el servicio de Parking Notifier asociado a la empresa <?php echo $empresa ?> ha sido exitoso el <?php echo $fecha ?>. Tu perfil es de Administrador<br>
				Ahora solo debes inscribir tus vehiculos y escoger los medios de por los cuales quieres ser notificado para que el servicio quede activado y poder avisarte de cualquier imprevisto con tu medio de transporte.<br>
				Si ya has realizado estas acciones, ya estaria todo listo. te avisaremos de cualquier problema.
				<br>
				Tu clave de ingreso al sistema ha sido generada aleatoriamente. Tu clave es <?php echo $value ?>. Puedes cambiarla en cualquier momento en <?php echo $this->Html->link('Editar Perfil', ['controller' => 'Users', 'action' => 'edit2', $user, '_full' => true]); ?>.<br>
				Puedes pasar a revisar las funcionalidades de tu perfil incluyendo generar claves para nuevos ingresos, reportes, etc. Un gran saludo de parte de Parking Notifier.<br><br>No responder a este correo. Mensaje enviado desde el sistema automatico de Parking Notifier </p>
		</div>
	</div>
</div>