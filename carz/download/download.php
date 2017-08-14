<?php 

$conn = ftp_connect("www.alekz.eu") or die("Could not connect");
ftp_login($conn,"user@alekz.eu","user");

//echo ftp_get($conn,"coolcars.sql","coolcars.sql",FTP_ASCII);
//echo "<html><body>";
//echo ftp_size($conn,"coolcars.sql");

//echo "</body></html>";
//header("Location:../index.html");
ftp_close($conn);

?>