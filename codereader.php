<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Editor</title>
  <style type="text/css" media="screen">
    .ace_editor {
        position: relative !important;
        border: 1px solid lightgray;
        margin: auto;
        height: 200px;
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
<body>
<div class="scrollmargin">
    <span onclick="scroll()" class="large-button">
    scroll down &dArr;
    </span>
</div>

<?php

									$file = "LoanProduct.java";
									$fh = fopen($file, 'r');
									while(!feof($fh)){
										$data = fgets($fh);
										?>
<pre id="editor">

										<?php echo $data."<br/>"; ?>
								

</pre>
<?php
		}
										fclose($fh);
								?>
<div class="scrollmargin">
    <div style="padding:20px">
        press F11 to switch to fullscreen mode
    </div>
    <span onclick="add()" class="large-button">
        +
    </span>

</div>

<!-- load ace -->
<script src="../src/ace.js"></script>
<!-- load ace themelist extension -->
<script src="../src/ext-themelist.js"></script>
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
editor.setTheme("ace/theme/twilight");
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
