<script src="js/encoder.js" type="text/javascript"></script>
<script>
</script>
<?php

if($_GET == null){

    $media = "rec";
    }
 else {
$media = $_GET["media"];
}

switch($media) {
    case 'rec':
    $resultlist = null;
    $freespace = null;
$i=0;
$dir = '/var/www/encoder/recording/';
exec('ls -sht /var/www/encoder/recording/' , $resultlist);
exec('df -h | grep /dev/sda2 | cut -c 28-35', $freespace);

foreach ($resultlist as $fileName)
{
  if (strtolower(substr($fileName, -3)) != '.md') {
      if(strtolower(substr($fileName, 0,5)) == 'total') {
               echo "<li id=\"video-$i\" class=\"rows\">" . ucfirst($fileName) . " Free:." . $freespace[0] ."</li>";
          } else {
              $fileSize = preg_split('/[\s,]+/', $fileName, -1,PREG_SPLIT_NO_EMPTY );

     echo "<li id=\"video-$i\" class=\"rows fade in\"><span class=\"glyphicon glyphicon-film\" style=\"display: inline-block;margin-right:4px;\"></span><span class=\"text-right\">$fileSize[0]</span> <a href=# class=\"fzilectrl\">$fileSize[1]</a> <a id=\"del1\" href=\"#\" name=\"$fileSize[1]\" class=\"filectrl del\"><span class=\"glyphicon glyphicon-trash\"></span></a> <a href=\"download.php?media=$fileSize[1]\" class=\"filectrl\"><span class=\"glyphicon glyphicon-download\"></span></a> <a href=\"#\" name=\"$fileSize[1]\" class=\"filectrl view\"><span class=\"glyphicon glyphicon-eye-open\"></span></a></li>";
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
case 'del':
$filetodel = $_GET["name"];
unlink("/var/www/encoder/recording/$filetodel");
echo "deleted";
return false;
break;
}

?>

    <div class="modal bs-delfile-modal-sm" tabindex="-1" role="dialog" aria-labelledby="delmediafile" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="width:300px;">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <!--    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> -->
                    <span class="text-alert">Eliminare il file:</span>
                    <h5><strong><span id="filedel"></span></strong></h5>
                    <div class="btn-group btn-group-sm">
                        <button id="okdel" class="btn btn-danger" width="50px" type="button">Si</button>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-success" width="50px" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>