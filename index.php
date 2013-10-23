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
        <div id="title"></div>
        <div id="image">
            <img src="" / class="view">
        </div>
        <div id="description">
        </div>
    </div>
    <div id="slider">
    	<div id="prev">
    		<img src="img/prev-arrow.png" title="Předchozí" class="arrow" />
    	</div>
    	<div id="item-list">
    	<?php
    	$data = pg_fetch_object($objProduct,0);
    	echo '<img src="'.trim($data->path).'" title="'.trim($data->title).'" description="'.trim($data->description).'" class="selected">';
    	
    	for($i=1;$i<$num;$i++) {
    		$data = pg_fetch_object($objProduct,$i);
    		echo '<img src="'.trim($data->path).'" title="'.trim($data->title).'" description="'.trim($data->description).'" class="carousel">';
    	}
        ?>
        </div>
        <div id="next">
        	<img src="img/next-arrow.png" title="Další" class="arrow" />
        </div>
    </div>
    <div id="foo-link"><a href="admin/index.php">Login</a></div>
</div>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
	$(document).ready(function(){
		var title = $('.selected').attr('title');
		var path = $('.selected').attr('src');
		var description = $('.selected').attr('description');
		$('.view').attr('src',path);
		$('#title').text(title);
		$('#description').text(description);

		var $sel = $('.selected');
		$sel.css('border','4px #66D solid');

		$('#next').click(function(){
			if($sel.next().length > 0) {
				$sel = $sel.next();
			}
			$('#item-list img').attr('class','carousel');
			$('#item-list img').css('border','');
			$sel.css('border','4px #66D solid');
			$sel.attr('class','selected');
			var title = $('.selected').attr('title');
			var path = $('.selected').attr('src');
			var description = $('.selected').attr('description');
			$('.view').attr('src',path);
			$('#title').text(title);
			$('#description').text(description);		
		});

		$('#prev').click(function(){
			if($sel.prev().length > 0) {
				$sel = $sel.prev();
			}
			$('#item-list img').attr('class','carousel');
			$('#item-list img').css('border','');
			$sel.css('border','2px #66D solid');
			$sel.attr('class','selected');
			var title = $('.selected').attr('title');
			var path = $('.selected').attr('src');
			var description = $('.selected').attr('description');
			$('.view').attr('src',path);
			$('#title').text(title);
			$('#description').text(description);		
		});
		
		/*$('.carousel').click(function(){
			var title = $(this).attr('title');
			var path = $(this).attr('src');
			var description = $(this).attr('description');
			$('.view').attr('src',path);
			$('#title').text(title);
			$('#description').text(description);
		});*/
	});
</script>