<?php

if($_GET == null){
 //  echo "No GET variables";
    $media = "rec";
    }
 else {
$media = $_GET["media"];
}
 
switch($media) {
	case 'rec':
$resultlist = null;
$i=0;
$dir = '/var/www/encoder/recording/';
exec('ls -sht /var/www/encoder/recording/' ,$resultlist );

foreach ($resultlist as $fileName)
{
  if (strtolower(substr($fileName, -3)) != '.md') {
  	if(strtolower(substr($fileName, 0,5)) == 'total') {
  		     echo "<li id=\"video-$i\" class=\"rows\">" . ucfirst($fileName) . "</li>";
  		} else {
     echo "<li id=\"video-$i\" class=\"rows\"><span class=\"glyphicon glyphicon-film\" style=\"display: inline-block;margin-right:4px;\"></span><a href=# class=\"fzilectrl\">$fileName</a> <a href=# class=\"filectrl\"><span class=\"glyphicon glyphicon-trash\"></span></a> <a href=# class=\"filectrl\"><span class=\"glyphicon glyphicon-download\"></span></a><a href=# class=\"filectrl\"><span class=\"glyphicon glyphicon-eye-open\"></span></a></li>";
    $i++;
   }
   }
};
break;
case 'store':
$resultlistmedia = null;
$i=0;
$dir = '/var/www/encoder/media/';
exec('ls -sht /var/www/encoder/media/' ,$resultlistmedia );

foreach ($resultlistmedia as $fileNamemedia)
{
  if (strtolower(substr($fileNamemedia, -3)) != '.md') {
  	if(strtolower(substr($fileNamemedia, 0,5)) == 'total') {
  		     echo "<li id=\"video-$i\" class=\"rows\">" . ucfirst($fileNamemedia) . "</li>";
  		} else {
     echo "<li id=\"video-$i\" class=\"rows\"><span class=\"glyphicon glyphicon-film\" style=\"display: inline-block;margin-right:4px;\"></span><a href=# class=\"fzilectrl\">$fileNamemedia</a> <a href=# class=\"filectrl\"><span class=\"glyphicon glyphicon-trash\"></span></a></li>";
    $i++;
   }
   }
};
break;
}

?>