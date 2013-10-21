<?php
require_once 'src/db.handle.php';

$con = Conn::LoadAll();
while ($data = pg_fetch_object($con)) {
  echo $data->id;
  echo $data->name;
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