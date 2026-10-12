<?php
session_start();
if($_SESSION['UserID'] == "" || $_SESSION['Status'] != "USER") {
    echo "<script>alert('กรุณาเข้าสู่ระบบในสถานะ USER'); window.location='login.html';</script>";
    exit();
}
$conn = mysqli_connect("localhost", "root", "", "mydatabase1");
$sql_user = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."'";
$query_user = mysqli_query($conn, $sql_user);
$user = mysqli_fetch_array($query_user);
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ร้านขายไอดีเกม</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">GG Store</a>
            <div class="d-flex text-white align-items-center">
                <span class="me-3">สวัสดี, คุณ <?php echo $user["Name"]; ?></span>
                <a href="logout.php" class="btn btn-outline-danger btn-sm">ออกจากระบบ</a>
            </div>
        </div>
    </nav>

    <!-- Product Grid -->
    <div class="container">
        <h4 class="mb-4">ไอดีเกมที่วางจำหน่าย</h4>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            // ดึงเฉพาะไอดีที่ยังไม่ถูกขาย
            $sql = "SELECT * FROM game_accounts WHERE Status = 'AVAILABLE'";
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)) {
            ?>
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <span class="badge bg-info text-dark mb-2"><?php echo $row['ServerRegion']; ?></span>
                        <span class="badge bg-secondary mb-2">Level <?php echo $row['AccountLevel']; ?></span>
                        <h5 class="card-title fw-bold text-primary"><?php echo $row['GameName']; ?></h5>
                        <p class="card-text text-muted small"><?php echo $row['Characters']; ?></p>
                        <h4 class="text-danger mb-0">฿<?php echo number_format($row['Price'], 2); ?></h4>
                    </div>
                    <div class="card-footer bg-white border-0 pt-0 pb-3">
                        <a href="checkout.php?id=<?php echo $row['AccID']; ?>" class="btn btn-success w-100 rounded-pill">สั่งซื้อไอดีนี้</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>