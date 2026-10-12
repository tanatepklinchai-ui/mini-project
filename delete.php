<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รับค่าการลบข้อมูล</title>
    <meta http-equiv="refresh" content="1;URL=admin.php">
</head>
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mydatabase1";
$conn=mysqli_connect("$servername", "$username", "$password", "$dbname");

$sql="delete from game_accounts where AccID='".$_GET["id"]."'";
$query=mysqli_query($conn,$sql);

echo "ลบข้อมูลเรียบร้อย";

mysqli_close($conn);
?>
</body>
</html>