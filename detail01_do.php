<?php 
namespace AppMain ; 
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


echo "<pre>";
print_r($_POST);
echo "</pre>";
foreach($_POST['chk'] as $nid => $status){
    $stm = $pdo->prepare("Update nodes set status='ok' WHERE node_id = :node_id ");
    $stm->execute([':node_id'=> $nid]);
    
}

?>