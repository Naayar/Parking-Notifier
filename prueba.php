<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Login with Facebook</title>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet"> 
 </head>
  <body>
  <?php if ($_SESSION['FBID']): ?>      <!--  despues de estar logueado  -->
<div class="container">
<div class="hero-unit">
  <h1>Usted ya esta logueado como <?php echo $_SESSION['FULLNAME']; ?> </h1>
</div>
<div class="span4">
 <ul class="nav nav-list">
<li class="nav-header">Facebook ID</li>
<li><?php echo  $_SESSION['FBID']; ?></li>
<div><h1>Cerrar sesion con facebook </h1><a href="logout.php">Logout</a></div>
</ul></div></div>
    <?php else: ?>     <!-- antes del login --> 
<div class="container">
<h1>Login with Facebook</h1>
           Loguear con Facebook
<div>
      <a href="fbconfig.php">Login with Facebook</a></div>
	
      </div>
    <?php endif ?>
  </body>
</html>
