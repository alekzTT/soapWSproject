<?php
$con=mysql_connect("localhost", "root","");
mysql_select_db("cws");

?>
<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="wrap">
		<div id="header"><h2>...wellcome</h2><h1>C.W.S.</h1>
									
					</div>
		<div id="header2"><ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="partners.php">Partners</a></li>
					<li><a href="join.php">Join in</a></li>
					<li><a href="../about/about.php">About</a></li>
				</ul> 
				
				</div>
			<div id="main">
			<span class="joinform">
			<p>First you have to export your classifieds in an xml format like the following example</p>
            </span>
            <div id="CollapsiblePanel3" class="CollapsiblePanel">
              <div class="CollapsiblePanelTab" tabindex="0">XML EXAMPLE</div>
              <div class="CollapsiblePanelContent">
            	<iframe src="xmlExample.html"></iframe>
              </div>
            </div>
            <span class="joinform">
			<p>This xml file must be valid to the following xsd.</p>
            </span>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
			  <div class="CollapsiblePanelTab" tabindex="0">XSD</div>
			  <div class="CollapsiblePanelContent">
			  <!-- TODO: check XSD -->
			  <iframe src="../administration/cws.xsd"></iframe>
			  
			  
			  </div>
			  </div>
			<span class="joinform">
<p>You have to place the XML file at a standard url that you will input at  the form eg  <strong>http://www.alekz.eu/export/xport.xml</strong></p>
				<p>If you catch yourself having trouble exporting your database we can give a little help giving you a piece of <strong>PHP code</strong> to help you out</p>
            </span>
			<div id="CollapsiblePanel2" class="CollapsiblePanel">
			  <div class="CollapsiblePanelTab" tabindex="0">Php Code</div>
			  <div class="CollapsiblePanelContent">
			  <iframe src="examplePhp"></iframe>
			  </div>
			  </div>
			<span class="joinform"> </span>
				
			  </div>	
		
		<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   </div>
			</div>
	</div>
<script type="text/javascript">
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1", {contentIsOpen:false});
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2", {contentIsOpen:false});
var CollapsiblePanel3 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel3", {contentIsOpen:false});
</script>
</body>
</html> 