<html>
<head>
<title> Calendar </title>
</head>
<body>
<?php
  $name = $_POST['name'];
  echo ("$name available times:");
  foreach($_POST['time'] as $selected) {
    echo "<p>".$selected ."</p>";
  }
?>
</body>
</html>
