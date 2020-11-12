 <?php
session_start();
if(isset($_SESSION['ID']))
{
	
if(isset($_POST['publish']))
{
	$title=$_POST['title'];
	$desc=$_POST['cont'];
	
	$author=$_SESSION['ID'];
	$category=$_POST['category'];
	
	echo $author;
	echo $category;
	
	$filetmp = $_FILES["feature"]["tmp_name"];
  $filename = $_FILES["feature"]["name"];
  $filepath = "uploads/".$filename;
  if(move_uploaded_file($filetmp,$filepath))
  {
  	echo "Upload Success";
  }
  else{
  echo "Error while uploading";
}
	if(!empty($title)&&!empty($desc)&&!empty($author)&&!empty($category)&&!empty($filename))
	{

        include('config.php');
        $stmt = $db->prepare("insert into posts (title,description,date,author,status,featured,category) values(?,?,now(),?,'publish',?,?)");
        $stmt->bind_param("sssss", $title, $desc, $author, $filename, $category);
        if ($stmt->execute()) {
 echo "Posted Succesfully!";
 }
 else{
 	echo "Couldnt Post";
   echo("Error description: " . mysqli_error($db));
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
		$category=$_POST['category'];
	
	echo $author;
	echo $category;
	
	$filetmp = $_FILES["feature"]["tmp_name"];
  $filename = $_FILES["feature"]["name"];
  $filepath = "uploads/".$filename;
  if(move_uploaded_file($filetmp,$filepath))
  {
  	echo "Upload Success";
  }
  else{
  echo "Error while uploading";
}
	if(!empty($title)&&!empty($desc)&&!empty($author))
	{
        include('config.php');
        $stmt = $db->prepare("insert into posts (title,description,date,author,status,featured,category) values(?,?,CURDATE(),?,'draft',?,?)");
        $stmt->bind_param("sssss", $title, $desc, $author, $filename, $category);
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
<!DOCTYPE html>
<html>
<head>
	<title>Add Post - Blog</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
	.leftt
	{
		width: 67%;
		float: left;

	}
	.rightt
	{
		width: 33%;
		float: left;
	}
		
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
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
		<div class="leftt"><br>
			<label class="forg">Add New Post</label><br>
			<input class="forg" type="text" name="title" placeholder="Enter Title Here" />
			<br><br>
			<label class="forg">Add Description</label><br>
			<textarea id="cont" name="cont" class="forg" rows="30" cols="100"></textarea>
		</div>
		<div class="rightt"><br>

			<label class="forg">Letter Count: <span id="wordCount">0</span></label><BR><BR>
			<div class="publishbox">
				Category:<br>
				 <input type="radio" name="category" value="Technology"> Technology<br>
  <input type="radio" name="category" value="Health"> Health<br>
  <input type="radio" name="category" value="Sports"> Sports<br>
   <input type="radio" name="category" value="Entertainment"> Entertainment<br>
  <input type="radio" name="category" value="Travel"> Travel<br>
				
			</div><BR>

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
				
			</div>
			<BR>
			<div class="publishbox">
				<input type="file" name="feature" placeholder="Upload Featured Image"/><br><br><input type="submit" class="pub" value="PUBLISH" name="publish"></input>
			</div>
			
		</div>
		</form>
	</div>

<footer class="fut" align="center"><p>GDG Blog 2018</p></footer>
</body>
<script type="text/javascript">
	
	

    document.getElementById('cont').addEventListener('input', function () {


        var text = this.value;
        var newStr = text.replace(/,/g, ' ');
        var newStr = newStr.replace(/'/g, ' ');
        var newStr = newStr.replace(/"/g, ' ');
        document.getElementById('cont').value=newStr;
        count = text.length;
        document.getElementById('wordCount').textContent = count;

    });
    document.getElementById('title').addEventListener('input', function () {


        var text2 = this.value;
        var newStr2 = text2.replace(/,/g, ' ');
        var newStr2 = newStr2.replace(/'/g, ' ');
        var newStr2 = newStr2.replace(/"/g, ' ');
        document.getElementById('title').value=newStr2;
        

    });
   
</script>
</html>