<?php
    if(isset($_POST['them'])){
        $tenhienthi = $_POST['tenhienthi'];
        $tendangnhap = $_POST['tendangnhap'];
        $matkhau = md5($_POST['matkhau']);
        $matkhau2 = md5($_POST['matkhau2']);

        $kt=true;

        if(trim($tenhienthi) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap ten hien thi</div>";
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
       
        if($matkhau2 != $matkhau){
            echo "<div class='alert alert-danger'>Mat khau khong dung</div>";
            $kt=false;
        }

        if($kt==true){
            $sql = "INSERT INTO tbl_nguoidung (tenhienthi, tendangnhap, matkhau) VALUES ('$tenhienthi', '$tendangnhap', '$matkhau');";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Them thanh cong!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
?>


  <a href="?tpl=nguoidung/ds" class="back col-md-1"><span class="glyphicon glyphicon-chevron-left"></span></a><h2 class="col-md-6">Them nguoi dung</h2>
  <form method="post" class="col-md-12">
    <div class="form-group">
      <label for="tennguoidung">Ten nguoi dung:</label>
      <input type="text" class="form-control" name="tenhienthi" placeholder="Nhap ten nguoi dung" name="tenhienthi">
    </div>
    <div class="form-group">
      <label for="tendangnhap">Ten dang nhap:</label>
      <input type="text" class="form-control" name="tendangnhap" placeholder="Nhap ten dang nhap" name="tendangnhap">
    </div>
    <div class="form-group">
      <label for="pwd">Mat khau:</label>
      <input type="password" class="form-control" name="matkhau" placeholder="Nhap mat khau" name="pwd">
    </div>
    <div class="form-group">
      <label for="pwd">Nhap lai mat khau:</label>
      <input type="password" class="form-control" name="matkhau2" placeholder="Nhap mat khau" name="pwd2">
    </div>
    <button type="submit" class="btn btn-default" name="them">Submit</button>
    <button type="reset" class="btn btn-danger">Nhap lai</button>
  </form>
