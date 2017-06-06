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
	
	$username1=$_SESSION['username2'];
	$firstname= $_SESSION['firstname'];
	$_SESSION['firstname']=$firstname;
	$hostname="student-db.cse.unt.edu";
	$user="kcs0139";
	$count1=0;
	$pwd="kcs0139";
	

	if($database=mysql_connect($hostname,$user,$pwd))
	{
							
		$conn=mysql_select_db("kcs0139");
		$count1=0;
		$data5=array();
		$data=array();
		$data1=array();	
		$data3=array();
		$data4=array();
		$explode_array=array();
		session_start();
		$key= $_SESSION['search_key'];
		$explode_array=explode(" ",$key);
		foreach($explode_array as $value){
			$result=mysql_query("SELECT * FROM question WHERE Question LIKE '%$value%';");
		while($row=mysql_fetch_assoc($result)){
		$data5[]=$row['ID'];	
		$data[]=$row['Question'];
		$data1[]=$row['Username'];
		$result6=mysql_query("SELECT FirstName,Department from user WHERE UserName= '$data1[$count1]';");
		$row6=mysql_fetch_assoc($result6);
		$data12[]=$row6['FirstName'];
		$data13[]=$row6['Department'];
		
		
			$count1++;
			
			
		}
		}
		
		
	
			
		
		
	
	}
	else{
			throw new exception("Connection not created");
		}
		$data3[]= array_unique($data);
		$data4[]= array_unique($data1);
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
	  <div style="width:80px;margin-left: 150px;margin-top: -34px"><button type="submit" data-toggle="tooltip" data-placement="left" title="Click to View Results" class="btn btn-primary">Query</button> </div>
	  
	  </form>
    </ul>
	</center>
    
  </div>
</nav>
  


<div class="container">
  
 

    <div id="menu2">
	

    
	 <div>
	
    <div class="panel panel-default">
      <div class="panel-body">Search Results for "<b><i><?echo $key ?>"</i></b></div>
	   <? for ($z = 0; $z < $count1; $z++){ ?>
      <div class="panel-heading">
	  <a data-toggle="tooltip" data-placement="left" title="View all Answers" href="./answer_list.php?id_value=<? echo $data5[$z]; ?> & question= <? echo $data[$z]; ?> "><span class="questions"> <? echo $data[$z]; ?></span> </a><span class="personlook"> (<? echo $data12[$z]; ?>,<? echo $data13[$z];?>)</span> </br></br>
	  </div>
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