		<div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'>
					Text Ändern (Live)
                <div class='card-tools'>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class='card-body' style=''>
				
					<div class='form-group'>
						<label>Zeile 1</label>
						<input required type='text' class='form-control' name='h1' id='h1' value="Herzlich willkommen">
                    </div>

					<div class='form-group'>
						<label>Zeile 2</label>
						<input required type='text' class='form-control' name='h1_sub' id='h1_sub' value="an der Wache Osdorf">
                    </div>

					<div class='form-group'>
						<label>Zeile 3</label>
						<input required type='text' class='form-control' name='h2' id='h2' value="">
                    </div>

					<div class='form-group'>
						<label>Zeile 1</label>
						<input required type='text' class='form-control' name='h2_sub' id='h2_sub' value="">
                    </div>
					
					<div class='form-group'>
						<button onclick='send_msg()' class='btn btn-primary'>Daten ändern</button>
					</div>
				</form>
				
			</div>
		</div>	
			
<script>
	function send_msg(){
		

		

		msg.h1 			= $("#h1").val();
		msg.h1_sub 		= $("#h1_sub").val();
		msg.h2 			= $("#h2").val();
		msg.h2_sub 		= $("#h2_sub").val();

		socket.emit('msg', msg);
		console.log("message sent");
	}

</script>
			
			
		








<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Nachrichtenliste (work in Progress)</h3>

				<div class="card-tools">
				
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
						<tr>
							<th>Nachricht</th>
							<th>Zeitraum</th>
							
							
							<th>Bearbeiten</th>
							
						</tr>
					</thead>
					
					<tbody align="left">
						<?php
							$pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
		
							$now  = time();
						
							$sql	= "SELECT * FROM messages WHERE message_start <= $now ORDER BY message_start ASC";
							
							$statement = $pdo->prepare($sql);
							$statement->bindParam(':email', $email, PDO::PARAM_STR);
							
							$selected = $statement->execute();
							
							while($row = $statement->fetch()){
								$h1     = $row['message_h1'];
								$h1_sub = $row['message_h1_sub'];
								$h2     = $row['message_h2'];
								$h2_sub = $row['message_h2_sub'];

								$start	= UnixToTime($row['message_start']);
								$stop	= UnixToTime($row['message_stop']);

								echo"
									<tr>
										<td><p><b>$h1</b><br>$h1_sub</p><p><b>$h2</b><br>$h2_sub</p></td>
										<td>vom $start <br> $stop</td>
										<td></td>
									</tr>

								";

							}



						?>


					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>