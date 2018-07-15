<?php
    if(isset($_GET['id'])){
        $sql="DELETE FROM tbl_khachhang WHERE id={$_GET['id']}";
        if(mysql_query($sql)){
            echo "<div class='alert alert-success'>Xoa thanh cong</div>";
        }
        else{
            echo "<div class='alert alert-danger'>Xoa that bai</div>";
        }
    }

    //phan trang
    $tongsodong = mysql_num_rows(mysql_query("SELECT id FROM tbl_khachhang"));
    $dong1trang = 10;
    $sotrang = $tongsodong/$dong1trang;
    $tranghientai = isset($_GET['p'])?(int) $_GET['p']:0;
    $dongbatdau = $tranghientai * $dong1trang;
    $trangtruoc = ($tranghientai > 0)? $tranghientai - 1:0;
    $trangsau = ($tranghientai < $sotrang)? $tranghientai + 1:round($sotrang);


    $sql="SELECT kh.id, kh.tenkh, kh.sdt, kh.sanpham, kh.soluong, kh.tongtien, kh.gia, kh.thanhtien,  
                sp.tensp
            FROM tbl_khachhang AS kh 
                LEFT JOIN tbl_sanpham AS sp ON kh.sanpham=sp.id
            LIMIT $dongbatdau, $dong1trang;
                ";
    $query=mysql_query($sql);
?>

<div class="content">
    <h2 class="col-md-10">Danh Sach khach hang</h2>
    <a href="?tpl=khachhang/them" class="them btn btn-primary col-md-2">Them khach hang</a>
    <table class="table table-bordered col-md-12">
    <thead>
      <tr>
        <th>STT</th>
        <th>Ten khach hang</th>
        <th>So dien thoai</th>
        <th>Ten san pham</th>
        <th>So luong</th>
        <th>Gia</th>
        <th>Tong tien</th>
        <th>Thanh tien</th>
        <th>Tac vu</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $stt=1;
        while($r=mysql_fetch_object($query)):?>
      <tr>
        <td><?php echo $stt?></td>
        <td><div class="bv"><?php echo $r -> tenkh?></div></td>
        <td><div class="bv"><?php echo $r -> sdt?></div></td>
        <td><div class="bv"><?php echo $r -> tensp?></div></td>
        <td><div class="bv"><?php echo $r -> soluong?></div></td>
        <td><div class="bv"><?php echo $r -> gia?></div></td>
        <td><div class="bv"><?php echo $r -> tongtien?></div></td>
        <td><div class="bv"><?php echo $r -> thanhtien?></div></td>
        <td>
            <a href="?tpl=khachhang/sua&id= <?php echo $r -> id?>" class="btn btn-primary">Sua</a>
            <a href="?tpl=khachhang/ds&id= <?php echo $r -> id?>" class="btn btn-danger">Xoa</a>
        </td>
      </tr>
      <?php
        $stt++;
        endwhile;
      ?>
    </tbody>
  </table>
  <ul class="pagination col-md-12">
    <li><a href="?tpl=khachhang/ds&p=<?php echo $trangtruoc?>">Previous</a></li>
    <?php for($p = 0; $p<$sotrang; $p++):?>
    <li><a href="?tpl=khachhang/ds&p=<?php echo $p?>"><?php echo $p+1?></a></li>
    <?php endfor; ?>
     <li><a href="?tpl=khachhang/ds&p=<?php echo $trangsau?>">Next</a></li>
    </ul> 
</div>