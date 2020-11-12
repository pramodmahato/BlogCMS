<?php
if(isset($_POST['submit']))
{
	include("config.php");

   $myusername =$_POST['email'];
   $mypassword = md5($_POST['pass']);
   session_start();
   session_destroy();
    $stmt = $db->prepare("select *from users where email=? and password=?");
    $stmt->bind_param("ss", $myusername, $mypassword);
    $stmt->execute();
    $result = $stmt->get_result();
$row = mysqli_fetch_assoc($result);


      $rowcount=mysqli_num_rows($result);


      if((int)$rowcount>0)
      {
          session_start();
    
      $_SESSION["ID"] = $myusername;
    

        $site= "<script type='text/javascript'>window.location='../index.php'</script>";
        echo $site;
    
      }
      else
      {
      	echo "<script type='text/javascript'>Invalid Username or Password</script>";
         echo "Invalid Username/Password. <a href='login.php'>Click Here To Try Again</a>";
      }
      
 
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - GDG Blog Demo</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		.regi{
			margin-top: 20px;
			width:40%;
			border-radius: 10px;
			border: 1px solid #833299;
			height: 430px;
			box-shadow: 10px 10px #f5e7e7;
		}
		p
		{
			font-family: Arial;
			font-size: 4;
			color: #833299;
		}
		 label,input[type=text],input[type=email],input[type=password],label a
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
	<div align="center">
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
<a class="active" href="../index.php">Go to Blog</a>
  <a href="index.php">Dashboard</a>
  <a href="all-posts.php">All Posts</a>
  <a href="add-post.php">Add Posts</a>
  <a href="all-comments.php">All Comments</a>
  <a href="changepass.php">Change Password</a>

    <?php  if(!isset($_SESSION['ID']))
      {
        
        echo "<a href='login.php'>&nbsp;<img src='../images/user.png' width='20px'>&nbsp;Login/Register</a>";
      }
        else {
        
        echo "<a href='logout.php'><img src='../images/user.png' width='20px'>&nbsp;Logout</a><a href='index.php'><img src='../images/settings-gears.png' width='20px'>&nbsp;Dashboard</a>";
      }
        ?>
  

  </div>

	<div class="regi" >
		<p align="center"><br><b>LOG IN</b></p><br>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			
			<label>Email ID</label>
			<br>
			<input type="email" name="email" placeholder="Enter Your Email ID Here" required="" />
			<br><br>
			<label>Password</label><br>
			<input type="Password" name="pass" id="pass" placeholder="Enter Your Password" required="" /><br><br>
			
			<input type="submit" name="submit" value="LOG IN"/>
		</form><br>
		<label>Don't Have An Account Yet? <a href="../register.php">REGISTER</a></label><br><br>
		
		
	</div>
</div>
<footer class="fut" align="center"><p>GDG Blog 2018</p></footer>
</body>

</html>