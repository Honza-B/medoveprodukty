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
		
		$title = pg_escape_string($_POST["title"]);
		$view = pg_escape_string($_POST["view"]);
		$desc = pg_escape_string($_POST["desc"]);

		$update = pg_query($dbconn,"UPDATE product SET title='$title', path='$view', description='$desc' WHERE id='$id'");
		if(!$update) {
			echo pg_last_error();
		}
		
		header('Location: index.php');
	}
?>