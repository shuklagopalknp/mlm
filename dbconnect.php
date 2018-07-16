<?php
/*$host="localhost";
$userid="gardenia_dwi";
$pwd="TkLlX2y+wD2y";
$database="gardenia_gps";*/
$host="localhost";
 $userid="root";
 $pwd="";
 $database="mlm_portal";
@$link=mysql_connect($host,$userid,$pwd);
if(!$link){
die("Error in connection".mysql_error());
}
$db=mysql_select_db($database);
if(!$db){
die("Error in database".mysql_error());
}

?>