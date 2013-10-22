<?php
session_start();

$dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());

$nick = pg_escape_string(strip_html($_POST["user"]));
$pass = sha1($_POST["pass"]);

if(!$dbconn) {
	echo 'Not connected to database';
} else {
	$objUser = pg_query($dbconn, "SELECT * FROM users");
	$objUser = pg_fetch_object($objUser);

	if($objUser->nick != $nick || $objUser->pass != $pass) {
		echo 'Wrong user or password';
	}
		$_SESSION['User'] = serialize($objUser);
if(isset($_SESSION["User"])) {
	echo 'nekdo je prihlasen';
}
		//header("Location: http://medoveprodukty.herokuapp.com/admin/index.php");
}
?>