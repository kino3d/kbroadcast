<?php header( 'Access-Control-Allow-Origin: *');
/* Network stuff */
$hostname=gethostbyaddr($_SERVER[ 'SERVER_ADDR']);
/* echo $hostname; */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="kino">
    <link rel="shortcut icon" href="ico/favicon.png">
    <title>Encoder alpha 0.5</title>
    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/medialement/mediaelement-and-player.min.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <!--   <script type='text/javascript' src="player/jw/jwplayer.js"></script> -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/encoder.css" rel="stylesheet">
    <link rel="stylesheet" href="js/medialement/mediaelementplayer.min.css" />
    <link rel="stylesheet" href="js/font-awesome/css/font-awesome.min.css">
</head>
<body>
    <!-- Wrap all page content here -->
    <div class="wrap">
        <div class="container">
            <div class="tabbable navbar" role="navigation">
                <ul id="tab" class="nav nav-tabs ">
                    <li class="active"><a href="#Tab1" data-toggle="tab">Encoder</a>
                    </li>
                    <li><a href="#Tab3" data-toggle="tab">Media</a>
                    </li>
                    <li><a href="#Tab4" data-toggle="tab">Sistema</a>
                    </li>
                    <small class="pull-right" style="border-bottom:1px solid #dfdfdf"><span id="connected" class="connected text-right text-danger">Offline</span></small>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane panel-body active" id="Tab1">
                        <!-- Begin page content -->
                        <div class="well well-sm">
                            <form id="source" class="form-inline">
                                        <div id="radio1" class="btn-group form-group" data-toggle="buttons">
                                             <label class="btn btn-primary btn-xs" style="width:45px;" >
                                             <input class="form-control input-sm" type="radio" value="1" name="radio1" id="checks1">HDMI</label>
                                             <label class="btn btn-primary btn-xs"  style="width:45px;margin-right:5px;">
                                             <input class="form-control input-sm" type="radio" value="0" name="radio1" id="checks2" >SDI</label>
                                         </div>
                                        <div class="form-group" style="width:150px;">
                                             <select id="select" class="form-control input-sm pull-left" style="padding:0px;margin:0;height:23px;margin-right:5px;margin-top:-1px;">
                                             <option value="2">PAL 576i 25FPS</option>
                                             <!--    <option value="3">NTSC Progressive 720x486 59.9401FPS</option> -->
                                             <option value="4">PAL 576p 50FPS</option>
                                             <option value="5">HD 1080p 23.976FPS</option>
                                             <option value="6">HD 1080p 24FPS</option>
                                             <option value="7">HD 1080p 25FPS</option>
                                             <option value="8">HD 1080p 29.97FPS</option>
                                             <option value="9">HD 1080p 30FPS</option>
                                             <option value="10" selected="selected">HD 1080i 25FPS</option>
                                             <option value="12">HD 1080i 30FPS</option>
                                             <option value="13">HD 720p 50FPS</option>
                                             <option value="14">HD 720p 59.9401FPS</option>
                                             <option value="15">HD 720p 60FPS</option>
                                             </select>
                                        </div>
                                        <div class="btn-group form-group">
                                            <button type="button" id="str_status" class="btn btn-info btn-xs src_stats">Start video</button>
                                        </div>

                                         <div class="form-group pull-right">
                                             <div class="progress progress-striped active">
                                                 <div id="pbar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;padding:2px;font-size:10px">
                                                 <span id="av_status" class="av_status"> </span>
                                                 </div>
                                             </div>
                                        </div>
                            </form>

                        </div>
                        <div class="clearfix"></div>
                            <video style="max-width:100%;max-height:100%;" id="player1" preload="none" controls="controls" autoplay="true">
                                <!-- Pseudo HTML5 -->
                                <source type="video/rtmp" src="rtmp://<?php echo $hostname;?>/myapp/stream" />
                                <source type="application/x-mpegURL" src="http://<?php echo $hostname;?>/mobile/stream.m3u8" />
                            </video>
                        <script>
                            $('video').mediaelementplayer({
                                mode: 'auto_plugin',
                                enableAutosize: true,
                                //   plugins: [ 'flash', 'silverlight'],
                                features: ['playpause', 'volume', 'fullscreen'],
                                //    autosizeProgress : false
                            });
                        </script>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>Broadcast</strong>
                            </div>
                            <div class="panel-body">
                                <!--    <form role="form" id="audio_video" > -->
                                <div id="VideoB" class="btn-group pull-left videob" data-toggle="buttons" style="margin-bottom:3px">
                                    <button type="button" class="btn btn-default btn-primary btn-xs" disabled="">Video:</button>
                                    <button type="button" class="btn btn-default btn-xs" value="1200" data-toggle="button">Alta</button>
                                    <button type="button" class="btn btn-default btn-xs" value="800" data-toggle="button">Media</button>
                                    <button type="button" class="btn btn-default btn-xs" value="450" data-toggle="button">Bassa</button>
                                </div>
                                <div class="form-group input-group input-group-sm col-xs-2" style="width: 120px; height: 22px; margin: 0px auto;">
                                    <span class="input-group-addon" style="height: 20px; padding: 0 4px; margin: 0;">Bitrate:</span>
                                    <input type="text" id="video_bitrate" class="form-control input-sm" value="video_b" style="height: 22px; padding: 0 5px; margin: 0;" />
                                </div>
                                <!-- Select resolution  -->
                                <div class="input-group" style="">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" style="height:22px;" data-toggle="dropdown">Dim<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="res" href="#"><small>1280x720</small></a>
                                            </li>
                                            <li><a class="res" href="#"><small>960x540</small></a>
                                            </li>
                                            <li><a class="res" href="#"><small>720x404</small></a>
                                            </li>
                                            <li><a class="res" href="#"><small>640x360</small></a>
                                            </li>
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
                                <div class="clearfix"></div>
                                <hr>
                                <div class="btn-group bg-info pull-left">
                                    <div id="st_info" class="success st_info" role="alert">Stream: <span id="st_info"></span></div>
                                </div>
                                <!--    <div class="clearfix"></div> -->
                                <div class="btn-group pull-right">
                                    <button id="stream" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-play"></span> Avvia streaming</button>
                                </div>
                                <!--    </form> -->
                                <!--    <div class="clearfix"></div> -->
                                <form name="chronoForm">
                                    <div id="radio" class="btn-group pull-right">
                                        <button class="btn btn-danger btn-sm" name="startstop" id="record" style="width:100px;" value="Registra"><span class="glyphicon glyphicon-record"></span> Registra</button>&nbsp;
                                       <!-- <button class="btn btn-default btn-sm" id="chronotime">0:00:00</button> -->
                                    </div>
                                </form>
                            </div>

                            <div class="panel-heading"><strong>Player</strong>
                            </div>
                            <div class="panel-body">
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
                                <button type="button" id="refresh" class="btn navbar-btn btn-xs btn-success pull-right" style="margin:0;">Aggiorna <span class="glyphicon glyphicon-refresh text-success"></span></button>
                            </div>
                            <div class="panel-body">
                                <div id="listfile" class="filem">
                                    <ul class="list-unstyled">
                                        <li id="files" class="rows"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal bs-viewfile-modal-sm" tabindex="-1" role="dialog" aria-labelledby="viewmediafile" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content text-center">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                               <h5 class="modal-title"><span id="fileview2"></span</h5>
                               </div>

                                <div class="modal-body">

                                <!--    <span id="fileview2"></span> -->
                                    <video style="max-width:100%;max-height:100%;" id="player2" preload="none" controls="controls" autoplay="true">
                                <!-- Pseudo HTML5 -->
                                       <!-- <source type="video/rtmp" src="rtmp://<?php echo $hostname;?>/myapp/stream" /> -->
                                        <source type="video/rtmp" id="fileview" src="#" />

                                    </video>
                 <!--      <script>
                            $('#player2').mediaelementplayer({
                                mode: 'auto_plugin',
                                enableAutosize: false,
                                   plugins: [ 'flash', 'silverlight'],
                                features: ['playpause', 'volume', 'fullscreen'],
                                //    autosizeProgress : false
                            });
                        </script> -->
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--        <div class="panel panel-default">
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
                                        <form id="p5p1" class="p5p1" role="form">
                                            <label for="p5p1"><strong id="eth0">Ethernet</strong>
                                            </label>
                                            <div class="btn-group form-group input-group input-group-sm col-md-12">
                                                <span class="input-group-addon">IP</span>
                                                <input type="text" id="0ip" class="form-control input-sm" value="IP">
                                                <!--        <span class="input-group-addon">Broadcast</span>
                        <input type="text" id="0broadcast" class="form-control input-sm" value="Boadcast"> -->
                                                <span class="input-group-addon">Netmask</span>
                                                <input type="text" id="0netmask" class="form-control input-sm" value="Netmask">
                                            </div>
                                            <div class="btn-group form-group input-group input-group-sm col-md-10">
                                                <span class="input-group-addon">Gateway</span>
                                                <input type="text" id="0gateway" class="form-control input-sm" value="Gateway">
                                                <span class="input-group-addon">DNS</span>
                                                <input type="text" id="0dns" class="form-control input-sm" value="DNS">
                                            </div>
                                            <button type="submit" class="btn btn-default btn-sm">Imposta</button>
                                        </form>
                                        <div class="clearfix small">&nbsp;</div>
                                        <label for="wlan01"><strong>WIFI info</strong>
                                        </label>
                                        <form id="wlan01">
                                            <div class="btn-group form-group input-group input-group-sm col-md-12">
                                                <span class="input-group-addon">IP</span>
                                                <input type="text" id="1ip" class="form-control input-sm" value="IP" disabled>
                                                <span class="input-group-addon">Broadcast</span>
                                                <input type="text" id="1broadcast" class="form-control input-sm" value="Boadcast" disabled>
                                                <span class="input-group-addon">Netmask</span>
                                                <input type="text" id="1netmask" class="form-control input-sm" value="Netmask" disabled>
                                            </div>
                                            <div class="btn-group form-group input-group input-group-sm col-md-4">
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
                <a data-toggle="collapse" data-parent="#accordion" id="mustadmin" href="#collapseThree">CDN</a> <small><span class="glyphicon glyphicon-cog text-alert"></span> solo Admin</small></h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <form id="cdn" class="cdn" role="form">
                                            <!--    <label for="cdn"><strong id="eth0">CDN</strong></label> -->
                                            <div class="btn-group form-group input-group input-group-sm col-md-12">
                                                <span class="input-group-addon text-info">Server rtmp</span>
                                                <input type="text" id="s_rtmp" class="form-control input-sm" value="wowza1.top-ix.org" disabled>
                                                <!--        <span class="input-group-addon">Broadcast</span>
                        <input type="text" id="0broadcast" class="form-control input-sm" value="Boadcast"> -->
                                                <span class="input-group-addon text-info">Nome app</span>
                                                <input type="text" id="app_name" class="form-control input-sm" value="toplive" disabled>
                                            </div>
                                            <div class="btn-group form-group input-group input-group-sm col-sm-8">
                                                <span class="input-group-addon">Nome flusso</span>
                                                <input type="text" id="stream_name" class="form-control input-sm" value="">
                                            </div>
                                            <button type="submit" class="btn btn-default btn-sm">Genera</button>
                                            <button type="submit" class="btn btn-default btn-sm btn-info" disabled>Imposta</button>
                                        </form>
                                    </div>

                                    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-body center-block">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <form role="form" class="form-inline">
                                                        <div class="btn-group input-group input-group-sm">
                                                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                                            <label class="sr-only" for="admpass">Password</label>
                                                            <input type="password" id="admpass" class="form-control input-sm" value="" placeholder="Password">
                                                            <button type="submit" class="btn btn-default btn-sm askpass">ok</button>
                                                        </div>
                                                        <!--  </div> -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
  <script src="js/encoder.js" type="text/javascript"></script>
</body>

</html>
