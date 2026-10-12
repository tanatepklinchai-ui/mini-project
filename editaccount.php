<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ฟอร์มแก้ไขข้อมูล</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <form name="แก้ไขข้อมูลไอดีเกม" action="save_editaccount.php?id=<?php echo $_GET["id"];?>" method="post">
    <!-- หลังจากแก้ไขข้อมูลเรียบร้อยเมื่อกดปุ่มบันทึกแล้วจะส่งค่าไอดีไปเพื่อส่งข้อมูลไปยังไฟล์รับค่าแก้ไขข้อมูล -->
    
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="mydatabase1";
    $conn=mysqli_connect("$servername", "$username", "$password", "$dbname");

    $sql="select * from game_accounts where AccID='".$_GET["id"]."'";
    $query=mysqli_query($conn, $sql);
    $result=mysqli_fetch_array($query);
    /* ขั้นตอนการเข้าถึงฐานข้อมูล เริ่มตั้งแต่การเชื่อมกับ phpmyadmin จากนั้นใช้คำสั่ง select ในการเรียกข้อมูล */

    if(!$result)
    {
        echo "ไม่พบข้อมูล AccID=".$_GET["id"];
        /* ถ้าไม่พบข้อมูลจะแสดงค่าว่าไม่พบข้อมูล ID ที่ส่งค่ามา */
    }
    else
    {
        /* แต่ถ้าพบข้อมูลจะดึงข้อมูลมาแสดงในตารางเพื่อทำการแก้ไข */
    ?>
    <div class="container">
        <div class="card shadow-sm max-w-md mx-auto" style="max-width: 600px;">
            <div class="card-header bg-warning">
                <h4 class="mb-0">แก้ไขข้อมูลไอดีเกม</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered mb-0">
                    <tr>
                        <th width="150">รหัสไอดีเกม</th>
                        <td>
                            <input type="hidden" name="AccID" value="<?php echo $result["AccID"];?>"><?php echo $result["AccID"];?>
                            <!-- input type="hidden" คือการซ่อนไม่ให้มีการแก้ไขข้อมูลในช่องนี้ -->
                        </td>
                    </tr>
                    <tr>
                        <th>ชื่อเกม</th>
                        <td><input type="text" class="form-control" name="GameName" value="<?php echo $result["GameName"];?>"></td>
                    </tr>
                    <tr>
                        <th>เซิร์ฟเวอร์</th>
                        <td><input type="text" class="form-control" name="ServerRegion" value="<?php echo $result["ServerRegion"];?>"></td>
                    </tr>
                    <tr>
                        <th>เลเวลบัญชี</th>
                        <td><input type="text" class="form-control" name="AccountLevel" value="<?php echo $result["AccountLevel"];?>"></td>
                    </tr>
                    <tr>
                        <th>รายละเอียด</th>
                        <td><input type="text" class="form-control" name="Characters" value="<?php echo $result["Characters"];?>"></td>
                    </tr>
                    <tr>
                        <th>ราคา</th>
                        <td><input type="text" class="form-control" name="Price" value="<?php echo $result["Price"];?>"></td>
                    </tr>
                    <tr>
                        <th>สถานะ</th>
                        <td><input type="text" class="form-control" name="Status" value="<?php echo $result["Status"];?>"></td>
                    </tr>
                </table>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    mysqli_close($conn);
    ?>
    </form>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>