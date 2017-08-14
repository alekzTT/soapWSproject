<?php
require ('../functions/functions.php');
$con=mysql_connect("localhost", "root","");
mysql_select_db("cws");
if($_POST)
{
	if ($_POST["domain"] && $_POST["url"] && $_POST["person"] && $_POST["country"])
	{
	    $domain=$_POST["domain"];
		$url=$_POST["url"];
		$person=$_POST["person"];
		$country=$_POST["country"];
		$msg=checkpartner($domain, $url, $person, $country);
		if ($msg=="ok")
		{
			$insert=inputpartner($domain,$url, $person, $country);
			echo "<html><head><link href=\"../CSS/css.css\" rel=\"stylesheet\" type=\"text/css\"/></head><body>";
			echo "<div id=\"pinput\"><h1>Your Information were submitted</h1>";
			echo $insert;
			echo "<a href=\"partners.php\">See </a> partnerlist";
			echo "</div>";
			echo "</body></html>";

		}else {
		echo "<html><head><link href=\"../CSS/css.css\" rel=\"stylesheet\" type=\"text/css\"/></head><body>";
		echo "<div id=\"pinput\"><h1>Your Information were <b> not</b>submitted succesfull</h1>";
		echo "The reason is :".$msg."<br/>";
		echo "<a href=\"join.php\">Retry</a>";
		echo "</div>";
		echo "</body></html>";
		}
	}
} else {
?>

<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
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
			<div id="main" style="color:#6d6d6d";"border:#d3d3d3 thin solid">
					<p></p>
					<h3>Join us in cws</h3>
					<p>It's free it's easy learn <a href=how.php>how to</a>,
					  Fill in the form and make your classifield site part of our search engine.</p>

					<form action="join.php" class="joinform" method="post">
						<p>Domain of your Site</p>
          	<span id="sprytextfield1">
            <input type="text" name="domain" id="domain">
            <span class="textfieldRequiredMsg">A value is required.</span>
						<span class="textfieldInvalidFormatMsg">Invalid format.</span>
					</span>


					<P>URL of the valid XML db export valid to our <a href=how.php>xsd</a></p>
					<span id="sprytextfield2">
            <input type="text" name="url" id="url">
            <span class="textfieldRequiredMsg">A value is required.</span>
						<span class="textfieldInvalidFormatMsg">Invalid format.</span>
					</span>
					<p>Name / Surname of the Domain Owner</p>
					<span id="sprytextfield3">
            <input type="text" name="person" id="person">
            <span class="textfieldRequiredMsg">A value is required.</span>
						<span class="textfieldMinCharsMsg">Minimum number of characters not met.</span>
						<span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span>
					</span>

					<p>country's ANSI code e.g. GB, GR</p>
					<span id="sprytextfield4">
            	<input type="text" name="country" id="country">
              <span class="textfieldRequiredMsg">A value is required.</span>
							<span class="textfieldMinCharsMsg">Minimum number of characters not met.</span>
							<span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span>
						</span>
						<p>
						<input type="submit" class="button">
			  </form>

	  </div>

		<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   </div>
</div>
	</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "url");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "url");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {minChars:4, maxChars:25});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {minChars:2, maxChars:2});
</script>
</body>
</html>
<?php } ?>
