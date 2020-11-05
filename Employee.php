<?php
session_start(); // 通常如果你的網站具有會員登入的功能或是購物車的功能，基本上就可以使用到 session 來幫助你記錄這些資訊。
require("dbconnect.php");
if (isset($_GET['m'])){
    $msg="<font color='red' font size='10px'>".$_GET['m']."</font>";
} else{
  $msg = "Good morning";
}
$sql = "select * from todo1 where status = 0 order by case importance when '緊急' then 1 when '重要' then 2 when '一般' then 3 end ,title"; //sql指令order by assignee:依照assignee進行排序
$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>Employee's Todo list !! </p>
<hr />
<?php echo $msg ?><hr>
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>content</td>
    <td>importance</td>
    <td>OK</td>
  </tr>
<?php
// $rec_assign = array(); // 紀錄有哪些交辦人
//while ($rs=mysqli_fetch_assoc($result)) {
//  if (in_array($rs['assign'], $rec_assign) == false)
//    array_push($rec_assign, $rs['assign']);
//}
// for ($i=0; $i < count($rec_assign); $i++) { 
//  $sql = "select * from todo where assign='$rec_assign[$i]' and status=0;";
//  $result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
  while (	$rs=mysqli_fetch_assoc($result)) {
    if($rs['importance']=="緊急"){
        echo "<tr><td><font color='red'>" . $rs['id'] . "</font></td>";
        echo "<td><font color='red'>{$rs['title']}</font></td>";
        echo "<td><font color='red'>" , $rs['content'], "</font></td>";
        echo "<td><font color='red'>" . $rs['importance'],"</font></td>";
      }
      elseif($rs['importance']=="重要"){
        echo "<tr><td><font color='orange'>" . $rs['id'] . "</font></td>";
        echo "<td><font color='orange'>{$rs['title']}</font></td>";
        echo "<td><font color='orange'>" , $rs['content'], "</font></td>";
        echo "<td><font color='orange'>" . $rs['importance'],"</font></td>";
      } else{
        echo "<tr><td><font color='green'>" . $rs['id'] . "</font></td>";
        echo "<td><font color='green'>{$rs['title']}</font></td>";
        echo "<td><font color='green'>" , $rs['content'], "</font></td>";
        echo "<td><font color='green'>" . $rs['importance'],"</font></td>";
      }
      echo "<td>"."<a href='todoSet.php?id={$rs['id']}'>OK</a>" . "</td></tr>";
  }
//}
?>
</table>
</body>
</html>