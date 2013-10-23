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
		
		/* Heroku nejspis nepodporuje upload obrázku, ale asi by t melo vypadat nejak takto, dále nize */ 
		$file = $_FILES['file'];
		$tmpfile = $file['tmp_name'];
		
		if(!$file or !is_uploaded_file($tmpfile)) {
			echo 'neni soubor';
		} else {
			$is_upload = move_uploaded_file($tmpfile, 'img/'.$file['name']);
			$view = 'img/'.$file['name'];
			
			/*if(!$is_upload) { 
				echo 'neuspesny upload';
			} else {
				
			}*/
		}
		
		$title = pg_escape_string($_POST["title"]);
		//$view = "img/" . $_FILES["file"]["name"];
		$desc = pg_escape_string($_POST["desc"]);

		$insert = pg_query($dbconn,"INSERT INTO product (title, path, description) VALUES('$title','$view','$desc')");
		if(!$insert) {
			echo pg_last_error();
		}
		
		//header('Location: index.php');
	}
?>