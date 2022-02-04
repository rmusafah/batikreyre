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
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.php">Shop</a>
                        <span>Keranjang Belanja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
				<form method="post" action="" class="form-horizontal" role="form">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="p-name">Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                
								<?php
		$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang, tbl_member, tbl_barang, tbl_barang_detail WHERE tbl_keranjang.no_member=tbl_member.no_member AND tbl_keranjang.no_brg=tbl_barang.no_brg AND tbl_keranjang.no_brg_detail=tbl_barang_detail.no_brg_detail AND tbl_keranjang.no_member='$_SESSION[no_member]'");
		$count=mysqli_num_rows($sql2);
		
		if(isset($_REQUEST['submit'])){
		
		$no_keranjang = $_REQUEST['no_keranjang'];
		$no_member = $_REQUEST['no_member'];
		$no_brg = $_REQUEST['no_brg'];
		$no_brg_detail = $_REQUEST['no_brg_detail'];
		$jml_beli = $_REQUEST['jml_beli'];
		
		
		

		for($i=0;$i<$count;$i++){

		$sql = "UPDATE tbl_keranjang SET no_member='$no_member[$i]', no_brg='$no_brg[$i]', no_brg_detail='$no_brg_detail[$i]', jml_beli='$jml_beli[$i]' WHERE no_keranjang='$no_keranjang[$i]'";
		$result=mysqli_query($koneksi, $sql);
		}
		}

								//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
								$total = 0;
								//mysql_select_db($database_conn, $conn);
								$query = mysqli_query($koneksi, "SELECT * FROM tbl_keranjang, tbl_member, tbl_barang, tbl_barang_detail WHERE tbl_keranjang.no_member=tbl_member.no_member AND tbl_keranjang.no_brg=tbl_barang.no_brg AND tbl_keranjang.no_brg_detail=tbl_barang_detail.no_brg_detail AND tbl_keranjang.no_member='$_SESSION[no_member]'");
								while ($data = mysqli_fetch_array($query)) {
												

									$jumlah_harga = $data['harga_akhir'] * $data['jml_beli'];
									$total += $jumlah_harga;
									$no = 1;
								?>
<input type="hidden" id="no_keranjang[]" name="no_keranjang[]" value="<?php echo $data['no_keranjang']; ?>" required>
<input type="hidden" id="no_member[]" name="no_member[]" value="<?php echo $_SESSION['no_member']; ?>" required>
<input type="hidden" id="no_brg_detail[]" name="no_brg_detail[]" value="<?php echo $data['no_brg_detail']; ?>" required>
<input type="hidden" id="no_brg[]" name="no_brg[]" value="<?php echo $data['no_brg']; ?>" required>
									<tr>
                                    <td class="cart-pic first-row"><img src="paneladmin/<?php echo $data['gambar']; ?>" width="70%" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5><?php echo $data['nm_brg']; ?> (<?php echo $data['ukuran']; ?>)</h5>
                                    </td>
                                    <td class="p-price first-row">Rp.<?php echo number_format($data['harga_akhir'],2,",",".");?> </td>
                                    <td class="qua-col first-row">
                                        <input type="number" style="width: 5em" id="jml_beli[]" name="jml_beli[]" min="1" max="<?php echo $data['stok']; ?>" value="<?php echo number_format($data['jml_beli']); ?>" required>

                                    </td>
                                    <td class="total-price first-row">Rp.<?php echo number_format($jumlah_harga,2,",","."); ?></td>
                                    <td class="close-td first-row">
										<script type="text/javascript" language="JavaScript">
											function konfirmasi(){
											tanya = confirm("Anda Yakin akan Menghapus Produk dari Keranjang Belanja ini?");
											if (tanya == true) return true;
											else return false;
											}
										</script>
										<a href="./produk_hapus.php?submit=yes&no_keranjang=<?php echo $data['no_keranjang']; ?>" onclick="return konfirmasi()"><i class="ti-close"></i></a>
									</td>
									</tr>
									<?php			
	} 
									?>
									
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="./shop.php" class="primary-btn up-cart">Lanjut Belanja</a>
                                <button type="submit" name="submit" id="submit" class="primary-btn up-cart">Update cart</button>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="cart-total">Total <span>Rp.<?php echo number_format($total,2,",","."); ?></span></li>
                                </ul>
                                <a href="./check-out.php" class="proceed-btn">Lanjut ke Check Out</a>
                            </div>
                        </div>
                    </div>
					</form>
                </div>
            </div>
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
</body>

</html>