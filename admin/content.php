<?php
session_start();
if(!isset($_SESSION["login_status"]) || !$_SESSION["login_status"]){
    header('Location: /buddyassists/admin');
}
?>
<html ng-app="adminpanel">
  <head>
  </head>

  <body ng-controller="FormController">
        <button ng-click="logout_user();">Logout</button>
        <div id="wysihtml5-editor-toolbar">
          <header>
            <ul class="commands">
              <li data-wysihtml5-command="bold" title="Make text bold (CTRL + B)" class="command"></li>
              <li data-wysihtml5-command="italic" title="Make text italic (CTRL + I)" class="command"></li>
              <li data-wysihtml5-command="insertUnorderedList" title="Insert an unordered list" class="command"></li>
              <li data-wysihtml5-command="insertOrderedList" title="Insert an ordered list" class="command"></li>
              <li data-wysihtml5-command="createLink" title="Insert a link" class="command"></li>
              <li data-wysihtml5-command="insertImage" title="Insert an image" class="command"></li>
              <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" title="Insert headline 1" class="command"></li>
              <li data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" title="Insert headline 2" class="command"></li>
              <li data-wysihtml5-command-group="foreColor" class="fore-color" title="Color the selected text" class="command">
                <ul>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="silver"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="gray"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="maroon"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="purple"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="olive"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="navy"></li>
                  <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue"></li>
                </ul>
              </li>
              <li data-wysihtml5-command="insertSpeech" title="Insert speech" class="command"></li>
              <li data-wysihtml5-action="change_view" title="Show HTML" class="action"></li>
            </ul>
          </header>
          <div data-wysihtml5-dialog="createLink" style="display: none;">
            <label>
              Link:
              <input data-wysihtml5-dialog-field="href" value="http://">
            </label>
            <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
          </div>

          <div data-wysihtml5-dialog="insertImage" style="display: none;">
            <label>
              Image:
              <input data-wysihtml5-dialog-field="src" value="http://">
            </label>
            <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
          </div>
        </div>
        <section>
          <textarea id="wysihtml5-editor" spellcheck="on" wrap="off" rows='10' cols="10" autofocus placeholder="Enter something ...">
          </textarea>
      </section>
        <button type="submit" value="submit" id="SubmitBtn">Submit</button>
    	<form name="form"   novalidate  method="post">
          <input type="file" name="uImgupload" id = "Imgupload" accept="image/*">
          <input type="submit" ng-click="upload_image();" value="submit">
        </form>
        <div id="uploaded_image_url"></div>

    <link rel="stylesheet" href="css/reset-min.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="../lib/jquery.js" ></script>
    <script src="../lib/angular.min.js" ></script>
    <script src="js/script.js" ></script>
    <script src="parser_rules/advanced.js" ></script>
    <script src="dist/wysihtml5-0.3.0.min.js" ></script>
    <script>
      var editor = new wysihtml5.Editor("wysihtml5-editor", {
        toolbar:     "wysihtml5-editor-toolbar",
        stylesheets: ["css/reset-min.css", "css/editor.css"],
        parserRules: wysihtml5ParserRules
      });

      editor.on("load", function() {
        var composer = editor.composer;
        composer.selection.selectNode(editor.composer.element.querySelector("h1"));
    });
    </script>
  </body>
</html>
