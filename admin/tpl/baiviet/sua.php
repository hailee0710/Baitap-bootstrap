<?php

    $laybaiviet = mysql_fetch_object(mysql_query("SELECT bv.id, bv.tieude, bv.mota, bv.noidung, bv.ngayviet, bv.anh, bv.dang, bv.sapxep , 
                        cm.ten AS tenchuyenmuc, 
                        nd.tenhienthi AS tacgia 
                    FROM tbl_baiviet AS bv 
                    LEFT JOIN tbl_chuyenmuc AS cm ON bv.chuyenmuc=cm.id AND bv.id = {$_GET['id']}
                    LEFT JOIN tbl_nguoidung AS nd ON bv.nguoiviet=nd.id AND bv.id = {$_GET['id']}"));
    
    if(isset($_POST['sua'])){
        $tieude = $_POST['tieude'];
        $mota = $_POST['mota'];
        $noidung = $_POST['noidung'];
        $anh = '';
        $sapxep = $_POST['sapxep'];
        $chuyenmuc = $_POST['chuyenmuc'];
        $kt=true;

        if(isset($_FILES['upanh']['name'])){
            
            //check dinh dang file anh
            $imageFileType = strtolower(pathinfo($_FILES['upanh']['name'], PATHINFO_EXTENSION));

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
                $kt=false;
                
            }else{
                $anh = $_FILES['upanh']['name'];
                move_uploaded_file($_FILES['upanh']['tmp_name'],'../images/'.$anh);
            }

        }else{
            $anh = '';
        }   

        $kt=true;

        if(trim($tieude) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap tieu de</div>";
            $kt=false;
        }

        if(trim($mota) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap mo ta</div>";
            $kt=false;
        }
        if(trim($noidung) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap noi dung</div>";
            $kt=false;
        }

        if($kt==true){
            $sql = "UPDATE tbl_baiviet SET tieude = '$tieude', mota = '$mota', noidung = '$noidung', anh = '$anh', sapxep = '$sapxep', chuyenmuc = '$chuyenmuc' WHERE id = {$_GET['id']};";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Sua thanh cong!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
    
?>


   <a href="?tpl=baiviet/ds" class="back col-md-1"><span class="glyphicon glyphicon-chevron-left"></span></a><h2 class="col-md-6">Them bai viet</h2>
  <form method="POST" enctype="multipart/form-data" class="col-md-12">
    <div class="form-group">
      <label for="ten" >Tieu de: </label>
      <input type="text" class="form-control" name="tieude" value="<?php echo $laybaiviet -> tieude?>">
    </div>
    <div class="form-group">
      <label for="mota">Mo ta:</label>
      <input type="text" class="form-control" name="mota" value="<?php echo $laybaiviet -> mota?>">
    </div>
    <div class="form-group">
      <label for="noidung">Noi dung:</label>
      <textarea id="noidung" class="form-control" name="noidung" value="<?php echo $laybaiviet -> noidung?>"></textarea>
    </div>
    <div class="form-group col-md-6">
    <div class="form-group">
      <label for="anh">Upload ảnh:</label>
      <input type="file" class="form-control"  name="upanh" id="anh">
    </div>
    <div class="form-group col-md-6">
      <label for="nguoiviet">Tac gia:</label>
      <p class ="text-info"><?php 
      echo $_SESSION['tk']['hienthi']?></p>
    </div>
    <div class="form-group col-md-6">
      <label for="sapxep">Thu tu:</label>
      <input type="text" class="form-control" name="sapxep" value="<?php echo $laybaiviet -> sapxep?>">
    </div>
    <div class="form-group">
        <label for="chuyenmuc">Chuyen muc:</label>
        <select class="form-control" name= "chuyenmuc">
            <option>Chon chuyen muc</option>
            <?php
                
                $laychuyenmuc = mysql_query("SELECT id, ten FROM tbl_chuyenmuc");
                for($stt = 1; $stt <= mysql_num_rows($laychuyenmuc); $stt++){
                $r=mysql_fetch_object($laychuyenmuc);
                ?>

            <option  value ="<?php echo $r -> id?>"><?php echo $r -> ten?></option>

            <?php
                };
            ?>
            
        </select>
        </div>
        <button type="submit" class="btn btn-success" name="sua">Them</button>
        <button type="reset" class="btn btn-warning">Nhap lai</button>
  </form>