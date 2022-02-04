<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_member) as maxKode FROM tbl_member");
$data  = mysqli_fetch_array($hasil);
$kodeID = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeID, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "MBR";
$newID = $char . sprintf("%03s", $noUrut);
	
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
		

		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_member(no_member, nm_dpn, nm_blkg, tgl_daftar, jk, provinsi, kota, alamat, kode_pos, telp, email, password) VALUES('$no_member', '$nm_dpn', '$nm_blkg', '$tgl_daftar', '$jk', '$provinsi', '$kota', '$alamat', '$kode_pos', '$telp', '$email', '$password')") or die( mysqli_error($koneksi) );; 

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=member">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
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
            <h1 class="m-0 text-dark"> Tambah Data Master Member Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=member">Member</a></li>
			  <li class="breadcrumb-item active">Tambah Data</li>
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
<div class="card-body">
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group row">
		<label for="no_member" class="col-sm-2 col-form-label">No. Member</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $newID; ?>" class="form-control" id="no_member" name="no_member" placeholder="No. Member" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_dpn" class="col-sm-2 col-form-label">Nama Depan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_dpn" name="nm_dpn" placeholder="Nama Member" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_blkg" class="col-sm-2 col-form-label">Nama Belakang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_blkg" name="nm_blkg" placeholder="Nama Belakang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_daftar" class="col-sm-2 col-form-label">Tanggal Daftar</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" placeholder="Tanggal Daftar" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-4">
			<select name="jk" class="form-control" required>
				<option value="">--- Jenis Kelamin ---</option>
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="kota" class="col-sm-2 col-form-label">Kota</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kota" name="kota" placeholder="Kota" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
		<div class="col-sm-4">
			<textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="telp" class="col-sm-2 col-form-label">Telepon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="telp" name="telp" placeholder="Telepon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">E-Mail</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=member" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
</div>
	<!-- /.card-body -->
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
