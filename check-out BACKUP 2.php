<?php require_once("koneksi.php");
	  require_once("cart_proses.php");
    if( empty( $_SESSION['no_member'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./login.php');
	die();
} else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_order) as maxKode FROM tbl_order");
$data  = mysqli_fetch_array($hasil);
$kodeID = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeID, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "ORD";
$newID = $char . sprintf("%03s", $noUrut);
	
	if( isset( $_REQUEST['submit'] )){

		$no_order = $_REQUEST['no_order'];
		$no_member = $_REQUEST['no_member'];
		$provinsi = $_REQUEST['provinsi'];
		$kota = $_REQUEST['kota'];
		$alamat = $_REQUEST['alamat'];
		$kode_pos = $_REQUEST['kode_pos'];
		$order_detail_id = $_REQUEST['order_detail_id'];
		$no_brg = $_REQUEST['no_brg'];
		$jml_order = $_REQUEST['jml_order'];
		$total_order = $_REQUEST['total_order'];
		

		$query = "INSERT INTO tbl_order(no_order, no_member, provinsi, kota, alamat, kode_pos) VALUES('$newID', '$no_member', '$provinsi', '$kota', '$alamat', '$kode_pos');";
		
		$query .= "INSERT INTO tbl_order_detail (no_order, no_brg, jml_order, total_order) VALUEs ('$newID', '$key', '$val', '$total');";
		
		$result = mysqli_multi_query($koneksi, $query) or die( mysqli_error($koneksi) );

		if($result == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./selesai.php">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
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
            <form id="formku" action="#" method="post" class="checkout-form">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Detail Penagihan</h4>
                        <div class="row">
							<input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
							<div class="col-lg-12">
                                <input type="hidden" id="no_member" name="no_member" value="<?php echo $_SESSION['no_member']; ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="nm_dpn">Nama Depan<span>*</span></label>
                                <input type="text" id="nm_dpn" value="<?php echo $_SESSION['nm_dpn']; ?>">
                            </div>
                            <div class="col-lg-6">
                                <label for="nm_blkg">Nama Belakang<span>*</span></label>
                                <input type="text" id="nm_blkg" value="<?php echo $_SESSION['nm_blkg']; ?>">
                            </div>
                            <div class="col-lg-12">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" id="provinsi">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Kota<span>*</span></label>
                                <input type="text" id="cun">
                            </div>
                            <div class="col-lg-12">
                                <label for="alamat">Alamat Pengiriman<span>*</span></label>
                                <input type="text" id="alamat" class="street-first">
                            </div>
                            <div class="col-lg-6">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" id="kode_pos">
                            </div>
                            <div class="col-lg-6">
                                <label for="telp">Telp.<span>*</span></label>
                                <input type="text" id="telp" value="<?php echo $_SESSION['telp']; ?>">
                            </div>
                            <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Pemesanan Anda</h4>
                            <div class="order-total">
							<ul class="order-table">
                                    <li>Product <span>Total</span></li>
							<?php
							//MENAMPILKAN DETAIL KERANJANG BELANJA//
                
							$total = 0;
							//mysql_select_db($database_conn, $conn);
							if (isset($_SESSION['items'])) {
								
								foreach ($_SESSION['items'] as $key => $val) {
								$query = mysqli_query($koneksi, "select * from tbl_barang where no_brg = '$key'");
								$data = mysqli_fetch_array($query);

								$jumlah_harga = $data['harga'] * $val;
								$total += $jumlah_harga;
								$no = 1;
								?>
                                
                                    <li class="fw-normal"><?php echo $data['nm_brg']; ?> x <?php echo number_format($val); ?><span>Rp.<?php echo number_format($jumlah_harga); ?></span></li>
                                    
								<?php
								//mysql_free_result($query);			
								}
								//$total += $sub;
								}
								?>
									<li class="total-price">Total <span>Rp. <?php echo number_format($total); ?>,-</span></li>
                                </ul>
								
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
	<?php
	}
	}
	?>
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