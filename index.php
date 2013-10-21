<?php
$dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());

if(!$dbconn) {
echo 'neni spojeni';
} else {
	echo '<form action="index.php" method="post">
    Nick<br>
    <input type="text" name="nick"><br>
    <input type="submit" value="Save!">
</form>';
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
            <p>Liový med, stáčený v půli července patří mezi nejaromatičtější medy.</p>
        </div>
    </div>
    <div id="slider">
        <div class="item"></div>
    </div>
</div>*/
?>