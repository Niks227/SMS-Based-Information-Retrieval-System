<?php

function read_mail(){
	
	echo "Entering read mails function";
	
	
	/* connect to gmail */
	$hostname = '{imap.gmail.com:993/imap/ssl}inbox';
	$username = 'jiitstudymateral@gmail.com';
	$password = 'jiitstudymaterial';

	/* try to connect */
	$inbox = imap_open($hostname,$username,$password) or die('cannot connect to gmail: ' . imap_last_error());
	/* grab emails */
	$emails = imap_search($inbox,'unseen');
	//$emails contain integer value acc to emails



	/* if emails are returned, cycle through each...	 */	
	if($emails) {
	
	
		/* put the newest emails on top */
		rsort($emails);
	
	
		/* for every email... */
		foreach($emails as $email_number) {
			$header = imap_header($inbox, $email_number);
	
				//Extarcting id from msgFROM

				$message['fromaddress'] =   $header->fromaddress;	
				$extractingID1 = explode( '<', $message['fromaddress'] ) ;
				$extractingID2 = explode( '>', $extractingID1[1] ) ;
				$from = $extractingID2[0];
			 
		
				//Extarcting body of the msg
				$bodyText = imap_fetchbody($inbox,$email_number,1);
				if(!strlen($bodyText)>0){
				$bodyText = imap_fetchbody($inbox,$email_number,1);
			}
			
			//Displaying content
	//		echo "<br> From - ".$from;
	//		echo "<br>BOdy of email starts here--- ";
	//		var_dump($bodyText);
	//		echo "<br>Next msg will start from her________________________________---------------------________________________";
			
			
			//Sql querry for inserting in data base
			$query_new_mails ="INSERT INTO new_mails 
							VALUES ($email_number, '$from','$bodyText')";
			$result = mysql_query($query_new_mails);
			
			$query_all_mails ="INSERT INTO all_mails 
							VALUES ($email_number, '$from','$bodyText')";
			$result = mysql_query($query_all_mails);
			
			
			//Proceeding to decoding of message
			decode_mail($from,$bodyText);
			
							
			
			
	
	
	
	
	
			}
	
	
	}
}
?>