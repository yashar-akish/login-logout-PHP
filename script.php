<?php       // creating logout message from loging out from another page
session_start();
$_SESSION['test'] = "<br/><p style=\" margin-top: 30px; color: deepPink; text-indent: 260px;font-size: 35px;\";>\"You are successfully disconnected. Bye!\"</p><br/>";
Header( 'Location: sign-in.php');
?>