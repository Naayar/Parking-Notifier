<title>
	Parking Notifier - SA - Editar Medio
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Editar medio</h2>
		</div>
		<?= $this->Form->create($medio, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('nombre', ['label' => 'Nombre']);
			?>
		</fieldset>
		<?= $this->Form->button('Guardar',['class' => 'btn btn-danger']) ?>
		<?= $this->Html->link('Cancelar', array('controller' => 'Medio', 'action' => 'lista'), ['class' => 'btn btn-primary pull-right']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>