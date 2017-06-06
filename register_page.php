<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist\css\bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
  <style>
.error {color: #FF0000;}
.logo {font-weight:bold;font-size: 180%;}

</style>
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
  <?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
	 $hostname="student-db.cse.unt.edu";  
	$user="kcs0139";
	$count=0;
	$pwd="kcs0139";
	
  $nameErr= $uname = $passErr = $pwd1 = $lname = $lnameerr = $euid = $euiderr = $uid = $uiderr = $dept = $depterr = "";
  $ename= $epass=$elname=$eeuid=$edept=$eid=$addr=$city=$state=$zip=$pno="";
	  
	if($database=mysql_connect($hostname,$user,$pwd))
	{
		
		$conn=mysql_select_db("kcs0139");
		
        		//echo 'Username and Password Found';
		
		if (!empty($_POST["address"])) {
				$addr = $_POST["address"];
		}
		if (!empty($_POST["city"])) {
				$city = $_POST["city"];
		}
		if (!empty($_POST["state"])) {
				$state = $_POST["state"];
		}
		if (!empty($_POST["zip"])) {
				$zip = $_POST["zip"];
		}
		if (!empty($_POST["phonenumber"])) {
				$pno = $_POST["phonenumber"];
		}
		
		 


		
		if (empty($_POST["firstname"])) {
				$nameErr = "Firstname is required";
		} else {
					$uname = $_POST["firstname"];
					$a=1;
					$ename=$_POST["firstname"];
					if (!preg_match("/^[a-zA-Z ]*$/",$uname)) {
						$a=0;
					$nameErr = "Only letters and white space allowed"; 
					}			
				}			
		if (empty($_POST["lastname"])) {
							$lnameerr = "Lastname is required";
		} else {
					$lname= $_POST["lastname"];
					$b=1;
					$elname=$_POST["lastname"];
					if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
						$b=0;
					$lnameerr = "Only letters and white space allowed"; 
					}
				}
		if (empty($_POST["untid"])) {
							$uiderr = "UNT ID is required";
		} else {
					$uid= $_POST["untid"];
					$c=1;
					$eid=$_POST["untid"];
					if (!preg_match("/^[0-9 ]*$/",$uid)) {
						$c=0;
					$uiderr = "Only numbers are allowed"; 
					}
				}
				
		if (empty($_POST["department"])) {
							$depterr = "department is required";
		} else {
					$dept= $_POST["department"];
					$d=1;
					$edept=$_POST["department"];
					if (!preg_match("/^[a-zA-Z ]*$/",$dept)) {
						$d=0;
					$depterr = "Only letters and white space allowed"; 
					}
				}
		
		if (empty($_POST["euid"])) {
							$euiderr = "euid is required";
		} else {
					$euid= $_POST["euid"];
					$e=1;
					$eeuid=$_POST["euid"];
					if (!preg_match("/^[a-z0-9 ]*$/",$euid)) {
						$e=0;
					$euiderr = "Only letters and numbers allowed"; 
					}
				}
				
		if (empty($_POST["password"])) {
							$passErr = "password is required";
							$f=0;
		} else {
					$epass=$_POST["password"];
					$pwd1= $_POST["password"];
					 $f=1;
					}
	
		if($a && $b && $c && $d && $e && $f == 1){
			$result=mysql_query("INSERT INTO user (FirstName,LastName,Department,UntId,UserName,Password) VALUES ('$uname','$lname','$dept','$uid','$euid','$pwd1');");
		
		header("Location:index.php");
		}
	}	
}
  
?>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><span class="logo">Tipster</span></a>
	<p>  Ask anything...Student Digest</p>
    </div>
	
   
  </div>
</nav>

<div class="container">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name*</label>
								<input type="text" name="firstname" placeholder="Enter First Name Here.." value="<?echo $ename; ?>" class="form-control">
								<span class="error"> <?php echo $nameErr;?></span>
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name*</label>
								<input type="text" name="lastname" placeholder="Enter Last Name Here.." value="<?echo $elname; ?>" class="form-control">
								<span class="error"> <?php echo $lnameerr;?></span>
							</div>
						</div>					
						<div class="form-group">
							<label>Address</label>
							<textarea placeholder="Enter Address Here.." name="address" rows="3" value="<?echo $addr; ?>" class="form-control"></textarea>
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" name="city" placeholder="Enter City Name Here.." value="<?echo $city; ?>" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" name="state" placeholder="Enter State Name Here.." value="<?echo $state; ?>" class="form-control">
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" name="zip" placeholder="Enter Zip Code Here.." value="<?echo $zip; ?>" class="form-control">
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>UNT Id*</label>
								<input type="text" name="untid" placeholder="Enter Id Here.." value="<?echo $eid; ?>" class="form-control">
								<span class="error"> <?php echo $uiderr;?></span>
							</div>		
							<div class="col-sm-6 form-group">
								<label>Department*</label>
								<input type="text" name="department" placeholder="Enter department Name Here.." value="<?echo $edept; ?>" class="form-control">
								<span class="error"> <?php echo $depterr;?></span>
							</div>	
						</div>						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" name="phonenumber" placeholder="Enter Phone Number Here.." value="<?echo $pno; ?>" class="form-control">
					</div>		
					<div class="form-group">
						<label>EUID*</label>
						<input type="text" name="euid" placeholder="Enter EUID Here.." value="<?echo $eeuid; ?>" class="form-control">
						<span class="error"> <?php echo $euiderr;?></span>
						
					</div>	
					<div class="form-group">
						<label>Password*</label>
						<input type="password" name="password" placeholder="Enter password Here.." value="<?echo $epass; ?>" class="form-control">
						<span class="error"> <?php echo $passErr;?></span>
						<p class="help-block">Password should be at least 4 characters</p>
					</div>
					<center><button type="submit" data-toggle="tooltip" data-placement="top" title="Submit all Details" class="btn btn-primary">Submit</button>	</center>				
					</div>
				</form> 
				</div>
	</div>
	</div>



<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">All copyrights reserved @ UNT Denton</a>
    </div>
   
  </div>
</nav>
</body>
</html>
