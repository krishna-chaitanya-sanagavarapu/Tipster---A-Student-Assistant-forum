<?php

try
{
	
session_start();
	$temp=$_POST['item'];
	$answer=clean($_POST['answer']);
	$username1=$_SESSION['username2'];
	$question=$_POST["question"];
	$hostname="student-db.cse.unt.edu";
	$user="kcs0139";
	$count=0;
	$pwd="kcs0139";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("kcs0139");

				
		
		$result=mysql_query("SELECT ID FROM question WHERE Question = '$temp'");
		$row=mysql_fetch_assoc($result);
		$id=$row['ID'];
		
		
		$result1=mysql_query("INSERT INTO answers (Q_Id,Answer,Username) VALUES ('$id','$answer','$username1');");
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
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 $string = str_replace('-', ' ', $string);
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
?>