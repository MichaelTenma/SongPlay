<?php 
	class LastTimeSong{
		private $songListUrl = null;
		private $songListArray = null;
		function __construct($songListUrl){
			$this->songListUrl = $songListUrl;
//			include 'song.php';
			$file = new Song($songListUrl);
			$this->songListArray = $file->getFile($songListUrl);
		}
		
		public function readList(){
			$songListArray = $this->songListArray;
			$max_value = count($songListArray);
			if($max_value <= 0){
				return false;
			}else{
//				print_r($songListArray);
//				echo "<br>";
				return $songListArray;
			}
		}
		
		public function writeFile($lastTimeSongUrl,$songName,$time){
			$newLine = "\r\n";
			$myfile = fopen($lastTimeSongUrl, "w") or die("Unable to open file!");
			$txtArray = array($songName,$time);
			for($i = 0;$i < 2;$i++){
				$txt .= $txtArray[$i] . $newLine;	
			}
			fwrite($myfile,$txt);
			fclose($myfile);
		}
	}
?>