<nav class="navbar navbar-inverse ">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <?php echo $this->Html->link($this->Html->image("logo.png", ["alt" => "Logo", 'class' => 'media-object img-responsive', 'style' => 'display: inline-block; vertical-align: middle; line-height:normal; padding-top: 10%;' , 'width' => 50]),
                      ['controller' => 'users', 'action' => 'start'],
                      ['escape' => false, 'title' => 'PARKING NOTIFIER']
                  ). ' PARKING NOTIFIER';
            ?>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          
          <?php if (isset($current_user)): ?>
          <ul class="nav navbar-nav navbar-right">
          <?php if ($current_user['role'] == 'sa'): ?>  <!-- menu para super admin -->
            <?php echo $this->Form->create('Users', ['type' => 'GET', 'class' => 'navbar-form navbar-left', 'url' => ['controller' => 'Users', 'action' => 'search']]); ?>
            <div class="form-group">
              <?php echo $this->Form->input('search', ['label' => false, 'div' => false, 'id' => 's', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Buscar usuario']); ?>
              <?php echo $this->Form->button('Buscar', ['div' => false, 'class' => 'btn btn-danger ']); ?>
            </div>
            <?php echo $this->Form->end(); ?>
            <li><?= $this->Html->link('Inicio', array('controller' => 'Users', 'action' => 'home')); ?></li>
            <li> <?php echo $this->Html->link('Medios', array('controller' => 'Medio', 'action' => 'lista')); ?> </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Lista Eventos', array('controller' => 'Evento', 'action' => 'index')); ?></li>
                <li><?= $this->Html->link('Nuevo Evento', array('controller' => 'Evento', 'action' => 'add')); ?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empresas <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Lista Empresas', array('controller' => 'Company', 'action' => 'index')); ?></li>
                <li><?= $this->Html->link('Nueva Empresa', array('controller' => 'Company', 'action' => 'add')); ?></li>
              </ul>
            </li>
            <li><?= $this->Html->link('Lista Usuarios', array('controller' => 'Users', 'action' => 'index')); ?></li>
          <?php endif; ?>

          <?php if ($current_user['role'] == 'admin'): ?>  <!-- menu para admin -->
            <li><?= $this->Html->link('Inicio', array('controller' => 'Users', 'action' => 'home')); ?></li>
            <li><?= $this->Html->link('Generar Clave', array('controller' => 'Clave', 'action' => 'add')); ?></li>
            <li><?= $this->Html->link('Notificaciones', array('controller' => 'Notificacion', 'action' => 'index')); ?></li>
            <li><?= $this->Html->link('Reportes', array('controller' => 'Reporte', 'action' => 'index')); ?></li>
          <?php endif; ?>


          <?php if ($current_user['role'] == 'staff'): ?>  <!-- menu para staff -->
            <li><?= $this->Html->link('Inicio', array('controller' => 'Users', 'action' => 'home')); ?></li>
            <li><?= $this->Html->link('Notificar', array('controller' => 'Notificacion', 'action' => 'add')); ?></li>
          <?php endif; ?>

          <?php if ($current_user['role'] == 'user'): ?>  <!-- menu para usuario -->
            <li><?= $this->Html->link('Inicio', array('controller' => 'Users', 'action' => 'home')); ?></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vehiculos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Mis Vehiculos', array('controller' => 'Vehiculo', 'action' => 'index')); ?></li>
                <li><?= $this->Html->link('Nuevo Vehiculo', array('controller' => 'Vehiculo', 'action' => 'add')); ?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Medios de envio<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Lista Medios', array('controller' => 'Medio', 'action' => 'index')); ?></li>
                <li><?= $this->Html->link('Ediar Medios ', array('controller' => 'Medio', 'action' => 'edit2', $current_user['id'])); ?></li>
              </ul>
            </li>
            <li><?= $this->Html->link('Ingresos', array('controller' => 'Ingreso', 'action' => 'index')); ?></li>
          <?php endif; ?>



            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><?= " ".$current_user['name'] ?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Ver Perfil', array('controller' => 'Users', 'action' => 'view2', $current_user['id'])); ?></li>
                <li><?= $this->Html->link('Editar Perfil', array('controller' => 'Users', 'action' => 'edit2', $current_user['id'])); ?></li>
                <li role="separator" class="divider"></li>
                <li> <?= $this->Html->link('Salir', array('controller' => 'Users', 'action' => 'logout')); ?></li>
              </ul>
            </li>
          </ul>
          <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
              <li><?= $this->Html->link('Inicia Sesión', array('controller' => 'Users', 'action' => 'login')); ?></li>
              <li><?= $this->Html->link('Registrate', array('controller' => 'Users', 'action' => 'add2')); ?></li>
            </ul>
          <?php endif; ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
</nav>