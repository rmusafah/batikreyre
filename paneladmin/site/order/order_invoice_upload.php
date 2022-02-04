<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_order = $_REQUEST['no_order'];

		
// ambil data file
$namaFile = $_FILES['invoice']['name'];
$namaSementara = $_FILES['invoice']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "aset/file/Invoice/";
$upFile = $dirUpload.$namaFile;

		$sql = mysqli_query($koneksi, "UPDATE tbl_order SET invoice='$upFile' WHERE no_order='$no_order'");

		if($sql == true){
			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=order">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_order = $_REQUEST['no_order'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE no_order='$no_order'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=order">order</a></li>
			  <li class="breadcrumb-item active">Upload Invoice</li>
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
		<div class="col-sm-4">
		<a href="?hlm=order&aksi=invoice&no_order=<?php echo $row['no_order']; ?>" target="_blank" class="btn btn-success btn-lg"><i class="fas fa-file nav-icon"></i> Cetak</a>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_order" class="col-sm-2 col-form-label">No. order</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_order" name="no_order" value="<?php echo $row['no_order']; ?>" placeholder="No. order" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="invoice" class="col-sm-2 col-form-label">Upload Invoice</label>
		<div class="col-sm-4">
			<input type="file" class="form-control" id="invoice" name="invoice" placeholder="Upload Invoice">
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=order" type="submit" class="btn btn-danger">Batal</a>
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
