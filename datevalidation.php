<?php   
//====		validating the date form inputs 

include("common.php");	// calling function pages 
	// storing data inputs 
	$yourmonth = trim($_POST["formmonth"]);
	$yourday = trim($_POST["formday"]);
	$youryear = trim($_POST["formyear"]);	

	// converting to string 
	$user_date = strtotime("$yourday-$yourmonth-$youryear");
	$today_date = strtotime(date("d F y"));
	$diff_date = ($today_date - $user_date)/60/60/24;
	$dayform=" ";
	if ($diff_date < 2)
	{
		$dayform="day";
	}
	else
	{
		$dayform="days";
	}
	echo "<h4>CHECKDATE FORM RESULT</h4>";	
	if (checkdate($yourmonth, $yourday, $youryear))
	{			// valid date
		echo "<style> body {background-color:rgba(129, 172, 238, 0.596); margin: 60px; line-height: 1.5em;}</style>";
		echo "The date entered is <b>valid</b>. <br />"; 
	    echo "The date entered is <b>" . date('F d, Y', mktime(0,0,0,$yourmonth,$yourday,$youryear)). "</b>.<br />";
		echo "Today is <b>". date("F d, Y"). "</b>.<br />";
		echo "There are <b>" . $diff_date . " " . $dayform . "</b> between " . date("F d, Y"). " and " . date('F d, Y', mktime(0,0,0,$yourmonth,$yourday,$youryear)). ".";
		echo "<br/>";
		echo "<br />";
			// logout
		echo "<p >To end your session, <a href=\"script.php\" style=\" color: red;\"> sing-out<a /></p>";
	}
	else 
	{		// invalid date
		echo "<style> body {background-color:rgba(129, 172, 238, 0.596); margin: 60px; line-height: 1.5em;}</style>";
		echo "The date entered is invalid. <br />Try again!";
		echo "<br />";
		// logout
		echo "<p >To end your session, <a href=\"script.php\" style=\" color: red;\"> sing-out<a /></p>";
	}
?>
