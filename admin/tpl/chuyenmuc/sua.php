<?php

    $sqlnd = "SELECT * FROM tbl_chuyenmuc WHERE id = {$_GET['id']};";
    $nd= mysql_query($sqlnd);
    $sua = mysql_fetch_object($nd);
    
    if(isset($_POST['them'])){
        $ten = $_POST['ten'];
        $ghichu = $_POST['ghichu'];
        $chuyenmuc = $_POST['chuyenmuc'];

        $kt=true;

        if(trim($ten) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap ten chuyen muc</div>";
            $kt=false;
        }
        
        
        if($chuyenmuc == $sua -> id){
            echo "<div class='alert alert-danger'>Chuyen muc cha khong duoc trung voi ten chuyen muc</div>";
            $kt=false;
        }

        if($kt==true){
            $sql = "UPDATE tbl_chuyenmuc SET ten = '$ten', ghichu = '$ghichu', chuyenmuc = '$chuyenmuc' WHERE id = {$_GET['id']};";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Sua thanh cong!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
    
?>


  <a href="?tpl=chuyenmuc/ds" class="back col-md-1"><span class="glyphicon glyphicon-chevron-left"></span></a><h2 class="col-md-6">Them chuyen muc</h2>
  <form method="post" class="col-md-12">
    <div class="form-group">
      <label for="ten">Ten chuyen muc:</label>
      <input type="text" class="form-control" name="ten" placeholder="Nhap ten chuyen muc" value="<?php echo $sua -> ten ?>">
    </div>
    <div class="form-group">
      <label for="ghichu">Ghi chu:</label>
      <input type="text" class="form-control" name="ghichu" placeholder="Nhap ten dang nhap" value="<?php echo $sua -> ghichu ?>">
    </div>
    <div class="form-group">
        <label for="chuyenmuccha">Chuyen muc cha:</label>
        <select class="form-control" name= "chuyenmuc">
            <option>Chon chuyen muc cha (Chon muc nay de xoa chuyen muc cha)</option>
            <?php
                $stt=1;
                $laychuyenmuc = mysql_query("SELECT * FROM tbl_chuyenmuc");
                while($r = mysql_fetch_object($laychuyenmuc)):?>

            <option  value ="<?php echo $r -> id?>"><?php echo $r -> ten?></option>

            <?php
                $stt++;
                endwhile;
            ?>
            
        </select>
        </div>
    <button type="submit" class="btn btn-default" name="them">Submit</button>
    <button type="reset" class="btn btn-danger">Nhap lai</button>
  </form>