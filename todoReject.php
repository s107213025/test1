<?php
require("dbconnect.php");

$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "update todo1 set status=0 where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
echo "Message:$msgID completed.";
?>
<hr>
<a href='listTodo.php'>back</a>
