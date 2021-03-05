<?php
echo "<style> body {background-color:rgba(129, 172, 238, 0.596); margin: 60px;}</style>";
echo "<body>";
echo "<h4>SIGN-UP</h4>";
echo "<p> please fill this form to create anew account ";					
echo "<form id=\"form1\" method=\"post\" action=\"preparedstatements.php\" >"; 
// Input Username
echo "<label for=\"usernametext\">Username</label>\n"; 
echo "<input id=\"inputtext1\" type=\"text\" name=\"username\" placeholder=\"choose a username\">\n"; 
echo "<br/><br />";
// Input password
echo "<label for=\"passwordtext\">Password</label>\n"; 
echo "<input id=\"inputtext2\" type=\"text\" name=\"password\" placeholder=\"choose a password\">\n"; 
echo "<br/><br />";
// Confirm password
echo "<label for=\"confirmPasswordtext\">Password</label>\n"; 
echo "<input id=\"inputtext3\" type=\"text\" name=\"confirmPassword\" placeholder=\"confirm password\">\n"; 
echo "<br /><br />";
// Send form		
echo "<input id=\"inputsubmit1\" type=\"submit\" name=\"sign_up_submitted\" value=\"SUBMIT\" />\n"; 
echo "</form>"; 
echo "<br /><br />";
echo "<p>if you already have an account, <a href='./sign-in.php' style=\" color: red;\"> sing-in</a></p>";
echo "<body/>";
?>