<?php
session_start();
if($_SESSION['UserID'] == "") { header("location: login.html"); exit(); }

$conn = mysqli_connect("localhost", "root", "", "mydatabase1");
$user_id = $_SESSION['UserID'];
$acc_id = $_POST['AccID'];

// 1. บันทึกข้อมูลลงตาราง orders (ประวัติการสั่งซื้อ)
$sql_insert = "INSERT INTO orders (UserID, AccID) VALUES ('$user_id', '$acc_id')";
mysqli_query($conn, $sql_insert);

// 2. อัปเดตสถานะไอดีในตาราง game_accounts ให้เป็น SOLD
$sql_update = "UPDATE game_accounts SET Status = 'SOLD' WHERE AccID = '$acc_id'";
mysqli_query($conn, $sql_update);

mysqli_close($conn);

echo "<script>
        alert('ชำระเงินสำเร็จ! ข้อมูลไอดีเกมถูกส่งไปยังอีเมลของคุณแล้ว');
        window.location='user.php';
      </script>";
?>