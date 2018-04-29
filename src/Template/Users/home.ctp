<title>
	Parking Notifier - <?= $current_user['role'] ?> - home
</title>

<?php if (isset($current_user['role']) && $current_user['role'] === 'sa'): ?>
	
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php 
			echo $this->Chartjs->createChart([
			    'Chart' => [
			        'id' => 'mygrafico',
			        'type' => 'bar'
			    ], 
			    'Data' => $dataChart,
			    'Options' => [
			        'Bar' => [
			            'scaleShowGridLines' => false
			        ],
			        'responsive' => true
			    ]
			]);
			 ?>
		</div>
	</div>
	<p>Editado desde la laptop, no lo puedo creer</p>

<?php endif ?>

<?php if (isset($current_user['role']) && $current_user['role'] === 'admin'): ?>

	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#staff" aria-controls="usuarios" role="tab" data-toggle="tab">Staff</a></li>
					<li role="presentation"><a href="#usuarios" aria-controls="staff" role="tab" data-toggle="tab">Usuarios</a></li>
				</ul>

				<div class="tab-content">
				    <div role="tabpanel" class="tab-pane active" id="staff">
				    	<div class="table-responsive">
						  <table class="table table-hover table-bordered table-striped">
						  	<div class="page-header">
						  		<h3>Lista de usuarios staff</h3>
						  	</div>
						  	<thead>
						    	<tr>
						    		<th> <?= $this->Paginator->sort('codigo',['label' => 'Código']) ?></th>
						    		<th> <?= $this->Paginator->sort('name',['label' => 'Nombre']) ?></th>
						    		<th> <?= $this->Paginator->sort('lastName', ['label' => 'Apellidos']) ?></th>
						    		<th> <?= $this->Paginator->sort('email', ['label' => 'Correo']) ?></th>
						    	</tr>
						  	</thead>
						  	<tbody>
						    	<?php foreach ($staff as $user): ?>
								<tr>
								  <td><?= $user->codigo ?></td>
								  <td><?= $user->name ?></td>
								  <td><?= $user->lastName ?></td>
								  <td><?= $user->email ?></td>
								  <td class="actions">
								  	<?=  $this->Html->link(('Detalle'), array('controller' => 'Users', 'action' => 'view2', $user->id), ['class' => 'btn btn-primary']); ?>
								  </td>
								</tr>
						    	<?php endforeach; ?>
						  	</tbody>
						  </table>
						</div>
						<div class="pull-right">
							<?php echo $this->Html->link('Nuevo encargado de seguridad', array('controller' => 'Users', 'action' => 'add3'), ['class' => 'btn btn-danger']); ?>
						</div>
				    </div>
				    <div role="tabpanel" class="tab-pane" id="usuarios">
				    	<div class="table-responsive">
						  <table class="table table-hover table-bordered table-striped">
						  	<div class="page-header">
						  		<h3>Lista de usuarios</h3>
						  	</div>
						  	<thead>
						    	<tr>
						    		<th> <?= $this->Paginator->sort('codigo',['label' => 'Código']) ?></th>
						    		<th> <?= $this->Paginator->sort('name',['label' => 'Nombre']) ?></th>
						    		<th> <?= $this->Paginator->sort('lastName', ['label' => 'Apellidos']) ?></th>
						    		<th> <?= $this->Paginator->sort('email', ['label' => 'Correo']) ?></th>
						    	</tr>
						  	</thead>
						  	<tbody>
						    	<?php foreach ($users as $user): ?>
								<tr>
								  <td><?= $user->codigo ?></td>
								  <td><?= $user->name ?></td>
								  <td><?= $user->lastName ?></td>
								  <td><?= $user->email ?></td>
								  <td class="actions">
								  	<?=  $this->Html->link(('Detalle'), array('controller' => 'Users', 'action' => 'view2', $user->id), ['class' => 'btn btn-primary']); ?>
								  </td>
								</tr>
						    	<?php endforeach; ?>
						  	</tbody>
						  </table>
						</div>
				    </div>
				 </div>	
			</div>
			
		</div>
	</div>
	
<?php endif ?>

<?php if (isset($current_user['role']) && $current_user['role'] === 'user'): ?>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="table-responsive">
			  <table class="table table-hover table-bordered table-striped">
			  	<div class="page-header">
			  		<h3>Mis notificaciones</h3>
			  	</div>
			  	<thead>
			    	<tr>
			    		<th> <?= $this->Paginator->sort('id',['label' => 'ID']) ?></th>
			    		<th> <?= $this->Paginator->sort('fecha',['label' => 'Fecha']) ?></th>
			    	</tr>
			  	</thead>
			  	<tbody>
			    	<?php foreach ($notify as $noti): ?>
			    		<?php foreach ($noti->notificacion as $key): ?>
					<tr>
					  <td><?= $key->id ?></td>
					  <td><?= $key->fecha ?></td>
					  <td class="actions">
					  	<?=  $this->Html->link(('Detalle'), array('controller' => 'notificacion', 'action' => 'view2', $key->id), ['class' => 'btn btn-primary']); ?>
					  </td>
					</tr>
			    		<?php endforeach ?>
			    	<?php endforeach; ?>
			  	</tbody>
			  </table>
			</div>
		</div>
	</div>
<?php endif ?>
