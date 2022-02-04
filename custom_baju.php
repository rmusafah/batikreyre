<?php require_once("koneksi.php");
	  require_once("cart_proses.php");
    if( empty( $_SESSION['no_member'] ) ){

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
	<link rel="stylesheet" href="paneladmin/aset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                        <span>Kustom</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
                <div class="row">
                    <div class="col-lg-6">
					<div class="contact-form">
                        <div class="leave-comment">
                        <h3>Kustom Ukuran Baju</h3>
						</br>
						<h4>Biaya Pembuatan Rp.100.000<span>*</span></h4>
						<form action="#" class="comment-form">
                        <div class="row">
<?php

$kd = $_REQUEST['kd'];

	if( isset( $_REQUEST['submit'] )){
		
			
		$no_member = $_REQUEST['no_member'];
		$no_brg = $_REQUEST['no_brg'];
		$panjang = $_REQUEST['panjang'];
		$lebar_bahu = $_REQUEST['lebar_bahu']; 
		$lingkar_dada = $_REQUEST['lingkar_dada']; 
		$pjg_tgn = $_REQUEST['pjg_tgn']; 
		$lingkar_lengan = $_REQUEST['lingkar_lengan']; 
		$lingkar_pinggang = $_REQUEST['lingkar_pinggang']; 
		$lingkar_pinggul = $_REQUEST['lingkar_pinggul']; 
		$catatan = $_REQUEST['catatan']; 
			
		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_custom_cart(no_member, no_brg, panjang, lebar_bahu, lingkar_dada, pjg_tgn, lingkar_lengan, lingkar_pinggang, lingkar_pinggul, catatan) VALUES('$no_member','$no_brg', '$panjang', '$lebar_bahu', '$lingkar_dada', '$pjg_tgn', '$lingkar_lengan', '$lingkar_pinggang', '$lingkar_pinggul', '$catatan')") or die( mysqli_error($koneksi) );;
		
		if($sql == true){
			echo'<script>
					alert("Permintaan anda akan diproses");
				</script>';
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./custom_daftar.php">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	 } else {
		 
?>
							<div class="col-lg-12">
                                <input type="hidden" id="no_member" name="no_member" value="<?php echo $_SESSION['no_member']; ?>">
                            </div>
							</br>
                            <div class="col-lg-12">
                                <label for="no_brg">Nama Barang</label>
                                <select class="form-control" id="no_brg" name="no_brg" required>
								<?php
								//Perintah sql untuk menampilkan semua data pada tabel jurusan
									$sql=mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE no_brg='$kd'");
									$no=0;
									$data = mysqli_fetch_array($sql);
									$no++;
								?>
									<option value="<?php echo $data['no_brg'];?>"><?php echo $data['nm_brg'];?></option>
								</select>
                            </div>
							<div class="col-lg-6">
                                <label for="panjang">Panjang<span>*</span></label>
                                <input type="text" id="panjang" name="panjang" placeholder="Ukuran dalam Bentuk cm" required>
                            </div>
							<div class="col-lg-6">
                                <label for="lebar_bahu">Lebar Bahu<span>*</span></label>
                                <input type="text" id="lebar_bahu" name="lebar_bahu" placeholder="Ukuran dalam Bentuk cm" required>
                            </div>
							<div class="col-lg-6">
                                <label for="lingkar_dada">Lingkar Dada<span>*</span></label>
                                <input type="text" id="lingkar_dada" name="lingkar_dada" placeholder="Ukuran dalam Bentuk cm" required>
                            </div>
							<div class="col-lg-6">
                                <label for="pjg_tgn">Panjang Tangan</label>
                                <input type="text" id="pjg_tgn" name="pjg_tgn" placeholder="Ukuran dalam Bentuk cm">
                            </div>
							<div class="col-lg-6">
                                <label for="lingkar_lengan">Lingkar Lengan</label>
                                <input type="text" id="lingkar_lengan" name="lingkar_lengan" placeholder="Ukuran dalam Bentuk cm">
                            </div>
							<div class="col-lg-6">
                                <label for="lingkar_pinggang">Lingkar Pinggang</label>
                                <input type="text" id="lingkar_pinggang" name="lingkar_pinggang" placeholder="Ukuran dalam Bentuk cm">
                            </div>
							<div class="col-lg-6">
                                <label for="lingkar_pinggul">Lingkar Pinggul</label>
                                <input type="text" id="lingkar_pinggul" name="lingkar_pinggul" placeholder="Ukuran dalam Bentuk cm">
                            </div>
							<div class="col-lg-12">
							</br>
							<label for="catatan">Catatan<span>*</span></label>
							</div>
                            <div class="col-lg-12">
                                <textarea id="catatan" name="catatan" placeholder="Your message" required></textarea>
								<button type="submit" name="submit" class="site-btn">Order</button>
                            </div>
                        </div>
						</form>
						</div>
					</div>
                    </div>
<?php
	} 
?>
					<div class="col-lg-6">
                        <div class="row">
							<div class="col-lg-6">
							<img src="img/ukuran baju pria.jpeg">
							<img src="img/ukuran baju perempuan.jpg">
                                
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