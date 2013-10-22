<?php
	if(!isset($_SESSION["User"])) {
		header('Location: index.php');
	} else {
		echo '
			<form action="create_edit.php" method="post">
				Title<br>
				<input type="text" name="title"><br>
				Path<br>
				<input type="text" name="view"><br>
				Description<br>
				<input type="textarea" name="desc"><br>
				<input type="submit" value="Create">
			</form>
		';
	}
?>