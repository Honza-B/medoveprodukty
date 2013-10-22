<?php
	session_start();
	if(!isset($_SESSION["User"])) {
		header('Location: index.php');
	} else {
		$conn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());

		$insert = pg_query_params($conn,'INSERT INTO product (title, path, description) VALUES($1, $2, $3)',array($_POST["title"],$_POST["view"],$_POST["desc"]));
		if(!$insert) {
			echo 'fuck';
		}
		pg_query($connection, 'COMMIT');
	}
?>