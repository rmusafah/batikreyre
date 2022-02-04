<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_brg_detail = $_REQUEST['no_brg_detail'];
		$no_brg = $_REQUEST['no_brg'];
		$ukuran = $_REQUEST['ukuran'];
		$stok = $_REQUEST['stok'];
		

		$sql = mysqli_query($koneksi, "UPDATE tbl_barang_detail SET no_brg='$no_brg', ukuran='$ukuran', stok='$stok' WHERE no_brg_detail='$no_brg_detail'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=barang&aksi=detail&no_brg='.$no_brg.'">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_brg_detail = $_REQUEST['no_brg_detail'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_barang_detail WHERE no_brg_detail='$no_brg_detail'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Barang Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=barang">Barang</a></li>
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
		<label for="no_brg_detail" class="col-sm-2 col-form-label">No. Barang Detail</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_brg_detail" name="no_brg_detail" value="<?php echo $row['no_brg_detail']; ?>" placeholder="No. Barang Detail" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_brg" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_brg" name="no_brg" value="<?php echo $row['no_brg']; ?>" placeholder="No. Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
		<div class="col-sm-4">
			<select name="ukuran" class="form-control" required>
				<option value="<?php echo $row['ukuran']; ?>">--- <?php echo $row['ukuran']; ?> ---</option>
				<option value="XL">XL</option>
				<option value="L">L</option>
				<option value="M">M</option>
				<option value="S">S</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="stok" class="col-sm-2 col-form-label">Stok</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="stok" value="<?php echo $row['stok']; ?>" name="stok" placeholder="Stok" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=barang&aksi=detail&no_brg=<?php echo $no_brg; ?>" type="submit" class="btn btn-danger">Batal</a>
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
