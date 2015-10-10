<?php

	scanner("./theme");
	function scanner($dir){
		$files = scandir($dir);
		foreach($files as $file){
			$loc = $dir ."/".$file;
			if($file != "." && $file != ".."){
				if(is_file($loc)){
					if(strpos($loc,"._")){
						echo $loc ."\n";
						unlink($loc);
					}
				} else if(is_dir($loc)){
					scanner($loc);
				}
			}
		}
	}
?>