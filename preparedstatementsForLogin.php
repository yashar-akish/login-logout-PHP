<?php
echo "<style> body {background-color:rgba(129, 172, 238, 0.596); margin: 60px; line-height: 1.5em;}</style>";
include("common.php");
//  ======  storing user's inputs
if (isset($_POST["sign_in_submitted"])) 
{
    $un = $_POST["username2"];
    $username = sanitizeString(trim($un)); 
    $password = trim($_POST["password2"]);
    
	$user_list = array(array($username, $password));
}

//----------------------------empty fields
if (preg_match("/\\s/", $un))   // checkin if string contain white space
{
    echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Username must be one word. <a href='./sign-in.php'>Try again!</a></p>";
}
elseif($username == "" && $password == "")  //  chacking empty inputs
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Username and Password cannot be empty. <a href='./sign-in.php'>Try again!</a></p>";
}
elseif($username == "") // empty input if it is just username
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Username cannot be empty.  <a href='./sign-in.php'>Try again!</a></p>";
}
elseif($password == "") // empty input if it is just password
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Password cannot be empty.  <a href='./sign-in.php'>Try again!</a></p>";
}
else    //  if pssed last chicking connect to sql and check with sql
{
	
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	require_once 'mylogin.php';
    //  starting connection to sql
	$mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    //=================================================================================================
	if ($mysqli === false)  // problem with connection to sql
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
    //==================================================================================================
        //  ====    sql qeuries
    //  calling usernames and passwords to check entered is right
    $sql = "SELECT * FROM site_users WHERE user_name = '".$username."' AND user_password = '".$password."'";
    $result = $mysqli->query($sql);
    //  calling password from username to chack password is correct
    $sqlP = "SELECT user_password FROM site_users WHERE user_name = '".$username."'" ;
    $resultP = $mysqli->query($sqlP);
    //  checking username exist
    $sqlUU = "SELECT user_name FROM site_users WHERE user_name = '".$username."'" ;
    $resultUU = $mysqli->query($sqlUU);

    if ($result = $mysqli->query($sql))
    {
        if(mysqli_num_rows($result)>=1) // username and password is correct
	    {
            // correct username and password
            echo "<p style=\" font-size: 35px; color: green; text-indent: 70px;\";>Hello $username </p>";
            echo "<br/>";
            echo " <p style=\" font-size: 30px; color: red; text-indent: 100px;\";>You are successfully connected. Welcome back!</p>";
            echo "<br/>";
            echo "<br />";
            echo "<p style=\" font-size: 25px; color: blue; text-indent: 160px;\";>you will redirect to Checkdate form after <b>\" 5 \"</b> seconds . <br/></p>";
            echo "<p style=\" font-size: 25px; color: blue; text-indent: 160px;\";>wait please!</p>";
            // calling dataform page from redirect
            header('Refresh: 5; url=redirect.php');
        }
        else
        {   //  if username or password is not correct
            if($resultUU = $mysqli->query($sqlUU))
            {
                if(mysqli_num_rows($resultUU)==0)
	            {   //  wrong username
                    echo "<br/><br/> <p style=\" color: red; text-indent: 50px;font-size: 30px;\";>”You entered a wrong username!”. <a href=./sign-in.php > Try again!</a><p/>";
                }
                else
                {
                    if($resultP = $mysqli->query($sqlP))
                    {
                        if(mysqli_num_rows($resultUU)>=1 && $password!=$resultP)
                        {   //  username exist but password in not correct
                            echo "<br/><br/> <p style=\" color: red; text-indent: 50px;font-size: 30px;\";>”You entered a wrong password!”. <a href=./sign-in.php > Try again!</a><p/>";
                        }
                    }
                    else
		            {   // error in result of select query
			            echo "ERROR: Could not execute $sqlP. " . $mysqli->error;
		            }
                }
            }
            else
		    {   // error in result of select query
			    echo "ERROR: Could not execute $sqlUU. " . $mysqli->error;
		    }
        }
    } 
    else 
    {   // error in result of select query
        echo "ERROR: Could not execute $sql. " . $mysqli->error;
    }	
    $mysqli->close();       //  closing the connection
}

?>