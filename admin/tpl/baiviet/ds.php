<?php
    if(isset($_GET['id'])){
        $sql="DELETE FROM tbl_baiviet WHERE id={$_GET['id']}";
        if(mysql_query($sql)){
            echo "<div class='alert alert-success'>Xoa thanh cong</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Xoa that bai</div>";
        }
    }

    //phan trang
    $tongsodong = mysql_num_rows(mysql_query("SELECT id FROM tbl_baiviet"));
    $dong1trang = 10;
    $sotrang = $tongsodong/$dong1trang;
    $tranghientai = isset($_GET['p'])?(int) $_GET['p']:0;
    $dongbatdau = $tranghientai * $dong1trang;
    $trangtruoc = ($tranghientai > 0)? $tranghientai - 1:0;
    $trangsau = ($tranghientai < $sotrang)? $tranghientai + 1:round($sotrang);


    $sql="SELECT bv.id, bv.tieude, bv.mota, bv.noidung, bv.ngayviet, bv.anh, bv.dang, bv.sapxep , 
                cm.ten AS tenchuyenmuc, 
                nd.tenhienthi AS tacgia 
            FROM tbl_baiviet AS bv 
                LEFT JOIN tbl_chuyenmuc AS cm ON bv.chuyenmuc=cm.id
                LEFT JOIN tbl_nguoidung AS nd ON bv.nguoiviet=nd.id
            ORDER BY bv.sapxep ASC
            LIMIT $dongbatdau, $dong1trang;
                ";
    $query=mysql_query($sql);
?>

<div class="content">
    <h2 class="col-md-10">Danh Sach baiviet</h2>
    <a href="?tpl=baiviet/them" class="them btn btn-primary col-md-2">Them bai viet</a>
    <table class="table table-bordered col-md-12">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tieu de</th>
        <th>Mo ta</th>
        <th>Ngay viet</th>
        <th>Anh</th>
        <th>Chuyen muc</th>
        <th>Tac gia</th>
        <th>Tac vu</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $stt=1;
        while($r=mysql_fetch_object($query)):?>
      <tr>
        <td><?php echo $stt?></td>
        <td><div class="bv"><?php echo substr($r -> tieude, 0, 100).'...'?></div></td>
        <td><div class="bv"><?php echo substr($r -> mota, 0, 100).'...'?></div></td>
        <td><div class="bv"><?php echo $r -> ngayviet?></div></td>
        <td><div class="bv"><img src="../images/<?php echo $r -> anh?>" alt="anhbv" class="img-responsive"></div></td>
        <td><div class="bv"><?php echo $r -> tenchuyenmuc?></div></td>
        <td><div class="bv"><?php echo $r -> tacgia?></div></td>
        <td>
            <a href="?tpl=baiviet/sua&id= <?php echo $r -> id?>" class="btn btn-primary">Sua</a>
            <a href="?tpl=baiviet/ds&id= <?php echo $r -> id?>" class="btn btn-danger">Xoa</a>
        </td>
      </tr>
      <?php
        $stt++;
        endwhile;
      ?>
    </tbody>
  </table>
  <ul class="pagination col-md-12">
    <li><a href="?tpl=baiviet/ds&p=<?php echo $trangtruoc?>">Previous</a></li>
    <?php for($p = 0; $p<$sotrang; $p++):?>
    <li><a href="?tpl=baiviet/ds&p=<?php echo $p?>"><?php echo $p+1?></a></li>
    <?php endfor; ?>
     <li><a href="?tpl=baiviet/ds&p=<?php echo $trangsau?>">Next</a></li>
    </ul> 
</div>