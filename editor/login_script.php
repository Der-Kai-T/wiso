<?php
	session_start();
	$_SESSION = array();
	
	
	include("include/db_connect.php");
	
	$email 		= $_POST['email'];
	$pw    		= $_POST['password'];
	

	
	try{
		
		$pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
		
		$sql	= "SELECT * FROM user WHERE con_admin_email = :email";
		
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		
		$selected = $statement->execute();
		
		while($row = $statement->fetch()){
			$con_admin_user_id 		= $row['con_admin_user_id'];
			$con_admin_first 	= $row['con_admin_first'];
			$con_admin_last	 	= $row['con_admin_last'];
			$con_admin_password	= $row['con_admin_password'];
			$con_admin_userlevel	= $row['con_admin_userlevel'];
			
			
			if(password_verify($pw, $con_admin_password)){
				$_SESSION['con_admin_user_id']	= $con_admin_user_id;
				$_SESSION['con_admin_user_first']	= $con_admin_first;
				$_SESSION['con_admin_user_last']	= $con_admin_last;
				$_SESSION['con_admin_userlevel']	= $con_admin_userlevel;
				
				
			}
			
			
		}
			
		
	}catch (Exception $e){
		$fetch_user_error = $e->getMessage();	
	}	
	
	
	if(isset($_SESSION['con_admin_user_id'])){
		header("Location:index.php");
		exit;
	}else{
		header("Location:login.php?e");
		exit;
	}
	
	
	
?>