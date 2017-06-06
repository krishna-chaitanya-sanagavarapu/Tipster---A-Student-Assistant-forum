<? 

session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml>
<head>
  <title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist\css\bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="\home\kcs0139\public_html\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
  <style>
.error {color: #FF0000;}
.logo {font-weight:bold;font-size: 180%;}
.text  {font: italic bold 20px/30px Georgia, serif;}

</style>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<? require_once("login_1.php"); ?>
 </head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"> <span class="logo">Tipster</span></a>
	
    </div>
	
   
  </div>
</nav>
<div class="container">
<div class="jumbotron">
    <center><img src="tipster.png"> </br>   </br>  
	<p style="color:#ff8c1a">  <b>ASK ANYTHING..</b> <b style="color:#0086b3">..STUDENT DIGEST</b> </p></center>
   <center><span class="text">An interface that guides all the students based on the experiences, opinions and the extra information provided by other students.</span></center>
	      
  </div>
  
  <div class="row">
    <div class="col-sm-6" style="background-color:white;">
      <h2>Login</h2>
  <form class="form-horizontal" role="form" method="post" name="mainpage" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Username*:</label>
      <div class="col-sm-10">
		<div class="col-xs-6">
        <input type="textarea" class="form-control" id="email" name="username" placeholder="Enter username">
		<span class="error"> <?php echo $nameErr;?></span>
		</div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password*:</label>
      <div class="col-sm-10"> 
		<div class="col-xs-6">
        <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
		<span class="error"> <?php echo $passErr;?></span>
		</div>
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" data-toggle="tooltip" data-placement="left" title="Click to login" class="btn btn-primary">Submit</button></br>
		 <p><a href="register_page.php" data-toggle="tooltip" data-placement="left" title="Register">New User..??</a> </p>
      </div>
    </div>
  </form>
    </div>
	
    <div class="col-sm-3" style="background-color:white;">
    
	<img src="ask.jpg" height="280px" width="600px">
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
