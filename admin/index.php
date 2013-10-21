<?php
if(isset($_SESSION["User"])) {
	echo 'nekdo je prihlasen';
} else {
	echo '
		<form action="login.php" method="post">
			User<br>
			<input type="text" name="user">
			Password<br>
			<input type="password" name="pass">
			<input type="submit" value="Login">			
		</form>
	';
}