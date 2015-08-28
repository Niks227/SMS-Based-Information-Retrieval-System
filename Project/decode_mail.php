<?php
	function decode_mail($decfrom,$decmsg){
		
		$file_structure = set_structure();
		$decmsg_short = substr($decmsg, 0, -2);
		$sentence = $decmsg_short;

		

		$i=0;
		$j=0;
		var_dump($decfrom);
		var_dump($sentence);
		echo "$sentence";
		
			
		if (strcasecmp($decmsg_short,"Send me instructions")==0){
		
			 $headers="From:JIIT@gmail.com";
			$message = "Instructions - Mention your subject name , semester and tutorial number in the mail to get you tutorial.
Ex- Send me Sem 4 Mpc Tut 2
Note- File will be sent only if we have it on our cloud.

We have following tuts on our cloud..". $file_structure . "
	

Thank you for using our services.. ;) ;)";

reply_to_querry2( $decfrom , $message,$headers);
			
		
		}
		else{
				echo "entering else loop";
				$sentence = str_replace("-"," ",$sentence);
				$array_words[] = array_slice(explode(' ', $sentence),0, 1000);
				$length= count($array_words[0]);

				for ($x=0; $x<$length; $x++)	
				{
					//	echo $array_words[0][$x]." <br>";
						if (strcasecmp($array_words[0][$x],"Tutorial")==0||strcasecmp($array_words[0][$x],"Tut")==0||strcasecmp($array_words[0][$x],"Tute")==0){
								echo "---------------------------------------<BR>";
								$tut_number=$array_words[0][$x+1];
		
						}
					 	else if (strcasecmp($array_words[0][$x],"semester")==0||strcasecmp($array_words[0][$x],"sem")==0){
								echo "---------------------------------------<BR>";
								$sem_number1=$array_words[0][$x-1];
								$sem_number2=$array_words[0][$x+1];
			
								$len1 = strlen($sem_number1);
								$len2 = strlen($sem_number2);
			
								if($len1!=1){
										//	echo "previos one length is not equal to 1";
										$shortsem_number1=substr($sem_number1, 0, -2);
				
								}
								else{
										$shortsem_number1=$sem_number1;
			
								}
								if($len2!=1){
			
										//	echo "next one length is not equal to 1";
										$shortsem_number2=substr($sem_number2, 0, -2);
				
								}
								else{
										$shortsem_number2=$sem_number2;
			
								}
								if ( is_numeric($shortsem_number1)){
				
										//	echo "shorted previous one is  numeric";
										$final_sem_no = $shortsem_number1;
				
								}
								else {
										//	echo "shorted next one is  numeric";
										$final_sem_no = $shortsem_number2;
			
								}	
			
						}
		
				}
				echo $tut_number;
				echo $final_sem_no;
				$sem_pointer = $final_sem_no-1;
				$array_struct=set_structure2();
				
				for($a=1;$array_struct[$a]!=NULL;$a++){
					$selected_subject[$a]=$array_struct[$sem_pointer][$a];
				
				}
				var_dump($selected_subject);
				for ($x=0; $x<$length; $x++)	
				{	
					for ($b=1;$b<=$a;$b++){
						if (strcasecmp($array_words[0][$x],$selected_subject[$b])==0){
									$final_subject=$selected_subject[$b];
									break;
						}
					}
				
				}
				
				echo $final_subject;
				
				$headers="From:JIIT@gmail.com";	
				$message = "Following informatiion decoded - \n Semester- ".$final_sem_no."\n Subject- ".$final_subject."\n Tutorial - ". $tut_number."\n Please find the following file in attachment";		
				reply_to_querry( $decfrom , $message,$headers,$final_sem_no,$final_subject,$tut_number);
		}
	
			
	}



?>