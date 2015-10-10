<?php
	//Searches for file that matches the search string
	//then exectes the function when found;
	scanner("./theme", "._", "scanner");

	function scanner($dir, $search_str, $function){
		if(file_exists($dir)){ //sanity check
			$files = scandir($dir); //scans for files
			foreach($files as $file){ //iterate the files/ folders
				$loc = $dir . "/". $file;
				if($file != "." && $file != ".."){ //remove the current folder and the parent folder
					if(is_file($loc)){ //checks if it's a file.
						if(strpos($loc, $search_str)){
							echo $loc ."\n";
							$function($loc);
						}
					} else if(is_dir($loc)) scanner($loc);
				}
			}
		} else  echo "\"$dir\" doesn't exists \n";
	}
?>