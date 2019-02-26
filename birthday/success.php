<?php
session_start();
	unset($_SESSION["day"]);
	unset($_SESSION["mon"]);
	unset($_SESSION["year"]);
	if ($_GET["calc"] == 1)
{
	echo "<center>
	<div style='background:#DED2BC; width: 60%; padding:5px 0px; margin-top:10%;'>
	<h1 style='color:#0000FF; font-size:270%;'>ეს დღეა - \"".$_SESSION["result"]."\"</h1>
	</div>
	</center>";
	echo "<center><br/>გსურთ სხვა თარიღის გამოთვლა?&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php' style='color:#FF0000; font-size:120%;'>დაბრუნდით უკან </a></center>";
	
}
?>