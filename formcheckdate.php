<?php
function CHECKDATEFORM(){
    // css design
    echo "<style> body {background-color:rgba(129, 172, 238, 0.596); margin: 60px; line-height: 1.5em;}</style>";
    echo "<body>";
    echo "<br/>";
    echo "<h4 style=\" color: blue; text-indent: 150px;\";>CHECKDATE FORM</h4>";
    echo "<br/>";					
    echo "<form id=\"form1\" method=\"post\" action=\"datevalidation.php\" >";
    echo "<table style=\"width:500px\">";
    echo "<tr>"; 
    // Input month
    echo "<th style=\" text-align: right;\";><label for=\"givemonth\">Enter the MONTH </label><th/>"; 
    echo "<th><input id=\"inputtext1\" type=\"number\" name=\"formmonth\" placeholder=\"2 digits => 1 to 12\" required=\"required\"><th />"; 
    echo "<tr  />";
    // Input day
    echo "<tr>";
    echo "<th style=\" text-align: right;\";><label for=\"giveday\">Enter the DAY </label><th/>"; 
    echo "<th><input id=\"inputtext2\" type=\"number\" name=\"formday\" placeholder=\"2 digits => 1 to 31\" required=\"required\"><th />"; 
    echo "<tr/>";
    // Input year
    echo "<tr>";
    echo "<th style=\" text-align: right;\";><label for=\"giveyear\">Enter the YEAR </label><th/>"; 
    echo "<th><input id=\"inputtext3\" type=\"number\" name=\"formyear\" placeholder=\"4 digits => YYYY\" required=\"required\"><th />"; 
    echo "<tr />";
    //making alittle space
    echo "<tr>";
    echo "<th><br/><th/>"; 
    echo "<th><br/><th />"; 
    echo "<tr />";
    // Send form
    echo "<tr>";		
    echo "<th><input id=\"inputsubmit1\" type=\"submit\" name=\"login\" value=\"CHECK DATE\" /><th/>"; 
    echo "<tr/>";
    echo "</table>";
    
  
    echo "</form>"; 
    // logout 
    echo "<p style=\"text-indent: 220px;\";>To end your session, <a href=\"script.php\" style=\" color: red;\"> sing-out<a /></p>";	
    echo "<body/>";
}

?>
