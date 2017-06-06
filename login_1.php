 <?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
	 $hostname="student-db.cse.unt.edu";  
	$user="kcs0139";
	$count=0;
	$pwd="kcs0139";
	
  $nameErr= $uname = $passErr = $pwd1 = "";
	  
	if($database=mysql_connect($hostname,$user,$pwd))
	{
		
		$conn=mysql_select_db("kcs0139");
		
        		//echo 'Username and Password Found';
				
		 if (empty($_POST["username"])) {
				$nameErr = "Username is required";
		} else {
					$uname = $_POST["username"];
					
					$result=mysql_query("select Password from user where UserName='$uname'");
					
					$row=mysql_fetch_assoc($result);
					
					$passw= $row['Password'];
					
					$result1=mysql_query("select FirstName from user where UserName='$uname'");
		
					$row1=mysql_fetch_assoc($result1);
					$fname=$row1['FirstName'];
					session_start();
					$_SESSION['username1']=$uname;		
					$_SESSION['firstname']=$fname;
					
					if (empty($_POST["password"])) {
							$passErr = "Password is required";
					} else {
						$pwd1= $_POST["password"];
						
							if(strcmp($pwd1,$passw)== 0){
								session_start();
								$_SESSION['user_email'] = true;
								header("Location:test.php");
								mysql_close($database);
							}
							else{
								$passErr = "username or password is wrong";
							}
						}	
				}			
		
		
		
				
			
				
			
				
			
		
		

		
	}
  }
  
  
  
  

?>
