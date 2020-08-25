<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Wachalarm- und Informationssystem Osdorf (WISO)</title>
    <script type="text/javascript" src="p5.js"></script>
    <script type="text/javascript" src="p5.dom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.5/socket.io.min.js"></script>
    <!--<script type="text/javascript" src="p5.sound.min.js"></script>-->
    

	<script type="text/javascript">

	</script>

    <script type="text/javascript" src="new.js"></script>

    <script type="text/javascript">
      h1          = "Herzlich willkommen";
      h1_sub      = "an der Wache Osdorf";

      h2          = "Bleiben Sie gesund.";
      h2_sub      = "";
      
    </script>
  
  
  <?php
   /* include("database.php");


    $pdo	= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);
    
    $now  = time();

		$sql	= "SELECT * FROM messages WHERE message_start <= $now AND message_stop >= $now ORDER BY message_id DESC LIMIT 1";
		
		$statement = $pdo->prepare($sql);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		
		$selected = $statement->execute();
		
		while($row = $statement->fetch()){
        $h1     = $row['message_h1'];
        $h1_sub = $row['message_h1_sub'];
        $h2     = $row['message_h2'];
        $h2_sub = $row['message_h2_sub'];


        echo"
          <script type='text/javascript'>
            h1          = '$h1';
            h1_sub      = '$h1_sub';
      
            h2          = '$h2';
            h2_sub      = '$h2_sub';
            
          </script>
        ";
    }
    */
  ?>
    <style> body {padding: 0; margin: 0; background-color:#000} canvas {vertical-align: top;} </style>


  </head>
  <body>
  </body>
</html>
