<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_member = $_REQUEST['no_member'];
		$nm_dpn = $_REQUEST['nm_dpn'];
		$nm_blkg = $_REQUEST['nm_blkg'];
		$tgl_daftar = $_REQUEST['tgl_daftar'];
		$jk = $_REQUEST['jk'];
		$provinsi = $_REQUEST['provinsi'];
		$kota = $_REQUEST['kota'];
		$alamat = $_REQUEST['alamat'];
		$kode_pos = $_REQUEST['kode_pos'];
		$telp = $_REQUEST['telp'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_member SET nm_dpn='$nm_dpn', nm_blkg='$nm_blkg', tgl_daftar='$tgl_daftar', jk='$jk', provinsi='$provinsi', kota='$kota', alamat='$alamat', kode_pos='$kode_pos', telp='$telp', email='$email', password='$password'	 WHERE no_member='$no_member'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=member">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_member = $_REQUEST['no_member'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE no_member='$no_member'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Member Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=member">Member</a></li>
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
<form method="post" action="" class="form-horizontal" role="form">
<div class="card-body">
	<div class="form-group row">
		<label for="no_member" class="col-sm-2 col-form-label">No. Member</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_member" name="no_member" value="<?php echo $row['no_member']; ?>" placeholder="No. Member" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_dpn" class="col-sm-2 col-form-label">Nama Depan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_dpn" value="<?php echo $row['nm_dpn']; ?>" name="nm_dpn" placeholder="Nama Depan" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_blkg" class="col-sm-2 col-form-label">Nama Belakang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_blkg" value="<?php echo $row['nm_blkg']; ?>" name="nm_blkg" placeholder="Nama Belakang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Daftar</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_daftar" value="<?php echo $row['tgl_daftar']; ?>" name="tgl_daftar" placeholder="Tanggal Daftar" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-4">
			<select name="jk" class="form-control" required>
				<option value="<?php echo $row['jk']; ?>">--- <?php echo $row['jk']; ?> ---</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="provinsi" value="<?php echo $row['provinsi']; ?>" name="provinsi" placeholder="Provinsi" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="kota" class="col-sm-2 col-form-label">Kota</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kota" value="<?php echo $row['kota']; ?>" name="kota" placeholder="Kota" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="alamat" value="<?php echo $row['alamat']; ?>" name="alamat" placeholder="Alamat" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kode_pos" value="<?php echo $row['kode_pos']; ?>" name="kode_pos" placeholder="Kode Pos" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="telp" class="col-sm-2 col-form-label">Telepon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="telp" value="<?php echo $row['telp']; ?>" name="telp" placeholder="Telepon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">E-Mail</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>" name="email" placeholder="E-Mail" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="password" value="<?php echo $row['password']; ?>" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=member" type="submit" class="btn btn-danger">Batal</a>
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
