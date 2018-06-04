<?php
    include_once '../ketnoi.php';
    include_once 'kiemtra.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script>
    window.onload = function() {
        CKEDITOR.replace( 'noidung' );
    };
</script>

</head>
<body>
    <div class="container-fluid">
        <div class="row">
        <div class="sidenav navbar navbar-inverse col-md-2">
            <a href="index.php">HOME</a>
            <a href="?tpl=baiviet/ds">Bai viet</a>
            <a href="?tpl=chuyenmuc/ds">Chuyen muc</a>
            <a href="?tpl=nguoidung/ds">Nguoi dung</a>
            <a href="?tpl=sanpham/ds">San Pham</a>
            <a href="?tpl=khachhang/ds">Khach Hang</a>
            <a href="dangxuat.php">Thoat</a>
            </div>

            <div class="content col-md-10">
                <?php
                    if(isset($_GET['tpl'])){
                        include_once 'tpl/' . $_GET['tpl']. '.php';
                    }
                    else{
                        include_once 'home.php';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
