<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ฟอร์มกรอกข้อมูลไอดีเกม</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <div class="card shadow-sm max-w-md mx-auto" style="max-width: 600px;">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">เพิ่มข้อมูลไอดีเกม</h5>
            </div>
            <div class="card-body">
                <form name="addaccount" action="addaccount.php" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td width="150">ชื่อเกม</td>
                            <td><input type="text" class="form-control" placeholder="Game Name" name="GameName" required></td>
                        </tr>
                        <tr>
                            <td>เซิร์ฟเวอร์</td>
                            <td><input type="text" class="form-control" placeholder="Server Region" name="ServerRegion" required></td>
                        </tr>
                        <tr>
                            <td>เลเวลบัญชี</td>
                            <td><input type="text" class="form-control" placeholder="Account Level" name="AccountLevel" required></td>
                        </tr>
                        <tr>
                            <td>รายละเอียดตัวละคร</td>
                            <td><input type="text" class="form-control" placeholder="Characters" name="Characters" required></td>
                        </tr>
                        <tr>
                            <td>ราคา</td>
                            <td><input type="text" class="form-control" placeholder="Price" name="Price" required></td>
                        </tr>
                    </table>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>