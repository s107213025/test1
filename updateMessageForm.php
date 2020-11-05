<?php
session_start();
require("dbconnect.php");
$id = (int)$_GET['id'];
$sql = "select * from todo1 where id = $id;";
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
$rs=mysqli_fetch_assoc($result);
if (! $rs) {
	echo "no data found";
	exit(0);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h1>update message</h1>
</head>
<body>
<form method="post" action="updateMessage.php">
      <input name="id" type="int" id="id" value = <?php echo $id ?> style = "display:none" /><br>
      Message Title: <input name="title" type="text" id="title" value="<?php echo htmlspecialchars($rs['title'])?>" /> <br>

      Content: <input name="content" type="text" id="content" value="<?php echo htmlspecialchars($rs['content'])?>" /> <br>
      
      Importance: 
      <input name="importance" type="radio" value="緊急" /> 緊急
      <input name="importance" type="radio" value="重要" /> 重要
      <input name="importance" type="radio" value="一般" /> 一般<br>
	  
      <input type="submit" name="Submit" value="送出" />
	</form>
  </tr>
</table>
</body>
</html>
