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
error_reporting(0);
$no_order = $_REQUEST['no_order'];
$sql3 = "SELECT * FROM tbl_order_detail WHERE no_order='$no_order'";
$no3 = 0;
$query3 = mysqli_query($koneksi, $sql3);
$data3 = mysqli_fetch_array($query3);
if($data3["no_order"] == $no_order){
?>

<?php
$no_order = $_REQUEST['no_order'];                  
$query = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_order_detail, tbl_member WHERE tbl_order.no_order='$no_order' AND tbl_order_detail.no_order='$no_order' AND tbl_order.no_member=tbl_member.no_member");
$data  = mysqli_fetch_array($query);
$pajak = $data['total_harga'] * ($data['pajak']/100);
$total = $data['total_harga'] + ($pajak + $data['ongkir']);
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
          Phone: +62 821-5447-4930<br>
          Email: reyrebatik@gmail.com
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
        <b>Invoice #<?php echo $data['no_order']; ?></b><br>
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
		
          <thead>
          <tr>
            <th>No.</th>
			<th>Produk</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Diskon</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
		 <?php 
		$no_order = $_REQUEST['no_order'];	
		$query2 = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_order_detail WHERE tbl_order.no_order='$no_order' AND tbl_order_detail.no_order='$no_order'");
		$no = 0;
		while ($data2  = mysqli_fetch_array($query2)){
		$no++;
		?>
          <tr>
			<td><?php echo $no; ?></td>
            <td><?php echo $data2['nm_brg']; ?> (<?php echo $data2['ukuran']; ?>)</td>
			<td><?php echo $data2['jml_order']; ?></td>
            <td>Rp.<?php echo number_format($data2['harga'],2,",",".");?></td>
			<?php
				if( $data2['diskon'] > 0 ){
			?>
            <td><?php echo $data2['diskon'] ?>%</td>
			<?php
				} else {
			?>
			<td>Tidak Ada</td>
			<?php
				}
			?>
            <td>Rp.<?php echo number_format($data2['jumlah_harga'],2,",",".");?></td>
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
        <p class="lead">Metode Pembayaran:</p>
        <img src="aset/dist/img/credit/bank bca.png" alt="Visa">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Pembayaran dapat dilakukan ke salah satu nomor rekening berikut:
		  </br>Bank BCA
		  </br>0306238711
		  </br>Wahyu Eka Rini
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Total Tagihan :</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp.<?php echo number_format($data['total_harga'],2,",",".");?></td>
            </tr>
            <tr>
              <th>Pajak</th>
              <td>(<?php echo $data['pajak']; ?>%) RP.<?php echo number_format($pajak,2,",",".");?></td>
            </tr>
            <tr>
              <th>Pengiriman:</th>
              <td><?php echo number_format($data['ongkir'],2,",",".");?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?php echo number_format($total,2,",",".");?></td>
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

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
<?php  } else { ?>

<?php
$no_order = $_REQUEST['no_order'];                  
$query = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_custom, tbl_member WHERE tbl_order.no_order='$no_order' AND tbl_custom.no_order='$no_order' AND tbl_order.no_member=tbl_member.no_member");
$data  = mysqli_fetch_array($query);
$pajak = $data['total_harga'] * ($data['pajak']/100);
$total = $data['total_harga'] + ($pajak + $data['ongkir']);
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
          <strong>Toko Batik Reyre</strong><br>
          Jl. Raya Nakula No 43 RT 24<br>
          Kalimantan Selatan, Banjarmasin<br>
          Phone: +62 821-5447-4930<br>
          Email: reyrebatik@gmail.com
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
        <b>Invoice #<?php echo $data['no_order']; ?></b><br>
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
		
          <thead>
          <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Harga Satuan</th>
            <th>Biaya</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
		 <?php 
		$no_order = $_REQUEST['no_order'];	
		$query2 = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_custom WHERE tbl_order.no_order='$no_order' AND tbl_custom.no_order='$no_order'");
		$no = 0;
		while ($data2  = mysqli_fetch_array($query2)){
		$kustom_harga = $data2['harga'] + $data2['biaya'];
		$no++;
		?>
          <tr>
			<td><?php echo $no; ?></td>
            <td><?php echo $data2['nm_brg']; ?> (Kustom)</td>
            <td>Rp.<?php echo number_format($data2['harga'],2,",",".");?></td>
            <td>Rp.<?php echo number_format($data2['biaya'],2,",",".");?></td>
            <td>Rp.<?php echo number_format($kustom_harga,2,",",".");?></td>
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
        <p class="lead">Metode Pembayaran:</p>
        <img src="aset/dist/img/credit/bank bca.png" alt="Visa">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Pembayaran dapat dilakukan ke salah satu nomor rekening berikut:
		  </br>Bank BCA
		  </br>0306238711
		  </br>Wahyu Eka Rini
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Total Tagihan :</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp.<?php echo number_format($data['total_harga'],2,",",".");?></td>
            </tr>
            <tr>
              <th>Pajak</th>
              <td>(<?php echo $data['pajak']; ?>%) RP.<?php echo number_format($pajak,2,",",".");?></td>
            </tr>
            <tr>
              <th>Pengiriman:</th>
              <td><?php echo number_format($data['ongkir'],2,",",".");?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td><?php echo number_format($total,2,",",".");?></td>
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

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
<?php  } ?>
</body>
</html>
