<?php
	class CheckNextSong{
		public function writeFile($txtUrl,$txt){
			$newLine = "\r\n";
			$myfile = fopen($txtUrl, "w") or die("Unable to open file!");
			$txt .= $newLine;
			fwrite($myfile,$txt);
			fclose($myfile);
		}
	}

?>