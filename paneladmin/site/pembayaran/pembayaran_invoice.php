<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Batik Reyre | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="aset/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="aset/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
          <i class="fas fa-globe"></i> Batik Reyre, Inc.
          <small class="float-right">Tanggal : <?php echo date("d M Y", strtotime($data['tgl_order'])) ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Batik Reyre, Inc.</strong><br>
          Jl. Raya Nakula No 43 RT 24<br>
          Kalimantan Selatan, Banjarmasin<br>
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
        <b>Jatuh Tempo:</b> <?php echo date("d M Y", strtotime($data['jatuh_tempo'])) ?><br>
        <b>Account:</b> <?php echo $data['no_member']; ?>
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
		while ($data2  = mysqli_fetch_array($query2)){
		$no++;
		?>
          <thead>
          <tr>
            <th>No.</th>
            <th>Qty</th>
            <th>Product</th>
            <th>Harga Satuan</th>
			<?php
				if( $data2['diskon'] > 0 ){
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
            <td><?php echo $data2['jml_order']; ?></td>
            <td><?php echo $data2['nm_brg']; ?></td>
            <td>Rp.<?php echo number_format($data2['harga'],2,",",".");?></td>
			<?php
				if( $data2['diskon'] > 0 ){
			?>
            <td><?php echo $data2['diskon'] ?>%</td>
			<?php
				}
			?>
            <td>Rp.<?php echo number_format($data2['jumlah_harga'],2,",",".");?></td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Metode Pembayaran:</p>
        <img src="aset/dist/img/credit/visa.png" alt="Visa">
        <img src="aset/dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="aset/dist/img/credit/american-express.png" alt="American Express">
        <img src="aset/dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Terbayar Pada <?php echo date("d M Y", strtotime($data['tgl_terbayar'])) ?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp.<?php echo number_format($data2['total_harga'],2,",",".");?></td>
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
		<?php } ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
