<html>
<head>
<title> Calendar </title>
</head>
<body>
<center>
<table>
<?php
  $name = $_POST['name'];
  echo ("$name available times:");
?>  
<tr>
<td>Sunday:
<?php
  foreach($_POST['timesun'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</td>
<td>Monday:
<?php
  foreach($_POST['timemon'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</td>
<td>Tuesday:
<?php
  foreach($_POST['timetue'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</td>
<td>Wednesday:
<?php
  foreach($_POST['timewed'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</td>
<td>Thursday:
<?php
  foreach($_POST['timeth'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</td>
<td>Friday:
<?php
  foreach($_POST['timefri'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</td>
<td>Saturday:
<?php
  foreach($_POST['timesat'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</td>
</tr>
</table>
</center>
</body>
</html>
