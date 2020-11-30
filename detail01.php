<? include("_css.php"); ?>
<? include("_menu.php"); ?>

<?php

$ar_fname = ["systemsec01.json", "systemsec02.json", "systemsec03.json"];

foreach ($ar_fname as $idx0 => $fname1) {
    $fname = "DATA\\detail01\\" . $fname1;
    $json = file_get_contents($fname);
    $obj  = (object)json_decode($json, JSON_UNESCAPED_UNICODE);
    // print_r($obj);
    $obj->header = (object)$obj->header;
?>

    <h1>
        <?= $obj->header->title ?>
    </h1>

    <form action="detail01_do.php" method="post">
        <input type="hidden" name="detail_code" value="<?= $idx0 ?>">
        <ol>
            <? foreach($obj->best_practice as $idx0 => $bp){ ?>
            <li>
                <input type="checkbox" name="chk[<?= $idx0 ?>">
                <?= $bp ?></li>
            <? } ?>
        </ol>
        <center>
            <input type="submit" value="ส่งข้อมูล">
        </center>
    </form>
<?php } ?>