<link rel="stylesheet" href="../css/main.css">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
	session_start();
	if(!isset($_SESSION["User"])) {
		header('Location: index.php');
	} else {
		echo '
			<form action="create_edit.php" method="post" enctype="multipart/form-data">
				Název<br>
				<input type="text" name="title"><br>
				Cesta k souboru<br>
				<input type="text" name="file"><br>
				Popis<br>
				<input type="text" name="desc"><br>
				<input type="submit" value="Create">
			</form>
		';
	}
?>