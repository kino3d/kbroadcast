<?php

/*

Refer to gstream-pipe.txt to more capture devices 

bmdcapture -m 10 -V 3 -A 2 -F nut -f pipe:1 | avconv -re -i - -c:v libx264 -profile:v baseline -preset medium -level 30 -aspect 16:9 -s 1280x720 -vb 3500K -r 25 -g 48 -crf 10 -keyint_min 48 -sc_threshold 0 -c:a libvo_aacenc -ab 48k -ar 48000 -ac 2 -tune zerolatency -f flv "rtmp://localhost:1935/myapp/stream"

*/
$hostname = gethostbyaddr($_SERVER['SERVER_ADDR']);
echo $hostname;


 if($_GET == null){
 //  echo "No GET variables";
    $encoder = "pid";
    }
 else {
 // print_r($_GET); 

# Video Preview Start - Decklink Minirecorder parameters 

$encoder = $_GET["encoder"];
// $mode = $_GET["mode"];
// $vmode = $_GET["vmode"];
// $amode = $_GET["amode"];
// $pid = $_GET["pid"];
 }

# Video Broadcast Parameters

// $streamapp = $_GET["app"];
// $streamurl =$_GET["url"];
// $streamname = $_GET["name"];

switch($encoder) {
	case "avstart":
	# Debug Vars
		$pidArr = null;
		$mode = 10;
		$vmode = 3 ;
		$amode = 0;
		$cmd = "bmdcapture -m ". $mode ." -V " . $vmode . " -A ". $amode ." -F nut -f pipe:1 | avconv -re -i - -c:v libx264 -profile:v baseline -preset medium -level 30 -aspect 16:9 -s 1280x720 -b:v 2500 -r 25 -g 48 -keyint_min 48 -sc_threshold 0 -c:a libvo_aacenc -ab 32k -ar 48000 -ac 2 -tune zerolatency -f flv rtmp://" . $hostname . ":1935/myapp/stream >/dev/null 2>/dev/null & echo $!";

		exec($cmd,$pidArr);

		$pid = $pidArr[0];
		echo $pid;
		break;
	case "pid":
		$pid = null;
        $result = shell_exec(sprintf("ps -C bmdcapture | grep bmdcapture", $pid));
    //    print_r($result);
        $pid = strstr($result," ?",true);    
		if ($pid == ""){echo "stopped";}
		else {			
		echo "runned";
		};
		break;
	case "start":
		echo "starting streaming";
		break;
	case "stop":
	//	$pid = null;
		
// print_r ($pidArr);
 //       $result = shell_exec(sprintf("ps ax |grep bmdcapture", $pid));
  //      $pid = strstr($result," ",true) ;
//		echo $pid;

}

?>