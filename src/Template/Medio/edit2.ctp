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
					<?php if(isset($_SESSION['FBID']) && ($_SESSION['FBID'] != NULL)): ?>
					<?php echo $this->Html->link('Logout Facebook', ['controller' => 'Users', 'action' => 'logoutfacebook'], ['class' => 'btn btn-primary btn-lg btn-block']); ?>
					<?php else: ?>
					<?php echo $this->Html->link('Login Facebook', ['controller' => 'Users', 'action' => 'loginfacebook'], ['class' => 'btn btn-primary btn-lg btn-block']); ?>
<<<<<<< HEAD
					<?php echo $this->Amazon->SNS->publish('arn:aws:sns:us-east-1:567053558973:foo', 'This is the message to publish');?>
=======
>>>>>>> 3bd11d06a6a3ac61ee9522845eed343812e1c1c5
					<?php endif; ?>
				</div>
			</div>
		</div>

	</div>
</div>