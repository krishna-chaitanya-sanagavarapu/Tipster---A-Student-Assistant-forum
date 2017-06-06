<?php
try
{
session_start();
	$username1=$_SESSION['username2'];
	
	$abt=$_SESSION["about"];
	$exp=$_SESSION["experience"];
	$hostname="student-db.cse.unt.edu";
	$user="kcs0139";
	$count=0;
	$pwd="kcs0139";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("kcs0139");
	echo 'Username and Password Found';
				
		
		
		$result=mysql_query("INSERT INTO experience (About, Exp, Username) VALUES ('$abt','$exp','$username1');");
		//$result=mysql_query("INSERT INTO g_questions (Username, questions) VALUES ('$username1','$question');");
		
		header("Location:Home_page.php");
		
	}
	else{
			throw new exception("Connection not created");
		}
}

catch(Exception $ex)
{
	echo $ex->getmessage();
}

?>