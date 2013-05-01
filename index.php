<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Encoder-alpha-0.1</title>
    <meta name="viewport" content="width=600; initial-scale=0.5; maximum-scale=1.0; user-scalable=0;">
    <meta name="description" content="">
    <meta name="author" content="kino" >
	
	      <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.2.custom.js"></script>
	<script src="js/encoder.js"></script>
	<link href="css/kino-theme/jquery-ui-1.10.2.custom.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" type="text/css" href="css/flat/jquery.mobile.flatui.css" /> -->
	<script type='text/javascript' src='https://eventilive.top-ix.org/player/jw/jwplayer.js'></script>

  </head>
<?php 
# Imposta ingresso e risoluzione della scheda

#		$get_res = "v4l2-ctl -d /dev/" . $video . "-V"; #  get video resolution		
		
#		$get_input = "v4l2-ctl -d /dev/" . $video . "-I"; #  get video input
		
#		$set_input = "v4l2-ctl -d /dev/" . $video . "-i" . $input; # set video input
		
#		$set_res = "v4l2-ctl -d /dev/" . $video ."-v width=". $res_x . ",height=". $res_y; # set video input resolution

#		$str_broadcast= "gst-launch-0.10 v4l2src ! 'video/x-raw-yuv,width=1280,height=720' ! ffmpegcolorspace ! queue ! x264enc threads=0 bitrate=1336 tune=zerolatency speed-preset=fast ! queue ! flvmux name=mux  pulsesrc ! queue max-size-time=0 max-size-buffers=0 ! progressreport name=progress update-freq=1 ! audioconvert ! lame ! audio/mpeg ! queue ! mux. mux. ! queue ! rtmpsink location='rtmp://localhost/myapp/mystream' ";
?>
  <body>
     <div class="container">
    <div  id="tabs">
    <ul>
            <li><a href="#tabs-1">Encoder</a>
            <li><a href="#tabs-2">Player</a>
            <li><a href="#tabs-3">Registrazioni</a>
            <li><a href="#tabs-4">Aiuto</a>
 	</ul>
<div id="tabs-1">
<div class="src_stats ui-corner-all" id="str_status">&nbsp;</div>
<div id='mediaspace' name='mediaspace'></div>
<hr>
<div id="toolbar" class="ui-widget-header" style="width:410px;">
<label>Broadcast</label><br />
<label>Qualita</label>
<form >
<div id="radio">
<input type="radio" id="check1" name="radio" checked="checked" /><label for="check1">Alta</label>
<input type="radio" id="check2" name="radio" /><label for="check2">Media</label>
<input type="radio" id="check3" name="radio" /><label for="check3">Bassa</label>
</div>
<button id="stream" style="float:right"></button>
</form>
<br />
<button id="record"></button>
<button id="timer"></button>
</div>
<script type='text/javascript'>
    jwplayer('mediaspace').setup({
    	modes: [
    	{type:"flash",src:"https://eventilive.top-ix.org/player/jw/player.swf"},
	{ type:"html5",
	 config: {file:" http://192.168.1.7/mobile/stream.m3u8",
	 provider:"video"}} 
					],
        'file': 'stream',
      /*  'image':'../plug-small1-70.png', */ 
      rtmp:{subscribe:false,
      bufferlength: 0},
        'frontcolor': 'ffffff',
        'lightcolor': 'cc9900',
        'screencolor': 'ffffff',
        'backcolor':'434343',
         'provider':'rtmp',
        'streamer':'rtmp://192.168.1.7/myapp/',
        'autostart': 'true',
        'stretching': 'exactfit',
        'controlbar': 'over',
        'backgroundcolor': '000000',
        'width': '416',
        'height': '240',
        'icons':'none',
        'controls':false,
         "plugins": {
     	// "gapro-2": {}
    }
        });

   </script>
</div>

<!-- Player embed -->
<div id="tabs-2">
Player embed

</div>
<div id="tabs-3">
<!-- <button id="aggiorna"></button> -->
<div id="listfile" class="filem ui-corner-all">
<li id="files" class="rows"></li>
</div>

</div>
<div id="tabs-4">
Aiuto

</div>
 </div> <!-- /tabs -->
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
  

  </body>
</html>
