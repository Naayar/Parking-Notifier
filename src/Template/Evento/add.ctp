<title>
	Parking Notifier - SA - Nuevo Eventos
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Nuevo evento</h2>
		</div>
		<?= $this->Form->create($evento, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('descripcion', ['label' => 'Descripción', 'rows' => '1', 'style' => 'resize: none']);
			?>
		</fieldset>
		<?= $this->Form->button('Crear',['class' => 'btn btn-danger']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>