<?php
include('config.php');
if(isset($_POST['pid']))
{
	$p=$_POST['pid'];
}
if(isset($_GET['pid']))
{
	$p=$_GET['pid'];
}
if(isset($_POST['comment']))
{
	

	if(!empty($_POST['com']))
	{

		$com= $_POST['com'];
		$mail= $_POST['email'];
		$p=$_POST['pid'];
        $stmt = $db->prepare("insert into comments (content,author,date,Post_ID) values (?,?,now(),?)");
        $stmt->bind_param("sss", $com, $mail, $p);
        if ($stmt->execute()){
 echo "Comment Added!";
 }
 else{
 echo "Couldn't Save Your Comment";
 
}

}
else
{
	"Blank Comment";
}
}
if(isset($_POST['deletekar']))
{
    $stmt=$db->prepare("DELETE FROM comments WHERE C_ID=?");
    $stmt->bind_param("s",$_POST['cid']);
if ($stmt->execute() === TRUE) {
    echo "Comment deleted successfully";
    header("Location: view-post.php?pid=".$_POST['pid']);
} else {
    echo "Error deleting Post ";
    header("Location: view-post.php?pid=".$_POST['pid']);
}

$conn->close();
}


$stmt = $db->prepare("SELECT title,description,author,date,featured,visitors from posts where Post_ID=?");
$stmt->bind_param("s", $p);
$stmt->execute();
if ($result = $stmt->get_result()) {
$row = $result->fetch_assoc();
session_start();
    $stmt = $db->prepare("UPDATE posts SET visitors=visitors+1 WHERE Post_ID=?");
    $stmt->bind_param("s", $p);
    $stmt->execute();
}
else
{
	header("Location:notfound.php");
}


?>
<html>
<head><?php echo "
	<title>".$row['title']."- GDG Blog "."</title>";
	?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<style type="text/css">
	.greenkaro
{
	padding: 5px 22px 5px 22px;
	border-radius: 8px;
	background-color: green;
	color: white;
}
.redkaro
{
	padding: 5px 15px 5px 15px;
	border-radius: 8px;
	background-color: red;
	color: white;
}



		.articimg
		{
			width: 60%;
			border:1px solid green;
			height: 300px;
			
			margin-top: 10px;
			margin-left: 20%;
		}
		.artic
		{
			width: 60%;
			
			height: 100%;
			
			margin-top: 10px;
			margin-left: 20%;
		}
@media (max-width: 800px)
{
.articimg
		{
			width: 85%;
			border:1px solid green;
			height: 300px;
			
			margin-top: 10px;
			margin-left: 10%;
		}
		.artic
		{
			width: 85%;
			
			height: 100%;
			font-family: Arial;
			margin-top: 10px;
			margin-left: 10%;
		}
}
@media (max-width: 600px)
{
.articimg
		{
			width: 95%;
			border:1px solid green;
			height: 300px;
			
			margin-top: 10px;
			margin-left: 20px;
		}
		.artic
		{
			width: 95%;
			
			height: 100%;
			font-family: Arial;
			margin-top: 10px;
			margin-left: 20px;
		}
}

		.commentarea
		{
			width: 60%;
			
			height: 100%;
			
			margin-top: 10px;
			
		}
		.read
		 {
		 	background-color: #833299;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 	margin-left: 10px;
		 }
		 label{
		
		 font-family: 'Quicksand', sans-serif;
		 color: #833299;
		 margin-left: 10px;
		 }
		 .title
		 {
		 	font-size: 25;
		 }
		 .commenttext
		 {
		 	margin-left: 63px;
		 }
		 .nodisp
		 {
		 	display: none;
		 }
		 .des{
		 	font-family: 'Quicksand', sans-serif;
		 	line-height: 1.6;
		 	font-size: 20;
		 	padding: 10px 10px 10px 10px;
		 	margin-top: 10px;
		 	background-color: #efefef;
		 	border-top-right-radius: 25px;
		 	border-top-left-radius: 25px;
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

    <?php if(!isset($_SESSION['ID']))
      {
        
        echo "<a href='admin/login.php'>&nbsp;<img src='images/user.png' width='20px'>&nbsp;Login/Register</a>";
      }
        else {
        
        echo "<a href='admin/logout.php'><img src='images/user.png' width='20px'>&nbsp;Logout</a><a href='admin/index.php'><img src='images/settings-gears.png' width='20px'>&nbsp;Dashboard</a>";
      }
        ?>
  

  </div>

	<div class="articimg" align="center">
		<?php  $im="<img src='admin/uploads/".$row['featured']."'' width='100%' height='100%'>";
		echo $im; ?>
		
	</div>
<div class="artic" >
		<label class="title"><b><?php echo $row['title'] ?></b></label><br>
		<label class="date"><img src='images/calendar.png' width='20px'></img>&nbsp;<?php echo $row['date'] ?></label>
		<br>
		<label class="author"><img src='images/man-user.png' width='20px'></img>&nbsp;<?php echo $row['author'] ?></label>
		<br>
		<label class="author"><img src='images/eye.png' width='20px'></img>&nbsp;<?php echo $row['visitors'] ?></label>
		<br><br>
		<div class="des">
			<?php echo $row['description'] ?>
		

		<div class="commentarea">
			<label>Comments</label><br>
			<?php
if(isset($_SESSION['ID']))
{
	echo "<div class='addcomform'>
			<form action='view-post.php' method='POST'>
			<hr>
			Add a Comment:
			<input type='text' name='email'  class='nodisp' value='".$_SESSION['ID']."'/>
			<input type='text' name='pid'  class='nodisp' value='".$p."'/>
			<br>
			<textarea cols='80' rows='3' name='com'></textarea>
			<input type='submit' class='greenkaro' name='comment' value='POST COMMENT'>
		</form>
		</div>";
}
else
{
	echo "<a href='admin/login.php'>Log In</a> to Post Comment";
}
            $stmt = $db->prepare("SELECT content,author,date,C_ID from comments where Post_ID=?");
            $stmt->bind_param("s", $p);
            $stmt->execute();
            $result3 = $stmt->get_result();
while($row3 = $result3->fetch_assoc())
{

echo "<div class='commentbox'>
			<img src='avatar.jpg' width='30px' height='30px'><label>".
				 $row3['author'].
			"</label><p class='commenttext'>".
			$row3['content'].
		"</p>

	</div>";
	if(isset($_SESSION['ID']))
	{
		if($row3['author']==$_SESSION['ID'])
			{
				echo "<form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='POST'><input type='text' name='pid' value='".$p."' style='display:none;'></input><input type='text' name='cid' value='".$row3['C_ID']."' style='display:none;'></input><input type='submit' name='deletekar' class='redkaro' value='Delete' style='margin-left: 55px;'></form>";
			}
	}
		}	
		?>


	</div>
		
	</div></div>
	
<footer class="fut" align="center"><p>GDG Blog 2018</p></footer>
</body>
</html>