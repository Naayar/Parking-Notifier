<title>
	Parking Notifier - SA - Editar Medio
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Editar medio</h2>
		</div>
		<p>Se han preseleccionado los medios actualmente activos</p>
		<div class="btn-group" data-toggle="buttons">
		<?php foreach ($medio as $me): ?>
			<label class="btn btn-default btn-lg">
			    <input type="checkbox" autocomplete="off" checked><?php echo $me->nombre ?>
			</label>
		<?php endforeach ?>
		</div>







		<?= $this->Form->create($medio, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('nombre', ['label' => 'Nombre']);
			?>
		</fieldset>
		<?= $this->Form->button('Guardar',['class' => 'btn btn-danger']) ?>
		<?= $this->Html->link('Cancelar', array('controller' => 'Medio', 'action' => 'index'), ['class' => 'btn btn-primary pull-right']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>