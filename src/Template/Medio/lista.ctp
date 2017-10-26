<title>
	Parking Notifier - SA - Medios
</title>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header">
			<h2>Medios de envío</h2>
		</div>
		<div class="row">
			<?php foreach ($medio as $med): ?>
				<div class="col-sm-4 ">
					<div class="panel panel-default">
					  <div class="panel-heading">
						<?= $this->Html->link($med->nombre, array('controller' => 'Medio', 'action' => 'edit', $med->id), ['class' => 'btn btn-primary btn-block']); ?>
					  </div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<br>
		<?php echo $this->Html->link('Nuevo', array('controller' => 'Medio', 'action' => 'add'), ['class' => 'btn btn-danger pull-right']); ?>
	</div>
</div>