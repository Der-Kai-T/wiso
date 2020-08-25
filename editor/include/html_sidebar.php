  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">WISO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
	  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
        </div>
        <div class="info">
			<span style='color:white'><b>W</b>achalarm- und <br> <b>I</b>nformations-<br><b>S</b>ystem <br><b>O</b>sdorf
			<?php
			/*	if(isset($_SESSION['con_admin_user_id'])){
					$first 	= $_SESSION['con_admin_user_first'];
					$last 	= $_SESSION['con_admin_user_last'];
					
					echo"<a href='index.php?page=user_data' title='$lang_sidebar_user_edit' class='d-block'>$first $last</a>
					<a href='logout.php' class='d-block'>$lang_sidebar_logout</a>";
					
				}else{
					echo" <a href='login.php' class='d-block'>$lang_sidebar_login</a>";
				}
				
				
				if(isset($_SESSION['con_id'])){
					echo"<span style='color:white'>Event: ";
					try{

						$pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
						
						$sql	= "SELECT * FROM con_convention WHERE con_convention_id = :conid";
						
						
						$statement	= $pdo->prepare($sql);
						
						$statement->bindParam(':conid', $_SESSION['con_id']);
						
						
						$statement->execute();
						
						
						while($row = $statement->fetch()){
							$global_con_name		= $row['con_convention_name'];
							
							echo"$global_con_name";
						}
						
						
					}catch (Exception $e){
					}
					echo"</span>";
					
				}

				*/
		  ?>
		  
        </div>
      </div>
	  
	
	  
<?php //<span class="right badge badge-danger">New</span> ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
				
		
					<li class='nav-header'>Verwaltung</li>
				
					<li class='nav-item'>
						<a href='index.php?page=messages' class='nav-link'>
						  <i class='nav-icon fa fa-comment'></i>
						  <p>
							Nachrichtenverwaltung
						  </p>
						</a>
					</li>
					
					
					
				
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>