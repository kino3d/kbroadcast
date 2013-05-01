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
	<link href="css/kino-theme/jquery-ui-1.10.2.custom.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" type="text/css" href="css/flat/jquery.mobile.flatui.css" /> -->
	<script type='text/javascript' src='https://eventilive.top-ix.org/player/jw/jwplayer.js'></script>
	  <style>
      body {
        padding-top: 0px; /* 60px to make the container go all the way to the bottom of the topbar */
        font: 62.5% "Trebuchet MS", sans-serif;
		margin: 5px;
		-webkit-text-size-adjust: none;
      }
  .container{
	width: 600px; 
	margin: auto;
  }
      
  #mediaspace {
    width: 416px;
    height: 240px;
   	border:1px solid #dfdfdf;
    outline: none;
    padding:0px;
	background-repeat: no-repeat;
	background-color: #000;
/*	margin:auto;*/
  }
#mediaspace_wrapper {
    width: 416px;
    height: 240px;
   	border:0px solid #dfdfdf;
    outline: none;
    padding:0px;
	background-repeat: no-repeat;
	background-color: #000;
/*	margin:auto;*/
  }  
  
  	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	
	.nav li {
		display: inline-table;
	}
	.menu {
  height: 50px;
 // left: 0;
  position:fixed;
  top: 0;
   z-index: 9001;
   background-color: #dfdfdf;
   width: 90%;
   margin: auto;
   height: 20px;
   padding:10px;
   font-size: 12px;
}
.menu a{
padding-left: 10px;
font-weight: bold;
}
 #toolbar {
padding: 2px;
display: inline-block;
font-size: 11px;
}
/* support: IE7 */
*+html #toolbar {
display: inline;
}

.red{
background-color: red !important;
color:black!important;
}

.rows {
	list-style-type: none;
	border-bottom: 1px solid #dfdfdf;
	margin-bottom: 0px;
	width: 380px;
	padding:3px;	
	font-size: 11px;
	}

.rows:hover{
	background-color: #dfdfdf;
	border-bottom: 1px solid #fff;
	}
	
.filem{
margin-top: 10px;
height:100px;
overflow:scroll;
width: 400px;
overflow-x: hidden;
border:1px dotted #afafaf;
	}
	
.src_stats{
	padding: 3px;
	border: 1ps solid #dfdfdf;
	width: 80px;
	margin:2px;
	font-weight: bold;
	color: #fff;
	text-align: center;
	background-color: #dfdfd;
	}

.lined{
display: inline;	
	}	

.filectrl{
float:right;
border-left:1px solid #dfdfdf;
border-right:1px solid #dfdfdf;
padding-left:3px;	
padding-right:3px;
background-color: #fff;
	}	
	
#radio{
	display: inline-table;	
	}	
</style>
	<script>
	$(function() {
		
		$( "#accordion" ).accordion();
		

		
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		$( "#autocomplete" ).autocomplete({
			source: availableTags
		});
		

		
		$( "#button" ).button();
		$( "#radioset" ).buttonset();
		

		
		$( "#tabs" ).tabs();
		

		
		$( "#dialog" ).dialog({
			autoOpen: false,
			width: 400,
			buttons: [
				{
					text: "Ok",
					click: function() {
						$( this ).dialog( "close" );
					}
				},
				{
					text: "Cancel",
					click: function() {
						$( this ).dialog( "close" );
					}
				}
			]
		});

		// Link to open the dialog
		$( "#dialog-link" ).click(function( event ) {
			$( "#dialog" ).dialog( "open" );
			event.preventDefault();
		});
		

		
		$( "#datepicker" ).datepicker({
			inline: true
		});
		

		
		$( "#slider" ).slider({
			range: true,
			values: [ 17, 67 ]
		});
		

		
		$( "#progressbar" ).progressbar({
			value: 20
		});
		

		// Hover states on the static widgets
		$( "#dialog-link, #icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
	});

$(function() {
$( "input[type=submit], button" )
.button()
.click(function( event ) {
event.preventDefault();
});
});

 $(function() {
$( "#tabs" ).tabs();
});


$(function() {
$( "#record" ).button({
text: true,
label:"Registra",
icons: {
primary: "ui-icon-bullet"
}
}).css("width", "90px","background","red!important", "color","red")
.click(function() {
var options;
if ( $( this ).text() === "Registra" ) {
options = {
label: "Stop Reg",
icons: {
primary: "ui-icon-stop"
}
};
$.ajax({
  type: "GET",
  url: "http://localhost/control/record/start?app=myapp&name=stream&rec=rec1",
  dataType: "script",
  success: function() {
	$("#str_status").css("background-color","green");    
    //alert("success");
    console.log();
  },
  error: function() {
 //   alert("error");
    $("#str_status").css("background-color","red");   
  }
});
} else {
options = {
label: "Registra",
icons: {
primary: "ui-icon-bullet"
}
};
$.ajax({
  type: "GET",
  url: "http://localhost/control/record/stop?app=myapp&name=stream&rec=rec1",
  dataType: "script",
  success: function() {
	$("#str_status").css("background-color","green");    
    //alert("success");
    console.log();
  },
  error: function() {
 //   alert("error");
    $("#str_status").css("background-color","red");   
  }
});
}
$( this ).button( "option", options ).toggleClass("red");
});

// Stream Button
$( "#stream" ).button({
label:"Stream",
text:true,
icons: {
primary: "ui-icon-stop"
}
})
.click(function() {
$( "#stream" ).button( "option", {
label: "Stream",
text:true,
icons: {
primary: "ui-icon-bullet"
}
}).addClass("red");
});

$( "#timer" ).button({
text:true,
label: "00:00:00",
icons:{
primary: "ui-icon-clock"
}}).attr("disabled",false).addClass("ui-state-highlight");

$( "#aggiorna" ).button({
text:true,
label: "Aggiorna",
icons:{
primary: "ui-icon-refresh"
}}).click(function(){
$.ajax({
  type: "GET",
  url: "update-rec.php",
  dataType: "html",
  success: function(data) {
	$("#listfile").html(data); //.hide("fold", { horizFirst: false }, 100).show("fold", {}, 100);
	}});
});

$( "#aggiorna1" ).button({
text:true,
label: "Aggiorna",
icons:{
primary: "ui-icon-refresh"
}}).click(function(){
$("#tabs").tabs("load",3);

});

 $("#filem").scroll();
 
$( "#check" ).button();
$( "#format" ).buttonset();
 $( "#radio" ).buttonset();
return true;


});
/*
$( "#update" ).button({
text:true,
label: "Aggiorna",
icons:{
primary: "ui-icon-clock"}
}).click(function(){
	alert("yes");
});
*/
setInterval(function(){
$.ajax({
  type: "GET",
  url: "update-rec.php",
  dataType: "html",
  success: function(data) {
	$("#listfile").html(data);  
 //	alert(resultlist);
 // 	console.log(data)
	}});
},3000);

// $.getJSON("http://localhost/on_play", function(data){

 //   $.each(data, function(key, value){
 //       document.write(key+": "+value+"<br />"); 
 //   });
// });



setInterval(function(){
$.ajax({
 type: "GET",
  url: "http://192.168.1.7/on_publish",
  dataType: "jsonp",
 
  contentType: "application/json; charset=utf-8",
//  data: data,
  success: function() {
	$("#str_status").addClass("src_stats").css("background-color","green").text("Source on");    
	//jwplayer().play();   
    //alert("success");
  console.log();
  },
  error: function() {
 //   alert("error");
    $("#str_status").addClass("src_stats").css("background-color","red").text("Source off"); 
    console.log();  
  }
});
},5000);
</script>                                   
                                   
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
