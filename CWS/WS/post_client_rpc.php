<html>
<head><link href="../CSS/css.css" rel="stylesheet" type="text/css" />
    	<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="jquery.selectboxes.js"></script>
		<script type="text/javascript" src="jquery.selectboxes.min.js"></script>
		<script type="text/javascript" src="jquery.selectboxes.models.js"></script>
			<script type="text/javascript" >

		function populateCarVariety() {
   var klopi=$('#maker option:selected').val();
$("#model").ajaxAddOption("car-varities.php",{"maker" : klopi}, false);
}

   $(document).ready(function() {
   populateCarVariety();
   	$("#buttons").slideDown("slow");
	$("#buttons").css({display:"block"});
	$('#maker').change(function() {
	$("#model").removeOption(/./);
	$("#model").addOption2(null, "All Models");
	$("#models").slideDown("slow");
	$("#models").css({display:"block"});
		populateCarVariety();
	});
	
	$(".color").change(function(){

	});
	
	$('#model').change(function(){
	$('.prices').slideDown("slow");
	$('.prices').css({display:"block"});
	$('.km').css({display:"block"});
	$('.color').css({display:"block"});
	});
});
</script>
		
</head>
<body>
	<div id="wrap">
	<div id="header"><h2>...Car Web Services</h2><h1>C.W.S.</h1>
									
					</div>
					
	<div id="header2"><ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="search.php">Search</a></li>
						<li><a href="post_client_rpc.php">Xml Rpc Client</a></li>
				</ul>
		</div> 
			<div id="main"><center>
		<form id="myform" action="client_rpc.php" method="GET">
    
    <div id="makers">    <b>maker :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="maker" id="maker"  size="0">
	<option value=" " selected="selected" disabled="disabled">All car manifacturers</option>
		<?php

		$con=mysql_connect("localhost", "root","");
		mysql_select_db("cws");
		
		$sql="SELECT * FROM makers";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result))
	{
	echo "<option value=".$row[0].">".$row[1]."</option>"."<br/>";
	}
		?>
    </select></div>
    <div id="models">
  <b>model :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select name="model" id="model">
	<option value="" selected="selected" >All Models</option>
    </select></div>
	<div class="prices"><b>prices  (euro) :</b>
		min
		<select name="min_pr" id="min_pr">
		<option value="" selected="selected">All prices</option>
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
		max
		<select name="max_pr" id="max_pr">
		<option value="" selected="selected">All Prices</option>
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
	</div>
	<div class="prices"><b>engine size :</b>
		min
		<select name="min_eng" id="min_eng">
		<option value="" selected="selected">All Values</option>
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
		</select>
		max
		<select name="max_eng" id="max_eng">
		<option value="" selected="selected">All Values</option>
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
		</select>
	</div>
	<div class="prices"><b>horse power :</b>	
	min
	<select name="min_power" id="min_power">
	<option value="" selected="selected">All Values</option>
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
	
	</select>

max
	<select name="max_power" id="max_power">
	<option value="" selected="selected">All Values</option>
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
	
	</select>
	</div>
		<div class="prices"><b>km runned :</b>	
		min
		<select name="min_km" id="min_km">
		<option value="" selected="selected">All Values</option>
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
		</select>
		
max
	<select name="max_km" id="max_km">	
<option value="" selected="selected">All Values</option>
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
	
	</select>
		</div>
		
<div class="prices"><b>year bought :</b>	
min
<select name="min_year" id="min_year">
		<option value="" selected="selected">All Values</option>
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
		
</select>		
max
<select name="max_year" id="max_year">
		<option value="" selected="selected">All Values</option>
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
		
</select>		
</div>	
<div class="prices"><b>color :</b>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name="color" id="color" >	
<option value="" selected="selected">All Colors</option>
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
</div>
  
	 <div id="buttons">
	<input type="submit" value="search">
	
	</div>
</form></center>
	  </div>

<div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy   </div>
			</div>

</body>
</html> 