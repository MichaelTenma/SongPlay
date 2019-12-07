<?php header('Content-Type: text/html; charset=gbk');
	include('songListPathSET.php');
	$file=scandir($songsUrl);//取文件夹内文件名称
	outListToFile($file,$songsListUrl);
	function get_extension($file){
		//取文件名后缀
		return pathinfo($file, PATHINFO_EXTENSION);
	}
	
	function outListToFile($file,$songsListUrl){
		$a=1;
		$myfile = fopen($songsListUrl, "w") or die("Unable to open file!");
		for($i = 0;$i < count($file);$i++){
			//判断后缀，过滤出mp3文件
 			 if(get_extension($file[$i]) == "mp3"){
     		 	echo  $a . "." . $file[$i] . "<br>";
 	 			// 输出songList
     	 		$txt .= $file[$i] . "\r\n";
   	   			$a++;
 	 		}
		}
		fwrite($myfile, $txt);
		fclose($myfile);
		// iconv("GB2312-8", "UTF-8", "$songsListUrl"); 
		//解决txt文件无法保存为utf-8格式的问题
	}
?>