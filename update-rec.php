<?php
$resultlist = null;
$i=0;
$dir = '/var/www/encoder/recording/';
exec('ls -sht /var/www/encoder/recording/' ,$resultlist );

foreach ($resultlist as $fileName)
{
  if (strtolower(substr($fileName, -3)) != '.md') {
  	if(strtolower(substr($fileName, 0,5)) == 'total') {
  		     echo "<li id=\"video-$i\" class=\"rows\"><a href=# class=\"fzilectrl\">$fileName</a></li>";
  		} else {
     echo "<li id=\"video-$i\" class=\"rows\"><span class=\"ui-icon ui-icon-video\" style=\"display: inline-block;vertical-align: text-bottom;margin-right:4px;font-size:10px;\"></span><a href=# class=\"fzilectrl\">$fileName</a> <a href=# class=\"filectrl\"><span class=\"ui-icon ui-icon-trash\"></span></a></li>";
    $i++;
   }
   }
};

?>