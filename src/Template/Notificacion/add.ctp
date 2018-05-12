<title>
	Parking Notifier - Notificaciones
</title>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header">
	  		<h2>Notificar</h2>
	  	</div>
	  	<div class="panel panel-default">
	  		<div class="row">
	  			<div class="col-sm-8 col-sm-offset-2 ">
	  				<?php echo $this->Form->create($notificacion,['style' => 'margin: 100px', 'onsubmit' => 'return validar(this)']); ?>
	  				<?php echo $this->Form->input('placa', ['label' => 'Placa', 'style' => 'text-transform:uppercase', 'autofocus', 'required']); ?>
	  				<?php echo $this->Form->label('evento', 'Evento'); ?>
	  				<br>
	  				<div id="eventos">	
	  				<?php foreach ($eventoos as $e): ?>
	  					<?php echo $this->Form->checkbox($e->id,['value' => $e->descripcion]); echo " ".$e->descripcion ?><br>
	  				<?php endforeach ?>
	  				</div>
	  				<input type="checkbox" name="" id="CBotro" onclick="mostrar()"> Otro
	  				<br><br>
	  				<div id="oculto" style="display: none;">
	  					<?php echo $this->Form->input('otro', ['label' => 'otro']);?>
	  				</div>
	  				<br>
	  				<?php echo $this->Form->submit('Enviar', ['class' => 'btn btn-danger pull-right']); ?>
	  				<?php echo $this->Form->end(); ?>
	  			</div>
	  		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function mostrar(){
	if (document.getElementById('CBotro').checked){
		document.getElementById('oculto').style.display = 'block';
	}else{
		document.getElementById('oculto').style.display = 'none';
	}
}

function validar(esto){ 
valido=false; 
for(a=0;a<esto.elements.length;a++){ 
if(esto[a].type=="checkbox" && esto[a].checked==true){ 
valido=true; 
break 
} 

} 
if(!valido){ 
alert("Por favor seleccione un evento");return false 
} 

}  
</script>