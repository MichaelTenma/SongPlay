<?php header('Content-Type: text/html; charset=gbk');
	include('songListPathSET.php');
	$file=scandir($songsUrl);//ȡ�ļ������ļ�����
	outListToFile($file,$songsListUrl);
	function get_extension($file){
		//ȡ�ļ�����׺
		return pathinfo($file, PATHINFO_EXTENSION);
	}
	
	function outListToFile($file,$songsListUrl){
		$a=1;
		$myfile = fopen($songsListUrl, "w") or die("Unable to open file!");
		for($i = 0;$i < count($file);$i++){
			//�жϺ�׺�����˳�mp3�ļ�
 			 if(get_extension($file[$i]) == "mp3"){
     		 	echo  $a . "." . $file[$i] . "<br>";
 	 			// ���songList
     	 		$txt .= $file[$i] . "\r\n";
   	   			$a++;
 	 		}
		}
		fwrite($myfile, $txt);
		fclose($myfile);
		// iconv("GB2312-8", "UTF-8", "$songsListUrl"); 
		//���txt�ļ��޷�����Ϊutf-8��ʽ������
	}
?>