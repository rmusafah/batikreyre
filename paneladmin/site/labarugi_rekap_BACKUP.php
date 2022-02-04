<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

      if(isset($_REQUEST['submit'])){

	     $submit = $_REQUEST['submit'];
         $tgl1 = $_REQUEST['tgl1'];
         $tgl2 = $_REQUEST['tgl2'];

		 $sql = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_supply WHERE tbl_supply.tgl_supply AND tbl_order.tgl_terbayar BETWEEN '$tgl1' AND '$tgl2'")or die(mysqli_error($koneksi));
		 if(mysqli_num_rows($sql) > 0){
			 $no = 0;

		 echo '
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h1>Data Master Laba Rugi</h1>
          </div>
          <div class="col-sm-6">
		  <a href="./admin.php" id="tombol" class="btn btn-info pull-left noprint"><i class="fas fa-undo nav-icon"></i>Kembali</a>

		  <button id="tombol" onclick="window.print()" class="btn btn-success noprint"><i class="fas fa-print nav-icon"></i>Cetak</button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">

	<div class="card-header">
	<h3><img src="aset/dist/img/reyre kop.png"/></h3>
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Rekap Laporan Laba Rugi</span>
          </div>
          <div class="col-sm-6">
			<span class="float-right">
			Banjarmasin, (<a>'.date('d-m-Y').'</a>) 
			</span>
          </div>
        </div>
	<span>Tanggal : '.$tgl1.' sampai '.$tgl2.'</span>
	</div>	


		  <div class="card-body">
		  <table class="table table-bordered">

		  <tbody>
		  <tr>
			<th>No. Order</th>
			<th>Jumlah</th>
		  </tr>';
		  $total = 0;
		  $sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE tgl_terbayar BETWEEN '$tgl1' AND '$tgl2'")or die(mysqli_error($koneksi));
		  while($row = mysqli_fetch_array($sql)){
			 $total += $row['total'];
		 echo '

			<tr>
			  <td>'.$row['no_order'].'</td>
			  <td>Rp.'.number_format($row['total'],2,",",".").'</td>
			</tr>';
		 }
	 
	 echo '
	 <tr>
		<th>Total Penjualan</th>
		<th>Rp.'.number_format($total,2,",",".").'</th>
	 </tr>
	 <tr>
			<th>No. Supply</th>
			<th>Jumlah</th>
	 </tr>';
	 $sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_supply WHERE tgl_supply BETWEEN '$tgl1' AND '$tgl2'")or die(mysqli_error($koneksi));
	 $total_supply = 0;
		  while($row2 = mysqli_fetch_array($sql2)){
			 $total_supply += $row2['total_supply'];
		 echo '
		 
		 <tr>
			  <td>'.$row2['no_supply'].'</td>
			  <td>Rp.'.number_format($row2['total_supply'],2,",",".").'</td>
		 </tr>';
		 }
	 }
	 echo '
	 <tr>
		<th>Total Pembelian</th>
		<th>Rp.'.number_format($total_supply,2,",",".").'</th>
	 </tr>
	 <tr>
		<th>Hasil Keuntungan</th>
		<th>Rp.'.number_format(($total - $total_supply),2,",",".").'</th>
	 </tr>
	 <tr>
		<td>Pajak 10%</td>
		<td>Rp.'.number_format((($total - $total_supply)*(10/100)),2,",",".").'</td>
	 </tr>
	 <tr>
		<th>Hasil Laba Rugi</th>
		<th>Rp.'.number_format((($total - $total_supply) - (($total - $total_supply)*(10/100))),2,",",".").'</th>
	 </tr>
		 </tbody>
	 </table>';
		 echo '
		   </div>
		   </div>
		 </div>
		 
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->';

	 } else {

		echo '
	<div class="content-wrapper">	
	
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Laporan Laba Rugi</h1>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>';

?>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
	<div class="card-body">
	<form class="form-inline" role="form" method="post" action="">
	  <div class="form-group">
	    <label class="sr-only" for="tgl1">Mulai</label>
	    <input type="date" class="form-control" id="tgl1" name="tgl1" required>
	  </div>
	  <div class="form-group">
	    <label class="sr-only" for="tgl2">Hingga</label>
	    <input type="date" class="form-control" id="tgl2" name="tgl2" required>
	  </div>
	  <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>
	</form>
	</div>
<?php

      echo '
	  	</div>
	  </div>
	  </div>
	            </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	</div>
    </section>
    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->';
   }
   }
?>
