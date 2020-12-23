<?php 
namespace AppMain ; 

session_start();

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

$p  = $_SESSION['post'];

echo "<pre>";
print_r($_SESSION);
print_r($p);
echo "</pre>";

$status = $p['status'];
$stm_set = $pdo->prepare("Update nodes set status=:status WHERE node_id = :node_id ");
foreach($p['chk'] as $nid => $temp){
    echo "<h1>$status</h1>";
    $stm_set->execute([':node_id'=> $nid,':status'=>$status]);    
}

?>
<META HTTP-EQUIV="Refresh" CONTENT="4.2 ;URL=detail01.php">