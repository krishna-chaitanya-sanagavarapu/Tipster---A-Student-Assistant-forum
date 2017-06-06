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
<?php
 
session_start();

$abouterr=$descerr="";
$username= $_SESSION['username1'];	
$firstname1= $_SESSION['firstname'];
$_SESSION['username2']=$username;
$_SESSION['firstname']=$firstname1;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["search_key"])) {
				
		}
		else{
			session_start();
			$_SESSION['search_key']=$_POST['search_key'];
			header("Location:results.php");
		}
		
	if (empty($_POST["question"])) {
				
		}
		else{
			session_start();
			$_SESSION['question']=$_POST['question'];
			header("Location:post_question.php");
		}
		
	if (empty($_POST["about"])) {
			$abouterr="What is your experience about?";	
			$a=1;
		}
		else{
			$a=0;
			session_start();
			$_SESSION['about']=$_POST['about'];
		}
	if(empty($_POST["experience"])){
				$descerr="Please describe your experience in few words";
				$b=1;
			}
			else{
				$b=0;
				session_start();
				$_SESSION['experience']=$_POST['experience'];
			}
			
	if($a == 0 && $b == 0){
		header("Location:post_experience.php");
	}
	else{
		
	}
}

try
{

	
	$hostname="student-db.cse.unt.edu";
	$user="kcs0139";
	$count=0;
	$count1=0;
	$count2=0;
	$count3=0;
	$pwd="kcs0139";

	if($database=mysql_connect($hostname,$user,$pwd))
	{
						
		$conn=mysql_select_db("kcs0139");
				
		$data=array();
		$data1=array();
		
		$data2=array();
		$data3=array();
		$data4=array(); // array created for answers-Q_ID
		$data5=array(); // array created for answers-answer
		$data6=array();
		$data7=array();
		$data8=array();
		$data9=array();
		$data10=array();
		$data11=array();
		$data12=array();
		$data13=array();
		$data14=array();
		$data15=array();
		$data16=array();
		$result=mysql_query("SELECT Question,ID FROM question WHERE Username='$username';");
		$result1=mysql_query("SELECT * FROM question WHERE Username <> '$username';");
		$result2=mysql_query("SELECT Q_Id,Answer FROM answers WHERE Username='$username';");
		while($row=mysql_fetch_assoc($result)){
			
		
		$data[]=$row['Question'];
		$data14[]=$row['ID'];
			$count++;
			
		}
		while($row1=mysql_fetch_assoc($result1)){
			
		session_start();
		$data1[]=$row1['Question'];
		$data2[]=$row1['ID'];
		$data3[]=$row1['Username'];
		$result6=mysql_query("SELECT FirstName,Department from user WHERE UserName= '$data3[$count1]';");
		$row6=mysql_fetch_assoc($result6);
		$data12[]=$row6['FirstName'];
		$data13[]=$row6['Department'];
		
		
			$count1++;
			
			
		}
		while($row2=mysql_fetch_assoc($result2)){
			
		session_start();
		$data4[]=$row2['Q_Id'];
		//$data2[]=$row1['ID'];
		$data5[]=$row2['Answer'];
			$count2++;
			
			
		}
		for($k=0;$k<$count2;$k++){
			
			$result3=mysql_query("SELECT Username,Question FROM question WHERE ID='$data4[$k]';");
			$row3=mysql_fetch_assoc($result3);
			$data6[$k]=$row3['Username'];
			$data7[$k]=$row3['Question'];
			
		}
		for($j=0; $j<$count1; $j++){
			
			$result4=mysql_query("SELECT Answer from answers where Id=(select MAX(Id) from answers where Q_Id='$data2[$j]');");
			$row4=mysql_fetch_assoc($result4);
			$data8[$j]=$row4['Answer'];
		}
		$result5=mysql_query("SELECT * from experience;");
		while($row5=mysql_fetch_assoc($result5)){
			
		session_start();
		$data9[]=$row5['About'];
		//$data2[]=$row1['ID'];
		$data10[]=$row5['Exp'];
		$data11[]=$row5['Username'];
		$result7=mysql_query("SELECT FirstName,Department from user WHERE UserName= '$data11[$count3]';");
		$row7=mysql_fetch_assoc($result7);
		$data15[]=$row7['FirstName'];
		$data16[]=$row7['Department'];
			$count3++;
			
			
		}
		
		$_SESSION['questionlist']=$data1;
				$_SESSION['answerlist']=$data2;
				$_SESSION['usernamelist']=$data3;
				
		//$data=$row[0];
				
			
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
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
 <style>
 .error {color: #FF0000;}
.questions { font-weight:bold; font-size:large;}
.personlook { text-transform: capitalize; font-size: medium; font-weight:bold; font-family: "Times New Roman", Times, serif;letter-spacing: 1.5px;}
.answerlook {font-size:medium;}
.logo {font-weight:bold;font-size: 180%;}
.normal {font-weight:bold;font-size: 120%;text-transform: capitalize;color: white;}
</style>

  <title>Your Home</title>
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
      <a class="navbar-brand" data-toggle="tooltip" data-placement="bottom" title="Home" href="Home_page.php"><span class="logo">Tipster </span></a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="normal"> Hello <?php echo $firstname1; ?> </span></a></li>
      <li><a data-toggle="tooltip" data-placement="bottom" title="Click to Logout" href="logout.php"><span class="normal"> Log Out</span></a></li>
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
	  <div style="width:80px;margin-left: 150px;margin-top: -34px"><button type="submit" data-toggle="tooltip" data-placement="bottom" title="Click to view results" class="btn btn-primary">Query</button> </div>
	  
	  </form>
    </ul>
	</center>
    
  </div>
</nav>
  


<div class="container">

  <ul class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="pill" data-toggle="tooltip" data-placement="left" title="All Questions" href="#menu1">Q Feed</a></li>
    <li><a data-toggle="pill" data-toggle="tooltip" data-placement="left" title="Ask Now" href="#home">Ask Now</a></li>
    <li><a data-toggle="pill" data-toggle="tooltip" data-placement="left" title="Answers" href="#menu2">My Answers</a></li>
    <li><a data-toggle="pill" data-toggle="tooltip" data-placement="left" title="Post Experience" href="#menu3">Post Experience</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade">
      <h3>Question</h3>
      <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <!--<label for="comment">Comment:</label>-->
      <textarea class="form-control" rows="5" id="comment" name="question" placeholder="Type question here"></textarea>
	  </br>
	  <td>
	  <p align="right">
			<button class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Cleat Text" type="reset">Reset</button>

	  <button type="submit" align="right" data-toggle="tooltip" data-placement="left" title="Post Question" class="btn btn-primary">Post</button></p>
	  </td>
    </div>
  </form>
    <h3> Your Questions</h3>
      <div  >
	  <? for ($x = $count-1; $x >=0; $x--){ ?>
    <div class="panel panel-default">
      <div class="panel-heading">
	  <a href="./answer_list.php?id_value= <? echo $data14[$x];?> & question= <? echo $data[$x]; ?>"> <span class="questions"> <? echo $data[$x];?> </span></a>
	  </div>
     
    </div>
	  <?} ?>
   
  </div>
    </div>
    <div id="menu1" class="tab-pane fade in active">
      
	  <h3>Feed</h3>
      <div  >
	  <? for ($y = $count1-1; $y >=0; $y--){ ?>
    <div class="panel panel-default">
      <div class="panel-heading">
		
		<!--<input type="hidden" name="id_value" value="<? echo $data2[$y]; ?>" /> -->
		<a data-toggle="tooltip" data-placement="left" title="View all Answers" href="./answer_list.php?id_value=<? echo $data2[$y]; ?> & question= <? echo $data1[$y]; ?> "><span class="questions"> <? echo $data1[$y];?></span></a> <!-- Questions array --> </br><img src="person1.png" height="30" width="30"><span class="personlook"><? echo $data12[$y];?> , <? echo $data13[$y];?></span></br> </br>
		<span class="answerlook"><p> <? echo $data8[$y]; ?> </p></span>
		</div> 
		
	   <!--<div class="panel-body"><? echo $data2[$y];?></textarea>-->
	 <form method="post" action="answer.php">
	 <? $_SESSION['ques']=$data1[$y]; ?>
	  <input type="hidden" name="item" value="<? echo $data1[$y]; ?>" />
	  
	   
		 
      <div class="panel-body">
	  
	  <textarea class="form-control" rows="2" id="comment" name="answer" placeholder="Type Answer here"></textarea>
	   <p align="right">
			
	  <button type="submit" data-toggle="tooltip" data-placement="left" title="Post Answer" align="right" class="btn btn-primary">Post</button></p>
	  	 </div>
		 </form>
    </div>
	  <?} ?>
   
  </div>
    </div>
    <div id="menu2" class="tab-pane fade">
	<h3>Answers</h3>

    
	 <div>
	 <? for ($z = 0; $z < $count2; $z++){ ?>
    <div class="panel panel-default">
      <div class="panel-heading"><span class="questions"><? echo $data7[$z]; ?></span> </div>
      <div class="panel-body"> <? echo $data5[$z]; ?> </div>
    </div>
	 <? } ?>
  </div>
    </div>
    <div id="menu3" class="tab-pane fade">
     <h3>Tell your Experience</h3>
      <form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <!--<label for="comment">Comment:</label>-->
	   <textarea name="about" class="form-control" rows="3" id="comment" placeholder="About"></textarea> <span class="error"> <?echo $abouterr; ?> </span></br>
	   
      <textarea name="experience" class="form-control" rows="5" id="comment" placeholder="Type Experience here"></textarea></br>
	  	   <span class="error"> <?echo $descerr; ?> </span>
		   
	 <p align="right"><button class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Cleat Text" type="reset">Reset</button> <button type="submit" data-toggle="tooltip" data-placement="left" title="Post" class="btn btn-primary">Post</button></p>
    </div>
  </form>
  <h3>People's Experiences</h3>
      <div  >
	   <? for ($k = $count3-1; $k >=0; $k--){ ?>
    <div class="panel panel-default">
      <div class="panel-heading">
		
		<!--<input type="hidden" name="id_value" value=" <? echo $data2[$y]; ?>" /> -->
		<span class="questions"> <? echo $data9[$k];?> </span> <!-- Questions array --></br><img src="person1.png" height="30" width="30"> <span class="personlook"> <? echo $data15[$k];?>, <? echo $data16[$k]; ?></span>
		
		</div> 
		
	   <!--<div class="panel-body"><? echo $data2[$y];?></textarea>-->
	
	  
	   
		 
      <div class="panel-body">
	  
	<span class="answerlook"> <p> <? echo $data10[$k];?></span>
	 </p>
	  	 </div>
		 
    </div>
	  <?} ?>
   
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
