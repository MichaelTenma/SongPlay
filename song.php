<?php
	class Song{
		private $songListUrl = "";
		private $songListArray = null;
		function __construct($songListUrl){
			$this->readSongList($songListUrl);
			$this->songListUrl = $songListUrl;
		}
		
		public function findNextSongName($songName){
			$songListArray = $this->getSongListArray();
//			print_r($songListArray);
//			echo "songName:$songName<br>";
			$max_value = count($songListArray);
			$i = 0;
			while(true){
				if($i < $max_value){
//					echo "songName:$songName<br>";
//					echo "songListArray:$songListArray[$i]<br><br>";
					if($songName == $songListArray[$i]){
						if($i != $max_value - 1){
							$result = $songListArray[$i+1];	
							break;
						}else{
							$result = $songListArray[0];
							break;
						}
					}else{
						if($i == $max_value - 1){
							$result = $songListArray[0];
							break;	
						}
					}
					$i++;
				}else{
					break;
				}
			}
//			echo "songListArray:$songListArray[$i]<br>";
//			echo "result:$result<br>";
			return $result;
		}
		
		public function findLastSongName($songName) {
			$songListArray = $this->getSongListArray();
//			print_r($songListArray);
//			echo "songName:$songName<br>";
			$max_value = count($songListArray);
			$i = 0;
			while(true){
				if($i < $max_value){
//					echo "songName:$songName<br>";
//					echo "songListArray:$songListArray[$i]<br><br>";
					if($songName == $songListArray[$i]){
						if($i == 0){
							$result = $songListArray[$max_value-1];	
							break;
						}else{
							$result = $songListArray[$i - 1];
							break;
						}
					}else{
						if($i == $max_value - 1){
							$result = $songListArray[0];
							break;	
						}
					}
					$i++;
				}else{
					break;
				}
			}
//			echo "songListArray:$songListArray[$i]<br>";
//			echo "result:$result<br>";
			return $result;
		}

		public function findSongNameNo($songName)
		{
			
			$songListArray = $this->getSongListArray();
			$result = "";
			$result = -1;
			$max_value = count($songListArray);
//			echo "max_value:$max_value<br>";
			
			for($i = 0;$i < $max_value;$i++){
				if($songName != $songListArray[$i]){
//					echo "false-i:$i<br>";
//					echo "songName:$songName<br>";
//					echo "songListArray[$i]:$songListArray[$i]<br>";
					$result = 0;//如果找不到歌曲就返回0,0为第一曲
				}else{
//					echo "true-i:$i<br>";
					$result = $i;
					break;
				}
			}
			
			if($result == 0){
				$result = -2;
				//-2代表0，如果直接传输0会导致判断错误，一直在当前状态循环
			}
			return $result;
		}
		
		public function findSongName($songNameNo){
			if($songNameNo == -2){
				$songNameNo = 0;
			}
			$songListArray = $this->getSongListArray();
//			echo "songListArray[$songNameNo]:$songListArray[$songNameNo]<br>";
			return $songListArray[$songNameNo];
		}

		private function readSongList($songListUrl)
		{

			$songListArray = $this->getFile($songListUrl);
			
			$this->songListArray = $songListArray;
		}
		
		public function getFile($songListUrl){
			$file = fopen($songListUrl, "r") or exit("Unable to open file!");
			$i=0;
			while(!feof($file)){
				$temp = fgets($file);
				$temp = str_replace("\r\n","",$temp);
				if(empty($temp) != true){
					$songListArray[$i] = $temp;	
//					echo ($i) . "." . $songListArray[$i]. "<br />";
					$i++;
				}
			}
			fclose($file);
			
			return $songListArray;
		}
		

		public function getSongListArray()
		{
			return $this->songListArray;
		}

	}
?>