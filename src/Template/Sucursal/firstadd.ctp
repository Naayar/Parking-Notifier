<title>
	Parking Notifier
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Mi Oficina</h2>
		</div>
		<div class="row">
			<?php foreach($sucursal as $sucu): ?>
				<div class="col-sm-6">
					<div class="well"">
						<?php echo $this->Form->create(); ?>
						<?php echo $this->Form->hidden('id', ['value' => $sucu->id]); ?>
						<?php echo $this->Form->button($sucu->name, ['class' => 'btn btn-default btn-lg btn-block']); ?>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</div>