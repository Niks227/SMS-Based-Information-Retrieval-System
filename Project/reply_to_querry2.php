<?php
		function  reply_to_querry2($send_mail_to,$message,$headers1){
			$to = $send_mail_to; 
				
			$subject = 'Study Material';
			$msg = $message;
			
				
				
	 
			$headers=$headers1;
			if(mail($to, $subject, $msg, $headers))
				echo "Email sent";
			else
				echo "Email sending failed";
	
	
		}	

?>