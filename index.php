<?php
	include_once "code/header.php";
	include_once "code/menu.php";
?>
	
	<main class="container">
				<div class="row">
					<section id="slider">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								</ol>
							
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
								<?php
									$sql="SELECT * FROM tbl_anh ORDER BY id DESC LIMIT 0,1";
									$kq=mysql_query($sql);
									while ($r=mysql_fetch_object($kq)):
								?>	
									<div class="item active">
										<img src="images/<?php echo $r->anh ?>" alt="...">
									</div>
									<?php endwhile;?>
									<?php
                            			$sql="SELECT * FROM tbl_anh ORDER BY id DESC LIMIT 1,4";
                            			$kq=mysql_query($sql);
                            			while ($c= mysql_fetch_object($kq)):
                        			?>
									<div class="item">
										<img src="images/<?php echo $c->anh ?>" alt="...">
									</div>
									<?php endwhile;?>

								</div>
							
								<!-- Controls -->
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
					</div>
				</section>
				
				<section id="title" class="container">
						<div class="row">
								<div class="col-md-4 col-sm-5 col-xs-4"></div>
								<div class="title col-md-4 col-sm-2 col-xs-4 bg-danger text-center page-header">
									<h3>TIN TRONG NƯỚC</h3>
								</div>
								<div class="col-md-4 col-sm-5 col-xs-4"> </div>
							</div>
				</section>
				<?php
                            $sql="select * from tbl_baiviet WHERE chuyenmuc='5' LIMIT 0,1";
                            $kq=mysql_query($sql);
                            while ($i=mysql_fetch_object($kq)):
                        ?>
				<section id="bantin" class="container">	
					<div class="row">
						<div class="bantin col-md-6 col-sm-12 col-xs-12 text-center">
							<img src="images/<?php echo $i -> anh?>" alt="s" class="img-responsive col-sm-12 col-xs-12">
							<a href="chitietbantin.php?id=<?php echo $i -> id?>"><h4><?php echo $i -> tieude?></h4></a>
							<p><?php echo $i -> ngayviet?>/<span class="glyphicon glyphicon-eye-open"></span> 124</p>
						</div>
						<?php endwhile;?>

						<?php
                            $sql = "select * from tbl_baiviet WHERE chuyenmuc='5' limit 1,4";
                            $kq=mysql_query($sql);
                            while ($r=mysql_fetch_object($kq)):
                        ?>

						<div class="tinnho col-md-3 col-sm-6 col-xs-6 text-center">
							<img src="images/<?php echo $r -> anh?>" alt="s" class="img-responsive col-sm-12 col-xs-12">
							<p><a href="chitietbantin.php?id=<?php echo $r -> id?>"><?php echo $r -> tieude?></a></p>
						</div>
						
						<?php endwhile; ?>
					</div>
				</section>

				<section id="title" class="container">
					<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-3"></div>
							<div class="title col-md-4  col-sm-4 col-xs-6 bg-danger text-center page-header">
								<h3>SẢN PHẨM</h3>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-3"></div>
						</div>
						</section>
				<section id="chuongtrinh" class="container">
					
					<div class="row">
					<?php
						$sql= "SELECT * FROM tbl_sanpham";
						$kq= mysql_query($sql);
						while ($sp=mysql_fetch_object($kq)):
					?>
							<div class="chuongtrinh col-md-3 col-sm-6 col-xs-12 text-center">
									<a href="chitietsp.php?id=<?php echo $sp -> id?>"><img src="images/<?php echo $sp -> anh ?>" alt="ảnh chương trình" class="img-responsive col-sm-12  col-xs-12"></a>
									<h4><a href="chitietsp.php?id=<?php echo $sp -> id?>"><?php echo $sp -> tensp ?></a></h4>
									<p>Giá: <?php echo $sp -> gia ?> đ</p>
							</div>
							<?php endwhile; ?>	
					</div>
					
				</section>

				<section id="title" class="container">
						<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-3"></div>
								<div class="title col-md-4 col-sm-4 col-xs-6 bg-danger text-center page-header">
									<h3 class="text-white">CHONG HANG GIA</h3>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-3"> </div>
							</div>
				</section>

				<section id="chongHangGia" class="container">
						<div class="row">
						<?php
                            $sql="select * from tbl_baiviet WHERE chuyenmuc='6' LIMIT 0,3";
                            $kq=mysql_query($sql);
                            while ($tg=mysql_fetch_object($kq)):
                        ?>
								<div class="chongHangGia col-md-4 col-sm-12 col-xs-12">
										<a href="chitietbantin.php?id=<?php echo $tg -> id?>"><img src="images/<?php echo $tg -> anh?>" alt="ảnh chống hàng giả" class="img-responsive col-sm-12 col-xs-12"></a>
								</div>
								<?php endwhile; ?>	
						</div>
					</section>
	</main>
<?php
	include_once "code/footer.php";
?>
	