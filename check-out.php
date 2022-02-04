<?php require_once("koneksi.php");
	  require_once("cart_proses.php");
    if (!isset($_SESSION['no_member'])) {

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./login.php');
	die();
	}
?>
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
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="check-out_proses.php" method="post" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Detail Penagihan</h4>
                        <div class="row">
							<input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
							<div class="col-lg-12">
                                <input type="hidden" id="no_member" name="no_member" value="<?php echo $_SESSION['no_member']; ?>">
                            </div>
							<?php
								//MENAMPILKAN DETAIL KERANJANG BELANJA//
								$string = '';
                
								$total = 0;
								$hpp_total = 0;
								$total_order = 0;
								//mysql_select_db($database_conn, $conn);
								$query = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang, tbl_member, tbl_barang, tbl_barang_detail WHERE tbl_keranjang.no_member=tbl_member.no_member AND tbl_keranjang.no_brg=tbl_barang.no_brg AND tbl_keranjang.no_brg_detail=tbl_barang_detail.no_brg_detail AND tbl_keranjang.no_member='$_SESSION[no_member]'");
								while ($data = mysqli_fetch_array($query)) {
									
									$nm_brg = $data['nm_brg'];
									$jumlah_harga = $data['harga_akhir'] * $data['jml_beli'];
									$hpp_order = $data['hpp_barang'] * $data['jml_beli'];
									$total += $jumlah_harga;
									$hpp_total += $hpp_order;
									$total_order += $data['jml_beli'];

									$string .= $nm_brg.' - '.$data['ukuran'].' ('.$data['jml_beli'].')'.', ';

									$no = 1;
								}
									$string =  rtrim($string, ',');
							?>
							<div class="col-lg-12">
                                <input type="hidden" id="list_belanja" name="list_belanja" value="<?php echo $string; ?>">
                            </div>
							<div class="col-lg-12">
                                <input type="hidden" id="status" name="status" value="Di Proses">
                            </div>
							<div class="col-lg-12">
                                <input type="hidden" id="total_harga" name="total_harga" value="<?php echo $total; ?>">
                            </div>
							<div class="col-lg-12">
                                <input type="hidden" id="hpp_order" name="hpp_order" value="<?php echo $hpp_total; ?>">
                            </div>
							<div class="col-lg-12">
                                <input type="hidden" id="total_order" name="total_order" value="<?php echo $total_order; ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="nm_dpn">Nama Depan<span>*</span></label>
                                <input type="text" readonly="" id="nm_dpn" name="nm_dpn" value="<?php echo $_SESSION['nm_dpn']; ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="nm_blkg">Nama Belakang<span>*</span></label>
                                <input type="text" readonly="" id="nm_blkg" name="nm_blkg" value="<?php echo $_SESSION['nm_blkg']; ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" id="provinsi_ord" name="provinsi_ord" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="kota">Kota<span>*</span></label>
                                <input type="text" id="kota_ord" name="kota_ord" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="alamat">Alamat Pengiriman<span>*</span></label>
                                <input type="text" id="alamat_ord" name="alamat_ord" class="street-first" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" id="kode_pos_ord" name="kode_pos_ord" required>
                            </div>	
                            <div class="col-lg-6">
                                <label for="telp">Telp.<span>*</span></label>
                                <input type="text" readonly="" id="telp" name="telp" value="<?php echo $_SESSION['telp']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Pemesanan Anda</h4>
                            <div class="order-total">
							<ul class="order-table">
                                    <li>Product <span>Total</span></li>
							<?php
							$total = 0;
						
							
								//mysql_select_db($database_conn, $conn);
								$query = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang, tbl_member, tbl_barang, tbl_barang_detail WHERE tbl_keranjang.no_member=tbl_member.no_member AND tbl_keranjang.no_brg=tbl_barang.no_brg AND tbl_keranjang.no_brg_detail=tbl_barang_detail.no_brg_detail AND tbl_keranjang.no_member='$_SESSION[no_member]'");
								while ($data = mysqli_fetch_array($query)) {
												

									$jumlah_harga = $data['harga_akhir'] * $data['jml_beli'];
									$hpp_ord_detail = $data['hpp_barang'] * $data['jml_beli'];
									$total += $jumlah_harga;
									$no = 1;
								?>
                                
                                    <li class="fw-normal"><?php echo $data['nm_brg']; ?> x <?php echo number_format($data['jml_beli']); ?><span>Rp.<?php echo number_format($jumlah_harga); ?></span></li>
									<input type="hidden" id="no_brg[]" name="no_brg[]" value="<?php echo $data['no_brg']; ?>">
									<input type="hidden" id="nm_brg[]" name="nm_brg[]" value="<?php echo $data['nm_brg']; ?>">
									<input type="hidden" id="ukuran[]" name="ukuran[]" value="<?php echo $data['ukuran']; ?>">
									<input type="hidden" id="harga[]" name="harga[]" value="<?php echo $data['harga']; ?>">
									<input type="hidden" id="jml_beli[]" name="jml_beli[]" value="<?php echo $data['jml_beli']; ?>">
									<input type="hidden" id="diskon[]" name="diskon[]" value="<?php echo $data['diskon']; ?>">
									<input type="hidden" id="harga_akhir[]" name="harga_akhir[]" value="<?php echo $data['harga_akhir']; ?>">
									<input type="hidden" id="hpp_ord_detail[]" name="hpp_ord_detail[]" value="<?php echo $hpp_ord_detail; ?>">
									<input type="hidden" id="jumlah_harga[]" name="jumlah_harga[]" value="<?php echo $jumlah_harga; ?>">
									<!--<input type="hidden" id="jumlah_harga[]" name="jumlah_harga[]" value="<?php //echo $jumlah_harga; ?>">-->
                                    
								<?php			
								}
								?>
									<li class="total-price">Total <span>Rp. <?php echo number_format($total); ?>,-</span></li>
                                </ul>
								
                                <div class="order-btn">
                                    <button type="submit" name="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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
	
	<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
</body>

</html>