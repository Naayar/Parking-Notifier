<?php
function generaPass(){
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $longitudCadena=strlen($cadena);
     
    $pass = "";
    $longitudPass=10;
     
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
	Parking Notifier - Registro staff
</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Nuevo encargado de seguridad</h2>
		</div>
		<?= $this->Form->create($user, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('codigo', ['label' => 'Codigo']);
				echo $this->Form->input('name', ['label' => 'Nombres']);
				echo $this->Form->input('lastName', ['label' => 'Apellidos']);
				echo $this->Form->input('phone', ['label' => 'Celular']);
				echo $this->Form->input('email', ['label' => 'Correo electronico']);
				echo $this->Form->hidden('clave', ['value' => generaPass()]);
				echo $this->Form->input('password', ['label' => 'Password', 'value' => generaPass()]);
			?>
		</fieldset>
		<?= $this->Form->button('Crear',['class' => 'btn btn-danger']) ?>
		<?php echo $this->Html->link('Cancelar', array('controller' => 'Company', 'action' => 'view'), ['class' => 'btn btn-primary pull-right']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>
