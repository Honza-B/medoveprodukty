<?php
$dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());

if(!$this->dbconn) 
			echo 'neni spojeni';

$nick = pg_query($dbconn, "SELECT * FROM nick ORDER BY id");

while ($data = pg_fetch_object($nick)) {
  echo $data->id . " je me id a";
  echo $data->name . " je muj nick\n";
}
/*
<style type="text/css">
    
</style>
<div id="wireframe">
    <div id="view">
        <div id="title">Lipový med</div>
        <div id="image">
            <img src="" />
        </div>
        <div id="description">
            <p>Liový med, stáèený v pùli èervence patøí mezi nejaromatiètìjší medy.</p>
        </div>
    </div>
    <div id="slider">
        <div class="item"></div>
    </div>
</div>*/
?>