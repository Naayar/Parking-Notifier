<div >
	<div style="background-color: #eee; display: inline-block;">
		<div style="text-align: center;">
			<h2>Alerta Vehículo</h2>
		</div>
		<div style="text-align: justify;">
			<h3 align="left">Hola <?php echo $user ?></h3>
			<p style="" align="justify"> <br>
				Se le notifica que su vehículo con placa <?php echo $placa ?> ha presentado un inconveniente el <?php echo $fecha ?> con la siguiente descripción:<br><br>
				<?php 

				foreach ($eventos as $e) {
					if ($otro != "") {
						if($e == 1){
						echo "Llaves olvidadas<br>";
						}else if ($e == 2){
							echo "Alarma sonando<br>";
						}else if($e == 3){
							echo "Vehículo encendido<br>";
						}else if($e == 4){
							echo "Baúl abierto<br>";
						}
						echo $otro.'<br><br>';
					}else{
						if($e == 1){
						echo "Llaves olvidadas<br>";
						}else if ($e == 2){
							echo "Alarma sonando<br>";
						}else if($e == 3){
							echo "Vehículo encendido<br>";
						}else if($e == 4){
							echo "Baúl abierto<br>";
						}
						echo "<br>";
					}
				}
				 ?>
				Un gran saludo de parte de Parking Notifier.<br>No responder a este correo. Mensaje enviado desde el sistema automatico de Parking Notifier </p>
		</div>
	</div>
</div>