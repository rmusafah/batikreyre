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
	<!-- Font Awesome -->
	<link rel="stylesheet" href="paneladmin/aset/plugins/fontawesome-free/css/all.min.css">

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
<?php                  
$query = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_order_detail, tbl_member WHERE tbl_order.no_order=tbl_order_detail.no_order AND tbl_order.no_member=tbl_member.no_member");
$data  = mysqli_fetch_array($query);
?>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Batik Reyre.
          <small class="float-right">Date: <?php echo date("d M Y", strtotime($row['tgl_order'])) ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?php echo $data['nm_dpn']; ?> <?php echo $data['nm_blkg']; ?></strong><br>
          <?php echo $data['alamat_ord']; ?><br>
          <?php echo $data['provinsi_ord']; ?>, <?php echo $data['kota_ord']; ?><br>
          Telp: <?php echo $data['telp']; ?><br>
          Email: <?php echo $data['email']; ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> <?php echo $data['no_order']; ?><br>
        <b>Payment Due:</b> <?php echo date("d M Y", strtotime($row['jatuh_tempo'])) ?><br>
        <b>Account:</b> 968-34567
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
		<?php                  
		$query2 = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_order_detail WHERE tbl_order.no_order=tbl_order_detail.no_order");
		$no = 0;
		while ($data2  = mysqli_fetch_array($query)){
		$no++;
		?>
          <thead>
          <tr>
            <th>No.</th>
            <th>Qty</th>
            <th>Product</th>
            <th>Harga Satuan</th>
			<?php
				if( $data['diskon']; > 0 ){
			?>
            <th>Diskon</th>
			<?php
				}
			?>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
			<td><?php echo $no; ?></td>
            <td><?php echo $data['jml_order']; ?></td>
            <td><?php echo $data['nm_brg']; ?></td>
            <td><?php echo $data['harga']; ?></td>
			<?php
				if( $data['diskon']; > 0 ){
			?>
            <td><?php echo $data['diskon']; ?>%</td>
			<?php
				}
			?>
            <td><?php echo $data['jumlah_harga']; ?></td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due 2/22/2014</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>$250.30</td>
            </tr>
            <tr>
              <th>Tax (9.3%)</th>
              <td>$10.34</td>
            </tr>
            <tr>
              <th>Shipping:</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

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
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>

</html>