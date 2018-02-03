<title>
	Parking Notifier - Medios
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
	  		<h2>Mis Medios de Notificación</h2>
	  	</div>
	  	<div class="panel panel-default">
			<div class="panel-heading">Mis medios</div>
	  	<?php foreach ($medios as $medio): ?>
			<ul class="list-group">
				<li class="list-group-item"><p class="text-danger">Nombre:</p><?= ' '.$medio->nombre ?></li>
			</ul>
	  	<?php endforeach ?>
		</div>
	</div>
</div>