<?php
		function  reply_to_querry($send_mail_to,$message,$headers1,$sem_no,$sub,$tut_no){
				$to = $send_mail_to; 
				$subject = 'Study Material';
				$msg = $message;
			
				$file = "qwe\SM\Sem".$sem_no."\\" . $sub . "\Tutorial_".$tut_no.".zip";
				if(!file_exists($file)){
					$headers=$headers1;
					$msg= "No FILE FOUND PLEASE CHECK THE Details ";
				}
				else{
					$filename = basename($file);
			
			 	$file_size = filesize($file);
				$content = chunk_split(base64_encode(file_get_contents($file))); 
				$uid = md5(uniqid(time()));
			$headers = "From: jiit\r\n"
      ."MIME-Version: 1.0\r\n"
      ."Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n"
      ."This is a multi-part message in MIME format.\r\n" 
      ."--".$uid."\r\n"
      ."Content-type:text/plain; charset=iso-8859-1\r\n"
      ."Content-Transfer-Encoding: 7bit\r\n\r\n"
      .$msg."\r\n\r\n"
      ."--".$uid."\r\n"
      ."Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"
      ."Content-Transfer-Encoding: base64\r\n"
      ."Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n"
      .$content."\r\n\r\n"
      ."--".$uid."--";
	 }
			
			if(mail($to, $subject, $msg, $headers))
				echo "Email sent";
			else
				echo "Email sending failed";
	
			sleep(6);
		}	

?>