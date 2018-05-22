<?php

    $sqlnd = "SELECT * FROM tbl_nguoidung WHERE id = {$_GET['id']};";
    $nd= mysql_query($sqlnd);
    $sua = mysql_fetch_object($nd);
    
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
            echo "<div class='alert alert-danger'>Mat khau khong khop</div>";
            $kt=false;
        }

        if($kt==true && $matkhau2 == $matkhau){
            $sql = "UPDATE tbl_nguoidung SET tenhienthi = '$tenhienthi', tendangnhap = '$tendangnhap', matkhau = '$matkhau' WHERE id = {$_GET['id']};";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Sua thanh cong!</div>";
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
      <input type="text" class="form-control" name="tenhienthi" placeholder="Nhap ten nguoi dung" name="tenhienthi" value="<?php echo $sua -> tenhienthi ?>">
    </div>
    <div class="form-group">
      <label for="tendangnhap">Ten dang nhap:</label>
      <input type="text" class="form-control" name="tendangnhap" placeholder="Nhap ten dang nhap" name="tendangnhap" value="<?php echo $sua -> tendangnhap ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Mat khau:</label>
      <input type="password" class="form-control" name="matkhau" placeholder="Nhap mat khau" name="pwd" value="<?php echo $sua -> matkhau ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Nhap lai mat khau:</label>
      <input type="password" class="form-control" name="matkhau2" placeholder="Nhap mat khau" name="pwd2">
    </div>
    <button type="submit" class="btn btn-default" name="them">Submit</button>
    <button type="reset" class="btn btn-danger">Nhap lai</button>
  </form>
