<?php
session_start();

// ลบข้อมูล Session ทั้งหมด
session_destroy();

// เด้งกลับไปที่หน้าเข้าสู่ระบบ
header("Location: login.html");
exit();
?>