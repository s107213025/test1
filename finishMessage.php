<?php
session_start();
require("dbconnect.php");
$sql = "select * from todo1 where status = 1;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Finish list !! </p>
<hr />
<hr>
<a href="listTodo.php">Home</a><br>
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
    <td>status</td>
    <td>done</td>
  </tr>
<?php
$i=0;
while (	$rs=mysqli_fetch_assoc($result)) {
    $i++;
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>{$rs['title']}</td>";
	echo "<td>" , $rs['content'], "</td>";
  echo "<td>" ."<a href='todoReject.php?id={$rs['id']}'>Not OK</a>" . "</td>";
  echo "<td>" ."<a href='todoDone.php?id={$rs['id']}'>Done</a>" . "</td></tr>";
}
$sql = "select count(*) as c from todo where status = 1;";
$result=mysqli_query($conn,$sql) ;
$rs=mysqli_fetch_assoc($result);

?>
</table>
<?php echo "已完成 ".$i." 項"; ?><br/>
<a href="listTodo.php">back to my list</a> 
</body>
</html>