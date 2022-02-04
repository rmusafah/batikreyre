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

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
			
<form method="post" action="produk_input.php" class="form-horizontal" role="form">

<?php
$kd = $_REQUEST['kd'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_barang, tbl_barang_detail WHERE tbl_barang_detail.stok >= '1' AND tbl_barang_detail.no_brg='$kd' AND tbl_barang.no_brg='$kd'") or die( mysqli_error($koneksi));
		$data = mysqli_fetch_array($sql);
		$ktgri_brg = $data['ktgri_brg'];
?>
<input type="hidden" id="no_keranjang" name="no_keranjang" value="<?php echo $data['no_keranjang']; ?>" required>
<input type="hidden" id="no_member" name="no_member" value="<?php echo $_SESSION['no_member']; ?>" required>
<input type="hidden" id="no_brg" name="no_brg" value="<?php echo $kd ?>" required>
<input type="hidden" id="kd" name="kd" value="<?php echo $kd ?>" required>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="paneladmin/<?php echo $data['gambar']; ?>" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?php echo $data['ktgri_brg']; ?></span>
                                    <h3><?php echo $data['nm_brg']; ?></h3>
                                </div>
                                <div class="pd-desc">
                                    <p>
									<?php
									$string = $data['deskripsi'];
									echo nl2br($string);
									?>
									</p>									
                                    <h4>Rp.<?php echo number_format($data['harga_akhir'],2,",",".");?> 
									<?php
										if( $data['diskon'] > 0 ){
									?>
									<span>Rp.<?php echo number_format($data['harga'],2,",",".");?></span>
									<?php
									}
									?></h4>
									
                                </div>
								<div class="pd-size-choose">
								<?php
								//Perintah sql untuk menampilkan semua data pada tabel jurusan
								$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_barang_detail WHERE tbl_barang_detail.no_brg='$kd'");
								$no=0;
								while ($row = mysqli_fetch_array($sql2)) {
								$no++;
								?>
									
                                        <input type="radio" id="no_brg_detail" name="no_brg_detail" value="<?php echo $row['no_brg_detail']; ?>" required>
                                        <label for="no_brg_detail"><?php echo $row['ukuran']; ?></label>&nbsp;&nbsp;&nbsp;
                                    
								<?php 
									}
								?>
                                </div>
                                <div class="quantity">
                                    <button type="submit" name="submit" class="primary-btn pd-cart">Add To Cart</button>
                                </div>
								<div class="cart-buttons">
									<a href="custom_baju.php?kd=<?php echo $data['no_brg']; ?>"" class="primary-btn up-cart">Kustom Ukuran</a>
								</div>
                                <ul class="pd-tags">
                                    <li><span>Kategori</span>: <?php echo $data['ktgri_brg']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Deskripsi Produk</h5>
                                                <p>
												<?php
												$string = $data['deskripsi'];
												echo nl2br($string);
												?>
												</p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="paneladmin/<?php echo $data['gambar']; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
											<?php
												if( $data['diskon'] > 0 ){
											?>
                                            <tr>
                                                <td class="p-catagory">Harga</td>
                                                <td>
                                                    <div class="p-price">Rp.<?php echo number_format($data['harga_akhir'],2,",",".");?>  </div>(Sudah termasuk Diskon)
                                                </td>
                                            </tr>
											<tr>
                                                <td class="p-catagory">Diskon</td>
                                                <td>
                                                    <div class="p-price"><?php echo $data['diskon']; ?>%</div>
                                                </td>
                                            </tr>
											<?php
												} else {
											?>
											<tr>
                                                <td class="p-catagory">Harga</td>
                                                <td>
                                                    <div class="p-price">Rp.<?php echo number_format($data['harga_akhir'],2,",",".");?> </div>
                                                </td>
                                            </tr>
											<?php
												}
											?>
                                            <tr>
                                                <td class="p-catagory">Ketersediaan</td>
                                                <td>
								<?php
								//Perintah sql untuk menampilkan semua data pada tabel jurusan
								$sql4 = mysqli_query($koneksi, "SELECT * FROM tbl_barang_detail WHERE tbl_barang_detail.no_brg='$kd'");
								$no=0;
								while ($row2 = mysqli_fetch_array($sql4)) {
								$no++;
								?>
									
                                        <div class="p-stock"><?php echo $row2['ukuran']; ?> : <?php echo $row2['stok']; ?> in stock</div>
                                    
								<?php 
									}
								?>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<form>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
			<?php
				$sql3 = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE ktgri_brg = '$ktgri_brg' ORDER BY RAND() ASC limit 4");
				while($recommend = mysqli_fetch_array($sql3)){
			?>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="paneladmin/<?php echo $recommend['gambar']; ?>" alt="">
							<?php
									if( $recommend['diskon'] > 0 ){
							?>
                            <div class="sale">Diskon <?php echo $recommend['diskon']; ?>%</div>
							<?php
								} else {
							?>
							<div class="sale">Sale</div>
							<?php
								}
							?>
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
</body>

</html>