<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_diskon = $_REQUEST['no_diskon'];
		$nm_diskon = $_REQUEST['nm_diskon'];
		$no_brg = $_REQUEST['no_brg'];
		$tgl_diskon = $_REQUEST['tgl_diskon'];
		$tgl_diskon_akhir = $_REQUEST['tgl_diskon_akhir'];
		$jml_diskon = $_REQUEST['jml_diskon'];
		$ket = $_REQUEST['ket'];
		
		$sql3 = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE tbl_barang.no_brg='$_REQUEST[no_brg]'");
		$row3 = mysqli_fetch_array($sql3);
		$harga_akhir = $row3['harga'] - ($row3['harga']*($jml_diskon/100));
		
		$sql = mysqli_query($koneksi, "UPDATE tbl_diskon, tbl_diskon_detail, tbl_barang SET nm_diskon='$nm_diskon', tbl_diskon.no_brg='$no_brg', tbl_diskon_detail.no_brg='$no_brg', tgl_diskon='$tgl_diskon', tgl_diskon_akhir='$tgl_diskon_akhir', tbl_diskon.jml_diskon='$jml_diskon', tbl_diskon_detail.jml_diskon='$jml_diskon', tbl_barang.diskon='$jml_diskon', tbl_barang.harga_akhir='$harga_akhir', ket='$ket' WHERE tbl_diskon.no_diskon='$no_diskon' AND tbl_diskon_detail.no_diskon='$no_diskon' AND tbl_barang.no_brg='$_REQUEST[no_brg]'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=diskon">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.'. mysqli_error($koneksi);
		}
	} else {

		$no_diskon = $_REQUEST['no_diskon'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_diskon, tbl_diskon_detail WHERE tbl_diskon.no_diskon='$no_diskon' AND tbl_diskon_detail.no_diskon='$no_diskon'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Diskon Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=diskon">Diskon</a></li>
			  <li class="breadcrumb-item active">Edit Data</li>
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
<form method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
<div class="card-body">
	<div class="form-group row">
		<label for="no_diskon" class="col-sm-2 col-form-label">No. Diskon</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $row['no_diskon']; ?>" class="form-control" id="no_diskon" name="no_diskon" placeholder="No. Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_diskon" class="col-sm-2 col-form-label">Nama Diskon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_diskon" name="nm_diskon" value="<?php echo $row['nm_diskon']; ?>" placeholder="Nama Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_brg" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $row['no_brg']; ?>" class="form-control" id="no_brg" name="no_brg"  placeholder="No. Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_diskon" class="col-sm-2 col-form-label">Tanggal Diskon</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_diskon" name="tgl_diskon" value="<?php echo $row['tgl_diskon']; ?>" placeholder="Tanggal Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_diskon_akhir" class="col-sm-2 col-form-label">Tanggal Diskon Akhir</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_diskon_akhir" name="tgl_diskon_akhir" value="<?php echo $row['tgl_diskon_akhir']; ?>" placeholder="Tanggal Diskon Akhir" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jml_diskon" class="col-sm-2 col-form-label">Jumlah Diskon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jml_diskon" name="jml_diskon" value="<?php echo $row['jml_diskon']; ?>" placeholder="Jumlah Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="ket" name="ket" placeholder="ket" required><?php echo $row['ket']; ?></textarea>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=diskon" type="submit" class="btn btn-danger">Batal</a>
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
}
?>
