<?php
session_start();
if(isset($_SESSION["User"])) {
	echo $_SESSION["logMsg"];
	
	$conn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
	$objProduct = pg_query($conn, "SELECT * FROM product");
	
	echo 'I fetched'. pg_num_rows($objProduct);
	
	echo '
	<table>
		<tr>
			<td>ID</td>
			<td>N�zev</td>
			<td>N�hled</td>
			<td>Popis</td>
			<td></td>
		</tr>
	';

	while($objProduct = pg_fetch_object($objProduct)) {
		echo '
			<tr>
				<td>'.$objProduct->id.'</td>
				<td>'.$objProduct->title.'</td>
				<td>'.$objProduct->path.'</td>
				<td>'.$objProduct->description.'</td>
				<td><button to-id="'.$objProduct->id.'" value="edit"><button to-id="'.$objProduct->id.'" value="delete"></td>
			</tr>
			';
	}
	
	echo '</table>';
	
	
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