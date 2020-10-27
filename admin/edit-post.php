<?php
session_start();
if(isset($_SESSION['ID']))
{
if (isset($_GET['pid'])) {
	$pid=$_GET['pid'];
	
}
include("config.php");
if(isset($_POST['publish']))
{
	$title=$_POST['title'];
	$desc=$_POST['cont'];
	
	$author=$_SESSION['ID'];
	$pid=$_POST['pid'];
	
	if(!empty($title)&&!empty($desc)&&!empty($author))
	{
        $stmt = $db->prepare("update posts set title=?,description=?,status='publish' where Post_ID= ?");
        $stmt->bind_param("sss", $title, $desc, $pid);
        if ($stmt->execute()) {
 echo "Updated Succesfully!";
 header("Location: edit-post.php?pid=".$_POST['pid']);
 }
 else{
 echo "Couldn't Post";
}
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please Fill All The Fields')</script>";
	}
}
if(isset($_POST['draft']))
{
	$title=$_POST['title'];
	$desc=$_POST['cont'];
	
	$author=$_SESSION['ID'];
	if(!empty($title)&&!empty($desc)&&!empty($author))
	{

        $stmt = $db->prepare("update posts set title=?,description=?,status='draft' where pid= ?");
        $stmt->bind_param("sss", $title, $desc, $pid);
        if ($stmt->execute()) {
 echo "Saved As Draft!";
 }
 else{
 echo "Couldn't Save As Draft";
}
	}
	else
	{
		echo "Please Fill All The Fields";
	}

}
}
else
{
	header("Location:login.php");
}
?>
<?php
if (isset($_GET['pid'])) {
	$pid=$_GET['pid'];

}
if (isset($_POST['pid'])) {
	$pid=$_POST['pid'];

}
$stmt = $db->prepare("select *from posts where Post_ID like ?");
$stmt->bind_param("s", $pid);
$stmt->execute();
if ($result = $stmt->get_result())
	{$row = mysqli_fetch_assoc($result);
	}
	else
	{
		header("Location:../notfound.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Post - Blog</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		
		.forg{
			color: #833299;
			font-family: Arial;
			size: 4;
			margin-left: 20px;
			width: 94%; 
			margin-left: 20px;
			margin-top: 5px; 
			padding: 5px 5px 5px 5px;
		}
		input[type=text],textarea
		{
			
			border-radius: 5px;
		}
		.publishbox{
			color: #833299;
			font-family: Arial;
			size: 4;
			margin-left: 20px;
			width: 90%; 
			border-radius: 10px;
			border: 1px solid #833299;
			margin-top: 5px; 
			padding: 10px 5px 5px 10px;
		}
		.draft
		 {
		 	background-color: #833299;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 }
		 .pub
		 {
		 	background-color: green;
		 	color: white;
		 	padding: 10px 15px 10px 15px;
		 	border-radius: 10px;
		 }
		 .we{
		 	margin-top: : 20px;
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

	<div class="container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div class="left"><br>
			<label class="forg">Edit Post</label><br>
			<input class="forg" type="text" name="title" placeholder="Enter Title Here" value="<?php echo $row['title']?>" />
			<br><br>
			<label class="forg">Add Description</label><br>
			<textarea id="cont" name="cont" class="forg" rows="30" cols="100" ><?php echo $row['description']?></textarea>
		</div>
		<div class="right"><br>
			<label class="forg">Letter Count: <span id="wordCount">0</span></label>

			<div class="publishbox">
				<label><b>Publish</b></label>
				<hr>
				<input type="submit" name="draft" class="draft" value="Save Draft">
				<br><br>
				<label class="we">Status: Draft</label><br><br>
				<label class="we">Schedule Post:</label>
                <input type="date" name="scheduledate"/>
				<br>
				<br>
				<label class="we"></label>
				<input type="text" name="pid" style="display: none;" value="<?php echo $pid; ?>"/> 
				<input type="submit" class="pub" value="PUBLISH" name="publish"></input>
			</div>
		</div>
		</form>
	</div>

<footer class="fut" align="center"><p>GDG Blog 2018</p></footer>
</body>
<script type="text/javascript">
	var l=document.getElementById('cont').value.length;
	 document.getElementById('wordCount').textContent = l;

    document.getElementById('cont').addEventListener('input', function () {
        var text = this.value,
        count = text.length;
        document.getElementById('wordCount').textContent = count;

    });
   
</script>
</html>