<title>
	Parking Notifier - Notificaiones
</title>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header">
	  		<h2>Notifcar</h2>
	  	</div>
	  	<div class="panel panel-default">
	  		<div class="row">
	  			<div class="col-sm-8 col-sm-offset-2 ">
	  				<?php echo $this->Form->create($notificacion,['style' => 'margin: 100px']); ?>
	  				<?php echo $this->Form->input('placa', ['label' => 'Placa']); ?>
	  				<?php echo $this->Form->label('evento', 'Evento'); ?>
	  				<br>
	  				<?php foreach ($evento as $e): ?>
	  					<?php echo $this->Form->checkbox($e->descripcion).$e->descripcion; ?><br>
	  				<?php endforeach ?>
	  				<br>
	  				<label for="otro">Otro</label>
	  				<input name="otro" width="20" >
	  				<?php echo $this->Form->submit('Enviar', ['class' => 'btn btn-danger pull-right']); ?>
	  				<?php echo $this->Form->end(); ?>
	  			</div>
	  		</div>
		</div>
	</div>
</div>