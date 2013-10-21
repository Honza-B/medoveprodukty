<?php
class Conn {
	public $dbconn;
	public $data;
	
	public function __construct() {
		$this->dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
		
		if(!$this->dbconn) 
			echo 'neni spojeni';
	}
	
	public function LoadAll() {
		/*echo '<form action="index.php" method="post">
			Nick<br>
			<input type="text" name="nick"><br>
			<input type="submit" value="Save!">
			</form>';*/
			
		$this->data = pg_query($this->dbconn, "SELECT * FROM nick ORDER BY id");
		
		return $data;
	}
}
?>