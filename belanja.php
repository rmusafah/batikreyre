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
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Daftar Belanja</h4>
                        <div class="row">
<table id="example1" class="table table-bordered table-striped text-xs">
<form method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">

				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>Nomor Order</th>
					 <th>Tanggal Order</th>
					 <th>Jatuh Tempo</th>
					 <th>List Belanja</th>
					 <th>Total</th>
					 <th>Bukti Transfer</th>
					 <th>Invoice</th>
					 <th>Kwitansi</th>
					 <th>Status</th>
					 <th>Upload</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$sql = "SELECT * FROM tbl_order";
$no = 0;
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_array($query)){
	if($_SESSION["no_member"] == $row['no_member']){
$no++;

?>
<tr>
 <td><?php echo $no; ?></td>
 <td><?php echo $row['no_order']; ?></td>
 <td><?php echo $row['tgl_order']; ?></td>
 <td><?php echo $row['jatuh_tempo']; ?></td>
 <td><?php echo $row['list_belanja']; ?></td>	 	 
 <td>Rp.<?php echo number_format($row['total_harga'],2,",",".");?></td>
 <?php
	if( $row['transfer'] == null ){
 ?> 
 <td><a href="#">Bukti Transfer Belum Di Upload</a></td>
 <?php
	} else {
 ?>
 <td><a href="paneladmin/aset/file/Bukti Transfer/<?php echo $row['transfer']; ?>" target="_blank">Lihat</a></td>
 <?php
	}
 ?>
 
 
 <?php
	if( $row['invoice'] == null ){
 ?> 
 <td><a href="#">Invoice Belum Di Upload Admin</a></td>
 <?php
	} else {
 ?>
 <td><a href="paneladmin/<?php echo $row['invoice']; ?>" target="_blank">Lihat</a></td>
 <?php
	}
 ?>
 
 <?php
	if( $row['kwitansi'] == null ){
 ?> 
 <td><a href="#">Kwitansi Belum Di Upload Admin</a></td>
 <?php
	} else {
 ?>
 <td><a href="paneladmin/<?php echo $row['kwitansi']; ?>" target="_blank">Lihat</a></td>
 <?php
	}
 ?>
 
 
 <td><?php echo $row['status']; ?></td>
 
 
<?php
	if( $row['invoice'] == null ){
 ?> 
 <td><a href="#">Invoice Belum Di Upload Admin</a></td>
 <?php
	} else {
 ?>
 <td>
		<a href="./up_bukti.php?no_order=<?php echo $row['no_order']; ?>" class="btn btn-outline-primary btn-xs"><i class="fas fa-upload nav-icon"></i>Upload</a>
 </td>
 <?php
	}
 ?>

</tr>


<?php } } } ?>
<?php 
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE tbl_order.no_member='$_SESSION[no_member]'");
if(mysqli_num_rows($sql) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="./shop.php">Belanja Sekarang</a></u> </p></center></td></tr>';}
?>

	</tbody>
	</form>
</table>

<a href="cara_pembelian.php" class="btn btn-outline-primary btn-xs"><i class="fas fa-credit-card nav-icon"></i> Cara Pembayaran</a>
                        </div>
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
	
	<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
</body>

</html>