<?php
session_start();
$dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());

$nick = pg_escape_string($_POST["user"]);
$pass = sha1($_POST["pass"]);

if(!$dbconn) {
	echo 'Not connected to database';
} else {
	$objUser = pg_query($dbconn, "SELECT * FROM users WHERE nick='$nick' and pass='$pass'");
	$num = pg_num_rows($objUser);
	$objUser = pg_fetch_object($objUser);
	
	if($num==0) {
	    echo 'Nic se nenacetlo';
	}

	if(trim($objUser->nick) == $nick && trim($objUser->pass) == $pass) {
		$_SESSION["logMsg"] .= 'it could be right<br>';
		$_SESSION["User"] = serialize($objUser);
		header('Location: index.php');
	} else {
		$_SESSION['logMsg'] .= 'it wrong<br>';
		//
		//header('Location: index.php');
	}
}
?>