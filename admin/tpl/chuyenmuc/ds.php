<?php
    if(isset($_GET['id'])){
        $sql="DELETE FROM tbl_chuyenmuc WHERE id={$_GET['id']}";
        if(mysql_query($sql)){
            echo "<div class='alert alert-success'>Xoa thanh cong</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Xoa that bai</div>";
        }
    }
    $sql="SELECT cm.id, cm.ten, cm.ghichu, cm.chuyenmuc, cm2.ten AS tencha FROM tbl_chuyenmuc AS cm LEFT JOIN tbl_chuyenmuc AS cm2 ON cm2.id=cm.chuyenmuc;";
    $query=mysql_query($sql);
?>

<div class="content">
    <h2 class="col-md-10">Danh Sach chuyen muc</h2>
    <a href="?tpl=chuyenmuc/them" class="them btn btn-primary col-md-2">Them chuyen muc</a>
    <table class="table table-bordered col-md-12">
    <thead>
      <tr>
        <th>STT</th>
        <th>Ten chuyen muc</th>
        <th>Ghi chu</th>
        <th>Chuyen muc cha</th>
        <th>Tac vu</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $stt=1;
        while($r=mysql_fetch_object($query)):?>
      <tr>
        <td><?php echo $stt?></td>
        <td><?php echo $r -> ten?></td>
        <td><?php echo $r -> ghichu?></td>
        <td><?php echo $r -> tencha?></td>
        <td>
            <a href="?tpl=chuyenmuc/sua&id= <?php echo $r -> id?>" class="btn btn_primary">Sua</a>
            <a href="?tpl=chuyenmuc/ds&id= <?php echo $r -> id?>" class="btn btn_danger">Xoa</a>
        </td>
      </tr>
      <?php
        $stt++;
        endwhile;
      ?>
    </tbody>
  </table>
</div>