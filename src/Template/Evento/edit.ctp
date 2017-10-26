<title>
	Parking Notifier - SA - Editar Eventos
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Editar evento</h2>
		</div>
		<?= $this->Form->create($evento, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('descripcion', ['label' => 'Descripción', 'rows' => '1', 'style' => 'resize: none', 'autofocus']);
			?>
		</fieldset>
		
		<?= $this->Form->button('Guardar',['class' => 'btn btn-danger']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>