<?php
require_once 'src/db.handle.php';

$Nick = Conn::LoadAll();
while ($data = pg_fetch_object($Nick)) {
  echo $data->id;
  echo $data->name;
}
/*
<style type="text/css">
    
</style>
<div id="wireframe">
    <div id="view">
        <div id="title">Lipov� med</div>
        <div id="image">
            <img src="" />
        </div>
        <div id="description">
            <p>Liov� med, st��en� v p�li �ervence pat�� mezi nejaromati�t�j�� medy.</p>
        </div>
    </div>
    <div id="slider">
        <div class="item"></div>
    </div>
</div>*/
?>