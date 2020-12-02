<?php 
namespace AppMain;

include("_css.php"); 
include("_menu.php"); 

include(".\\App\\Config.php");
include(".\\App\\SQLiteConnection.php");
include(".\\App\\SQLiteCreateTable.php");
include(".\\App\\SQLiteInsert.php");
include(".\\App\\SQLiteQuery.php");

use App\Config;
use App\SQLiteConnection;
// use App\SQLiteCreateTable;
// use App\SQLiteInsert;
use App\SQLiteQuery;

$pdo = (new SQLiteConnection())->connect();
// print_r($pdo);

foreach([1,2,3] as  $node_id){
    $childNodes = (new SQLiteQuery($pdo))->getChildNodes($node_id );
    echo "<ol>";
    foreach($childNodes as $ch){
        echo "<li>";
        echo "<input type=\"checkbox\" name=\"chk[$ch->node_id]\"> ";
        echo $ch->node_text ; 
        echo "</li>";
    }
    echo "</ol>";
    echo "<hr>";
}

//==========================

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