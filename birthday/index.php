<?php
session_start();
if(!empty($_POST["day"]) && !empty($_POST["year"])){
		
		$day = htmlspecialchars($_POST["day"]);
		$mon = htmlspecialchars($_POST["mon"]);
		$year = htmlspecialchars($_POST["year"]);
		
		$_SESSION["day"] = $day;
		$_SESSION["mon"] = $mon;
		$_SESSION["year"] = $year;
		$_SESSION["result"] = $result;
		
		if ( !is_numeric($_SESSION["mon"]))
				echo "<center><h3 style='color:#FF0000;'>გთხოვთ თვე შეიყვანოთ რიცხვის სახით!</h3></center>";
		elseif	($year<1 || $year>9999 || $mon<1 || $mon>12 || $day<1 || $day>31)
		echo "<center><h2 style='color:#FF0000;'>არაკორექტული მონაცემებია!</h2></center>";
		else{
			
				function getDay($day, $mon, $year)
				{
					 $d =$day;  $m =$mon; $y=$year;
					 $month=array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$days= array( "ორშაბათი", "სამშაბათი", "ოთხშაბათი", "ხუთშაბათი", "პარასკევი", "შაბათი", "კვირა");
$r0=2;

 
 $y0=2015; $m0=12; $d0=7; // Monday
 
 $s=0; $s=$s+$d0-1; 
 
 if ($y0%4>0 || $y0%100==0 && $y0%400>0) $month[2]=28;
                                 else $month[2]=29;
 for ($im=$m0-1; $im>=1; $im--)
  $s=$s+$month[$im];
                              
 for ($iy=$y0-1; $iy>=1; $iy--)
  if ($iy%4>0 || $iy%100==0 && $iy%400>0) $s=$s+365;
                                  else $s=$s+366;
 
 $s=$s%7;
 if ($s>0) $s=7-$s;
 
 
 for ($iy=1; $iy<$y; $iy++) 
  if ($iy%4>0 || $iy%100==0 && $iy%400>0) $s=$s+365;
                                  else $s=$s+366;
 
 if ($y%4>0 || $y%100==0 && $y%400>0) $month[2]=28;
                              else $month[2]=29;
 
 for ($im=1; $im<$m; $im++)
  $s=$s+$month[$im];
 
 $s=$s+$d-1;
 $r=$s%7;
return $days[$r];
				}			
			}
				$result = getDay($day, $mon, $year);
				//echo "<center>";
				if (isset($_POST["calc"])){
				$_SESSION["result"] = $result;	

				//print_r ($_POST);			
				header("Location: success.php?calc=1");		
				}
		}
	else echo "<center><h2 style='color:#FF0000;'>გთხოვთ შეავსოთ ყველა ველი!</h2></center>";
		
?>

  <!DOCTYPE html>
<html>
<head>
<title>კვირის დღე</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	    <style>
		body{ background: #DED2BC;}
		#calendar{background:#BAB082; width: 60%; padding:5px 0px;}
		h1{color:#FF1956;}
		h2{font-size:170%;}
		p{font-size:160%;}
		p input{background:#DED2BC; color:#0000FF;; font-size:140%; width: 60%; text-align:center;}
		</style>    
</head> 

<body >


<div id="wrap">
   
    <center>
  
    
		<h1>თარიღის მიხედვით კვირის დღეების გამოთვლა</h1>
	
            <div id="calendar">           
                <form action="index.php" method="post">
				
				<p><label> რიცხვი:<br /><input type="text" name="day" value= "<?php echo $_SESSION["day"]; ?>"/></label></p>
				<p><label>თვე:<br /><input type="text" name="mon" value= "<?php echo $_SESSION["mon"]; ?>"/></label></p>
				<p><label>წელი:<br /><input type="text" name="year" value= "<?php echo $_SESSION["year"]; ?>"/></label></p>
                
               
               
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="calc" value="გამოთვალე">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--<input type="reset" name="reset" value="გაასუფთავე">--></p>
                </form>
             </div>                
                   
		
    </center>
  
</div>

</body>
</html>