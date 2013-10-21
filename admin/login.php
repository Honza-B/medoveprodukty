<?php
$dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());

$nick = $_POST["user"];
$pass = sha1($_POST["pass"]);

if(!$dbconn) {
	echo 'Not connected to database';
} else {
	$user = pg_query($dbconn, "SELECT * FROM users");
	$user = pg_fetch_object($user);

	if($user->nick != $nick || $user->pass != $pass) {
		echo 'Wrong user or password';
	}
	
	$_SESSION['User'] = serialize($user);
	header("Location: http://medoveprodukty.herokuapp.com/admin/index.php");
}
?>