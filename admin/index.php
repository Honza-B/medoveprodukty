<link rel="stylesheet" href="css/main.css">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
	session_start();
	if(!isset($_SESSION["User"])) {
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
	} else {
		echo '
			<form action="create.php" method="post">
				<input type="submit" value="Create product">
			</form>
		';
	
	$conn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
	$objProduct = pg_query($conn, "SELECT * FROM product");
	
	echo '
	<table class="product-list">
		<tr>
			<td>ID</td>
			<td>Název</td>
			<td>Náhled</td>
			<td>Popis</td>
			<td></td>
		</tr>
	';
	
	while($data = pg_fetch_object($objProduct)) {
		echo '
			<tr>
				<td>'.$data->id.'</td>
				<td>'.$data->title.'</td>
				<td>'.$data->path.'</td>
				<td>'.$data->description.'</td>
				<td><form action="update.php">
						<input type="submit" value="Edit" name="'.$data->id.'">
					</form>
					<form action="delete.php">
						<input type="submit" value="Delete" name="'.$data->id.'">
					</form>
				</td>
			</tr>
			';
	}
	
	echo '</table>';
}
?>