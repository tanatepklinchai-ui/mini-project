<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รับค่าการแก้ไขข้อมูล</title>
    <meta http-equiv="refresh" content="1;URL=admin.php">
    <!-- เมื่อมีการแก้ไขข้อมูลเรียบร้อยและให้กลับไปที่หน้า admin.php อัตโนมัติ -->
</head>
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mydatabase1";
$conn=mysqli_connect("$servername", "$username", "$password", "$dbname");

$sql="update game_accounts set GameName='".trim($_POST['GameName'])."', 
ServerRegion='".trim($_POST['ServerRegion'])."', 
AccountLevel='".trim($_POST['AccountLevel'])."', 
Characters='".trim($_POST['Characters'])."', 
Price='".trim($_POST['Price'])."', 
Status='".trim($_POST['Status'])."' 
where AccID='".$_POST["AccID"]."'";

$query=mysqli_query($conn,$sql);

echo "แก้ไขข้อมูลเรียบร้อย";

mysqli_close($conn);
?>
</body>
</html>