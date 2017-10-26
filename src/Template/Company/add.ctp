<title>
	Parking Notifier - Nueva empresa
</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Nueva Empresa</h2>
		</div>
		<?= $this->Form->create($company) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('name', ['label' => 'Nombre']);
				echo $this->Form->input('phone', ['label' => 'Teléfono']);
				echo $this->Form->input('ciudad_id', ['label' => 'Ciudad', 'options' => $ciudad]);
			?>
		</fieldset>
		<?= $this->Form->button('Crear',['class' => 'btn btn-danger']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>