<?php
function generaPass(){
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena=strlen($cadena);
     
    $pass = "";
    $longitudPass=20;
     
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
	Parking Notifier - Olvvidaste la contraseña
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 login">
		<?php echo $this->Form->create();?>
		<div class="page-header">
			<h2>Recuperar Contraseña</h2>
		</div>
		<div class="form-group">
			<h4 >Se enviara un correo electronico con la información para recuperar tu contraseña</h4>
			<?php echo $this->Form->input('email', $options = array('class' => 'form-control input-lg', 'name' => 'email' ,'placeholder' => 'example@example.com', 'label' => false, 'required')); ?>

			<?php echo $this->Form->hidden('token', ['value' => generaPass()]); ?>
		</div>
			<?=  $this->Form->button('Enviar', ['class' => 'btn btn-danger btn-lg 	pull-right' ]); ?>
		<?= $this->Form->end() ?> 	
	</div>
</div>