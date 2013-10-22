<?php
session_start();
if(isset($_SESSION["User"])) {
	echo $_SESSION["logMsg"];
} else {
	echo $_SESSION["logMsg"];
	echo '
		<form action="login.php" method="post">
			User<br>
			<input type="text" name="user"><br>
			Password<br>
			<input type="password" name="pass"><br>
			<input type="submit" value="Login">			
		</form>
	';
}
?>