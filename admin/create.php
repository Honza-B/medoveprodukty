<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
	session_start();
	if(!isset($_SESSION["User"])) {
		header('Location: index.php');
	} else {
		echo '
			<form action="create_edit.php" method="post" encrypte="multipart/form-data">
				Title<br>
				<input type="text" name="title"><br>
				Path<br>
				<input type="file" name="view"><br>
				Description<br>
				<input type="text" name="desc"><br>
				<input type="submit" value="Create">
			</form>
		';
	}
?>