<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="stylesheet" href="css/main.css">
<?php 
	$dbconn = pg_connect("host=ec2-54-225-102-116.compute-1.amazonaws.com port=5432 dbname=dqc3ovvf3iq5n user=zpypggkdwxounx password=mNNTRvw5iCagVG9UapUgzJmRze sslmode=require options='--client_encoding=UTF8'") or die('Could not connect: ' . pg_last_error());
	$objProduct = pg_query($dbconn, "SELECT * FROM product");
	
	$num = pg_num_rows($objProduct);
	
	if($num==0) {
	    echo 'Nic se nenacetlo';
	}
?>
<div id="wireframe">
    <div id="view">
        <div id="title">Lipový med</div>
        <div id="image">
            <img src="" / class="view">
        </div>
        <div id="description">
            <p>Lipový med, sttáčený v půli července, patří mezi nejaromatičtější medy.</p>
        </div>
    </div>
    <div id="slider">
    	<?php
    	while($data = pg_fetch_object($objProduct)) {
    		echo '
    			<div class="item" id="'.$data->id.'">
    				<img src="'.trim($data->path).'" title="'.trim($data->title).'" description="'.trim($data->description).'" class="carousel">
    			</div>
    		';
    	}
        ?>
    </div>
    <div id="foo-link"><a href="admin/index.php">Login</a></div>
</div>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
	$(document).ready(function(){
		$('.carousel').click(function(){
			var path = $(this).attr('src');
			$('.view').attr('src',path);
		});
	});
</script>