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


echo "<pre>";
print_r($_POST);
echo "</pre>";
if( $_POST['btn1']== "print"){
    ?>
    Goto Print Page ... 
    <META HTTP-EQUIV="Refresh" CONTENT="0.2 ;URL=detail01_print.php">    
    <?
    exit();
}
if( $_POST['btn1']== "clear_all"){
    $_SESSION['chk']  = $_POST['chk'];
    ?>
    Goto Print Page ... 
    <META HTTP-EQUIV="Refresh" CONTENT="0.2 ;URL=detail01_set_all.php?status=no">    
    <?
    exit();
}
if( $_POST['btn1']== "check_all"){
    $_SESSION['chk']  = $_POST['chk'];
    ?>
    Goto Print Page ... 
    <META HTTP-EQUIV="Refresh" CONTENT="0.2 ;URL=detail01_set_all.php?status=yes">    
    <?
    exit();
}
if( $_POST['btn1']== "update_yes"){
    $_POST['status'] = 'yes';
    $_SESSION['post']  = $_POST;
    ?>
    Goto Print Page ... 
    <META HTTP-EQUIV="Refresh" CONTENT="0.2 ;URL=detail01_set_some.php">    
    <?
    exit();
}
if( $_POST['btn1']== "update_no"){
    $_POST['status'] = 'no';
    $_SESSION['post']  = $_POST;
    ?>
    Goto Print Page ... 
    <META HTTP-EQUIV="Refresh" CONTENT="0.2 ;URL=detail01_set_some.php">    
    <?
    exit();
}



$stm_yes = $pdo->prepare("Update nodes set status='yes' WHERE node_id = :node_id ");
$stm_no = $pdo->prepare("Update nodes set status='no' WHERE node_id = :node_id ");
foreach($_POST['chk'] as $nid => $status){
    if($status == "Yes"){
        $stm_yes->execute([':node_id'=> $nid]);    
    }else{ 
        $stm_no->execute([':node_id'=> $nid]);    
    }
}

?>
<META HTTP-EQUIV="Refresh" CONTENT="0.2 ;URL=detail01.php">