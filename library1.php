
<?php 

function load_ar_topics(){
    return [
            0 => [0],
            1=> [0,1,2,3,4]
    ,2=> [0,1,2,3,4,5,6,7,8]
    ,3=> [0,1,2,3,4,5,6,7,8,9,10,11]];    
}
function load_ar_status(){
    return  [   0=> ['ok'],
                1=> ["ok","ok","ok","ok","ok"]
                ,2=> ["ok","ok","ok","ok","ok","ok","ok","ok","ok"]
                , 3 => ["ok","ok","ok","ok"]
            ];
}



function  Cyber_Security_Main3Topic($int_topic,$int_subtopic,$status ){
    $num00      = right("00" . $int_topic ,2 );
    $subnum00   = right("00" . $int_subtopic ,2 );
    // echo "<h1> in sub $num00, $subnum00 </h1>";
    $fname = "DATA\\Main3Topic\\$num00" . '_' . "$subnum00.txt"   ;
    if(!file_exists($fname)){
        $str = "<h1> topic $int_topic.$int_subtopic Still not exist </h1>";
        return  $str ;
    }
    $str  = file_get_contents($fname);
    $left5 = substr($str,0,5);
    $left3 = substr($str,0,3);
    //echo "<h1>".  $left . "</h1>";
    // $str = "<h1>$status</h1>" . $str ;
    if( $status  == "edit" || $status == 'ok' ){
        if($status== "edit"){ 
            $data  = $str ; 
            $str = "<font color='red'> $data </font>";
        }else{
            $data  = $str ;
            $str = "<font color='blue'> $data </font>";
        }
    }else{
        $data = $str ;
        $str = "<font color='magenta'> $data </font>";
        // 
    }
    if($subnum00 == "00" ){
        if($num00 == "00" ){
            $str = "<h3>$str</h3> ";
        }else{  
            $str = "<h3>" . ((int)$num00) . "$str</h3> ";
        }
    }else{ 
        $str = (int)$num00 . "." . (int)$subnum00 . " " . $str;
    }

    $str = "<div  class='row' >$str</div>";
    return $str; 
}
