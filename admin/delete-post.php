<?php
include('config.php');
session_start();
if(isset($_SESSION['ID']))
{
	if ($db->connect_error) {
    die("Connection failed");
} 

$sql = "DELETE FROM posts WHERE Post_ID=".$_POST['pid'];

if ($db->query($sql) === TRUE) {
    echo "Post deleted successfully";
    header("Location: all-posts.php");
} else {
    echo "Error deleting Post";
    header("Location: all-posts.php");
}

$conn->close();
}
else
{
	echo "You are Not Allowed To Perform This Action";
}
?>