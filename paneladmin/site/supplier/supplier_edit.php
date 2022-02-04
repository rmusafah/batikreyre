<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_supplier = $_REQUEST['no_supplier'];
		$nm_supplier = $_REQUEST['nm_supplier'];
		$alamat = $_REQUEST['alamat'];
		$telp = $_REQUEST['telp'];
		$email = $_REQUEST['email'];
		$website = $_REQUEST['website'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_supplier SET nm_supplier='$nm_supplier', alamat='$alamat', telp='$telp', email='$email', website='$website' WHERE no_supplier='$no_supplier'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=supplier">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_supplier = $_REQUEST['no_supplier'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_supplier WHERE no_supplier='$no_supplier'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Supplier Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=supplier">Supplier</a></li>
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
			<input type="text" readonly="" class="form-control" id="no_supplier" name="no_supplier" value="<?php echo $row['no_supplier']; ?>" placeholder="No. supplier" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_supplier" name="nm_supplier" value="<?php echo $row['nm_supplier']; ?>" placeholder="Nama supplier" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required><?php echo $row['alamat']; ?></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="telp" class="col-sm-2 col-form-label">Telpon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $row['telp']; ?>" placeholder="Telpon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">E-Mail</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" name="email" placeholder="E-Mail" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="website" class="col-sm-2 col-form-label">Website</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="website" value="<?php echo $row['website']; ?>" name="website" placeholder="Website" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=supplier" type="submit" class="btn btn-danger">Batal</a>
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
