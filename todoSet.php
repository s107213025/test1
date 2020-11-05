<?php
require("dbconnect.php");

$msgID=(int)$_GET['id'];
if ($msgID) {
	$sql = "update todo1 set status=1 where id=$msgID;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
}
$msg= "Message:$msgID completed.";
header("Location:Employee.php?m=$msg");
?>

