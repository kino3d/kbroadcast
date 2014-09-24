// JS Chronometer by emanueleferonato.com

var startTime = 0
var start = 0
var end = 0
var diff = 0
var timerID = 0
function chrono(){
	end = new Date()
	diff = end - start
	diff = new Date(diff)
	var msec = diff.getMilliseconds()
	var sec = diff.getSeconds()
	var min = diff.getMinutes()
	var hr = diff.getHours()-1
	if (min < 10){
		min = "0" + min
	}
	if (sec < 10){
		sec = "0" + sec
	}
	if(msec < 10){
		msec = "00" +msec
	}
	else if(msec < 100){
		msec = "0" +msec
	}
	document.getElementById("chronotime").innerHTML = hr + ":" + min + ":" + sec // + ":" + msec
	timerID = setTimeout("chrono()", 10)
}
function chronoStart(){
	document.chronoForm.startstop.value = "stop!"
	document.chronoForm.startstop.onclick = chronoStop
	document.chronoForm.reset.onclick = chronoReset
	start = new Date()
	chrono()
}
function chronoContinue(){
	document.chronoForm.startstop.value = "stop!"
	document.chronoForm.startstop.onclick = chronoStop
	document.chronoForm.reset.onclick = chronoReset
	start = new Date()-diff
	start = new Date(start)
	chrono()
}
function chronoReset(){
	document.getElementById("chronotime").innerHTML = "0:00:00"
	start = new Date()
}
function chronoStopReset(){
	document.getElementById("chronotime").innerHTML = "0:00:00"
	document.chronoForm.startstop.onclick = chronoStart
}
function chronoStop(){
	document.chronoForm.startstop.value = "start!"
	document.chronoForm.startstop.onclick = chronoContinue
	document.chronoForm.reset.onclick = chronoStopReset
	clearTimeout(timerID)
}


$(function() {
$( "input[type=submit], button" )
.button()
.click(function( event ) {
event.preventDefault();
});
});


$(function() {
$("#record").button().click(function() {
if ( $("#record").text() === "Registra" ) {
$.ajax({
  type: "GET",
  url: "/control/record/start?app=myapp&name=stream&rec=rec1",
  dataType: "script",
  success: function() {
	$("#record").text('Stop');
	chronoStart();  
    //alert("success");
 //   console.log();
  },
  error: function() {
 //   alert("error");
    $("#record").css("background-color","red").text('Stop');
    chronoStart();     
  }
});
};
if ( $("#record").text() === "Stop" ) {
$.ajax({
  type: "GET",
  url: "/control/record/stop?app=myapp&name=stream&rec=rec1",
  dataType: "script",
  success: function() {
	$("#record").text('Registra');
	chronoStart();
	chronoStopReset();
//	chronoReset();  
    //alert("success");
 //   console.log();
  },
  error: function() {
 //   alert("error");
    $("#record").css("background-color","white").text('Registra');
 //   chronoStart();
	chronoStopReset();    
  }
});
};
}
);

return false;
});

// Stream Button
$( "#stream" ).button({
label:"Stream",
text:true //,
// icons: {
// primary: "ui-icon-stop"
// }
}).click(function() {
$( "#stream" ).button( "option", {
label: "Stream",
text:true //,
// icons: {
// primary: "ui-icon-bullet"
// }
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

 $("#filem").scroll();
 
$("#sysm").scroll();

// Start capture card not used
// $("#av_status").button().click(function(){
//	$("#av_status").val("stop capture");	
//	});


// Tabs

$(function(){
var activeTab = null;
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  activeTab = $(e.target).attr('href');
//  console.log($(e.target).attr('href'));
   console.log(activeTab);

if(activeTab == '#Tab3'){
// setInterval(function(){
$.ajax({
  type: "GET",
  url: "update-rec.php?media=rec",
  dataType: "html",
  success: function(data) {
	$("#listfile").html(data);  
 //	alert(resultlist);
  //	console.log(data)
	}});
// },3000);
};

$('#refresh').button().click(function(e){
	e.preventDefault();
$.ajax({
  type: "GET",
  url: "update-rec.php?media=rec",
  dataType: "html",
  success: function(data) {
	$("#listfile").html(data);
	$('#refresh').button('reset');  
	}});
})
})
});

// Delete files from recording

$('#delete').button().click(function(e){
	e.preventDefault();
	var delname = $(this).prop('name');
	console.log(delname);
$.ajax({
  type: "GET",
  url: "update-rec.php?media=del&name=". delname ,
  dataType: "html",
  success: function(data) {
	$("#listfile").html(data);
	$('#refresh').button('reset');  
	}});
});

$(function(){
$.ajax({
 type: "GET",
  url: "capture.php",
 dataType: "html",
// contentType: "application/json; charset=utf-8",
//  data: data,
  success: function(data) {
  	if (data === "stopped") {
  		$.ajax({
 				type: "GET",
  				url: "capture.php?encoder=avstart",
 				dataType: "html",
 				success: function(data) {
				$("#av_status").val("Starting...");}});}
		//	else
		//	{  $("#str_status").addClass("").css("background-color","red").val("Attivo");  };
	//jwplayer().play();   
    //alert("success");
//	console.log(data);
  },
  error: function() {
 //   alert("error");
    $("#av_status").addClass("").css("background-color","red").val("Off"); 
    console.log();  
  		}
	});	
});


setInterval(function(){
$.ajax({
 type: "GET",
  url: "capture.php",
 dataType: "html",
// contentType: "application/json; charset=utf-8",
//  data: data,
  success: function(data) {
  	if (data === "stopped") {
	$("#av_status").text("Stopped");
	$("#pbar").addClass("progress-bar-danger").removeClass("progress-bar-success");	
	}
	else
	{  $("#av_status").text("Cattura: 1920x108050i 25fps 2500kbps");
		$("#pbar").addClass("progress-bar-success").removeClass("progress-bar-danger");	
	}
	//jwplayer().play();   
    //alert("success");
//	console.log(data);
  },
  error: function() {
 //   alert("error");
    $("#av_status").addClass("").css("background-color","red").val("Off"); 
//    console.log();  
  }
});
},3000);



$(function(){
$.ajax({
  type: "GET",
  url: "network.php",
  dataType: "json",
  success: function(data) {
	 $.each(data, function(i,item){
	 	$.each(item,function(name, value){
		//	console.log(name + ":"+ value);
			$("#"+ i + name ).val(value);
	//		$("#"+ i ).attr({name: i[0] ).val(item);	 		
	 		})
  });  
	}});
});

setInterval(function(){
$.ajax({
  type: "GET",
  url: "network.php?network=ping",
  dataType: "json",
  success: function(data) {
//	console.log(data);	
	if (data === 'online'){
	$("#nonetwork").removeClass("panel-danger").addClass("panel-success");
	$(".connected").html(" Online").removeClass("text-danger").addClass("text-success");
		
		} 
		else {
	$("#nonetwork").removeClass("panel-success").addClass("panel-danger");	
	$(".connected").html(" Offline").removeClass("text-success").addClass("text-danger");
			
			}

	}});
},10000);

$(function(){
$.ajax({
  type: "GET",
  url: "network.php?network=ping",
  dataType: "json",
  success: function(data) {
//	console.log(data);	
	if (data === 'online'){
	$("#nonetwork").removeClass("panel-danger").addClass("panel-success");	
	$(".connected").html(" Online").removeClass("text-danger").addClass("text-success");
			
		} 
		else {
 	$("#nonetwork").removeClass("panel-success").addClass("panel-danger");			
	$(".connected").html(" Offline").removeClass("text-success").addClass("text-danger");
		
			}
	}});		
	});

$(function(){
$.ajax({
  type: "GET",
  url: "network.php?network=nettype",
  dataType: "json",
  success: function(data) {
//	console.log(data);	
	if (data === 'dhcp'){
		$('.dhcp').prop("checked", true);
		$('#p5p1 :input').prop("disabled", true);
		} 
	if (data === 'static'){
		$('.manual').prop("checked", true);
		$('#p5p1 :input').prop("disabled", false);	
			}
	}});		
	});

	$(document).ready(function() {
			$('form').attr("autocomplete", "off"); 	
		//	$("#test").after("<input type='text' name='test2' value='Test 2' />"); 
		}); 

// $("#demo").collapse()

$(function(){						
$('#dhcp').click(function () {
//	console.log("help");

    $('.p5p1 :input').prop("disabled", true);
//    $('#dhcp').html('Manuale');
})});					

$(function(){						
$('#manuale').click(function () {
//	console.log("help");

    $('.p5p1 :input').prop("disabled", false);
//    $('#dhcp').html('Manuale');
})});

// Video Audio bitrate selection

$(function(){
$('.videob .btn').on('click', function() {
    // whenever a button is clicked, set the hidden helper
 //   console.log($(this).val());
    $("#video_bitrate").val($(this).val());
}); 
});

$(function(){
$('.audiob .btn').on('click', function() {
    // whenever a button is clicked, set the hidden helper
 //   console.log($(this).val());
    $("#audio_bitrate").val($(this).val());
}); 
});


$(function(){
$('.res').on('click', function(e) {
	e.preventDefault();
    // whenever a button is clicked, set the hidden helper
//    console.log($(this).val());
    var res = $(this).text();
    var  resxy = res.split('x');
    $("#resx").val(resxy[0]);
    $("#resy").val(resxy[1]);
     var resx = $("#resx").val();
    var  resy = $("#resy").val();
    var  audio_b = $("#audio_bitrate").val();
    var  video_b = $("#video_bitrate").val();
    var tot_b = Number(video_b) + Number(audio_b);
    $("#st_info").text( resx + "x" + resy + "px " + tot_b + "Kbps" );
   
}); 
});


$(function(){
$('#stream').on('click', function() {
    // whenever a button is clicked, set the hidden helper
   // console.log($(this).val());
    var resx = $("#resx").val();
    var  resy = $("#resy").val();
    var  audio_b = $("#audio_bitrate").val();
    var  video_b = $("#video_bitrate").val();
    var tot_b = Number(video_b) + Number(audio_b);
    $("#st_info").text( resx + "x" + resy + " " + tot_b + "Kbps" );
//	console.log(resx + "x" + resy + " V: " + video_b + "Kbps A: " + audio_b + "Kbps" );
}); 
});
 
$(function(){
$('#iframe_code').button().click(function(){
	var iframe_x = $("#if_resx").val();
	var iframe_y = $("#if_resy").val();
	var rtmp_url = $("#s_rtmp").val(); 
	$("#iframe_remote").text('<iframe src=\"http://live.top-ix.org/player/iframe.php?name=\" frameborder=\"0\" width=\"' + iframe_x +'\" width=\"'+ iframe_y + '\" ></iframe>');
	console.log("ecco!");
});
});



