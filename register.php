<?php
try
{
	
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$address=$_POST["department"];
	$untid=$_POST["untid"];
	$username=$_POST["euid"];
	$password=$_POST["password"];
	$hostname="student-db.cse.unt.edu";
	$user="kcs0139";
	$count=0;
	$pwd="kcs0139";
	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("kcs0139");
		
		$result=mysql_query("INSERT INTO user (FirstName,LastName,Department,UntId,UserName,Password) VALUES ('$firstname','$lastname','$address','$untid','$username','$password');");
		
		header("Location:index.html");
		
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