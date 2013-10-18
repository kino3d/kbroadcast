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
		//	event.preventDefault();
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
// event.preventDefault();
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
primary: "ui-icon-bullet red ui-corner-all"
}
}).css("width", "90px","background","red!important", "color","green")
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
  url: "/control/record/start?app=myapp&name=stream&rec=rec1",
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
  url: "/control/record/stop?app=myapp&name=stream&rec=rec1",
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
text:true //,
// icons: {
// primary: "ui-icon-stop"
// }
})
.click(function() {
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
$( "#checks" ).button();
// $( "select" ).selectmenu();

$( "#format" ).buttonset();
$( "#radio" ).buttonset();
$( "#radio1" ).buttonset();





// $( "#accordion" ).accordion({
//collapsible: true,
// active:false
//}); 

$.fn.togglepanels = function(){
  return this.each(function(){
    $(this).addClass("ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
  .find("h3")
    .addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
    .hover(function() { $(this).toggleClass("ui-state-hover"); })
    .prepend('<span class="ui-icon ui-icon-triangle-1-e" style="display:inline-block"></span>')
    .click(function() {
      $(this)
        .toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
        .find("> .ui-icon").toggleClass("ui-icon-triangle-1-e ui-icon-triangle-1-s").end()
        .next().slideToggle();
      return false;
    })
    .next()
      .addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
      .hide();
  });
};

$("#accordian").togglepanels();

 $("#sysm").scroll();

return false;


});

// $(function() {



//    var allPanels = $('#accordion > div').show();

 /*   $('#accordion > h3 > a').click(function() {
        $(this).parent().next('div').hide();
        
        if($(this).parent().next().is(':hidden'))
        {
            $(this).parent().next().show();
        }
        
        return false;
    });
    */
// });

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
  url: "capture.php",
 dataType: "html",
// contentType: "application/json; charset=utf-8",
//  data: data,
  success: function(data) {
  	if (data === "stopped") {
	$("#str_status").addClass("").css("background-color","green", "color","white!important").val("Start");}
	else
	{  $("#str_status").addClass("").css("background-color","red").val("Stop");  }
	//jwplayer().play();   
    //alert("success");
	console.log(data);
  },
  error: function() {
 //   alert("error");
    $("#str_status").addClass("").css("background-color","red").val("Off"); 
    console.log();  
  }
});
},3000);



$.ajax({
  type: "GET",
  url: "network.php",
  dataType: "json",
  success: function(data) {
	$("#dhcp").html(data);  
 //	alert(resultlist);
 // 	console.log(data)
	}});

