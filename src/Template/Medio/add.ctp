<title>
	Parking Notifier - SA - Nuevo Medio
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Nuevo medio</h2>
		</div>
		<?= $this->Form->create($medio, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('nombre', ['label' => 'Nombre', 'style' => 'resize: none']);
			?>
		</fieldset>
		<?= $this->Form->button('Crear',['class' => 'btn btn-danger']) ?>
		<?= $this->Html->link('Cancelar', array('controller' => 'Medio', 'action' => 'lista'), ['class' => 'btn btn-primary pull-right']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>