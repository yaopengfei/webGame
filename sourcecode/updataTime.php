<?php

$q=$_GET["q"];
$clientTime= (float) $q;      
 $s = new SaeStorage();
 $serverLongestTime= $s->read('data','timedata.txt');
  $serverTime=( float )$serverLongestTime;

if($serverTime< $clientTime){
  
    $s->write( 'data' , 'timedata.txt' ,$clientTime);


}


?>