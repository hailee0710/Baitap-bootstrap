<?php
    if(isset($_POST['them'])){
        $ten = $_POST['ten'];
        $ghichu = $_POST['ghichu'];
        $chuyenmuc = $_POST['chuyenmuc'];

        $kt=true;

        if(trim($ten) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap ten chuyen muc</div>";
            $kt=false;
        }
        
        if($kt==true){
            $sql = "INSERT INTO tbl_chuyenmuc(ten, ghichu, chuyenmuc) VALUES ('$ten', '$ghichu', '$chuyenmuc');";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Them thanh cong!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
    
?>


  <a href="?tpl=baiviet/ds" class="back col-md-1"><span class="glyphicon glyphicon-chevron-left"></span></a><h2 class="col-md-6">Them bai viet</h2>
  <form method="POST" class="col-md-12">
    <div class="form-group">
      <label for="ten">Tieu de: </label>
      <input type="text" class="form-control" name="tieude" placeholder="Nhap tieu de bai viet">
    </div>
    <div class="form-group">
      <label for="ghichu">Mo ta:</label>
      <input type="text" class="form-control" name="mota" placeholder="Nhap mo ta">
    </div>
    <div class="form-group">
      <label for="ghichu">Noi dung:</label>
      <textarea id="noidung" class="form-control" name="noidung" placeholder="Nhap noi dung"></textarea>
    </div>
        <button type="submit" class="btn btn-success" name="them">Them</button>
        <button type="reset" class="btn btn-warning">Nhap lai</button>
  </form>