<link rel="stylesheet" href="../css/main.css">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
	session_start();
	if(!isset($_SESSION["User"])) {
		header('Location: index.php');
	} else {
		$dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
		
		if(!$dbconn) {
			echo 'Not connected to database';
		}
		
		$id = $_GET["id"];

		$objProduct = pg_query($dbconn,"SELECT * FROM product WHERE id='$id'");
		$objProduct = pg_fetch_object($objProduct);
		
		if(!$objProduct) {
			echo pg_last_error();
		}
		
		echo '
			<form action="update_edit.php?id='.$id.'" method="post">
				Název<br>
				<input type="text" name="title" value="'.trim($objProduct->title).'"><br>
				Cesta k souboru<br>
				<input type="text" name="view" value="'.trim($objProduct->path).'"><br>
				Popis<br>
				<input type="text" name="desc" value="'.trim($objProduct->description).'"><br>
				<input type="submit" value="Update">
			</form>
		';
	}
?>