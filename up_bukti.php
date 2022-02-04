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
		<form method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12">
					<h4>Detail Penagihan</h4>
					<div class="card">
						<div class="card-body">
                        <div class="row">
						
<?php
	if( isset( $_REQUEST['submit'] )){

		$no_order = $_REQUEST['no_order'];
		
// ambil data file
$namaFile = $_FILES['transfer']['name'];
$namaSementara = $_FILES['transfer']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "paneladmin/aset/file/Bukti Transfer/";

		$sql = mysqli_query($koneksi, "UPDATE tbl_order SET transfer='$namaFile', tgl_terbayar=CURRENT_DATE WHERE no_order='$no_order'"); 

		if($sql == true){
			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./belanja.php">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
		$no_order = $_REQUEST['no_order'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE no_order='$no_order'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){
?>

<div class="col-lg-3">
    <label for="transfer">Upload Bukti Transfer<span>*</span></label>
</div>
<div class="col-lg-4">
    <input type="file" class="form-control" id="transfer" name="transfer" placeholder="Upload Bukti Transfer" required>
</div>
<div class="col-lg-4">
    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
	<a href="./belanja.php" type="submit" class="btn btn-danger">Batal</a>
</div>
 <?php
	if( $row['transfer'] != null ){
 ?> 
<div class="col-lg-12">
	</br>
    <center><img src="paneladmin/aset/file/Bukti Transfer/<?php echo $row['transfer']; ?>" alt=""></center>
</div>
<?php
	} } }
?>
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