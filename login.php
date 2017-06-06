<?php
try
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$hostname="student-db.cse.unt.edu";
	$user="kcs0139";
	$count=0;
	$pwd="kcs0139";
	if($database=mysql_connect($hostname,$user,$pwd))
	{
		$conn=mysql_select_db("kcs0139");
		$result=mysql_query("select * from user where UserName='$username' and Password='$password'");
		while($row=mysql_fetch_row($result))
			$count++;
		if($count>0)
		{
		session_start();
		$_SESSION['username1']=$username; 
        		echo 'Username and Password Found';
				if(strcmp($username,"admin")== 0){
					header("Location:form_event.php");
				mysql_close($database);
			}
			else{
				header("Location:Home_page.php");
				mysql_close($database);
			}
				
			
		}
		

		else{
			throw new exception("Please enter a valid Username and Password");
		}
	}
}
catch(Exception $ex)
{
	echo $ex->getmessage();
}

?>