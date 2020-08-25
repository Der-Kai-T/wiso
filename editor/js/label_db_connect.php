
<script>
<?php

	if(!isset($eqid)){
		if(isset($_GET['eqid'])){
			$eqid = $_GET['eqid'];
		}
	}


$user = $_SESSION['user_username'];
$now = date("d.m.Y H:i:s", time());

//load eq details
	$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
	
	$sql		= "SELECT * FROM eq WHERE eq_id = :eqid;";
	
	$statement	= $pdo->prepare($sql);
	
	$statement->bindParam(':eqid', $eqid);
	
	$statement->execute();
	
	
	while($row = $statement->fetch()){
		
		$eq_id		= $row['eq_id'];
		
		$eq_name	= $row['eq_name'];
		$h1			= $row['eq_label_head_1'];
		$h2			= $row['eq_label_head_2'];
		$sub		= $row['eq_label_sub'];
		
		$dguv		= $row['eq_dguv'];
		$copies		= $row['eq_copies'];
		$issub		= $row['eq_is_sub'];
		$storage	= $row['eq_storage'];
		$firmware	= $row['eq_firmware'];
		
		
	}
	
	
	
	
	$sql		= "SELECT * FROM eq_storage WHERE eq_storage_id = :stor_id";
					
					
						$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
						
					
						
						$statement	= $pdo->prepare($sql);
						
						$statement->bindParam(':stor_id', $storage);
						
						$statement->execute();
						
						
						while($row = $statement->fetch()){
							
							$eq_storage_area		= $row['eq_storage_area'];			
							$eq_storage_loc			= $row['eq_storage_loc'];			
							$eq_storage_box			= $row['eq_storage_box'];
							$eq_storage_id			= $row['eq_storage_id'];
							
							
						}
						
						
	
	
	
	
//Write Javascript code
	echo"
	
	let eqid 	= '$eqid';
	let h1   	= '$h1';
	let sub 	= '$sub';
	let user 	= '$user';
	let now 	= '$now';
	let area	= '$eq_storage_area';
	let loc		= '$eq_storage_loc';
	let box		= '$eq_storage_box';
	let firmware		= '$firmware';
	";

	if($dguv == 1){
		echo "let dguv = true;";
	}else{
		echo "let dguv = false;";
	}


//Load childs
echo"
	let children_names = [];
";


	$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
						
	$sql		= "SELECT * FROM eq e, eq_child_parent c WHERE e.eq_id = c.eq_parent_eqid AND c.eq_parent_eqid = $eq_id ORDER BY c.eq_child_parent_order";
	
	$statement	= $pdo->prepare($sql);
	
	//$statement->bindParam(':eqid', $eq_id);
	
	$statement->execute();
	
	
	while($row = $statement->fetch()){
		
		$child_id		= $row['eq_child_eqid'];
		$link_id 		= $row['eq_child_parent_id'];
		$order	 		= $row['eq_child_parent_order'];
		
		$pdo2 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
		
		$sql2		= "SELECT * FROM eq WHERE eq_id = $child_id";
		
		$statement2	= $pdo2->prepare($sql2);
		$statement2->execute();
		
		
		while($row2 = $statement2->fetch()){
			
			$h1			= $row2['eq_label_head_1'];
			$eq_id2		= $row2['eq_id'];
			
			$childname  = $eq_id2."- ".$h1;
			
			echo"children_names.push('$childname')\n";
			
		}
		
	}





//Noncoded



echo "let noncoded = [];\n";
echo "let noncoded_pre = [];\n";
echo "let noncoded_suf = [];\n";




	$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
	
	$sql		= "SELECT * FROM eq_noncoded n, eq_noncoded_assign a WHERE a.eq_noncoded_id = n.eq_noncoded_id AND a.eq_id = :eqid ORDER BY eq_noncoded_order";
	
	$statement	= $pdo->prepare($sql);
	
	$statement->bindParam(':eqid', $eq_id);
	
	$statement->execute();
	
	while($row = $statement->fetch()){
		$nc_id			= $row['eq_noncoded_id'];
		$nc_name		= $row['eq_noncoded_name'];
		$nc_label		= $row['eq_noncoded_label'];
		$nc_pre			= $row['eq_noncoded_prefix'];
		$nc_suf			= $row['eq_noncoded_suffix'];
		$nc_area		= $row['eq_noncoded_area'];
		$nc_lco			= $row['eq_noncoded_locator'];
		$nc_box			= $row['eq_noncoded_box'];
		$nc_assign_id	= $row['eq_noncoded_assign_id'];
		$nc_order			= $row['eq_noncoded_order'];

		
		echo"
			noncoded.push('$nc_id- $nc_label');
			noncoded_pre.push('$nc_pre');
			noncoded_suf.push('$nc_suf');
			
		";
	}









//Additionals

/*

echo "let aditionals = [];";
echo "let aditionals_pre = [];";
echo "let aditionals_suf = [];";
echo "let aditionals_typ = [];";



	$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
	
	$sql		= "SELECT * FROM eq_fields f, eq_fields_type t WHERE f.eq_id = :eqid AND f.eq_fields_type_id = t.eq_fields_type_id ORDER BY eq_fields_order";
	
	$statement	= $pdo->prepare($sql);
	
	$statement->bindParam(':eqid', $eq_id);
	
	$statement->execute();
	
	while($row = $statement->fetch()){
		$label			= $row['eq_fields_label'];
		$ask			= $row['eq_fields_ask'];
		$order			= $row['eq_fields_order'];
		$typ			= $row['eq_fields_type_id'];
		$pre			= $row['eq_fields_prefix'];
		$suf			= $row['eq_fields_suffix'];
		$id				= $row['eq_fields_id'];
		$icon			= $row['eq_fields_type_icon'];
		
		
		echo"
			aditionals.push('$label');
			aditionals_pre.push('$pre');
			aditionals_suf.push('$suf');
			aditionals_typ.push('$icon');
		";
	}



	

*/



?>
</script>