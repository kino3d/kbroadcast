<?php header('Access-Control-Allow-Origin: *'); 

#Network stuff
$hostname = gethostbyaddr($_SERVER['SERVER_ADDR']);
// echo $hostname;
/*
if(sizeof($ffmpeg_output) == null ) {
        
        return null;
        }
        $json = json_decode($ffmpeg_output,true);
        //Uncomment below if you want to debug the json output
        //echo "<pre>";
        //echo json_encode($json, JSON_PRETTY_PRINT);
        //echo "</pre>";
        $video_codec=$json['streams'][0]['codec_name'];
        $width=$json['streams'][0]['width'];  
        $height=$json['streams'][0]['height'];
        $r_frame_rate=$json['streams'][0]['r_frame_rate'];
        $fr=explode("/",$r_frame_rate);
        $r_frame_rate=round(intval($fr[0])/intval($fr[1]),3);
        $video_bitrate=round(intval($json['streams'][0]['bit_rate'])/1000,0);
        $video_profile =$json['streams'][0]['profile'];
        $video_level =$json['streams'][0]['level'];
        $duration=$json['streams'][0]['duration'];
        $audio_codec=$json['streams'][1]['codec_name']; 
        $sample_rate=$json['streams'][1]['sample_rate'];
        $channels=$json['streams'][1]['channels'];
        $bit_rate=round($json['streams'][1]['bit_rate']/1000,0);
        $resultset = array( 'video_codec' => $video_codec,
                                'width' => $width,  
                                'height' => $height,
                                'r_frame_rate'  => $r_frame_rate,  
                                'video_bitrate'  => $video_bitrate,
                                'profile' => $video_profile,
                                'level' => $video_level, 
                                'duration'  => $duration,
                                'audio_codec'  => $audio_codec,
                                'sample_rate'  => $sample_rate,
                                'channels'  => $channels,
                                'bit_rate'  => $bit_rate
                                );
        return  $resultset;
                     //   }

*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Encoder-alpha-0.1</title>
	<meta name="viewport" content="width=100%; maximum-scale=2.0; user-scalable=1;">
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
	<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
	<link rel="shortcut icon" href="ico/favicon.png" />
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.2.custom.js"></script>
	<script src="js/encoder.js"></script>
	<link href="css/kino-theme/jquery-ui-1.10.2.custom.css" rel="stylesheet" />
	<link href="css/encoder.css" rel="stylesheet" />
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
	<div class="container" style="width:454px;">
	<div  id="tabs">
	<ul>
			<li><a href="#tabs-1">Encoder</a>
			<li><a href="#tabs-2">Player</a>
			<li><a href="#tabs-3">Registrazioni</a>
			<li><a href="#tabs-4">Sistema</a>
			<li><a href="#tabs-5">?</a>
	</ul>
<div id="tabs-1">

<div class="ui-widget-content ui-corner-all"  style="border-color:#efefef;width:414px;padding:0px!important;">

		<div style="padding:2px;" >
			<div style="display:inline-block;margin:auto;width:100%">
				<form id="source">				
				<small>
					<div id="radio1"  style="margin:3px 3px;padding:3px;float:left;">					
					<input type="radio" value="1" name="radio1" id="checks1"><label for="checks1">HDMI</label>
					&nbsp;
					<input type="radio" value="0" name="radio1" id="checks2" ><label for="checks2">SDI</label>
					</div>				
					<select id="select" style="margin:6px 3px;padding:3px;border:1px solid #dfdfdf;float:left;" >
				<!--	<option value="0">NTSC 720x486 29.97FPS</option>
					<option value="1">NTSC 23.98 720x486 23.976FPS</option> -->
					<option value="2">PAL 720x576 25FPS</option>
				<!--	<option value="3">NTSC Progressive 720x486 59.9401FPS</option> -->
					<option value="4">PAL Progressive 720x576 50FPS</option>
					<option value="5">HD 1080p 23.98 1920x1080 23.976FPS</option>
					<option value="6">HD 1080p 24 1920x1080 24FPS</option>
					<option value="7" selected="selected">HD 1080p 25 1920x1080 25FPS</option>
					<option value="8">HD 1080p 29.97 1920x1080 29.97FPS</option>
					<option value="9">HD 1080p 30 1920x1080 30FPS</option>
					<option value="10">HD 1080i 50 1920x1080 25FPS</option>
					<option value="11">HD 1080i 59.94 1920x1080 29.97FPS</option>
					<option value="12">HD 1080i 60 1920x1080 30FPS</option>
					<option value="13">HD 720p 50 1280x720 50FPS</option>
					<option value="14">HD 720p 59.94 1280x720 59.9401FPS</option>
					<option value="15">HD 720p 60 1280x720 60FPS</option>
					</select>
					<div style="margin:2px;padding:2px;float:right" >
					<input type="submit" value="start" id="str_status" class="src_stats">
					</div>
					</small>
					
					</form>
				</div>
		</div>
		</div>

<div class="pad-small"></div>
<div id='mediaspace' name='mediaspace'></div>
<div class="pad-small"></div>
<label class=""><strong>Broadcast</strong></label><br>
<div id="toolbar" class="ui-widget-header ui-corner-all" style="width:409px;">
<form >
<div id="radio" style="float:left;">
<div style="width:40px;padding:5px;margin:auto;display:inline-table">Video:</div> 
<input type="radio" id="check1" name="radio" checked="checked" /><label for="check1">Alta</label>
<input type="radio" id="check2" name="radio" /><label for="check2">Media</label>
<input type="radio" id="check3" name="radio" /><label for="check3">Bassa</label>
</form>
<div class="pad-small"></div>
<form >
<div style="width:40px;padding:5px;margin:auto;display:inline-table">Audio:</div>
<input type="radio" id="check4" name="radio" checked="checked" /><label for="check4">Alta</label>
<input type="radio" id="check5" name="radio" /><label for="check5">Media</label>
<input type="radio" id="check6" name="radio" /><label for="check6">Bassa</label>
</div>
<button id="stream" style="float:right;height:58px;font-weight:bold;background-color:#28E02E;color:#fff"></button>
</form>
</div>
<div id="toolbar" class="ui-widget-header" style="width:410px;">
<button id="record"></button>
<button id="timer"></button>
</div>

<script type='text/javascript'>
	jwplayer('mediaspace').setup({
		modes: [
		{type:"flash",src:"https://eventilive.top-ix.org/player/jw/player.swf"},
	{ type:"html5",
	config: {file:" http://<?php echo $hostname;?>/mobile/stream.m3u8",
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
		'streamer':'rtmp://<?php echo $hostname;?>/myapp/',
		'autostart': 'true',
		'stretching': 'scale',
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

<div id="accordian" style="width:412px;">
<h3><a href="#"  style="font-weight:bold;vertical-align:top">Info Sistema</a></h3>
<div>
<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
</div>
<h3><a href="#" style="font-weight:bold;vertical-align:top">Rete</a></h3>
<div>
<label>DHCP</label>
<form>
<label>IP</label><input type="text" value="IP">
<label>Boadcast</label><input type="text" value="Boadcast">
<label>Netmask</label><input type="text" value="Netmask">
<label>DNS</label><input type="text" value="DNS">
</form>
<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
</div>
<h3><a href="#" style="font-weight:bold;vertical-align:top">CDN</a></h3>
<div>
<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
</div>
</div>
</div>
<div id="tabs-5">
Help

</div>
</div> <!-- /tabs -->
	</div> <!-- /container -->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
   
  

</body>
</html>
