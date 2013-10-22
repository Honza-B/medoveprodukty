<?php
	session_start();
	if(!isset($_SESSION["User"])) {
		header('Location: index.php');
	} else {
		$conn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
		
		$title = pg_escape_string($_POST["title"]);
		$view = pg_escape_string($_POST["view"]);
		$desc = pg_escape_string($_POST["desc"]);

		$insert = pg_query("INSERT INTO product (title, path, description) VALUES('{$title}','{$view}','{$desc}')");
		if(!$insert) {
			echo 'fuck';
		}
	}
?>