<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$id_motor = $_REQUEST['id_motor'];
		$nama_motor = $_REQUEST['nama_motor'];
		$tgl_msk = $_REQUEST['tgl_msk'];
		$jumlah = $_REQUEST['jumlah'];
		

		$sql = mysqli_query($koneksi, "UPDATE tbl_motor SET nama_motor='$nama_motor', tgl_msk='$tgl_msk', jumlah='$jumlah' WHERE id_motor='$id_motor'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=motor">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_motor = $_REQUEST['id_motor'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_motor WHERE id_motor='$id_motor'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Motor Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=motor">Motor</a></li>
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
		<label for="id_motor" class="col-sm-2 col-form-label">No. Motor</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="id_motor" name="id_motor" value="<?php echo $row['id_motor']; ?>" placeholder="No. Motor" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nama_motor" class="col-sm-2 col-form-label">Nama Motor</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama_motor" name="nama_motor" value="<?php echo $row['nama_motor']; ?>" placeholder="Nama Motor" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_msk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_msk" name="tgl_msk" value="<?php echo $row['tgl_msk']; ?>" placeholder="Tanggal Masuk" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jumlah" class="col-sm-2 col-form-label">jumlah</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jumlah" value="<?php echo $row['jumlah']; ?>" name="jumlah" placeholder="jumlah" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=motor" type="submit" class="btn btn-danger">Batal</a>
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
