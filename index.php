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
    <script src="js/jquery-1.10.2.min.js"></script>
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
     			<li><a href="#Tab3" data-toggle="tab">Media</a></li>
     			<li><a href="#Tab4" data-toggle="tab">Sistema</a></li>
     			<small class="pull-right" style="border-bottom:1px solid #dfdfdf"><span id="connected" class="connected text-right text-danger">Offline</span></small>
    		</ul>
	<div class="tab-content">
			<div class="tab-pane panel-body active" id="Tab1">
      <!-- Begin page content -->
					<div class="progress progress-striped active" style="width:100%;">
					<div id="pbar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;">
					<span id="av_status" class="av_status">Cattura...</span>
					</div>
					</div>
					
				<!--	</form>  
					</div> -->
					<div class="clearfix"></div>
        				<div  id='mediaspace' class="mediaspace" name='mediaspace'></div>
        			<div class="clearfix"></div>
        <br>
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
		screencolor: '000000',
		backcolor:'434343',
		provider:'rtmp',
		streamer:"rtmp://<?php echo $hostname;?>/myapp",
		autostart: 'true',
		stretching: 'fit',
		controlbar: 'hide',
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
			<!--	<form role="form" id="audio_video" > -->				
					<div id="VideoB" class="btn-group pull-left videob" data-toggle="buttons" style="margin-bottom:3px">	
				 	<button type="button" class="btn btn-default btn-primary btn-xs" disabled="">Video:</button>				
					<button type="button" class="btn btn-default btn-xs" value="1200" data-toggle="button">Alta</button>
					<button type="button" class="btn btn-default btn-xs" value="800" data-toggle="button">Media</button>
					<button type="button" class="btn btn-default btn-xs" value="450" data-toggle="button">Bassa</button>
					</div> 
					<div class="form-group input-group input-group-sm col-xs-2" style="width: 120px; height: 22px; margin: 0px auto;"> 
					<span class="input-group-addon"  style="height: 20px; padding: 0 4px; margin: 0;">Bitrate:</span> 
					<input type="text" id="video_bitrate" class="form-control input-sm" value="video_b" style="height: 22px; padding: 0 5px; margin: 0;" />
					</div>
					<!-- Select resolution  -->
					<div class="input-group" style="">
					<div class="input-group-btn">
        			<button type="button" class="btn btn-default btn-xs dropdown-toggle" style="height:22px;" data-toggle="dropdown">Dim<span class="caret"></span></button>
				        <ul class="dropdown-menu">
          						<li><a class="res" href="#"><small>1280x720</small></a></li>
          						<li><a class="res" href="#"><small>960x540</small></a></li>
          						<li><a class="res" href="#"><small>720x404</small></a></li>
          						<li><a class="res" href="#"><small>640x360</small></a></li>
        				</ul>	
      				</div>
					<span class="input-group-addon" style="padding:2px ;margin:0px;"><small>X:</small></span> 
					<input type="text" id="resx" class="form-control  input-sm" value="X" style="height:22px;padding:2px;" />
					<span class="input-group-addon" style="padding:2px;margin:0px;"><small>Y:</small></span>
					<input type="text" id="resy" class="form-control  input-sm" value="Y" style="height:22px;padding:2px;" />
					</div>
					<span class="clearfix"></span>
					<div id="AudioB" class="btn-group pull-left audiob" data-toggle="buttons">
					<button type="button" class="btn btn-default btn-primary btn-xs" disabled="">Audio:</button>				
					<button type="button" class="btn btn-default btn-xs" value="128" data-toggle="button">Alta</button>
					<button type="button" class="btn btn-default btn-xs" value="96" data-toggle="button">Media</button>
					<button type="button" class="btn btn-default btn-xs" value="64" data-toggle="button">Bassa</button>
					</div>
					<div class="form-group input-group input-group-sm col-xs-3" style="width: 120px; height: 22px; margin: 0px auto;">
					<span class="input-group-addon" style="height: 20px; padding: 0 4px; margin: 0;">Bitrate:</span>
					<input type="text" id="audio_bitrate" class="form-control input-sm" value="audio_b" style="height: 22px; padding: 0 5px; margin: 0;" />
						
					</div>
					<span class="label label-success pull-left col-xs-4" style="width:189px;margin:1px 0px;padding:5px;font-weight:bold;text-align:left;" >Stream info: <span id="st_info"></span></span>
					<div class="clearfix"></div>
					<hr>
				<!--	<div style="margin:5px;padding:0px;font-weight:bold;border-bottom:1px solid #dfdfdf;width:300px;">
					<small >Stream info: <span id="st_info"></span></small>					
					</div> -->					
					 <div class="btn-group pull-right">
					<button id="stream" class="btn btn-sm btn-success"><span class=" glyphicon glyphicon-play"></span> Avvia streaming</button>
					</div> 
				<!--	</form> -->
				<!--	<div class="clearfix"></div> -->
				<!--	<form name="chronoForm"> -->
					 <div id="radio" class="btn-group pull-right">
					<button class="btn btn-danger btn-sm" name="startstop" id="record" style="witdh:50px;" value="Registra"><span class="glyphicon glyphicon-record"></span> Registra</button>&nbsp;
				<!--	<button class="btn btn-default btn-xs" id="chronotime">0:00:00</button> -->
					</div>
				<!--	</form> -->			
					</div>

				<div class="panel-heading"><strong>Player</strong></div>
					<div class="panel-body">
					<hr>
						<div class="form-group input-group input-group-sm col-xs-9" style="">
						<span class="input-group-addon input-group-sm" style=""><small>Dimensione</small></span> 
						<span class="input-group-addon input-group-sm" style=""><small>X:</small></span> 
						<input type="text" id="if_resx" class="form-control  input-sm" placeholder="risoluzione X" style="" />
						<span class="input-group-addon" style=""><small>Y:</small></span>
						<input type="text" id="if_resy" class="form-control  input-sm" placeholder="risoluzione Y" style="" />
						</div>
						<button type="submit" id="iframe_code" class="btn btn-sm btn-success">Genera codice</button>
						<div class="clearfix"></div>
						<textarea id="iframe_remote" class="form-control input-sm" rows="3" placeholder="Inserisci la dimensione del player e premi 'Genera Codice', copia e incolla il codice in una pagina del tuo sito"></textarea>
					</div>
			</div>
      		</div>
			<div class="tab-pane panel-body" id="Tab3">
      <!-- Begin page  Media content -->
      			<div class="panel panel-default">
						<div class="panel-heading">
							<strong>Registrazioni</strong>
						</div>
 					<div class="panel-body">
 					 	<button type="button" id="refresh" class="btn navbar-btn btn-sm btn-success pull-right">Aggiorna <span class="glyphicon glyphicon-refresh text-success"></span></button>
 					 	<div class="clearfix"></div>
							<div id="listfile" class="filem">
								<ul class="list-unstyled">
									<li id="files" class="rows"></li>
								</ul>
							</div>
						</div>
				</div>
			<!--		<div class="panel panel-default">
				<div class="panel-heading"><strong>USB Storage</strong></div>
 					 <div class="panel-body">
							<div id="listfile" class="filem ui-corner-all">
								<ul class="class="list-unstyled"">
									<li id="files" class="rows"></li>
								</ul>
							</div>
						</div>
				</div> -->
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
							<input type="text" id="s_rtmp" class="form-control input-sm" value="wowza1.top-ix.org" disabled>
					<!--		<span class="input-group-addon">Broadcast</span>
						<input type="text" id="0broadcast" class="form-control input-sm" value="Boadcast"> -->
						<span class="input-group-addon text-info">Nome app</span>
						<input type="text" id="app_name" class="form-control input-sm" value="toplive" disabled>
							</div>
							<div class="btn-group form-group input-group input-group-sm col-sm-8" >
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
