<style>
li  {padding:10px;border:1px solid silver;background-color: lightyellow;
            width:80%;
            margin-top: 4px;
        }
</style>
<?php  
$fname = "DATA\\detail01\\systemsec01.json";
$json =file_get_contents($fname);
$obj  = (object)json_decode($json , JSON_UNESCAPED_UNICODE);
// print_r($obj);
$obj->header = (object)$obj->header;
?>

<h1> 
<?=$obj->header->title?>
</h1>
<ol> 
<? foreach($obj->best_practice as $bp){ ?>
 <li><?=$bp?></li>
<? } ?>
</ol>