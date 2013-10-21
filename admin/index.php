<?php
if(isset($_SESSION["User"])) {
	
} else {
	echo '
		<form action="login.php" method="post">
			User<br>
			<input type="text" name="user">
			Password<br>
			<input type="text" name="pass">
			<input type="submit" value="Login">			
		</form>
	';
}