<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>รับค่าการเพิ่มข้อมูล</title>
    <meta http-equiv="refresh" content="1;URL=admin.php">
    <!-- เมื่อมีการเพิ่มข้อมูลเรียบร้อยและให้กลับไปที่หน้า admin.php อัตโนมัติ -->
</head>
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="mydatabase1";
$conn=mysqli_connect("$servername", "$username", "$password", "$dbname");
// mysqli_connect คือฟังก์ชันในการเชื่อมต่อกับฐานข้อมูล

if(!$conn){
    die("connect failed:".mysqli_connect_error());
    // mysqli_connect_error คือฟังก์ชันในการเช็คการเชื่อมต่อฐานข้อมูล
}

$sql="insert into game_accounts(GameName,ServerRegion,AccountLevel,Characters,Price)values('".$_POST["GameName"]."', '".$_POST["ServerRegion"]."','".$_POST["AccountLevel"]."','".$_POST["Characters"]."','".$_POST["Price"]."')";
/* เขียนคำสั่ง sql ในการ insert ข้อมูล ตาม attribute ที่ส่งค่ามาจากหน้า formaddaccount ซึ่งมีด้วยกัน 5 attribute */

$query=mysqli_query($conn,$sql);
if($query){
    echo "เพิ่มข้อมูลสำเร็จ";
}
mysqli_close($conn);
?>
</body>
</html>