<?php

function num_to_str($str){
     $rev = strrev($str);
     $arr = [];
     for($i = 0; $i < strlen($str); $i++){
        if($i % 3 === 0 && $i !== 0){
            array_push($arr,'.');
            
        }
        array_push($arr,$rev[$i]);
     }
     $atr = implode(" ",$arr);
     $str = strrev($atr);
     return $str;
}
