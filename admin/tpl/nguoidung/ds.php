<?php
    if(isset($_GET['id'])){
        $sql="DELETE FROM tbl_nguoidung WHERE id={$_GET['id']}";
        if(mysql_query($sql)){
            echo "<div class='alert alert-success'>Xoa thanh cong</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Xoa that bai</div>";
        }
    }
    $sql="SELECT * FROM tbl_nguoidung;";
    $query=mysql_query($sql);
?>

<div class="content">
    <h2 class="col-md-10">Danh Sach nguoi dung</h2>
    <a href="?tpl=nguoidung/them" class="them btn btn-primary col-md-2">Them nguoi dung</a>
    <table class="table table-bordered col-md-12">
    <thead>
      <tr>
        <th>STT</th>
        <th>Ten nguoi dung</th>
        <th>Ten dang nhap</th>
        <th>Mat khau</th>
        <th>Tac vu</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $stt=1;
        while($r=mysql_fetch_object($query)):?>
      <tr>
        <td><?php echo $stt?></td>
        <td><?php echo $r -> tenhienthi?></td>
        <td><?php echo $r -> tendangnhap?></td>
        <td><?php echo $r -> matkhau?></td>
        <td>
            <a href="?tpl=nguoidung/sua&id= <?php echo $r -> id?>" class="btn btn_primary">Sua</a>
            <a href="?tpl=nguoidung/ds&id= <?php echo $r -> id?>" class="btn btn_danger">Xoa</a>
        </td>
      </tr>
      <?php
        $stt++;
        endwhile;
      ?>
    </tbody>
  </table>
</div>