<?php
session_start();

// เชื่อมต่อฐานข้อมูล (แก้ไขชื่อฐานข้อมูลให้ตรงกับของคุณ ถ้าไม่ได้ใช้ mydatabase1)
$conn = mysqli_connect("localhost", "root", "", "mydatabase1");

// รับค่าจากฟอร์มล็อกอิน
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

// ค้นหาข้อมูลในตาราง member
$sql = "SELECT * FROM member WHERE Username = '$username' AND Password = '$password'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);

if($result) {
    // ถ้ามีข้อมูล ให้สร้าง Session เก็บไว้
    $_SESSION['UserID'] = $result['UserID'];
    $_SESSION['Status'] = $result['Status'];

    // เช็คสถานะแล้วให้เด้งไปหน้าที่ถูกต้อง
    if($_SESSION['Status'] == "ADMIN") {
        header("location: admin.php"); // ไปหน้าแอดมิน
    } else {
        header("location: user.php");  // ไปหน้าร้านค้าของลูกค้า
    }
} else {
    // ถ้ากรอกผิด ให้แจ้งเตือนแล้วกลับไปหน้าล็อกอิน
    echo "<script>
            alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');
            window.location='login.html';
          </script>";
}

mysqli_close($conn);
?>