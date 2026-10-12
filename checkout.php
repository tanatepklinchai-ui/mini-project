<?php
session_start();
if($_SESSION['UserID'] == "" || $_SESSION['Status'] != "USER") {
    header("location: login.html");
    exit();
}
$conn = mysqli_connect("localhost", "root", "", "mydatabase1");
$acc_id = $_GET['id'];

// ดึงข้อมูลไอดีที่เลือก
$sql = "SELECT * FROM game_accounts WHERE AccID = '$acc_id' AND Status = 'AVAILABLE'";
$query = mysqli_query($conn, $sql);
$item = mysqli_fetch_array($query);

if(!$item) {
    echo "<script>alert('ขออภัย ไอดีนี้ถูกขายไปแล้ว หรือไม่มีในระบบ'); window.location='user.php';</script>";
    exit();
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ชำระเงิน | GG Store</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h5 class="mb-0">ยืนยันการสั่งซื้อ</h5>
                    </div>
                    <div class="card-body p-4">
                        <h6 class="text-muted">รายละเอียดสินค้า</h6>
                        <ul class="list-group mb-4">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                เกม: <strong><?php echo $item['GameName']; ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                เซิร์ฟเวอร์ / เลเวล: <span><?php echo $item['ServerRegion']; ?> / Lv.<?php echo $item['AccountLevel']; ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center text-danger">
                                ยอดชำระทั้งหมด: <strong>฿<?php echo number_format($item['Price'], 2); ?></strong>
                            </li>
                        </ul>

                        <form action="process_payment.php" method="post">
                            <input type="hidden" name="AccID" value="<?php echo $item['AccID']; ?>">
                            <h6 class="text-muted mb-3">ช่องทางการชำระเงิน</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="payment_method" id="pay1" value="promptpay" checked>
                                <label class="form-check-label" for="pay1">สแกน QR Code (PromptPay)</label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="payment_method" id="pay2" value="credit">
                                <label class="form-check-label" for="pay2">บัตรเครดิต / เดบิต</label>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg w-100 rounded-pill">ยืนยันและชำระเงิน</button>
                            <a href="user.php" class="btn btn-link w-100 mt-2 text-muted">ยกเลิก</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>