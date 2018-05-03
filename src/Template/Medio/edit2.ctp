<title>
	Parking Notifier - Medios de Notificación
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Medios de Notificación</h2>
		</div>
		<h4>Por favor selecciona el medio por el cual quieres ser notificado </h4>
		<div class="row">
			<?php foreach($medios as $medio): ?>
				<div class="col-sm-6">
					<div class="well">
						<?php echo $this->Form->create(); ?>
						<?php echo $this->Form->hidden('id', ['value' => $medio->id]); ?>
						<?php echo $this->Form->button($medio->nombre, ['class' => 'btn btn-default btn-lg btn-block']); ?>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			<?php endforeach; ?>
			
		</div>
	</div>
</div>