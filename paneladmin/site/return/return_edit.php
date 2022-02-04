<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_return = $_REQUEST['no_return'];
		$no_order = $_REQUEST['no_order'];
		$no_member = $_REQUEST['no_member'];
		$tgl_ajuan = $_REQUEST['tgl_ajuan'];
		$tgl_return = $_REQUEST['tgl_return'];
		$ket_return = $_REQUEST['ket_return'];
		$status_ajuan = $_REQUEST['status_ajuan'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_return SET no_order='$no_order', no_member='$no_member', tgl_ajuan='$tgl_ajuan', tgl_return='$tgl_return', ket_return='$ket_return', status_ajuan='$status_ajuan' WHERE no_return='$no_return'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=return">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_return = $_REQUEST['no_return'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_return WHERE no_return='$no_return'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Retur Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=return">Return</a></li>
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
		<label for="no_return" class="col-sm-2 col-form-label">No. Return</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_return" name="no_return" value="<?php echo $row['no_return']; ?>" placeholder="No. Return" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_order" class="col-sm-2 col-form-label">No. Order</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_order" name="no_order" value="<?php echo $row['no_order']; ?>" placeholder="No. Order" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_member" class="col-sm-2 col-form-label">No. Member</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_member" name="no_member" value="<?php echo $row['no_member']; ?>" placeholder="No. Member" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_ajuan" class="col-sm-2 col-form-label">Tanggal Ajuan</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_ajuan" name="tgl_ajuan" value="<?php echo $row['tgl_ajuan']; ?>" placeholder="Tanggal Ajuan" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_return" class="col-sm-2 col-form-label">Tanggal Return</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_return" name="tgl_return" value="<?php echo $row['tgl_return']; ?>" placeholder="Tanggal Return" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ket_return" class="col-sm-2 col-form-label">Keterangan</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="ket_return" name="ket_return" placeholder="ket_return" required><?php echo $row['ket_return']; ?></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="status_ajuan" class="col-sm-2 col-form-label">Status Ajuan</label>
		<div class="col-sm-4">
			<select name="status_ajuan" class="form-control" required>
				<option value="<?php echo $row['status_ajuan']; ?>">--- <?php echo $row['status_ajuan']; ?> ---</option>
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
			<a href="./admin.php?hlm=return" type="submit" class="btn btn-danger">Batal</a>
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
