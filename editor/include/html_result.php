<?php

	
	
	if(isset($_GET['result'])){
		
		$result = $_GET['result'];
		$show_a_result = true;
	}
	
	if(isset($show_a_result)){
		
		if(isset($_GET['query'])){
			$query	= $_GET['query'];
		}else if (!isset($query)){
			$query	= "";
		}
		
		if($result == "ok"){
			
			echo"
				<div class='row'>
					<div class='col-12'>
						<div class='card'>
							<div class='card-header bg-success''>
								<h3 class='card-title'>Die Anfrage <i>$query</i> wurde erfolgreich vom System entgegengenommen</h3>

							  
							</div>
							
							
						</div>
					</div>
				</div>
			";
		}else{
			
			if(isset($_GET['reason'])){
				$reason = $_GET['reason'];
			}else  if (!isset($reason)){
				$reason	= "";
			}
			
		
			
			echo"
				<div class='row'>
					<div class='col-12'>
						<div class='card'>
							<div class='card-header bg-warning' >
								<h3 class='card-title'>Die Anfrage <i>$query</i> konnte vom System nicht verarbeitet werden.</h3>

							  
							</div>
							
							<div class='card-body' style=''>
							 <pre>$reason</pre>
							</div>
						</div>
					</div>
				</div>
			";
		}
	}

?>