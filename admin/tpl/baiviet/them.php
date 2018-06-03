<?php
    if(isset($_POST['them'])){
        $tieude = $_POST['tieude'];
        $mota = $_POST['mota'];
        $noidung = $_POST['noidung'];
        $nguoiviet = $_SESSION['tk']['id'];
        $sapxep = $_POST['sapxep'];
        $chuyenmuc = $_POST['chuyenmuc'];
        $ngayviet = date('YYYY-MM-DD HH:MI:SS'); 

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
        if(trim($sapxep) == ''){
            $laythutulonnhat = mysql_fetch_object(mysql_query("SELECT MAX(sapxep) AS ttlonnhat FROM tbl_baiviet"));
            $thutu = $laythutulonnhat -> ttlonnhat;
            $sapxep = $thutu +1;           
        }
        if($kt==true){
            $sql = "INSERT INTO tbl_baiviet(tieude, mota, noidung, ngayviet, nguoiviet, sapxep, chuyenmuc) VALUES ('$tieude', '$mota', '$noidung', $ngayviet, '$nguoiviet', '$chuyenmuc');";

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
      <label for="mota">Mo ta:</label>
      <input type="text" class="form-control" name="mota" placeholder="Nhap mo ta">
    </div>
    <div class="form-group">
      <label for="noidung">Noi dung:</label>
      <textarea id="noidung" class="form-control" name="noidung" placeholder="Nhap noi dung"></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="nguoiviet">Tac gia:</label>
      <p class ="text-info"><?php 
      echo $_SESSION['tk']['hienthi']?></p>
    </div>
    <div class="form-group col-md-6">
      <label for="sapxep">Thu tu:</label>
      <input type="text" class="form-control" name="sapxep" placeholder="Nhap thu tu bai viet">
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