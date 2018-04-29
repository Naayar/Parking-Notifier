<title>
	Parking Notifier
</title>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header">
	  		<h2>Ingreso y Salida</h2>
	  	</div>
	  	<div class="panel panel-default">
	  		<div class="row">
	  			<div class="col-md-6 col-md-offset-3 ">
	  				<?php echo $this->Form->create($ingreso, ['style' => 'margin: 100px', 'autocomplete' => 'off']); ?>
	  				<?php echo $this->Form->input('user_codigo', ['label' => 'Código', 'autofocus', 'required', 'id' => 'cod', 'onchange' => 'submi()']); ?>
	  				<?php echo $this->Form->submit('Enviar', ['class' => 'btn btn-danger pull-right', 'id' => 'boton']); ?>
	  				<?php echo $this->Form->end(); ?>
	  			</div>
	  		</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function submi(){
		var codigo = document.getElementById('cod').value;
		var tamao = codigo.length;

		if(tamao == 10){
			var evt = document.createEvent("MouseEvents");
			  evt.initMouseEvent("click", true, true, window,
			    0, 0, 0, 0, 0, false, false, false, false, 0, null);
			  var a = document.getElementById("boton"); 
			  a.dispatchEvent(evt); 

		}
		
	}
</script>