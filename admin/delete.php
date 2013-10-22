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
		
		$delte = pg_query($dbconn,"DELETE FROM product WHERE id='$id'");
		if(!$delete) {
			echo pg_last_error();
		} else {
			header('Location: index.php');
		}
	}
?>