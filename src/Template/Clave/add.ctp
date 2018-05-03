<?php
function generaPass(){
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena=strlen($cadena);
     
    $pass = "";
    $longitudPass=8;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}
?>
<title>
	Parking Notifier
</title>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header">
			<h2>Generar clave para nuevos usuarios</h2>
		</div>
	</div>	
	<div class="col-sm-4 col-sm-offset-2">
		<?php echo $this->Form->create(); ?>
		<div class="form-group">
			<?php echo $this->Form->input('valor', ['label' => 'Valor', 'value' => generaPass()]); ?>
		</div>
		<div class="form-group">
		  	<?php echo $this->Form->input('email', ['label' => 'Correo del nuevo usuario']); ?>
		</div>
		<?php echo $this->Form->button('Generar', ['class' => 'btn btn-danger']); ?>
		<?php echo $this->Form->end(); ?>
	</div>
	<div class="col-sm-3 col-sm-offset-1">
		Esta clave es utilizada para que un usuario nuevo no se registre por error en otra empresa
	</div>
</div>