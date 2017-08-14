<?php
require_once('../db/dbConn.php');
include('../functions/fun.php');
//$flag=0;
//mysql_close();
if ($_GET)
{
$code=$_GET["maker"];
}else {$code = 0;
}

?>
<html>
<head>

<script type="text/javascript" language="JavaScript1.2">
if (document.getElementsByClassName("hide"))
document.getElementsByClassName("hide").style.display='none';
</script>
<link href="../css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrap">
	<?php getHeader(); ?>
 <!-- ========================================================================== -->
 <div id="main">
	<div id="main_left"><h3>How To Use Search</h3>
	 <?php
	 if($code!=0)
	  {$code=$_GET["maker"];
		}else
		 {echo "<b>"."<h3>Select Maker Of the car you search</h3>"."</b>";
		 echo "<p>and press <b>\"select maker\"</b>in order to load the models from the owner.</p>";
		 }

	if ($code!=0)
	{
	echo "<p>If you have changed your mind about the maker just press <b>Reset</b> to reset the form to your right.</p>";
	echo "<b>"."<a href=\"search.php\" class=\"searchlist\">"."Reset</h3>"."</a>"."</b>";
	echo "<p>Otherwise complete any of the rest text fields to make your choice";
	echo "The fields you dont choose will be considered as <b>\"all\"</b></p>";
	}

	?>
	<img src="../images/erch.jpg" width=250 height=250>
	</div>
	<div id="main_right">
 <form action="search.php" method="GET" name="form1">
<fieldset>
<legend>Select Charachteristics</legend>
<table>


	<?php
	if ($code!=0)
	{
	echo "<b>"."<a href=\"search.php\">"."</a>"."</b>";
	}
	else
	{
	echo "<tr><td>";
	echo "<select class=\"field\" name=\"maker\" id=\"maker\" onchange=\"\">";
	echo "<option value=\"0\" selected=\"selected\">-----All makers-----</option>";
	$sql="SELECT * FROM makers";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
	echo "<option value=".$row[0].">".$row[1]."</option>"."<br/>";
	}

	echo "</select>";
	}
	if($code!=0)
	{}else { echo "<td><input class=\"field\" type=\"submit\" name=\"submit\" value=\"Select maker\"></td></tr>"; }
 ECHO "<TR><TD>";

	//$code=$_GET["maker"];

	ECHO "</TD></TR>";
	?>
</form>
	<form action="search_list.php" method="GET" name="carsearch">
	<tr><td>Maker :</td><td>
	<?php
	$sql="SELECT * FROM `carz_db`.`makers` WHERE maker_code=$code";
	$re=mysql_query($sql);
	if ($re)
	{
	$row_m=mysql_fetch_array($re);

	$make_name=$row_m[1];

	echo "<h3>".$make_name."</h3>"; }
	?>
	<input type="text" id="maker" name="maker" value="<?php echo $code ?>" selected="selected" class="hide">
</td></tr>
	<tr><td>Choose Model</td><td>


	<?php
	if ($code ==0)
        {echo "<select class=\"field\" name=\"model\"  id=\"model\">";
			echo "<option value=\"\"  selected=\"selected\">"."---All makers---"."</option>";

         }else
		 { echo "<select class=\"field\" name=\"model\"  id=\"model\">";
					echo "<option value=\"\" selected=\"selected\">All models</option>";


	//===================================================================================================
	$sql="SELECT *
		FROM `models`
		WHERE maker_code = $code";
		$row=0;
		$res= mysql_query($sql);
				while ($row=mysql_fetch_array($res))
				{
				echo "<option value=$row[2]>$row[1]</option>";

				}
	}
	echo  "</select>";

	//=====================================================================================================
?>

	<tr><td>Price from</td><td>
<select class="field"name="min_price" >
	<option value="" selected="selected">----- All prices -----</option>
	<option value="0">0</option>
	<option value="500">500 &#8364;</option>
	<option value="1000">1000 &#8364;</option>
	<option value="1500">1500 &#8364;</option>
	<option value="2000">2000 &#8364;</option>
	<option value="3000">3000 &#8364;</option>
	<option value="4000">4000 &#8364;</option>
	<option value="5000">5000 &#8364;</option>
	<option value="6000">6000 &#8364;</option>
	<option value="7000">7000 &#8364;</option>
	<option value="8000">8000 &#8364;</option>
	<option value="9000">9000 &#8364;</option>
	<option value="10000">10000 &#8364;</option>
	<option value="11000">11000 &#8364;</option>
	<option value="12000">12000 &#8364;</option>
	<option value="13000">13000 &#8364;</option>
	<option value="14000">14000 &#8364;</option>
	<option value="15000">15000 &#8364;</option>
	<option value="17500">17500 &#8364;</option>
	<option value="20000">20000 &#8364;</option>
	<option value="25000">25000 &#8364;</option>
</select>
	</td></tr>

	<tr><td>Price up to</td><td>
<select class="field" name="max_price">
	<option value="">----- All prices-----</option>
	<option value="1000">1000 &#8364;</option>
	<option value="1500">1500 &#8364;</option>
	<option value="2000">2000 &#8364;</option>
	<option value="3000">3000 &#8364;</option>
	<option value="4000">4000 &#8364;</option>
	<option value="5000">5000 &#8364;</option>
	<option value="6000">6000 &#8364;</option>
	<option value="7000">7000 &#8364;</option>
	<option value="8000">8000 &#8364;</option>
	<option value="9000">9000 &#8364;</option>
	<option value="10000">10000 &#8364;</option>
	<option value="11000">11000 &#8364;</option>
	<option value="12000">12000 &#8364;</option>
	<option value="13000">13000 &#8364;</option>
	<option value="14000">14000 &#8364;</option>
	<option value="15000">15000 &#8364;</option>
	<option value="16000">16000 &#8364;</option>
	<option value="17000">17000 &#8364;</option>
	<option value="18000">18000 &#8364;</option>
	<option value="19000">19000 &#8364;</option>
	<option value="20000">20000 &#8364;</option>
	<option value="22000">22000 &#8364;</option>
	<option value="25000">25000 &#8364;</option>
	<option value="28000">28000 &#8364;</option>
	<option value="30000">30000 &#8364;</option>
	<option value="35000">35000 &#8364;</option>
	<option value="40000">40000 &#8364;</option>
	<option value="45000">45000 &#8364;</option>
	<option value="50000">50000 &#8364;</option>
	<option value="60000">60000 &#8364;</option>
	<option value="70000">70000 &#8364;</option>
	<option value="80000">80000 &#8364;</option>
	<option value="100000">100000 &#8364;</option>
	<option value="150000">150000 &#8364;</option>
</select>
	</td></tr>

	<tr><td>Engine from:</td><td>
<select class="field" name="min_engine_size">
   <option value="" selected="selected" >----- All  -----</option>
   <option  value="300">300 cc</option>
   <option  value="400">400 cc</option>
   <option  value="500">500 cc</option>
   <option  value="600">600 cc</option>
   <option  value="700">700 cc</option>
   <option  value="800">800 cc</option>
   <option  value="900">900 cc</option>
   <option  value="1000">1000 cc</option>
   <option  value="1100">1100 cc</option>
   <option  value="1200">1200 cc</option>
   <option  value="1300">1300 cc</option>
   <option  value="1400">1400 cc</option>
   <option  value="1500">1500 cc</option>
   <option  value="1600">1600 cc</option>
   <option  value="1700">1700 cc</option>
   <option  value="1800">1800 cc</option>
   <option  value="1900">1900 cc</option>
   <option  value="2000">2000 cc</option>
   <option  value="2250">2250 cc</option>
   <option  value="2500">2500 cc</option>
   <option  value="3000">3000 cc</option>
   <option  value="3500">3500 cc</option>
   <option  value="4000">4000 cc</option>

</select></td></tr>

	<tr><td>Engine up to</td><td>
<select class="field" name="max_engine_size">
   <option value="" selected="selected" >----- All  -----</option>
   <option  value="300">300 cc</option>
   <option  value="400">400 cc</option>
   <option  value="500">500 cc</option>
   <option  value="600">600 cc</option>
   <option  value="700">700 cc</option>
   <option  value="800">800 cc</option>
   <option  value="900">900 cc</option>
   <option  value="1000">1000 cc</option>
   <option  value="1100">1100 cc</option>
   <option  value="1200">1200 cc</option>
   <option  value="1300">1300 cc</option>
   <option  value="1400">1400 cc</option>
   <option  value="1500">1500 cc</option>
   <option  value="1600">1600 cc</option>
   <option  value="1700">1700 cc</option>
   <option  value="1800">1800 cc</option>
   <option  value="1900">1900 cc</option>
   <option  value="2000">2000 cc</option>
   <option  value="2250">2250 cc</option>
   <option  value="2500">2500 cc</option>
   <option  value="3000">3000 cc</option>
   <option  value="3500">3500 cc</option>
   <option  value="4000">4000 cc</option>

</select></td></tr>
<tr><td>Power from</td><td>
<select class="field" name="min_bhp">
<option value="" selected="selected">----- All  -----</option>
<option  value="35">35 bhp</option>
<option  value="50">50 bhp</option>
<option  value="60">60 bhp</option>
<option  value="75">75 bhp</option>
<option value="90">90 bhp</option>
<option  value="100">100 bhp</option>
<option  value="120">120 bhp</option>
<option  value="130">130 bhp</option>
<option  value="150">150 bhp</option>
<option  value="160">160 bhp</option>
<option  value="170">170 bhp</option>
<option  value="180">180 bhp</option>
<option  value="190">190 bhp</option>
<option  value="200">200 bhp</option>
<option  value="250">250 bhp</option>
<option  value="300">300 bhp</option>
<option  value="350">350 bhp</option>
<option  value="400">400 bhp</option>
<option  value="450">450 bhp</option>
</select></td></tr>
<tr><td>Power up to</td><td>
<select class="field" name="max_bhp">
<option value="" selected="selected">----- All -----</option>
<option  value="35">35 bhp</option>
<option  value="50">50 bhp</option>
<option  value="60">60 bhp</option>
<option  value="75">75 bhp</option>
<option value="90">90 bhp</option>
<option  value="100">100 bhp</option>
<option  value="120">120 bhp</option>
<option  value="130">130 bhp</option>
<option  value="150">150 bhp</option>
<option  value="160">160 bhp</option>
<option  value="170">170 bhp</option>
<option  value="180">180 bhp</option>
<option  value="190">190 bhp</option>
<option  value="200">200 bhp</option>
<option  value="250">250 bhp</option>
<option  value="300">300 bhp</option>
<option  value="350">350 bhp</option>
<option  value="400">400 bhp</option>
<option  value="450">450 bhp</option>
</select></td></tr>

	<tr><td>Km from</td><td>
<select class="field" name="min_km">
<option value="" selected="selected" >----- All-----</option>
 <option  value="0">0 km</option>
<option  value="5000">5000 km</option>
<option  value="10000">10000 km</option>
<option  value="15000">15000 km</option>
<option  value="20000">20000 km</option>
<option  value="30000">30000 km</option>
<option  value="40000">40000 km</option>
<option  value="50000">50000 km</option>
<option  value="60000">60000 km</option>
<option  value="70000">70000 km</option>
<option  value="80000">80000 km</option>
<option  value="90000">90000 km</option>
<option  value="100000">100000 km</option>
<option  value="125000">125000 km</option>
<option  value="150000">150000 km</option>
<option  value="175000">175000 km</option>
<option  value="200000">200000 km</option>
<option  value="300000">300000 km</option>
<option  value="400000">400000 km</option>
<option  value="500000">500000 km</option>
</select></td></tr>

	<tr><td>Km up to</td><td>
<select class="field" name="max_km">
<option value="" selected="selected" >----- All -----</option>
 <option  value="0">0 km</option>
<option  value="5000">5000 km</option>
<option  value="10000">10000 km</option>
<option  value="15000">15000 km</option>
<option  value="20000">20000 km</option>
<option  value="30000">30000 km</option>
<option  value="40000">40000 km</option>
<option  value="50000">50000 km</option>
<option  value="60000">60000 km</option>
<option  value="70000">70000 km</option>
<option  value="80000">80000 km</option>
<option  value="90000">90000 km</option>
<option  value="100000">100000 km</option>
<option  value="125000">125000 km</option>
<option  value="150000">150000 km</option>
<option  value="175000">175000 km</option>
<option  value="200000">200000 km</option>
<option  value="300000">300000 km</option>
<option  value="400000">400000 km</option>
<option  value="500000">500000 km</option>
</select></td></tr>

	<tr><td>Year from</td><td>
<select class="field" name="min_date">
	<option value="" selected="selected" >----- All -----</option>
	 <option  value="1900">1900</option>
     <option  value="1960">1960</option>
     <option  value="1965">1965</option>
     <option  value="1970">1970</option>
     <option  value="1975">1975</option>
     <option  value="1980">1980</option>
     <option  value="1985">1985</option>
     <option  value="1990">1990</option>
     <option  value="1991">1991</option>
     <option  value="1992">1992</option>
     <option  value="1993">1993</option>
     <option  value="1994">1994</option>
     <option  value="1995">1995</option>
     <option  value="1996">1996</option>
     <option  value="1997">1997</option>
     <option  value="1998">1998</option>
     <option  value="1999">1999</option>
     <option  value="2000">2000</option>
     <option  value="2001">2001</option>
     <option  value="2002">2002</option>
     <option  value="2003">2003</option>
     <option  value="2004">2004</option>
     <option  value="2005">2005</option>
     <option  value="2006">2006</option>
     <option  value="2007">2007</option>
     <option  value="2008">2008</option>
     <option  value="2009">2009</option>
     <option  value="2010">2010</option>
     <option  value="2011">2011</option>

	</select></td></tr>

	<tr><td>Year up to</td><td>
<select class="field" name="max_date">
	<option value="" selected="selected" >----- All -----</option>
	 <option  value="1900">1900</option>
     <option  value="1960">1960</option>
     <option  value="1965">1965</option>
     <option  value="1970">1970</option>
     <option  value="1975">1975</option>
     <option  value="1980">1980</option>
     <option  value="1985">1985</option>
     <option  value="1990">1990</option>
     <option  value="1991">1991</option>
     <option  value="1992">1992</option>
     <option  value="1993">1993</option>
     <option  value="1994">1994</option>
     <option  value="1995">1995</option>
     <option  value="1996">1996</option>
     <option  value="1997">1997</option>
     <option  value="1998">1998</option>
     <option  value="1999">1999</option>
     <option  value="2000">2000</option>
     <option  value="2001">2001</option>
     <option  value="2002">2002</option>
     <option  value="2003">2003</option>
     <option  value="2004">2004</option>
     <option  value="2005">2005</option>
     <option  value="2006">2006</option>
     <option  value="2007">2007</option>
     <option  value="2008">2008</option>
     <option  value="2009">2009</option>
     <option  value="2010">2010</option>
     <option  value="2011">2011</option>

	</select></td></tr>
	<tr><td>
	Color
	</td><td>
	 <select name="color" id="color">
  <option value="">All Colors</option>
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
</select></td></tr>

	<tr><td><input class="field" type="submit" name="submit"></td>
	    <td><input type="reset" class="field" name="reset"></td>
	</tr>

	</table>
	</fieldset>
</form>

</div></div>
<!-- ============================================================================== -->
<div id="footer"> Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   <div id="mailme">
<a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
</div>
	</div>
</div>
</body>
</html>
