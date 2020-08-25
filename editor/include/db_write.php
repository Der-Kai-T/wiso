<?php
	
	function write_to_database($table, $value_array){
	
		global $pdo_mysql, $pdo_db_user, $pdo_db_pwd;
		
		

		$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
		$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
		
		$sql		= "INSERT INTO eq (";
		
			foreach($value_array as $key=>$value){
				$sql .= ":".$key."_col, ";			
			}
		
		$sql		= substr($sql,0,-2);
		
		$sql		.= ") VALUES (";
		
		foreach($value_array as $key=>$value){
				$sql .= ":".$key."_val, ";			
			}
		
		$sql		= substr($sql,0,-2);
		$sql		.= ");";
		
		$statement	= $pdo->prepare($sql);
		
		
		
		echo"<pre>";
	
		print_r($value_array);
		echo "SLQ: $sql
		";
		foreach($value_array as $key=>$value){
				$statement->bindParam(':'.$key.'_col', $key);		
				$statement->bindParam(':'.$key.'_val', $value);		
				echo "Key= $key; val = $value
				";
			}
		
	
			echo $statement->debugDumpParams();
		$statement->execute();
		
		print_r( $pdo->errorInfo());
		
		echo"</pre>";
		if($statement == true){
			return $pdo->lastInsertId();
		}else{
			return "ERROR:";
		}
	}
	?>
				  
