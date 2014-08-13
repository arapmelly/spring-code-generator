

<?php

include 'class/entity.php';

$package = $_POST['package'];
$entity = $_POST['entity'];
$table = $_POST['table'];
$attribs = $_POST['attributes'];



$name = $_POST['attname'];
$type=$_POST['datatype'];
$column = $_POST['column'];
$mapping =$_POST['mapping'];


$attribute = array();

			for($i=0; $i<$attribs; $i++){
					
					$attr = array(
						'name'=>$name[$i],
						'type'=>$type[$i],
						'column'=>$column[$i],
						'mapping'=>$mapping[$i]
					
					);
					
				$attribute[] = $attr;	
					
			}	
			
		
$entity = new Entity($entity, $table , $attribute );

$entity->writeData();



	
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
 
    <title>Spring MVC Generator</title>
 
    <!-- Bootstrap core CSS -->
    <link href="boot/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="boot/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="boot/css/sunburst.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
 
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<style type="text/css" media="screen">
    .ace_editor {
        position: relative !important;
        border: 1px solid lightgray;
        margin: auto;
        height: 400px;
        width: 80%;
    }

    .ace_editor.fullScreen {
        height: auto;
        width: auto;
        border: 0;
        margin: 0;
        position: fixed !important;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
    }

    .fullScreen {
        overflow: hidden
    }

    .scrollmargin {
        height: 500px;
        text-align: center;
    }

    .large-button {
        color: lightblue;
        cursor: pointer;
        font: 30px arial;
        padding: 20px;
        text-align: center;
        border: medium solid transparent;
        display: inline-block;
    }
    .large-button:hover {
        border: medium solid lightgray;
        border-radius: 10px 10px 10px 10px;
        box-shadow: 0 0 12px 0 lightblue;
    }
  </style>
  </head>
 
  <body role="document">
 
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SpringMVC Generator</a>
        </div>
        <div class="navbar-collapse collapse">
          
        </div><!--/.nav-collapse -->
      </div>
    </div>
 
    <div class="container theme-showcase" role="main">
 
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        
       
		
	
  


      </div>
 
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<ul class="nav nav-pills" >
					<li class="active"><a href="#entity" role="tab" data-toggle="tab">Entity</a></li>
					<li><a href="#dao" role="tab" data-toggle="tab">DAO</a></li>
					<li><a href="#service" role="tab" data-toggle="tab">Service</a></li>
					<li><a href="#dto" role="tab" data-toggle="tab">DTO</a></li>
					<li><a href="#controller" role="tab" data-toggle="tab">Controller</a></li>
				</ul>
			</div>
				<div class="panel-body">
						<div class="tab-content">
							<br/>
							<div class="tab-pane active" id="entity">
							
								<pre id="editor">
									<?php

									$file = $entity->filename;
									$fh = fopen($file, 'r');
									while(!feof($fh)){
										$data = fgets($fh);
										 echo $data."<br/>"; 
										 }
										fclose($fh);
									?>
								

								</pre>
							</div>
							
							<div class="tab-pane" id="dao">
							
							</div>
							
							<div class="tab-pane" id="service">
							
							</div>
							
							<div class="tab-pane" id="dto">
							
							</div>
							
							<div class="tab-pane" id="controller">
							
							</div>
						</div>	
			</div>
		</div>


		
		
		
      
 </div>
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="boot/js/bootstrap.min.js"></script>
    <script src="boot/js/docs.min.js"></script>
	<!-- load ace -->
<script src="ace-builds/src/ace.js"></script>
<!-- load ace themelist extension -->
<script src="ace-builds/src/ext-themelist.js"></script>


<script>

var $ = document.getElementById.bind(document);
var dom = require("ace/lib/dom");

//add command to all new editor instaces
require("ace/commands/default_commands").commands.push({
    name: "Toggle Fullscreen",
    bindKey: "F11",
    exec: function(editor) {
        var fullScreen = dom.toggleCssClass(document.body, "fullScreen")
        dom.setCssClass(editor.container, "fullScreen", fullScreen)
        editor.setAutoScrollEditorIntoView(!fullScreen)
        editor.resize()
    }
})

// create first editor
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/javascript");
editor.renderer.setScrollMargin(10, 10);
editor.setOptions({
    // "scrollPastEnd": 0.8,
    autoScrollEditorIntoView: true
});

var count = 1;
function add() {
    var oldEl = editor.container
    var pad = document.createElement("div")
    pad.style.padding = "40px"
    oldEl.parentNode.insertBefore(pad, oldEl.nextSibling)

    var el = document.createElement("div")
    oldEl.parentNode.insertBefore(el, pad.nextSibling)

    count++
    var theme = themes[Math.floor(themes.length * Math.random() - 1e-5)]
    editor = ace.edit(el)
    editor.setOptions({
        mode: "ace/mode/javascript",
        theme: theme,
        autoScrollEditorIntoView: true
    })

    editor.setValue([
        "this is editor number: ", count, "\n",
        "using theme \"", theme, "\"\n",
        ":)"
    ].join(""), -1)

    scroll()
}

function scroll(speed) {
    var top = editor.container.getBoundingClientRect().top
    speed = speed || 10
    if (top > 60 && speed < 500) {
        if (speed > top - speed - 50)
            speed = top - speed - 50
        else
            setTimeout(scroll, 10, speed + 10)
        window.scrollBy(0, speed)
    }
}

var themes = require("ace/ext/themelist").themes.map(function(t){return t.theme});

window.add = add;
window.scroll = scroll;
</script>



  </body>
</html>

