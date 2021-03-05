<?php
echo "<style> body {background-color:rgba(129, 172, 238, 0.596); margin: 60px; line-height: 1.5em;}</style>";
// calling required functions
include("common.php");
	// storing user's inputs
if (isset($_POST["sign_up_submitted"])) 
{
	$un = $_POST["username"];
	$username = sanitizeString(trim($un)); 
    $password = trim($_POST["password"]);
	$confirmPassword = trim($_POST["confirmPassword"]);

	$user_list = array(array($username, $password));
}

//----------------------------empty fields
if (preg_match("/\\s/", $un))   // checkin if string contain white space
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Username must be one word. <a href='./sign-in.php'>Try again!</a></p>";
}
elseif($username == "" && $password == "" && $confirmPassword == "")	//	if inputs fields are empty
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Username and Password cannot be empty. <a href='./sign-up.php'>Try again!</a></p>";
}
elseif($username == "")	// if username is empty
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Username cannot be empty.  <a href='./sign-up.php'>Try again!</a></p>";
}
elseif($password == "" || $confirmPassword == "")	// 	if password fields are empty
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>Your Password cannot be empty.  <a href='./sign-up.php'>Try again!</a></p>";
}
elseif($confirmPassword != $password)	// if password and confirmation are different
{
	echo "<br/><br/><p style=\" color: red; text-indent: 50px;font-size: 20px;\";>You entered 2 different passwords. <a href='./sign-up.php'>Try again!</a></p>";
}
else
{
	//++++++++++++++++++++++++++
	require_once 'mylogin.php';	// redeading connection information to connect to database
		//		craeting connection to sql
	$mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database);

	//==========================
	if ($mysqli === false) 	// error to connection
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	//==========================
	//	checking if username exist 
	$sql = "SELECT * FROM site_users WHERE user_name = '".$username."'";

	if ($result = $mysqli->query($sql)) 
	{
		if(mysqli_num_rows($result)>=1)
		{	// username exist
			echo "<br/><br/> <p style=\" color: red; text-indent: 50px;font-size: 20px;\";>This account already exists. <a href='./sign-up.php'>Try again!</a><p/>";
		}
		else
		{	//	successfull accout creation
			$sql = "INSERT INTO site_users (user_name,user_password) VALUES(?,?)";

			if ($stmt = $mysqli->prepare($sql)) 
			{
				foreach ($user_list as $s) 
				{
					$stmt->bind_param('ss', $s[0], $s[1]);

					if ($stmt->execute()) 
					{		//successfully new account
						echo "<br/><br/> <p style=\" color: green; text-indent: 50px;font-size: 20px;\";>Your account was successfully created. Welcome! <br /><p/>";
						echo "<button type=\\button\\><a href='./sign-in.php'>sing-in</a></button>";
					} 
					else 
					{
						echo "ERROR: Could not execute query: $sql. " . $mysqli->error;
						echo "<a href='./sign-up.php'>Try again!</a>";
					}
				}
			}
			else 
			{
				echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
			}
		}
	}
	else 
	{
		echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
	}
	$mysqli->close();	//closing the connection
} 
?>