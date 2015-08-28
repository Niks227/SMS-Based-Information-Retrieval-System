<?php
//Establishing connection
include 'sql_connect.php';
include 'read_mails.php';
include 'decode_mail.php';
include 'reply_to_querry.php';
include 'reply_to_querry2.php';
include 'set_cloud_struct.php';
include 'set_cloud_struct2.php';



//DELETing previous table
$query_deleting_table="DELETE FROM new_mails WHERE 0=0";
$result = mysql_query($query_deleting_table);

ini_set('max_execution_time', 0); //to increase the execution time


$t1=time();//mark time in
$tt=$t1+(280*1);//total time = t1 + n seconds

//Reading mails in loop
do{
    if(isset($t2)) unset($t2);//clean it at every loop cicle
    $t2=time();//mark time
	read_mail();
    sleep(rand(2,5));//Give Google server a breack
 

}while($tt>$t2);

?>
