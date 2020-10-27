<?php
include('config.php');
session_start();
if(isset($_SESSION['ID']))
{
if ($db->connect_error) {
    die("Connection failed ");
} 

$stmt = $db->prepare("DELETE FROM comments WHERE C_ID= ?");
$stmt->bind_param("s", $_POST['cid']);
if ($stmt->execute()) {
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
