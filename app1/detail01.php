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
        if( $ch->status == 'yes' || $ch->status == 'Yes' ){
            $li_class="st_yes";
        }else{
            $li_class="st_no";
        }
        echo "<li class=\"$li_class\">";
        echo "<input type=\"checkbox\" name=\"chk[$ch->node_id]\"   value=\"yes\"> ";
        // echo $ch->status ;
        // echo " "; 
        // echo $ch->node_id ; 
        echo $ch->node_text ; 
        echo "</li>";
    }
    echo "</ol>";
    // echo "<hr>";
}
//==========================
 ?>
        <center>
            <input type="submit" name="btn1" value="update_yes">
            <input type="submit" name="btn1" value="update_no">
            <input type="submit" name="btn1" value="print">
            <input type="submit" name="btn1" value="clear_all">
            <input type="submit" name="btn1" value="check_all">
        </center>
    </form>
