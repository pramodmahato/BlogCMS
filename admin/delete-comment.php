<?php
include('config.php');
session_start();
if(isset($_SESSION['ID']))
{
if ($db->connect_error) {
    die("Connection failed ");
} 

$sql = "DELETE FROM comments WHERE C_ID=".$_POST['cid'];

if ($db->query($sql) === TRUE) {
    echo "Post deleted successfully";
    header("Location: all-comments.php");
} else {
    echo "Error deleting Post ";
    header("Location: all-comments.php");
}

$conn->close();	
}
else{
	echo "You are Not Allowed To Perform This Action";
}
?>
