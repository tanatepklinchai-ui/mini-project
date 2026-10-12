<?php
session_start();
if($_SESSION['UserID'] == "" || $_SESSION['Status'] != "ADMIN") {
    echo "<script>alert('หน้านี้สำหรับ ADMIN เท่านั้น'); window.location='login.html';</script>";
    exit();
}
$conn = mysqli_connect("localhost", "root", "", "mydatabase1");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบจัดการหลังบ้าน | Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-light btn-sm text-danger fw-bold">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>คลังข้อมูลไอดีเกม</h4>
            <!-- แก้ไขปุ่มนี้ให้ลิงก์ไปหน้า formaddaccount.php -->
            <a href="formaddaccount.php" class="btn btn-primary">+ เพิ่มไอดีใหม่</a>
        </div>
        
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>เกม</th>
                            <th>เซิร์ฟเวอร์ (Lv.)</th>
                            <th>ราคา</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM game_accounts ORDER BY AccID DESC";
                        $query = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($query)) {
                            // เช็คสถานะเพื่อเปลี่ยนสีป้าย
                            $badge_color = ($row['Status'] == 'AVAILABLE') ? 'bg-success' : 'bg-secondary';
                        ?>
                        <tr>
                            <td><?php echo $row['AccID']; ?></td>
                            <td class="fw-bold"><?php echo $row['GameName']; ?></td>
                            <td><?php echo $row['ServerRegion']." (Lv.".$row['AccountLevel'].")"; ?></td>
                            <td>฿<?php echo number_format($row['Price'], 2); ?></td>
                            <td><span class="badge <?php echo $badge_color; ?>"><?php echo $row['Status']; ?></span></td>
                            <td>
                                <!-- แก้ไขลิงก์แก้ไขและลบให้ส่งค่า id ไปด้วยตามรูปแบบในใบงาน -->
                                <a href="editaccount.php?id=<?php echo $row['AccID']; ?>" class="btn btn-sm btn-outline-warning">แก้ไข</a>
                                <a href="delete.php?id=<?php echo $row['AccID']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบไอดีนี้?');">ลบ</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>