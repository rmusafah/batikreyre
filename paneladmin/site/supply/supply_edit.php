<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_supply = $_REQUEST['no_supply'];
		$no_supplier = $_REQUEST['no_supplier'];
		$tgl_supply = $_REQUEST['tgl_supply'];
		$tgl_terima = $_REQUEST['tgl_terima'];
		$no_brg = $_REQUEST['no_brg'];
		$jml_supply = $_REQUEST['jml_supply'];
		$harga_supply = $_REQUEST['harga_supply'];
		$total_supply = $harga_supply*$jml_supply;
		$status = $_REQUEST['status'];		

		$sql = mysqli_query($koneksi, "UPDATE tbl_supply SET no_supplier='$no_supplier', tgl_supply='$tgl_supply', tgl_terima='$tgl_terima', no_brg='$no_brg', jml_supply='$jml_supply', harga_supply='$harga_supply', total_supply='$total_supply', status='$status' WHERE no_supply='$no_supply'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=supply">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_supply = $_REQUEST['no_supply'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_supply WHERE no_supply='$no_supply'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Barang Masuk Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=supply">Supply</a></li>
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
		<label for="no_supplier" class="col-sm-2 col-form-label">No. Supplier</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="no_supplier" name="no_supplier" value="<?php echo $row['no_supplier']; ?>" placeholder="No. Supplier" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_supply" class="col-sm-2 col-form-label">Tanggal Barang Masuk</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_supply" name="tgl_supply" value="<?php echo $row['tgl_supply']; ?>" placeholder="Tanggal Barang Masuk" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_terima" class="col-sm-2 col-form-label">Tanggal Terima</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_terima" name="tgl_terima" value="<?php echo $row['tgl_terima']; ?>" placeholder="Tanggal Terima" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_brg" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="no_brg" name="no_brg" value="<?php echo $row['no_brg']; ?>" placeholder="No. Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jml_supply" class="col-sm-2 col-form-label">Jumlah</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jml_supply" name="jml_supply" value="<?php echo $row['jml_supply']; ?>" placeholder="Jumlah" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="harga_supply" class="col-sm-2 col-form-label">Harga</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="harga_supply" name="harga_supply" value="<?php echo $row['harga_supply']; ?>" placeholder="Total" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-4">
			<select name="status" class="form-control" required>
				<option value="<?php echo $row['status']; ?>">--- <?php echo $row['status']; ?> ---</option>
				<option value="Di Proses">Di Proses</option>
				<option value="Dalam Pengiriman">Dalam Pengiriman</option>
				<option value="Selesai">Selesai</option>
				<option value="Batal">Batal</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=supply" type="submit" class="btn btn-danger">Batal</a>
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
