<?php
    if(isset($_POST['them'])){
        $tensp = $_POST['tensp'];
        $masp = $_POST['masp'];
        $gia = $_POST['gia'];
        $mota = $_POST['mota'];
        $tinhtrang = $_POST['tinhtrang'];
        $xuatxu = $_POST['xuatxu'];
        $noidung = $_POST['noidung'];
        $nguoitao = $_SESSION['tk']['id'];
        $chuyenmuc = $_POST['chuyenmuc'];
       
        $anh = '';

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
            $sql = "INSERT INTO tbl_sanpham(tensp, masp, gia, mota, noidung, tinhtrang, xuatxu, nguoitao, anh, chuyenmuc) VALUES ('$tensp','$masp','$gia','$mota','$noidung','$tinhtrang','$xuatxu','$nguoitao','$anh','$chuyenmuc');";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Them thanh cong!</div>";
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
    
?>


  <a href="?tpl=sanpham/ds" class="back col-md-1"><span class="glyphicon glyphicon-chevron-left"></span></a><h2 class="col-md-6">Them san pham</h2>
  <form method="POST" enctype="multipart/form-data" class="col-md-12">
    <div class="form-group">
      <label for="tensanpham" >Ten san pham: </label>
      <input type="text" class="form-control" name="tensp" placeholder="Nhap ten san pham">
    </div>
    <div class="form-group">
      <label for="masp">Ma san pham:</label>
      <input type="text" class="form-control" name="masp" placeholder="Nhap ma san pham">
    </div>
    <div class="form-group">
      <label for="gia">Gia san pham:</label>
      <input type="text" class="form-control" name="gia" placeholder="Nhap gia san pham">
    </div>
    <div class="form-group">
      <label for="mota">Mo ta:</label>
      <input type="text" class="form-control" name="mota" placeholder="Nhap mo ta san pham">
    </div>
    <div class="form-group">
      <label for="tinhtrang">Tinh Trang:</label>
      <input type="text" class="form-control" name="tinhtrang" placeholder="Nhap tinh trang cua san pham">
    </div>
    <div class="form-group">
      <label for="xuatxu">Xuat xu:</label>
      <input type="text" class="form-control" name="xuatxu" placeholder="Nhap xuat xu san pham">
    </div>
    <div class="form-group">
      <label for="noidung">Noi dung:</label>
      <textarea id="noidung" class="form-control" name="noidung"></textarea>
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
        <button type="submit" class="btn btn-success" name="them">Them</button>
        <button type="reset" class="btn btn-warning">Nhap lai</button>
  </form>