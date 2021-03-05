<?php
session_start();

echo "<style> body {background-color:rgba(129, 172, 238, 0.596); margin: 60px;}</style>";
echo "<body>";
echo "<h4>SIGN-IN</h4>";
echo "<p> please fill this form to connect your account ";					
echo "<form id=\"form2\" method=\"post\" action=\"preparedstatementsForLogin.php\" >"; 
// Input Username
echo "<label for=\"username2\">Username</label>\n"; 
echo "<input id=\"inputtext1-2\" type=\"text\" name=\"username2\" placeholder=\"Your username\">\n"; 
echo "<br/><br />";
// Input pass word
echo "<label for=\"password2\">Password</label>\n"; 
echo "<input id=\"inputtext2-2\" type=\"text\" name=\"password2\" placeholder=\"Your password\">\n"; 
echo "<br /><br />";
// Send form		
echo "<input id=\"inputsubmit2\" type=\"submit\" name=\"sign_in_submitted\" value=\"SUBMIT\" />\n"; 
echo "</form>"; 
echo "<br /><br />";
echo "<p>if you don't have an account, <a href='./sign-up.php' style=\" color: red;\"> sing-up</a></p>";
//===  reading the logout message returned from logout from another page 
if(isset($_SESSION['test']) && !empty($_SESSION['test'])){
    echo $_SESSION['test'];
    }
session_destroy();  // deleting logout message clean for new log in
echo "<br /><br/>";
echo "<hr>";
echo "<p >this applicatio is created by YASHAR AKISH | 1730177 | June 2020</p>";
echo "WEB SERVER APPLICATIONS DEVELOPMENT I | 420-DW3-AS";
echo "<body/>";
?>