<?php
require("dbconnect.php");
$ID=(int)$_POST['id'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$content=mysqli_real_escape_string($conn,$_POST['content']);
$importance=mysqli_real_escape_string($conn,$_POST['importance']);
if ($title) { //if title is not empty
	$sql = "update todo set title='$title',content = '$content', importance = '$importance' where id = $ID;";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	$msg= "Message updated";
} else {
	$msg= "Message title cannot be empty";
}
header("Location:listTodo.php?m=$msg");
?>
<hr>
