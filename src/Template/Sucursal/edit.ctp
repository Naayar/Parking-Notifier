<title>
	Parking Notifier - Editar sucursal ?>
</title>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h2>Editar sucursal</h2>
		</div>
		<?= $this->Form->create($sucursal, ['novalidate']) ?>
		<fieldset>
			<?php 
				echo $this->Form->input('name', ['label' => 'Nombre']);
				echo $this->Form->input('phone', ['label' => 'Teléfono']);
				echo $this->Form->input('address', ['label' => 'Dirección']);
			?>
		</fieldset>
		<?= $this->Form->button('Guardar', ['class' =>  'btn btn-primary pull-right']) ?>
		<?= $this->Form->end() ?>
	</div>
</div>