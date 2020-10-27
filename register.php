<?php
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pass=md5($_POST['pass']);
	include('config.php');

    $stmt=$db->prepare("SELECT * from users WHERE Email=?;");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $queryResult =$stmt->get_result();
$foundRows = $queryResult->num_rows;
echo $foundRows;

  if($foundRows>0 ){
    echo "<script type='text/javascript'>alert('This Email is already registered.')</script>";
   }
   else
   {
       $stmt = $db->prepare("insert into users (Name,Email,Password,Created) values (?,?,?,CURDATE())");
       $stmt->bind_param("sss", $name, $email, $pass);
       if ($stmt->execute()) {
 header("Location: admin/login.php");
 }
   }
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register - GDG Blog Demo</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.regi{
			margin-top: 20px;
			width:40%;
			border-radius: 10px;
			border: 1px solid #833299;
			height: 580px;
			box-shadow: 10px 10px #f5e7e7;
		}
		p
		{
			font-family: Arial;
			font-size: 4;
			color: #833299;
		}
		 label,input[type=text],input[type=email],input[type=password]
		 {
		 	width:200px;
		 	margin-top: 5px;
		 	font-family: Arial;
			font-size: 4;
			color: #833299;
			border-radius: 5px;
			padding: 5px 10px 5px 5px;
		 }
		 input[type=submit]
		 {
		 	background-color: #833299;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 }
	</style>
</head>
<body>
	<div class="nav">
  <div class="nav-header">
    <div class="nav-title">
      <font color="yellow" size="5"><b>GDG</b></font> <font color="#cf8cea">Blog</font>
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
    <input type="checkbox" id="nav-check">
  <div class="nav-links" >
<a class="active" href="index.php"><img src="images/home.png" width="20px"></img>&nbsp;Home</a>
  <a href="technology.php"><img src="images/technology.png" width="20px"></img>&nbsp;Technology</a>
  <a href="sports.php"><img src="images/sports.png" width="20px"></img>&nbsp;Sports</a>
  <a href="health.php"><img src="images/health.png" width="20px"></img>&nbsp;Health</a>
  <a href="travel.php"><img src="images/travel.png" width="20px"></img>&nbsp;Travel</a>
  <a href="entertainment.php"><img src="images/entertainment.png" width="20px"></img>&nbsp;Entertainment</a>

    <?php session_start(); if(!isset($_SESSION['ID']))
      {
        
        echo "<a href='admin/login.php'>&nbsp;<img src='images/user.png' width='20px'>&nbsp;Login/Register</a>";
      }
        else {
        
        echo "<a href='admin/logout.php'><img src='images/user.png' width='20px'>&nbsp;Logout</a><a href='admin/index.php'><img src='images/settings-gears.png' width='20px'>&nbsp;Dashboard</a>";
      }
        ?>
  

  </div>
  
	</div>
<div align="center">
	<div class="regi" align="center" >
		<p align="center"><br><b>Welcome On Board With Us!</b><br><br>You're Just a Few Steps Away From Posting Your First Blog</p>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<label>Name</label>
			<br>
			<input type="text" name="name" placeholder="Enter Your Full Name" required="" /><br><br>
			<label>Email ID</label>
			<br>
			<input type="email" name="email" placeholder="Enter Your Email ID Here" required="" />
			<br><br>
			<label>Password</label><br>
			<input type="Password" name="pass" id="pass" placeholder="Enter Your Password" required="" /><br><br>
			<label>Confirm Password</label><br>
			<input type="Password" name="pass" id="passconfirm"placeholder="Enter Password Again" required="" />
			<br><br>
			<input type="submit" name="submit" onclick="return check()" value="REGISTER"/>
		</form><br>
		<label>Already Have An Account? <a href="admin/login.php">LOGIN</a></label>
		
	</div>
</div>
<footer class="fut" align="center"><p>GDG Blog 2018</p></footer>
</body>
<script type="text/javascript">
	function check()
	{
		var p1=document.getElementById('pass').value;
		var p2=document.getElementById('passconfirm').value;
		if(p1==p2)
		{
			return true;
		}
		else
		{
			alert("Your Passwords Do Not Match");
			return false;
		}
	}

</script>
</html>