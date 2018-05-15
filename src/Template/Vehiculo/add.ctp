<title>
	Parking Notifier - Mis vehiculos 
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
		<div class="page-header">
	  		<h2>Nuevo vehiculo</h2>
	  	</div>
	  	<?php echo $this->Form->create($vehiculo, ['novalidate']); ?>
	  	<?php echo $this->Form->input('placa',['label' => 'Placa', 'placeholder' => 'sin espacios ni guiones ABC123', 'style' => 'text-transform:uppercase']); ?>
	  	<?php echo $this->Form->input('marca',['label' => 'Marca']); ?>
	  	<?php echo $this->Form->input('tipo',['label' => 'Tipo', 'options' => ['carro' => 'Carro', 'moto' => 'Moto']]); ?>
	  	<?php echo $this->Form->submit('Crear', ['class' => 'btn btn-danger pull-right']); ?>
	  	<?php echo $this->Form->end(); ?>
	</div>
	<?php

	 ?>
</div>