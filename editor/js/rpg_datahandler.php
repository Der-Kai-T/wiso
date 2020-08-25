<?php
	$con_id = $_SESSION['con_id'];
	try{
		$rpg_list = array();


		$pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

		$sql	= "SELECT * FROM con_convention c, con_convention_rpg r, con_convention_rpg_start s , con_table t, con_user u WHERE c.con_convention_id = r.con_convention_id AND u.con_user_id = r.con_user_id AND  r.con_table_id = t.con_table_id AND r.con_convention_rpg_start_id = s. con_convention_rpg_start_id AND r.con_convention_id = :conid ORDER BY s.con_convention_rpg_start_ts ASC";



		$statement = $pdo->prepare($sql);
		$statement->bindParam(':conid', $con_id, PDO::PARAM_STR);

		$selected = $statement->execute();

		while($row = $statement->fetch()){
			array_push($rpg_list, $row);
		}


	}catch (Exception $e){
		echo($e->getMessage());
	}



	echo"<script>
	
		
		
	
      var data = [];
	 
      ";

	$first = true;
	foreach($rpg_list as $rpg){
		
		if($first){
			echo"var con_start = ".$rpg['con_convention_start'].";
			var con_end = ". $rpg['con_convention_end'].";";
			
			$first = false;
		}
		
		
		
		$title        = htmlspecialchars($rpg['con_convention_rpg_title']);
		$system		  = htmlspecialchars($rpg['con_convention_rpg_system']);
		
		$table_id	  = $rpg['con_table_id'];
		if($rpg['con_convention_rpg_publish'] == "1"){
			$color = "{r:0,g:255,b:0}";
		}else{
			$color = "{r:255,g:0,b:0}";
		}
	
		$start_ts = $rpg['con_convention_rpg_start_ts'];
		$dur = $rpg['con_convention_rpg_duration'];

		$dur = $dur*60*60;
		if($rpg['con_table_name'] != "noch kein Tisch zugewiesen"){
		  
		  
		  echo"
			var line = {
				'Title': \"$title\",
				'System': \"$system\",
				'SL':\"SL\",
				'Table':$table_id,
				'Color':$color,
				'Start': $start_ts,
				'dur': $dur
			}
			
			data.push(line);\n
			
			
		  ";
		  
		  
		  
		}

		




	}


	echo" var tische = [];
		var tische_id = [];
		
		
		";

	$con_id = $_SESSION['con_id'];
	try{
		$table_groups	= fetch_tables_groups($con_id);
		$ii = 0;
		foreach($table_groups as $grp){
		
			$table_list		= fetch_tables($con_id, $grp['con_table_group']);
			
			$rowspan		= count($table_list);
			
			
				
			$write_tr	= false;
					
			foreach($table_list as $table){
				
				$enabled	= $table['con_table_enabled'];
				
				$table_id	= $table['con_table_id'];
				$discord	= $table['con_table_discord'];
				
				$discordlink ="";
				if($discord !=""){
					$discordlink = "<a href='$discord' target='_blanck' alt='$lang_table_discordlink_alt'><span class='fab fa-discord'></span>";
				}
			
				if($enabled == "1"){
					$fa		= "fa-thumbs-down";
					$do		= "disable";
					$style 	= "";
				}else{
					$fa		= "fa-thumbs-up";
					$do		= "enable";
					$style	= "class='bg-secondary'";
				}
				
				$table_name	= $table['con_table_name'];
				$group_name	= $grp['con_table_group'];
			
				echo"
					tische.push(new Tisch(\"$table_name\",\"$group_name\"));
					tische_id[$table_id] = $ii;
					
				";
				$ii++;
			
			}
		}
					

		
		
	}catch (Exception $e){
		echo($e->getMessage());
	}
	
	function fetch_tables_groups($con_id){
		global $pdo_mysql, $pdo_db_user, $pdo_db_pwd;
		$result = array();
		try{

			$pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
		
			$sql	= "SELECT DISTINCT con_table_group FROM con_table WHERE con_convention_id = $con_id ORDER BY con_table_group";
		
		
			foreach ($pdo->query($sql) as $row){
			
				array_push($result, $row);
			}
		
		}catch (Exception $e){
			echo($e->getMessage());
		}
		
		return $result;
	}								
	
	function fetch_tables($con_id, $group){
		global $pdo_mysql, $pdo_db_user, $pdo_db_pwd;
		$result = array();
		try{

			$pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
		
			$sql	= "SELECT * FROM con_table WHERE con_convention_id = $con_id AND con_table_group = '$group' ORDER BY con_table_name";
			
			
			foreach ($pdo->query($sql) as $row){
			
				array_push($result, $row);
			}
		
		}catch (Exception $e){
			echo($e->getMessage());
		}
		
		return $result;
	}
								
					
						






	$jj = 0;

	echo"var zeiten = [];
		var zeiten_id = [];";

	try{
			$time_list = array();
			
			
			$pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
			
			$sql	= "SELECT * FROM con_convention_rpg_start WHERE con_convention_id = :conid";
			
			
			
			$statement = $pdo->prepare($sql);
			$statement->bindParam(':conid', $_SESSION['con_id'], PDO::PARAM_STR);
				
				$selected = $statement->execute();
				
				while($row = $statement->fetch()){
					
					
					$time_short 		= UnixToStartTime($row['con_convention_rpg_start_ts']);
					$time_id			= $row['con_convention_rpg_start_id'];
					
					
					echo"
					zeiten.push(\"$time_short\");
					zeiten_id[$time_id] = $jj;
					";
					
				}
			
			
		}catch (Exception $e){
			echo($e->getMessage());
		}









echo"</script>";






?>
