<title>
	Parking Notifier
</title>
<div class="col-sm-12 "> 
		<div class="page-header">
		</div> 
	<div class="col-sm-5">
		<div>
			<h3 align="justify">
			Con parking notifier podras notificar a tus usuarios cuando se presente algún inconveniente con el vehículo, también se llevara el registro de de ingresos y salidas en el parqueadero ademas llevar el registro de los susuarios que estan inscritos en tu empresa y sea usuarios el sistema de parqueadero tales como <br>
			-Adminsitrador <br> 
			-Staff  <br>
			-Conductor <br>
			</h3>
		</div>
	</div>
	<div class="col-sm-5 col-sm-offset-1" style="padding:0%; height:150%">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active" style="background-color: #777"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1" style="background-color: #777"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2" style="background-color: #777"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="3" style="background-color: #777"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active"  style="height:150%" >
		      <?php echo $this->Html->image("logoslidepknf.PNG", ["alt" => "logoslide",'style'=>'width:100%']) ?>
		      <div class="carousel-caption">
		       
		      </div>
		    </div>
		    <div class="item" style="height:150%">
		      <?php echo $this->Html->image("parking.PNG", ["alt" => "primera",'style'=>'width:100%']) ?>
		      <div class="carousel-caption">
		        <a href="https://www.freepik.es/fotos-vectores-gratis/coche">Coche de vector creado por Freepik</a>
		      </div>
		    </div>
		    <div class="item" style="height:150%">
		      <?php echo $this->Html->image("idcard.PNG", ["alt" => "segunda",'style'=>'width:100%']) ?>
		      <div class="carousel-caption">
		        <a href='https://www.freepik.es/vector-gratis/mano-tenencia-identificacion-tarjeta_1355365.htm'>Designed by Freepik</a>
		      </div>
		    </div>
		  <div class="item" style="height:150%">
		      <?php echo $this->Html->image("notifi.PNG", ["alt" => "tercera",'style'=>'width:100%']) ?>
		      <div class="carousel-caption">
		        <a href='https://www.freepik.es/vector-gratis/fondo-con-notificacionde-mensaje_1307935.htm'>Designed by Freepik</a>
		      </div>
		    </div> 
			</div>
		  </div>

		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" >
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" ></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>

	</div>
	<div >
	<div class="col-sm-3 col-sm-offset-5">
		<br><br>
		<h2>
			Contactenos
		</h2>
		<br>
	</div>
	<div class="col-sm-4 col-sm-offset-2">	
		
		  <div class="form-group">
		   <?php echo $this->Form->input('Email', ['label' => 'Email','placeholder' => 'Email']);?>
		   </div>
		  <div class="form-group">
		     <?php echo $this->Form->input('Nombre', ['label' => 'Nombre','placeholder' => 'Nombre']);?>
		  </div>
		  <div class="col-sm-5">
		  <?= $this->Form->button('Eviar',['class' => 'btn btn-danger btn-block']) ?>
		  </div>
	</div>
	<div class="col-sm-4">
		
		<label for="labeltextarea">Asunto</label>
	    <?php echo $this->Form->textarea('Asunto', ['placeholder' => 'Asunto','id'=>'labeltextarea']);?>	
	</div>
	</div>
</div> 





