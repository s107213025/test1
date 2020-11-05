<?php
//hello
require("dbconnect.php");
$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$status=mysqli_real_escape_string($conn,$_POST['status']);
$importance=mysqli_real_escape_string($conn,$_POST['importance']);

if ($title) { //if title is not empty
	$sql = "insert into todo1 (title, content, status, importance) values ('$title', '$content','$status', '$importance');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	$msg= "Message added";
	header("Location:listTodo.php?m=$msg");
} else {
	$msg= "Message title cannot be empty";
}

?>
