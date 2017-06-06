<?php 
 session_start();
    //session_destroy();
    //unset($_SESSION);
    //session_regenerate_id(true); 
	

// CLEAR THE INFORMATION FROM THE $_SESSION ARRAY
$_SESSION = array();

// IF THE SESSION IS KEPT IN COOKIE, FORCE SESSION COOKIE TO EXPIRE
if (isset($_COOKIE[session_name()]))
{
   $cookie_expires  = time() - date('Z') - 3600;
   setcookie(session_name(), '', $cookie_expires, '/');
}

// TELL PHP TO ELIMINATE THE SESSION
session_destroy();
	  header("Location:index.php");
?>
			
			