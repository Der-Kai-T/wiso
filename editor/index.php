<?php session_start(); 
  error_reporting(E_ALL);
  $_SESSION['debug']=false;
  
  $security_required_level = 1;
  date_default_timezone_set('Europe/Berlin');
  if(isset($_SESSION['con_admin_user_id'])){
    
    
    
    
  }else{
    //header("Location:login.php");
  }


  include("include/db_connect.php");
  include("include/db_querys.php");
  include("include/times.php");
  include("include/mailhandler.php");

      
		
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WISO Editor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/ionicons/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->

  <!-- Google Font: Maven Pro (JUH Werbeschrift)-->
  <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  
  
  <!-- User-CSS -->
  <link href="css/usercss.css" rel="stylesheet">
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.min.js"></script>

  <script>
    var socket = io.connect('ws://fs1.kai-thater.de:3000');
    var msg = {};
  </script>
   
  
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php

  
  
  
  
  
		
		
  
	include("include/html_navbar.php");
	include("include/html_sidebar.php");
  
  
  
  ?>
  
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <!--<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     
  
  
  <?php
  
  include("include/html_result.php"); // the default result-handler
	if(isset($_GET['page'])){
		$include_page = $_GET['page'];
	}else{
		$include_page = "start";
	}
	
	if(is_file($include_page.".php")){
		include($include_page.".php");
	}else{
		include("404.php");
	}
  
  
  
  include("include/html_footer.php");
  ?>
  
  <script src='js/userjs.js'></script>
        
