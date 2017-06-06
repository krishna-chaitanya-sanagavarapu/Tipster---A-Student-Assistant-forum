<?php
session_start();
	if(!isset($_SESSION['user_email'])){
		header("Location:index.php");
	}
	else{
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
<style>
.questions { font-weight:bold; font-size:large;}
.personlook { text-transform: capitalize; font-size: medium; font-weight:bold; font-family: "Times New Roman", Times, serif;letter-spacing: 1.5px;}
.answerlook {font-size:medium;}
.logo {font-weight:bold;font-size: 180%;}
.normal {font-weight:bold;font-size: 120%;text-transform: capitalize;color: white;}


</style>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php
 
	  session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["search_key"])) {
				
		}
		else{
			session_start();
			$_SESSION['search_key']=$_POST['search_key'];
			header("Location:results.php");
		}
	
}
try
{
session_start();
	$q_id=$_GET['id_value'];
	$ques= $_GET['question'];
	//echo $q_id;
	$username1=$_SESSION['username2'];
	$firstname= $_SESSION['firstname'];
	$_SESSION['firstname']=$firstname;
	$hostname="student-db.cse.unt.edu";
	$user="kcs0139";
	$count=0;
	$pwd="kcs0139";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("kcs0139");
		$count1=0;
		$data=array();
		$data1=array();	
		
		$result=mysql_query("SELECT Answer,Username FROM answers WHERE Q_Id = '$q_id';");
		while($row=mysql_fetch_assoc($result)){
			
		$data[]=$row['Answer'];
		$data1[]=$row['Username'];
		
			$count1++;
			
			
		}
		
	
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


 <title>Answers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.6-dist\css\bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home_page.php"><span class="logo">Tipster</span></a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="normal"> Hello <?php echo $firstname; ?> </span></a></li>
      <li><a data-toggle="tooltip" data-placement="left" title="Click to Logout" href="logout.php"><span class="normal"> Log Out</span></a></li>
    </ul>
	<center>
    <ul class="nav navbar-nav">
      <!--<li class="active"><a href="#">Home</a></li>
     <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>-->
	  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <div style="width:200px;margin-top: 6px;margin-left: -100px"><input type="text" class="form-control" placeholder="Ask anything" id="usr" name="search_key"></div>
	  <div style="width:80px;margin-left: 150px;margin-top: -34px"><button type="submit" data-toggle="tooltip" data-placement="left" title="Click To view Results" class="btn btn-primary">Query</button> </div>
	  
	  </form>
    </ul>
	</center>
    
  </div>
</nav>
  


<div class="container">
  
 

    <div id="menu2">
	

    
	 <div>
	
    <div class="panel panel-default">
      <div class="panel-body"><span class="questions"><? echo $ques ?></span> </div>
	   <? for ($z = $count1-1; $z >= 0; $z--){ ?>
      <div class="panel-heading"><img src="person1.png" height="30" width="30"><span class="personlook"> <? echo $data1[$z]; ?></span> </br></br> <span class="answerlook"><? echo $data[$z]; ?> </span></div>
	   <? } ?>
    </div>
	
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


	<? } ?>