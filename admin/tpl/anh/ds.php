<?php
    if(isset($_GET['id'])){
        $sql="DELETE FROM tbl_anh WHERE id={$_GET['id']}";
        if(mysql_query($sql)){
            echo "<div class='alert alert-success'>Xoa thanh cong</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Xoa that bai</div>";
        }
    }

    //phan trang
    $tongsodong = mysql_num_rows(mysql_query("SELECT id FROM tbl_anh"));
    $dong1trang = 10;
    $sotrang = $tongsodong/$dong1trang;
    $tranghientai = isset($_GET['p'])?(int) $_GET['p']:0;
    $dongbatdau = $tranghientai * $dong1trang;
    $trangtruoc = ($tranghientai > 0)? $tranghientai - 1:0;
    $trangsau = ($tranghientai < $sotrang)? $tranghientai + 1:round($sotrang);


    $sql="SELECT * FROM tbl_anh ;";
    $query=mysql_query($sql);

    //up anh
    if(isset($_POST['them'])){
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
        if($kt==true){
            $sql = "INSERT INTO tbl_anh(anh) VALUES ('$anh');";

            if(mysql_query($sql)){
                echo "<div class='alert alert-success'>Them thanh cong!</div>";
                header("Refresh:0");
            }
            else{
                echo "<div class='alert alert-danger'>Co loi xay ra!</div>";
            }
        }
    }
    
?>

<div class="content">
    <h2 class="col-md-10">Danh Sach anh</h2>
    <form method="POST" enctype="multipart/form-data" class="col-md-12">
    <div class="form-group col-md-11">
    <label for="anh">Upload ảnh:</label>
      <input type="file" class="form-control"  name="upanh" id="anh">
    </div>
    <button type="submit" class="btn btn-success col-md-1" name="them">Them</button>

    </form>
    <table class="table table-bordered col-md-12">
    <thead>
      <tr>
        <th>STT</th>
        <th>Anh</th>
        <th>Tac vu</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $stt=1;
        while($r=mysql_fetch_object($query)):?>
      <tr>
        <td><?php echo $stt?></td>
        <td><div class="bv"><img src="../images/<?php echo $r -> anh?>" alt="anhbv" class="img-responsive" style="max-width: 150px"></div></td>
        <td>
            <a href="?tpl=anh/ds&id= <?php echo $r -> id?>" class="btn btn-danger">Xoa</a>
        </td>
      </tr>
      <?php
        $stt++;
        endwhile;
      ?>
    </tbody>
  </table>
  

  <ul class="pagination col-md-12">
    <li><a href="?tpl=anh/ds&p=<?php echo $trangtruoc?>">Previous</a></li>
    <?php for($p = 0; $p<$sotrang; $p++):?>
    <li><a href="?tpl=anh/ds&p=<?php echo $p?>"><?php echo $p+1?></a></li>
    <?php endfor; ?>
     <li><a href="?tpl=anh/ds&p=<?php echo $trangsau?>">Next</a></li>
    </ul> 
</div>