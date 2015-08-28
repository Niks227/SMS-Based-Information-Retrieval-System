<?php 


function set_structure(){

$dir = "qwe/SM/";
$x=0;
$i =0;
$j=0;

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
	
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			$array_file_level1[$i][$j]=$file;
				
			$x++;
			
			if($x==2)
				$i=0;
			else
				$i++;
			
		}
		$i=0;
		for($k=0;$k<8;$k++){
					$j=0;
					$y=0;
					$dir = "qwe/SM/".$array_file_level1[$k][$j];
					
					if ($dh = opendir($dir)) {
						while (($file = readdir($dh)) !== false) {
								$y++;
								if($y==3)
									$j=1;
								else
									$j++;
								
								$array_file_level1[$i][$j]=$file;
								
								
						}
						$i++;
					 }
		}
		
		$file_structure="";
		for($q=0;$q<8;$q++){
			for($w=0;$array_file_level1[$q][$w]!=NULL;$w++){
				$file_structure=$file_structure. " ".$array_file_level1[$q][$w].", "; 
			
			}
					$file_structure=$file_structure."\n";
			
		
		}
		
		
    }
		
		
}
  return $file_structure;
}


  




?> 