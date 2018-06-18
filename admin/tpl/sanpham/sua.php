<?php

    $laysanpham = mysql_fetch_object(mysql_query("SELECT sp.id, sp.tensp, sp.masp, sp.noidung, sp.mota, sp.anh, sp.xuatxu, sp.tinhtrang, sp.gia, sp.nguoitao, sp.chuyenmuc,
                        cm.ten AS tenchuyenmuc, cm.id AS idcm,
                        nd.tenhienthi AS tacgia 
                    FROM tbl_sanpham AS sp 
                    LEFT JOIN tbl_chuyenmuc AS cm ON sp.chuyenmuc=cm.id AND sp.id = {$_GET['id']}
                    LEFT JOIN tbl_nguoidung AS nd ON sp.nguoitao=nd.id AND sp.id = {$_GET['id']}"));
    
    if(isset($_POST['sua'])){
        $tensp = $_POST['tensp'];
        $masp = $_POST['masp'];
        $gia = $_POST['gia'];
        $mota = $_POST['mota'];
        $tinhtrang = $_POST['tinhtrang'];
        $xuatxu = $_POST['xuatxu'];
        $noidung = $_POST['noidung'];
        $nguoitao = $_SESSION['tk']['id'];
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

        if(trim($tensp) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap ten san pham</div>";
            $kt=false;
        }
        if(trim($masp) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap ma san pham</div>";
            $kt=false;
        }
        if(trim($gia) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap gia san pham</div>";
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
        if(trim($xuatxu) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap xuat xu</div>";
            $kt=false;
        }
        if(trim($tinhtrang) == ''){
            echo "<div class='alert alert-danger'>Ban chua nhap tinh trang</div>";
            $kt=false;
        }

        if($kt==true){
            $sql = "UPDATE tbl_sanpham SET tensp = '$tensp', mota = '$mota', noidung = '$noidung', anh = '$anh', gia = '$gia', chuyenmuc = '$chuyenmuc', masp = '$masp', tinhtrang = '$tinhtrang', xuatxu = '$xuatxu', nguoitao = '$nguoitao' WHERE id = {$_GET['id']};";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Sua thanh cong!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
    
?>


   <a href="?tpl=sanpham/ds" class="back col-md-1"><span class="glyphicon glyphicon-chevron-left"></span></a><h2 class="col-md-6">Sua san pham</h2>
  <form method="POST" enctype="multipart/form-data" class="col-md-12">
    <div class="form-group">
      <label for="tensp" >Ten san pham: </label>
      <input type="text" class="form-control" name="tensp" value="<?php echo $laysanpham -> tensp?>">
    </div>
    <div class="form-group">
      <label for="masp" >Ma san pham: </label>
      <input type="text" class="form-control" name="masp" value="<?php echo $laysanpham -> masp?>">
    </div>
    <div class="form-group">
      <label for="gia" >Gia san pham: </label>
      <input type="text" class="form-control" name="gia" value="<?php echo $laysanpham -> gia?>">
    </div>
    <div class="form-group">
      <label for="mota">Mo ta:</label>
      <input type="text" class="form-control" name="mota" value="<?php echo $laysanpham -> mota?>">
    </div>
    <div class="form-group">
      <label for="tinhtrang" >Tinh trang san pham: </label>
      <input type="text" class="form-control" name="tinhtrang" value="<?php echo $laysanpham -> tinhtrang?>">
    </div>
    <div class="form-group">
      <label for="xuatxu" >Xuat xu san pham: </label>
      <input type="text" class="form-control" name="xuatxu" value="<?php echo $laysanpham -> xuatxu?>">
    </div>
    <div class="form-group">
      <label for="noidung">Noi dung:</label>
      <textarea id="noidung" class="form-control" name="noidung" value="<?php echo $laysanpham -> noidung?>"></textarea>
    </div>
    <div class="form-group col-md-6">
    <div class="form-group">
      <label for="anh">Upload ảnh:</label>
      <input type="file" class="form-control"  name="upanh" id="anh">
    </div>
    <div class="form-group col-md-6">
      <label for="nguoitao">Nguoi tao:</label>
      <p class ="text-info"><?php 
      echo $_SESSION['tk']['hienthi']?></p>
    </div>
    <div class="form-group">
        <label for="chuyenmuc">Chuyen muc:</label>
        <select class="form-control" name= "chuyenmuc">
            <option value ="<?php echo $laysanpham -> idcm?>"><?php echo $laysanpham -> tenchuyenmuc?></option>
            <?php
                
                $laychuyenmuc = mysql_query("SELECT id, ten FROM tbl_chuyenmuc");
                for($stt = 1; $stt <= mysql_num_rows($laychuyenmuc); $stt++){
                    if($stt != $laybaiviet -> idcm){
                $r=mysql_fetch_object($laychuyenmuc);
                ?>

            <option  value ="<?php echo $r -> id?>"><?php echo $r -> ten?></option>

            <?php
                }};
            ?>
            
        </select>
        </div>
        <button type="submit" class="btn btn-success" name="sua">Sua</button>
        <button type="reset" class="btn btn-warning">Nhap lai</button>
  </form>