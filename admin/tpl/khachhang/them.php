<?php
    if(isset($_POST['them'])){
        $tenkh = $_POST['tenkh'];
        $sdt = $_POST['sdt'];
        $sanpham = $_POST['sanpham'];
        $soluong = $_POST['soluong'];
         $gia = $_POST['gia'];
        $tongtien = $soluong*$gia;
        $thanhtien = $tongtien+($tongtien/10);
        $tendangnhap = $_POST['tendangnhap'];
        $matkhau = md5($_POST['matkhau']);
        $email = $_POST['email'];
       
        $kt=true;

        if(trim($tenkh) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap ten khach hang</div>";
            $kt=false;
        }
        if(trim($sdt) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap so dien thoai</div>";
            $kt=false;
        }
        if(trim($sanpham) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap san pham</div>";
            $kt=false;
        }
        if(trim($soluong) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap so luong</div>";
            $kt=false;
        }
       
        if(trim($gia) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap gia</div>";
            $kt=false;
        }

        if(trim($tendangnhap) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap ten dang nhap</div>";
            $kt=false;
        }
        if(trim($matkhau) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap mat khau</div>";
            $kt=false;
        }
        if(trim($email) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap email</div>";
            $kt=false;
        }
        if($kt==true){
            $sql = "INSERT INTO tbl_khachhang(tenkh, sdt, sanpham, soluong, tongtien, gia, thanhtien, tendangnhap, matkhau, email) VALUES ('$tenkh','$sdt','$sanpham','$soluong','$tongtien','$gia','$thanhtien','$tendangnhap','$matkhau','$email');";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Them thanh cong!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
  
?>


  <a href="?tpl=khachhang/ds" class="back col-md-1"><span class="glyphicon glyphicon-chevron-left"></span></a><h2 class="col-md-6">Them khach hang</h2>
  <form method="POST" enctype="multipart/form-data" class="col-md-12">
    <div class="form-group">
      <label for="tensanpham" >Ten khach hang: </label>
      <input type="text" class="form-control" name="tenkh" placeholder="Nhap ten khach hang">
    </div>
    <div class="form-group">
      <label for="masp">So dien thoai:</label>
      <input type="text" class="form-control" name="sdt" placeholder="Nhap sdt">
    </div>
    <div class="form-group">
        <label for="chuyenmuc">San pham:</label>
        <select class="form-control" name= "sanpham">
            <option>Chon san pham</option>
            <?php
                
                $laysanpham = mysql_query("SELECT id, tensp FROM tbl_sanpham");
                for($stt = 1; $stt <= mysql_num_rows($laysanpham); $stt++){
                $r=mysql_fetch_object($laysanpham);
                ?>

            <option  value ="<?php echo $r -> id?>"><?php echo $r -> tensp?></option>

            <?php
                };
            ?>
            
        </select>
        </div>
    <div class="form-group">
      <label for="mota">So luong:</label>
      <input type="number" class="form-control" name="soluong" placeholder="Nhap so luong san pham">
    </div>
    <div class="form-group">
      <label for="noidung">Gia:</label>
      <input type="text" class="form-control" name="gia">
    </div>
    <div class="form-group">
      <label for="noidung">Ten dang nhap:</label>
      <input type="text" class="form-control" name="tendangnhap">
    </div>
    <div class="form-group">
      <label for="noidung">Mat khau:</label>
      <input type="text" class="form-control" name="matkhau">
    </div>
    <div class="form-group">
      <label for="noidung">Email:</label>
      <input type="email" class="form-control" name="email">
    </div>
     <button type="submit" class="btn btn-success" name="them">Them</button>
     <button type="reset" class="btn btn-warning">Nhap lai</button>
  </form>