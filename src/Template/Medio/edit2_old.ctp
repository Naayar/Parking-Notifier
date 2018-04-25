<title>
	Parking Notifier - Medios de Notificación
</title>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="page-header">
			<h2>Medios de Notificación</h2>
		</div>
		<h4>Por favor selecciona el medio por el cual quieres ser notidicado </h4>
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
					otrologin 
					<?php echo $this->Html->link(
 						'Login with Facebook',
 							['controller' => '', 'action' => 'login', '?' => ['provider' => 'Facebook']],['class' => 'btn btn-primary btn-lg btn-block']); ?>
					
 							<?php echo $this->Html->link('Facebook',['http://localhost/1353/fbconfig.php']); ?>

					<h5>Loguear con Facebook</h5>
					<?php echo $this->Html->link('Facebook', ['controller' => '', 'action' => '/src/Template/fbconfig.php'], ['class' => 'btn btn-primary btn-lg btn-block']); ?>

					<a href="http://localhost/1353/fbconfig.php">Login with Facebook</a></div>
					<?php echo  $_SESSION['FBID']; ?>
						</div>

				
				</div>
			</div>
		</div>

	</div>
</div>