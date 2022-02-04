	<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_brg_rusak = $_REQUEST['no_brg_rusak'];
		$no_brg = $_REQUEST['no_brg'];
		$no_supplier = $_REQUEST['no_supplier'];
		$tgl_rusak = $_REQUEST['tgl_rusak'];
		$jumlah = $_REQUEST['jumlah'];
		$keterangan = $_REQUEST['keterangan'];
		$status = $_REQUEST['status'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_brg_rusak SET no_brg='$no_brg', no_supplier='$no_supplier', tgl_rusak='$tgl_rusak', jumlah='$jumlah', keterangan='$keterangan', status='$status' WHERE no_brg_rusak='$no_brg_rusak'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=brg_rusak">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_brg_rusak = $_REQUEST['no_brg_rusak'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_brg_rusak WHERE no_brg_rusak='$no_brg_rusak'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Barang Rusak Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=brg_rusak">Barang Rusak</a></li>
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
		<label for="no_brg_rusak" class="col-sm-2 col-form-label">ID</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $row['no_brg_rusak']; ?>" class="form-control" id="no_brg_rusak" name="no_brg_rusak" placeholder="ID" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_brg" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $row['no_brg']; ?>" class="form-control" id="no_brg" name="no_brg" placeholder="No. Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_supplier" class="col-sm-2 col-form-label">No. Supplier</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $row['no_supplier']; ?>" class="form-control" id="no_supplier" name="no_supplier" placeholder="No. Supplier" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_rusak" class="col-sm-2 col-form-label">Tanggal Rusak</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_rusak" name="tgl_rusak" value="<?php echo $row['tgl_rusak']; ?>" placeholder="Tanggal Rusak" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
		<div class="col-sm-4">
			<input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" placeholder="Jumlah" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required><?php echo $row['keterangan']; ?></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>" placeholder="Status" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=brg_rusak" type="submit" class="btn btn-danger">Batal</a>
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
