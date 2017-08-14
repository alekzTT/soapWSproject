<?php include('../functions/fun.php'); ?>
<html>
<head>
  <meta charset="UTF-8" />
  <link href="../css.css" rel="stylesheet" type="text/css" />
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrap">
<?php getHeader(); ?>

<div id="main">
<div id="main_left"><h3>Car Classifieds</h3>
<ul>
	<li>Search</li>
	<li>Add</li>
	<li>classifieds Management </li>
</ul>

<br/>
<p><b>Login</b> to manage your classifield</p>
<ul>
	<li>Automobile's image upload</li>
	<li>Delete Classifield</li>
</ul>
<br/>

<div id="login" class="image">
<form action="../private/login.php" method="post" class="loginform">
  <h2>Login</h2>
  <span id="sprytextfield1">
  <p>Owner Code</p>
  <input type="text" name="user" id="user">

  <span class="textfieldRequiredMsg"><img src="../images/rror.png" width=18 height=18></span></span>
  <span id="sprytextfield2">

  <p>Classifield code</p>
  <input type="text" name="pass" id="pass">

  <span class="textfieldRequiredMsg"><img src="../images/rror.png" width=18 height=18><br/></span></span>
  <input type="image" name="myclicker" src="../images/button1.jpg" style="width:120px;"  >
<!-- <input type="submit" name="submit" title="submit" />            -->
</form>
</div>

</div>
<div id="main_right"><br/>
<h3>Free listing of used car classifieds.</h3><br/>
<p>This website is created for academic purposes to study the use and the technology of Web Services.</p>
<p>The main theme is "advanced search engines for classifieds".</p>
<p>On this site we can import classifieds about used cars and search for the ad are looking for.</p>
<p>This functions take place Locally using MySql platform on our server.</p>
<p>Our goal is to provide information to other search engines such as<b> C.W.S.</b>
</b>using<b> XML and Web Services technology</b></p>
<p>This Site also provides Services  for a desktop app  and  a mobile app that use ".net framework 4" and ".net framework 3.5 compact" respectively.</p>

<p>Also we have the problem of the double submit at this site using only php, this problem is solved at C.W.S. search engine using Ajax and Jquery.</p>
<!-- Links====================================================    -->
<div id="tags">
  <div class="tag" style="padding-top:45px;">
     <span class="een" style="margin-left:5px;"><b> Open CWS </b></span>
  <a href ="../../cws" style="background-color:white; width:150px; height=60px;"><img src="../images/cws.png" width="150" height="60" style="margin-top:16px;"></a></div>
  <div class="tag" style="padding-top:75px;">
     <span class="lue" style="margin-left:5px;"><b> See WSDL of service </b></span>
  <a href="../../ws/carws.php" style="background-color:white; width:150px; height=60px;"><img src="../images/soap.png" width="150" height="60" style="margin-top:16px;"></a></div>
  <div class="tag" style="padding-top:105px;">
     <span class="nge" style="margin-left:5px;"><b> See Xml - RPC </b></span>
  <a href="../../ws-rpc" style="background-color:white; width:150px; height=60px;"><img src="../images/xmlrpc.png" width="150" height="60" style="margin-top:16px;"></a></div>
  <div class="tag" style="padding-top:135px;">
     <span class="ed" style="margin-left:5px;"><b> Download Apps </b></span>
  <a href="../../apps/" style="background-color:white; width:150px; height=60px;"><img src="../images/app.png" width="150" height="60" style="margin-top:16px;"></a></div>
  </div>
<!-- Links====================================================    -->

</div>
</div>
<!-- TODO replace footer with function..
   <div id="footer">Graduation project of  Tecnological Educational Institute of "Serres" Greece  &copy	<div id="mailme">
    <a href="mailto:alekz.th@gmail.com" title="mail me" >mail me</a>
    </div>
  </div>
-->
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>
