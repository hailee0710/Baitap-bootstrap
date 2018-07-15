<?php
    include_once "code/header.php";
    include_once "code/menu.php";
?>
<main class="container">
    <div class="row">
        <?php
            $query = mysql_query("select * from tbl_baiviet WHERE id={$_GET['id']}");
            while ($rows = mysql_fetch_object($query)):
        ?>
                <div class="col-lg-8">
                    <h3 class="text-uppercase"><?php echo $rows -> tieude?></h3>
                    <p><?php echo html_entity_decode($rows -> noidung)?></p>
                </div>
                <div class="col-lg-4"></div>
        <?php endwhile;?>
    </div>

</main>
<?php include_once "code/footer.php"?>