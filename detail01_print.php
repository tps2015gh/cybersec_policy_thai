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

$pdo = (new SQLiteConnection())->connect(".");
// print_r($pdo);
?>
    <form action="detail01_do.php" method="post">
<?
foreach([1,2,3] as  $node_id){
    $node1 = (new SQLiteQuery($pdo))->getNode($node_id);
    $childNodes = (new SQLiteQuery($pdo))->getChildNodes($node_id );
    echo "<h1>$node1->node_text</h1>";
    echo "<ol>";
    foreach($childNodes as $ch){
        if($ch->status == 'yes'){
        echo "<li>";
        echo $ch->status ;
        echo " "; 
        echo $ch->node_id ; 
            $print = true ; 
            // echo "<input type=\"hidden\" name=\"chk[$ch->node_id]\"  value=\"No1\"> ";
            // echo "<input type=\"checkbox\" name=\"chk[$ch->node_id]\" CHECKED value=\"Yes\"> ";
            echo $ch->node_text ; 
            echo "</li>";
        }else{
            // echo "<input type=\"checkbox\" name=\"chk[$ch->node_id]\"   value=\"Yes\"> ";
        }
    }
    echo "</ol>";
    // echo "<hr>";
}
//==========================
 ?>
        <!-- <center>
            <input type="submit" name="btn1" value="ส่งข้อมูล">
            <input type="submit" name="btn1" value="print">
        </center> -->
    </form>
