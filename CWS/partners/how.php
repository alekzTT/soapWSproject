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
              <pre>
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;cars&gt;
&lt;car&gt;
&lt;add_code&gt;69&lt;/add_code&gt;
&lt;imgurl&gt;http://localhost/carz/images/noimage.png&lt;/imgurl&gt;
&lt;url&gt;http://localhost/carz/public/searched.php?add=69&lt;/url&gt;
&lt;maker&gt;Alfa Romeo&lt;/maker&gt;
&lt;model&gt;Alfa 145&lt;/model&gt;
&lt;price&gt;5600&lt;/price&gt;
&lt;cc&gt;2000&lt;/cc&gt;
&lt;bhp&gt;98&lt;/bhp&gt;
&lt;km&gt;20000&lt;/km&gt;
&lt;year&gt;2008&lt;/year&gt;
&lt;color&gt;Brown&lt;/color&gt;
&lt;description&gt;Alfa Romeo Alfa 145 654 2000 100 20000 2008 Brown&lt;/description&gt;
&lt;/car&gt;
&lt;car&gt;
&lt;add_code&gt;70&lt;/add_code&gt;
&lt;imgurl&gt;http://localhost/carz/images/bmw.png&lt;/imgurl&gt;
&lt;url&gt;http://localhost/carz/public/searched.php?add=70&lt;/url&gt;
&lt;maker&gt;Alfa Romeo&lt;/maker&gt;
&lt;model&gt;Alfa 147&lt;/model&gt;
&lt;price&gt;2500&lt;/price&gt;
&lt;cc&gt;1800&lt;/cc&gt;
&lt;bhp&gt;105&lt;/bhp&gt;
&lt;km&gt;20000&lt;/km&gt;
&lt;year&gt;2001&lt;/year&gt;
&lt;color&gt;Black&lt;/color&gt;
&lt;description&gt;Alfa Romeo Alfa 147 2500 1800 105 20000 2001 Black&lt;/description&gt;
&lt;/car&gt;
&lt;/cars&gt;

              </pre>
              </div>
            </div>
            <span class="joinform">
			<p>This xml file must be valid to the following xsd.</p>
            </span>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
			  <div class="CollapsiblePanelTab" tabindex="0">XSD</div>
			  <div class="CollapsiblePanelContent">
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
<pre>
$doc=new DomDocument("1.0");
$root=$doc->createElement("cars");
$root=$doc->appendChild($root);
 while ($row=mysql_fetch_array($result))
 {
	$car=$doc->createElement("car");
	$car=$root->appendChild($car);
	
	$add=$doc->createElement("add_code");
	$add=$car->appendChild($add);
	$value=$doc->createTextNode($row[0]);
	$value=$add->appendChild($value);
	
	$img=$doc->createElement("imgurl");
	$img=$car->appendChild($img);
	$value=$doc->createTextNode($row[11]);
	$value=$img->appendChild($value);
	
	$url=$doc->createElement("url");
	$url=$car->appendChild($url);
	$value=$doc->createTextNode("http://localhost/carz/public/searched.php?add=".$row[0]);
	$value=$url->appendChild($value);
	
	
	$maker=$doc->createElement("maker");
	$maker=$car->appendChild($maker);
//================================================================================
	$code=$row[2];
	$rnr=(mysql_query("SELECT * FROM makers WHERE maker_code= '$code'"));
	while ($rn=mysql_fetch_array($rnr))
	{ 
	$nam=$rn[1];
	}
		$value=$doc->createTextNode($nam);
		$value=$maker->appendChild($value);
//=================================================================================
	$model=$doc->createElement("model");
	$model=$car->appendChild($model);
//=================================================================================
	$code1=$row[3];
	$sql="SELECT * FROM `cws`.`models` WHERE model_code=$code1";
	$res=mysql_query($sql);
	while ($row2=mysql_fetch_array($res))
	{
		$name=$row2["model_name"];
	}	
//=================================================================================	
	$value=$doc->createTextNode($name);
	$value=$model->appendChild($value);
//=================================================================================	
	$price=$doc->createElement("price");
	$price=$car->appendChild($price);
	$value=$doc->createTextNode($row[4]);
	$value=$price->appendChild($value);
	
	$debatable=$doc->createElement("debatable");
	$debatable=$car->appendChild($debatable);
	$value=$doc->createTextNode($row[10]);
	$value=$debatable->appendChild($value);
	
	$cc=$doc->createElement("cc");
	$cc=$car->appendChild($cc);
	$value=$doc->createTextNode($row[5]);
	$value=$cc->appendChild($value);
	
	$bhp=$doc->createElement("bhp");
	$bhp=$car->appendChild($bhp);
	$value=$doc->createTextNode($row[6]);
	$value=$bhp->appendChild($value);
	
	$km=$doc->createElement("km");
	$km=$car->appendChild($km);
	$value=$doc->createTextNode($row[7]);
	$value=$km->appendChild($value);
	
	$year=$doc->createElement("year");
	$year=$car->appendChild($year);
	$value=$doc->createTextNode($row[8]);
	$value=$year->appendChild($value);
	
	$color=$doc->createElement("color");
	$color=$car->appendChild($color);
	$value=$doc->createTextNode($row[9]);
	$value=$color->appendChild($value);
	
	$description=$doc->createElement("description");
	$description=$car->appendChild($description);
	$value=$doc->createTextNode($nam." ".$name." ".$row[4]." ".$row[5]." ".$row[6]." ".$row[7]." ".$row[8]." ".$row[9]);
	$value=$description->appendChild($value);
	
 }
$doc->save("../xml/adds.xml");
</pre>        </div>
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