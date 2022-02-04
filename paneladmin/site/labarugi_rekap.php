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
         $biaya = $_REQUEST['biaya'];
         $penyusutan = $_REQUEST['penyusutan'];
         $pajak = $_REQUEST['pajak'];

		 $sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE tgl_terbayar BETWEEN '$tgl1' AND '$tgl2'")or die(mysqli_error($koneksi));
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

		  <tbody>';
	 $sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE tgl_terbayar BETWEEN '$tgl1' AND '$tgl2'")or die(mysqli_error($koneksi));
	 $penjualan = 0;
	 $hpp_order = 0;
		  while($row2 = mysqli_fetch_array($sql2)){
			 $penjualan += $row2['total_harga'];
			 $hpp_order += $row2['hpp_order'];
		  }
		 echo '
	<tr>
			<th>Uraian</th>
			<th>Jumlah</th>
	 </tr>
	 <tr>
		<td>Total Penjualan</td>
		<td>Rp.'.number_format($penjualan,2,",",".").'</td>
	 </tr>
	 <tr>
		<td>Harga Pokok Penjualan</td>
		<td>Rp.'.number_format($hpp_order,2,",",".").'</td>
	 </tr>
	 <tr>
	 </br>
		<th>Laba (rugi) Kotor</th>
		<th>Rp.'.number_format(($penjualan - $hpp_order),2,",",".").'</th>
	 </tr>
	 <tr>
		<td>Biaya Operasional</td>
		<td>Rp.'.number_format($biaya,2,",",".").'</td>
	 </tr>
	 <tr>
		<th>Laba (Rugi) Operasional</th>
		<th>Rp.'.number_format((($penjualan - $hpp_order) - $biaya),2,",",".").'</th>
	 </tr>
	 <tr>
		<td>Penyusutan</td>
		<td>Rp.'.number_format($penyusutan,2,",",".").'</td>
	 </tr>
	 <tr>
		<th>Laba (Rugi) bersih sebelum pajak</th>
		<th>Rp.'.number_format(((($penjualan - $hpp_order) - $biaya) - $penyusutan),2,",",".").'</th>
	 </tr>
	 <tr>
		<td>Pajak 10%</td>
		<td>Rp.'.number_format(($penjualan * (10/100)),2,",",".").'</td>
	 </tr>
	 <tr>
		<th>Laba (Rugi) bersih setelah pajak</th>
		<th>Rp.'.number_format((((($penjualan - $hpp_order) - $biaya) - $penyusutan) - ($penjualan * (10/100))),2,",",".").'</th>
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
		 }
		
	} else {

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Rekap Laporan Laba Rugi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=order">order</a></li>
			  <li class="breadcrumb-item active">Laba Rugi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
	
<!-- Main content -->
<div class="content">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="card">
<!-- atribut enctype berfungsi untuk memberikan intruksi pada php form ini untuk mengupload file -->
<form method="post" action="" class="form-horizontal" role="form">
<div class="card-body">
	<div class="form-group row">
		<label for="tgl1" class="col-sm-2 col-form-label">Tanggal Awal</label>
		<div class="col-sm-2">
			<input type="date" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal Awal" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl2" class="col-sm-2 col-form-label">Tanggal Akhir</label>
		<div class="col-sm-2">
			<input type="date" class="form-control" id="tgl2" name="tgl2" placeholder="Tanggal Akhir" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="biaya" class="col-sm-2 col-form-label">Biaya Operasional</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="biaya" name="biaya" placeholder="biaya" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="penyusutan" class="col-sm-2 col-form-label">Penyusutan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="penyusutan" name="penyusutan" placeholder="Penyusutan" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="pajak" class="col-sm-2 col-form-label">Pajak</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="pajak" name="pajak" placeholder="Pajak" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php" type="submit" class="btn btn-danger">Batal</a>
		</div>
	</div>
</div>
	<!-- /.card-body -->
</form>
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
</div>
<!-- /.content -->
<?php
   }
   }

?>
