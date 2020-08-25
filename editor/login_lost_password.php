<?php session_start(); 

// Load a language file. Default language is currently german.
  		include("lang/de.php");	
  
		
		
		
		
		//overwrite the default language (which is currently german - as I am german)
		//with the selected one. Doing it that way ensures, that all variables are valid as they are 
		//set in the german language file. If no translation is available, it will use the german version
		if(isset($_SESSION['lang'])){
			$lang = $_SESSION['lang'];
			if($lang != "de"){ 
				if(is_file("lang/$lang.php")){
					include("lang/$lang.php");
				}else{
					include("lang/en.php");
				}
			}
		}
		
		?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <b>conservices.de</b> Backend</a>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
   <link rel="stylesheet" href="plugins/ionicons/ionicons.min.cs
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   <b>PRG</b> Label-Editor</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo$lang_lost_pwd;?></p>

      

      <p class="mt-3 mb-1">
        <a href="login.php"><?php echo$lang_lost_pwd_back_login;?></a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
