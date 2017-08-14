<?PHP
$flag=0;
require_once('../db/dbConn.php');
if ($_GET)
{
$code=$_GET["maker"];
}else {$code =0; }
?>
<html>
<head>
<link href="../css.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrap">
	<div id="header">
	<h2>...free used cars classifieds</h2>
	</div>
<div id="header2">
			<div id="mainmenu">
<ul>
<li><a href="../index.html">Home</a></li>
<li><a href="search.php">Search</a></li>
<li><a href="add.php">Add</a></li>
<li><a href="../private/admin.php">Login</a></li>
</ul>
</div>

</div>

<!--<div id="headerimg"></div>-->

<div id="main">
<div id="main_left">
<h3>Input Classifield Data</h3>
	<?php
	if ($code!=0)
	{ $flag=1;
	  $code=$_GET["maker"];
	  $sql="SELECT maker_name FROM makers WHERE maker_code LIKE $code";
	  $result=mysql_query($sql);
	  $row=mysql_fetch_array($result);
	  echo "<select class=\"field\" name=\"maker\" id=\"maker\" onchange=\"\">";
	  echo "<option value=\"\" selected=\"selected\" disabled=\"disabled\">".$row[0]."</option>";
	  echo "</select>"."<br/>";
	  echo "<a href=".$_SERVER['PHP_SELF']."><h3><span class=\"\"><u>Reset</u></span></h3></a>";
	}
	else
	{	$flag=0;
		echo "<form action=\"add.php\" method=\"get\" name=\"add\"><table><tr><td>";
		echo "<select class=\"field\" name=\"maker\" id=\"maker\">";
		echo "<option value=\"\" >-----Choose Maker-----</option>";
			$sql="SELECT * FROM makers";
			$result=mysql_query($sql);
		while($row=mysql_fetch_array($result))
		{ if ($row[0] == $code)
			{
				echo "<option value=".$row[0]." selected=\"selected\">".$row[1]."</option>";
			}else {
			echo "<option value=".$row[0].">".$row[1]."</option>"; }
		}
			echo "</select>";
			echo "</td><td>Choose</td></tr><tr><td><input class=\"field\" type=\"submit\" name=\"submit\" value=\"Select Maker\"></td><td></td></tr>
    </table>
    </form>";
	} 	?>


<h3>Input Guide</h3>
<ul>
<li>Choose maker</li>
<li>After maker submit fill in the fields at the right column</li>
<li>All filds are required</li>
<li>The owner code and the classfield code is required for future proccess of  your classifield and will be required for login so..... <b>keep them somewhere</b>.</li>
<li>After the correct input of the classifield you can login to Upload  your car's image.</li>
</ul>
<img src="../images/add2db.png" width=150 height=150 ><img src="../images/car.jpg" width=150 height=100 >
</div>

<div id="main_right">
<br/>
<fieldset>
<legend>Classifield's info</legend>

<form action="added.php" method="get" name="add">
<table>

<?php

$query="SELECT maker_name FROM makers WHERE maker_code=$code";
$result=mysql_query($query);
if ($result)
{
	while ($nam=mysql_fetch_array($result))
		{
			$maker_name=$nam[0];
		}
}

if($code!=0)
{
echo  "<tr><td><input type=\"text\" class=\"field\" name=\"code\" value=\"".$maker_name."\"selected=\"selected\"></td><td>Maker</td></tr>";
echo "<tr><td>";

 echo "<span id=\"spryselect2\">";
 echo "<select class=\"field\" name=\"model\"  id=\"model\" >";

   echo "<option value=\"\" selected=\"selected\">"."All Models"."</option>";
	$sql="SELECT * FROM models WHERE maker_code = $code";
		$result=mysql_query($sql);
			while ($row=mysql_fetch_array($result))
			{
				echo "<option value=$row[2]>$row[1]</option>";
			}	echo "</select>";
			echo "<span class=\"selectRequiredMsg\">*</span></span><span class=\"selectRequiredMsg\">*</span></span>";
			echo "</td><td>Model</td></tr>";
			} ?>



  <tr>
  <td>
  <span id="sprytextfield5">
  <input type="text" class="field" name="price" id="price" size="10" maxlength="10">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">min = 300 euro.</span><span class="textfieldMaxValueMsg">max = 500000 euro</span><span class="textfieldMinCharsMsg">Minimum 3 digits.</span><span class="textfieldMaxCharsMsg">Maximum 6 Digits.</span></span>&euro;
  </td>
  <td>
  <label for="price">
Price
  </label>
  </tr>
  <tr>
  <td>
  <input type="checkbox" name="debatable" class="field">
  </td>
  <td>
  <label for="debatable">
 Price Debatable?
  </label>
  </td>
  </tr>
  <tr>
  <td>
  <span id="sprytextfield6">
  <input type="text" class="field" name="engine" id="engine" size="5" maxlength="5">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Integers only.</span><span class="textfieldMinCharsMsg">Minimum 2 digits.</span><span class="textfieldMaxCharsMsg">Max 3 digits.</span><span class="textfieldMinValueMsg">Minimum 50 cc.</span><span class="textfieldMaxValueMsg">Max 10000 cc.</span></span>cc
  </td>
  <td>
  <label for="engine">
 Engine Size
  </label>
  </td>
  </tr>
  <tr>
  <td>
  <span id="sprytextfield7">
  <input type="text" class="field" name="power" id="power" size="6" maxlength="6">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldMinCharsMsg">Minimum 2 digits.</span><span class="textfieldMaxCharsMsg">Maximum 3 digits.</span><span class="textfieldInvalidFormatMsg">Integers only.</span><span class="textfieldMinValueMsg">Minimum 10 bhp.</span><span class="textfieldMaxValueMsg">Maximum 900 bhp.</span></span> bhp
  </td>
  <td>
  <label for="power">
 Engine Power
  </label>
  </td>
  </tr>
  <tr>
  <td>
  <span id="sprytextfield8">
  <input type="text" class="with_units" name="mileage" id="mileage" size="10" maxlength="10">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Integers only.</span><span class="textfieldMinCharsMsg">Min 1 digit.</span><span class="textfieldMaxCharsMsg">Max 6 digits.</span><span class="textfieldMinValueMsg">Minimum value "0".</span><span class="textfieldMaxValueMsg">Maximum 900000</span></span> km
  </td>
  <td>
  <label for="mileage">
  Killometers History
  </label>
  </td>
  </tr>
  <tr>
  <td>
  <span id="sprytextfield9">
  <input type="text" name="regiyear" id="regiyear" size="4" maxlength="4">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Not year format.</span><span class="textfieldMinCharsMsg">4 digits for year.</span><span class="textfieldMaxCharsMsg">4 digits only</span><span class="textfieldMaxValueMsg">Max 2011</span><span class="textfieldMinValueMsg">Min 1970 </span></span>eg &nbsp;2004
  </td>
  <td>
  <label for="regiyear">
  Year that<strong> first</strong> bought.
  </label>
  </td>
  </tr>
  <tr>
  <td>
  <span id="spryselect1">
  <select name="color" id="color">
  <option value="">Choose Color</option>
  <option value="Silver">Silver</option>
  <option value="White">White</option>
  <option value="Violet">Violet</option>
  <option value="Gray">Gray</option>
  <option value="Yellow">Yellow</option>
  <option value="Brown">Brown</option>
  <option value="Red">Red</option>
  <option value="Dark Red">Dark Red</option>
  <option value="Lemon Yellow">Lemon Yellow</option>
  <option value="Black">Black</option>
  <option value="Beige">Beige</option>
  <option value="Dark Blue">Dark Blue</option>
  <option value="Blue">Blue</option>
  <option value="Orange">Orange</option>
  <option value="Green">Green</option>
  <option value="Dark Green">Dark Green</option>
  <option value="Pink">Pink</option>
  <option value="Gold">Gold</option>
  <option value="Chrome">Chrome</option>
</select>
<span class="selectRequiredMsg">*</span></span><span class="selectRequiredMsg">*</span></span>
</td><td>Color</td></tr>
<tr>
  <td><span id="sprytextfield1">
  <input type="text" name="own_code" id="own_code" size="10" maxlength="10">
  <span class="textfieldRequiredMsg">*</span></span></td><td>owner code</td></tr>
<tr>
  <td><span id="sprytextfield2">
  <input type="text" name="own_name" id="own_name" size="30" maxlength="30">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldMinCharsMsg">Min 2 Chars.</span><span class="textfieldMaxCharsMsg">Max 12 Chars.</span></span></td><td>name</td></tr>
<tr>
  <td><span id="sprytextfield3">
  <input type="text" name="own_mail" id="own_mail" size="20" maxlength="50">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Not mail Format.</span><span class="textfieldMinCharsMsg">Minimum 6 chars.</span><span class="textfieldMaxCharsMsg">Maximum 50 chars.</span></span></td><td>e-mail</td></tr>
<tr>
  <td><span id="sprytextfield4">
  <input type="text" name="own_phone" id="own_phone" size="10" maxlength="10">
  <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">10 digits.</span><span class="textfieldMinCharsMsg">10 digits.</span><span class="textfieldMaxCharsMsg">10 digits.</span></span></td><td>phone number</td></tr>
<tr><td></td><td></td></tr>
<?php
if ($flag==1)
{ echo "<tr><td><input class=\"gray\" type=\"submit\" name=\"submit\" value=\"Register\"></td>".
"<td><input class=\"gray\" type=\"reset\" name=\"reset\" value=\"Reset\"></td></tr>"; }
?>
</form>
</fieldset>
</table>
</div>




</div>
<div id="footer"> Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   <div id="mailme">
<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
</div>
</div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {minChars:2, maxChars:12});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email", {minChars:6, maxChars:50});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {minChars:10, maxChars:10});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {minValue:300, maxValue:500000, minChars:3, maxChars:6});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer", {minChars:2, maxChars:5, minValue:50, maxValue:10000});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "integer", {minChars:2, maxChars:3, minValue:10, maxValue:900});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "integer", {minChars:1, maxChars:6, minValue:0, maxValue:900000});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "integer", {minChars:4, maxChars:4, maxValue:2011, minValue:1970});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>
</body>
	</html>
