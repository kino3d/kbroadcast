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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="kino" >
    <link rel="shortcut icon" href="ico/favicon.png">
    <title>Encoder alpha 0.1</title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/encoder.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
 <!--   <script type='text/javascript' src="player/jw/jwplayer.js"></script> -->
 	<script type='text/javascript' src='http://live.top-ix.org/player/jw/jwplayer.js'></script>
 	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/encoder.css" rel="stylesheet">
  </head>
  <body>
    <!-- Wrap all page content here -->
    <div id="wrap">
<div class="container">
<div class="tabbable navbar" role="navigation">
     		<ul id="tab" class="nav nav-tabs ">
     			<li class="active"><a href="#Tab1" data-toggle="tab" >Encoder</a></li>
     			<li><a href="#Tab2" data-toggle="tab">Player</a></li>
     			<li><a href="#Tab3" data-toggle="tab">Media</a></li>
     			<li><a href="#Tab4" data-toggle="tab">Sistema</a></li>
     			<small class="pull-right" style="border-bottom:1px solid #dfdfdf"><span id="connected" class="connected text-right text-danger">Offline</span></small>
    		</ul>
	<div class="tab-content">
			<div class="tab-pane panel-body active" id="Tab1">
      <!-- Begin page content -->
        	<div class="well well-sm">
				<form id="source" class="form-inline">
				<small>
					<div id="radio1" class="btn-group form-group" data-toggle="buttons">
					<label class="btn btn-primary btn-xs" >
					<input class="form-control input-xs" type="radio" value="1" name="radio1" id="checks1">HDMI</label>
					</div>
					<div id="radio1" class="btn-group form-group" data-toggle="buttons">
					<label class="btn btn-primary btn-xs">
					<input class="form-control input-xs" type="radio" value="0" name="radio1" id="checks2" >SDI</label>
						</div>
						<div class="form-group">
					<select id="select" class="form-control input-sm">
					<option value="2">PAL 720x576 25FPS</option>
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
					</div>
					<div class="form-group pull-right">
					<input type="submit" value="capture" id="av_status" class="btn btn-default btn-sm" class="av_status">
					</div>
					</small>
					</form>
					</div>
					<div class="clearfix"></div>
				
        	<div  id='mediaspace' class="mediaspace" name='mediaspace'></div>
        	
        <div class="clearfix"></div>
        <br>
 <!--
<script type='text/javascript'>
	jwplayer('mediaspace').setup({
		modes: [
		{type:"flash",src:"https://eventilive.top-ix.org/player/jw/player.swf"},
	{ type:"html5",
	config: {file:"http://<?php echo $hostname;?>/mobile/stream.m3u8",
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
 -->
 <script type='text/javascript'>
	jwplayer('mediaspace').setup({
		modes: [
		{type:"flash", src:"http://live.top-ix.org/player/jw/player.swf"},
		{ type:"html5", config: {file:"http://<?php echo $hostname;?>/mobile/stream.m3u8', provider:'video"}}
					],
		file: 'stream',
		'width': '500',
		'height': '282',
		aspectratio: '16:9',
	/*  'image':'../plug-small1-70.png', */
		frontcolor: 'ffffff',
		lightcolor: 'cc9900',
		screencolor: 'ffffff',
		backcolor:'434343',
		provider:'rtmp',
		streamer:"rtmp://<?php echo $hostname;?>/myapp",
		autostart: 'true',
		stretching: 'scale',
		controlbar: 'over',
		backgroundcolor: '000000',
		icons:'true',
		controls:'false',
	//	"plugins": {
		// "gapro-2": {}
//	}
		});
</script>
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Broadcast</strong></div>
					<div class="panel-body">
					<form role="form" >
					<div id="radio" class="btn-group pull-left" data-toggle="buttons" style="margin-bottom:3px">
					<label for="check1" class="btn btn-primary disabled btn-sm"><strong>Video:</strong></label>
					<label for="check1" class="btn btn-primary btn-sm">
					<input class="form-control input-sm" type="radio" id="check1" name="radio" checked="checked" />Alta</label>
					<label for="check2" class="btn btn-primary btn-sm">
					<input class="form-control input-sm" type="radio" id="check2" name="radio" />Media</label>
					<label for="check3"  class="btn btn-primary btn-sm">
					<input class="form-control input-sm" type="radio" id="check3" name="radio" />Bassa</label>
					</div>
					<span class="clearfix"></span>
					<div id="radio" class="btn-group pull-left" data-toggle="buttons">
					<label for="check1" class="btn btn-primary disabled btn-sm"><strong>Audio:</strong></label>
					<label for="check4" class="btn btn-primary btn-sm">
					<input class="form-control input-sm" type="radio" id="check4" name="radio" checked="checked" />Alta</label>
					<label for="check5" class="btn btn-primary btn-sm">
					<input class="form-control input-sm" type="radio" id="check5" name="radio" />Media</label>
					<label for="check6" class="btn btn-primary btn-sm">
					<input  class="form-control input-sm" type="radio" id="check6" name="radio" />Bassa</label>
					</div>
					<div class="btn-group pull-right">
					<button id="stream" class="btn btn-primary btn-sm btn-success">Start</button>
					</div>
					</form>
					<div class="clearfix"></div><br>
					<div id="radio" class="btn-group pull-left" data-toggle="buttons">
				
					<button class="btn btn-default btn-xs" id="record">Registra</button>
					<button class="btn btn-default btn-xs" id="timer">00:00:00</button>
					</div>			
					</div>
					</div>
      		</div>
  			<div class="tab-pane panel-body" id="Tab2">
      <!-- Begin page content -->
        	<p class="">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added within </p>
			</div>
			<div class="tab-pane panel-body" id="Tab3">
      <!-- Begin page content -->
      <!-- <button id="aggiorna"></button> -->
				<div class="panel panel-default">
				<div class="panel-heading">
				<strong>Registrazioni</strong>
				</div>
 					 <div class="panel-body">
 					 	<button type="button" id="refresh" class="btn navbar-btn btn-sm btn-success navbar-right">Aggiorna <span class="glyphicon glyphicon-refresh text-success"></span></button>
 					 	<div class="clearfix"></div>
							<div id="listfile" class="filem ">
								<ul class="list-unstyled">
									<li id="files" class="rows"></li>
								</ul>
							</div>
						</div>
				</div>
					<div class="panel panel-default">
				<div class="panel-heading"><strong>USB Storage</strong></div>
 					 <div class="panel-body">
							<div id="listfile" class="filem ui-corner-all">
								<ul class="class="list-unstyled"">
									<li id="files" class="rows"></li>
								</ul>
							</div>
						</div>
				</div>
      		</div>
     <div class="tab-pane panel-body" id="Tab4">
		<div class="panel-group" id="accordion">
 			 <div class="panel panel-default nonetwork" id="nonetwork">
   			 <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Rete</a><small class="pull-right">Connessione: <span id="connected" class="connected text-right text-danger"> Offline</span></small></h4>
		</div>
		 <div id="collapseTwo" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="form-group input-group input-group-sm col-md-12">
					<button type="checkbox" class="btn btn-primary btn-xs dhcp" id="dhcp">DHCP</button>
					<button type="checkbox" class="btn btn-primary btn-xs" id="manuale">Manuale</button>
				</div>
				<form id="p5p1" class="p5p1"  role="form" >
						<label for="p5p1"><strong id="eth0">Ethernet</strong></label>
							<div class="btn-group form-group input-group input-group-sm col-md-12" >
							<span class="input-group-addon">IP</span>
							<input type="text" id="0ip" class="form-control input-sm" value="IP">
					<!--		<span class="input-group-addon">Broadcast</span>
						<input type="text" id="0broadcast" class="form-control input-sm" value="Boadcast"> -->
						<span class="input-group-addon">Netmask</span>
						<input type="text" id="0netmask" class="form-control input-sm" value="Netmask">
							</div>
							<div class="btn-group form-group input-group input-group-sm col-md-10" >
							<span class="input-group-addon">Gateway</span>
							<input type="text" id="0gateway" class="form-control input-sm" value="Gateway">
							<span class="input-group-addon">DNS</span>
							<input type="text" id="0dns" class="form-control input-sm" value="DNS">
							</div>
							<button type="submit" class="btn btn-default btn-sm">Imposta</button>
				</form>
					<div class="clearfix small">&nbsp;</div>
					<label for="wlan01"><strong>WIFI info</strong></label>
					<form id="wlan01">
					<div class="btn-group form-group input-group input-group-sm col-md-12" >
						<span class="input-group-addon">IP</span>
						<input type="text" id="1ip" class="form-control input-sm" value="IP" disabled>
					<span class="input-group-addon">Broadcast</span>
						<input type="text" id="1broadcast" class="form-control input-sm" value="Boadcast" disabled>
					<span class="input-group-addon">Netmask</span>
						<input type="text" id="1netmask" class="form-control input-sm" value="Netmask" disabled>
						</div>
						<div class="btn-group form-group input-group input-group-sm col-md-4" >
					<span class="input-group-addon">DNS</span>
						<input type="text" id="1dns" class="form-control input-sm" value="DNS" disabled>
					</div>
					</form>
			</div>
 		</div>
    </div>
<div class="panel panel-default">
   			 <div class="panel-heading">
      			<h4 class="panel-title">
        		<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">CDN</a></h4>
			</div>
 		<div id="collapseThree" class="panel-collapse collapse">
      		<div class="panel-body">
				<form id="cdn" class="cdn"  role="form" >
						<label for="cdn"><strong id="eth0">CDN</strong> <small class="text-info">* solo admin</small></label>
							<div class="btn-group form-group input-group input-group-sm col-md-12" >
							<span class="input-group-addon text-info">Server rtmp</span>
							<input type="text" id="s_rtmp" class="form-control input-sm" value="wowza1.streamtech.it" disabled>
					<!--		<span class="input-group-addon">Broadcast</span>
						<input type="text" id="0broadcast" class="form-control input-sm" value="Boadcast"> -->
						<span class="input-group-addon text-info">Nome app</span>
						<input type="text" id="app_name" class="form-control input-sm" value="streamtech" disabled>
							</div>
							<div class="btn-group form-group input-group input-group-sm col-md-8" >
							<span class="input-group-addon">Nome flusso</span>
							<input type="text" id="stream_name" class="form-control input-sm" value="">
							</div>
							<button type="submit" class="btn btn-default btn-sm">Genera</button>
							<button type="submit" class="btn btn-default btn-sm btn-info" disabled>Imposta</button>
				</form>
			 </div>
    	</div>
  </div>
   <div class="panel panel-default">
    		<div class="panel-heading">
      			<h4 class="panel-title">
        		<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Info Sistema</a></h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse">
      			<div class="panel-body">
<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>
				</div>
  			</div>
    	</div>
</div>
</div>
</div>
      		</div>
      </div>
	</div>
</div>
</div>
   <!-- <div id="footer">
      <div class="container">
        <p class="text-muted credit">Example courtesy .</p>
      </div>
    </div>
-->
   </body>
   </html>
