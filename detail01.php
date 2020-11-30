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

<form action="detail01_do.php" method="post">
<ol> 
<? foreach($obj->best_practice as $idx0 => $bp){ ?>
 <li>
    <input type="checkbox" name="chk[<?=$idx0?>">
 <?=$bp?></li>
<? } ?>
</ol>
<center> 
    <input type="submit" value="ส่งข้อมูล">
</center> 
</form>