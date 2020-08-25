<?php session_start(); 
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wiso-Editor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
   <link rel="stylesheet" href="plugins/ionicons/ionicons.min.cs">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
 <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->

  <!-- Google Font: Maven Pro (JUH Werbeschrift)-->
  <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>WISO</b> Editor</a>
  </div>
  <!-- /.login-logo -->
  
  
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Bitte geben Sie Ihre Zugangsdaten ein</p>
		
		<?php
		if(isset($_GET['e'])){
			 echo"<div class='login-box-msg bg-warning'>Fehler bei der Anmeldung. Benutzername und/oder Passwort sind falsch</div>";
		}
		?>
		<p class='login-box-msg'>&nbsp;</p>
      <form action="login_script.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user" placeholder="Benutzername">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Passwort">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Anmelden</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

     
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
