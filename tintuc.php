<?php
	include_once "code/header.php";
	include_once "code/menu.php";
?>
<main class="container">
	<div class="row">
        <section id="title" class="container">
			<div class="row">
                <?php
                    $laytieude = mysql_fetch_object(mysql_query("SELECT * FROM tbl_chuyenmuc WHERE id = {$_GET['cm']}"));
                    $tieude = $laytieude -> ten;
                ?>
				<div class="col-md-4 col-sm-5 col-xs-4"></div>
				<div class="title col-md-4 col-sm-2 col-xs-4 bg-danger text-center page-header">
					<h3 class="text-uppercase"><?php echo $tieude ?></h3>
				</div>
				<div class="col-md-4 col-sm-5 col-xs-4"> </div>
				</div>
        </section>
        
        <section id="chuongtrinh" class="container">
			<div class="row">
                <?php
                    $laybaiviet = mysql_query("SELECT * FROM tbl_baiviet WHERE chuyenmuc = {$_GET['cm']}");
                    while ($baiviet = mysql_fetch_object($laybaiviet)):
                ?>
                <div class="chuongtrinh col-md-3 col-sm-6 col-xs-12 text-center">
					<a href="chitietbantin.php?id=<?php echo $baiviet -> id?>"><img src="images/<?php echo $baiviet -> anh ?>" alt="ảnh chương trình" class="img-responsive col-sm-12  col-xs-12"></a>
					<h4><a href="chitietbantin.php?id=<?php echo $baiviet -> id?>"><?php echo $baiviet -> tieude ?></a></h4>
					<p><?php echo $baiviet -> ngayviet?></p>
				</div>
				<?php endwhile; ?>	
            </div>
        </section>
    </div>
</main>
<?php
	include_once "code/footer.php";
?>