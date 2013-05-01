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
