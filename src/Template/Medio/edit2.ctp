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
			<div class="col-sm-6">
				<div class="well">
					<button type="button" class="btn btn-default btn-lg btn-block" data-toggle="modal" data-target="#myModal">SMS
					</button>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Verificar Numero Teléfono</h4>
      </div>
      <div class="modal-body">
      	<?php echo $this->Form->create(); ?>
        <?php echo $this->Form->input('phone', ['label' => 'Teléfono', 'min' => '1000000000', 'max' => '9000000000', 'type' => 'number', 'value' => $current_user['phone'], 'required', 'onkeypress' => "return validaNumericos(event)"]); ?>
      </div>
      <div class="modal-footer">
      	<div class="col-xs-6">
        	<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
      	</div>
      	<div class="col-xs-6">
      		<?php echo $this->Form->button('Confirmar', ['class' => 'btn btn-danger pull-left']); ?>
      	</div>
      	<?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>


<script>
	function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
	}
</script>