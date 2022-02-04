<?php require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batik Reyre | Batik Online telengkap dan terpercaya</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
<?php include "menu.php"; ?>

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/banner-bg1.jpg">
                <div class="container">

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Batik Wanita</h2>
                    </div>
                </div>
            </div>
            <div class="row">
			<?php
				$sql = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE ktgri_brg='Batik Wanita' ORDER BY RAND() ASC limit 4");
				while($recommend = mysqli_fetch_array($sql)){
			?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="paneladmin/<?php echo $recommend['gambar']; ?>" alt="">
                            <div class="sale">Sale</div>
                            <ul>
                                <li class="quick-view"><a href="produk.php?kd=<?php echo $recommend['no_brg']; ?>"><i class="icon_bag_alt"></i>+ Detail</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?php echo $recommend['ktgri_brg']; ?></div>
                            <a href="#">
                                <h5><?php echo $recommend['nm_brg']; ?></h5>
                            </a>
                            <div class="product-price">
                                Rp.<?php echo number_format($recommend['harga_akhir'],2,",",".");?>
                                <?php
									if( $recommend['diskon'] > 0 ){
								?>
									<span>Rp.<?php echo number_format($recommend['harga'],2,",",".");?></span>
								<?php
									}
								?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
					}
				?>
				
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
	
    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Batik Pria</h2>
                    </div>
                </div>
            </div>
            <div class="row">
			<?php
				$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE ktgri_brg='Batik Pria' ORDER BY RAND() ASC limit 4");
				while($recommend2 = mysqli_fetch_array($sql2)){
			?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="paneladmin/<?php echo $recommend2['gambar']; ?>" alt="">
                            <div class="sale">Sale</div>
                            <ul>
                                <li class="quick-view"><a href="produk.php?kd=<?php echo $recommend2['no_brg']; ?>"><i class="icon_bag_alt"></i>+ Detail</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?php echo $recommend2['ktgri_brg']; ?></div>
                            <a href="#">
                                <h5><?php echo $recommend2['nm_brg']; ?></h5>
                            </a>
                            <div class="product-price">
                                Rp.<?php echo number_format($recommend2['harga_akhir'],2,",",".");?>
                                <?php
									if( $recommend2['diskon'] > 0 ){
								?>
									<span>Rp.<?php echo number_format($recommend2['harga'],2,",",".");?></span>
								<?php
									}
								?>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
					}
				?>
				
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->


<?php include "footer.php"; ?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
	<!-- <script data-pace-options='{ "ajax": false }' src='js/pace.min.js'></script> -->
</body>

</html>