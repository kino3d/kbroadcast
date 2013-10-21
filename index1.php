<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="kino" >
    <link rel="shortcut icon" href="ico/favicon.png">

    <title>Sticky Footer Navbar Template for Bootstrap</title>
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/encoder.css" rel="stylesheet">
 	
 	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- <script src="js/encoder.js"></script> -->
 	<script src="js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap"> 
<div class="container">
<div class="tabbable navbar" role="navigation">		
     		<ul id="tab" class="nav nav-tabs ">
     			<li class="active"><a href="#Tab1" data-toggle="tab">Encoder</a></li>
     			<li><a href="#Tab2" data-toggle="tab">Tab2</a></li>
     			<li><a href="#Tab3" data-toggle="tab">Tab3</a></li>
    		</ul>
    
	<div class="tab-content">
			<div class="tab-pane panel-body active" id="Tab1">
			
      <!-- Begin page content -->
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
	
        <div id='mediaspace' name='mediaspace'></div>
        
					<div class="panel panel-default">
					<div class="panel-heading"><strong>Broadcast</strong></div>
					<div class="panel-body">
					<form class="form-inline" >
					<div id="radio" class="input-group">
					<label class="checkbox">Video:</label> 
					<span class="input-group-addon">					
					<input type="radio" id="check1" name="radio" checked="checked" /><label for="check1">Alta</label>
						</span>
						<span class="input-group-addon">		
					<input type="radio" id="check2" name="radio" /><label for="check2">Media</label>
					</span>
					<span class="input-group-addon">	
					<input type="radio" id="check3" name="radio" /><label for="check3">Bassa</label>
					</span>
					</form>
					<form class="form-inline" >
					<div style="width:40px;padding:5px;margin:auto;display:inline-table">Audio:</div>
					<input type="radio" id="check4" name="radio" checked="checked" /><label for="check4">Alta</label>
					<input type="radio" id="check5" name="radio" /><label for="check5">Media</label>
					<input type="radio" id="check6" name="radio" /><label for="check6">Bassa</label>
					
					<button id="stream" style="float:right;height:58px;font-weight:bold;background-color:#28E02E;color:#fff"></button>
					</form>
					</div>
					</div>
				
      		</div>
  			
  			<div class="tab-pane panel-body" id="Tab2">
  			
      <!-- Begin page content -->
        	<p class="">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added within </p>
			</div>
			
			<div class="tab-pane panel-body" id="Tab3">
			
      <!-- Begin page content -->
        	<p class="">Pin a fixed-h.</p>
        			
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