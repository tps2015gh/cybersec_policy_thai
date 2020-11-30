<style>
.row  {padding:6px;border:1px solid silver; background-color: lightgoldenrodyellow;

        margin-left:4px;margin-right: 4px;}
</style> 

<?php  

function ข้อที่($num){
    return "ข้อที่ $num ";
} 
function อ้างอิงจาก($url){
    return  "อ้างอิงจาก <a href='$url'>$url</a>"; 
}
$NL = "\n<br>";

function NL($num){
    $s = "";
    foreach(range(1,$num) as $n ){
        $s .= "\n<br>";
    }
    return $s ;
}

function left($str, $length) {
    return substr($str, 0, $length);
}

function right($str, $length) {
    return substr($str, -$length);
}


// $code =  อ้างอิงจาก("https://www.bot.or.th/Thai/FinancialInstitutions/PruReg_HB/RiskMgt_Manual/download/%E0%B9%81%E0%B8%99%E0%B8%A7%E0%B8%9B%E0%B8%8F%E0%B8%B4%E0%B8%9A%E0%B8%B1%E0%B8%95%E0%B8%B4%20IT%20Best%20Practices%20-%20Phase%20II.pdf");

$code = "" ;
$code .= NL(2);

include("library1.php");
$topics = load_ar_topics(); 
$ar_status = load_ar_status();

// print_r($topics);

foreach( $topics as $int_topic => $ar_subtopic ){ 
    // echo "<H1> $int_topic , $int_subtopic</h1>";
    //$code .=  NL(3) . Cyber_Security_Main3Topic( $int_topic,0);
    foreach( $ar_subtopic as $int_subtopic){ 
        // echo "<H1> $int_topic , $int_subtopic</h1>";
        $status =  @$ar_status[$int_topic][$int_subtopic];
        $code .=       Cyber_Security_Main3Topic($int_topic, $int_subtopic,$status)
                    ;
    }    
}

// $code .=  NL(3) . Cyber_Security_Main3Topic("02","00");
// foreach(range(1,6) as $n){ 
//     $code .=  NL(2)   .  Cyber_Security_Main3Topic("02","0$n");
// }

echo $code ;

?>