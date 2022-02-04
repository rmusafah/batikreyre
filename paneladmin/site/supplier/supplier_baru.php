<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

// membaca kode supplier terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_supplier) as maxKode FROM tbl_supplier");
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
$char = "SPL";
$newID = $char . sprintf("%03s", $noUrut);

	if( isset( $_REQUEST['submit'] )){

		$nm_supplier = $_REQUEST['nm_supplier'];
		$alamat = $_REQUEST['alamat'];
		$telp = $_REQUEST['telp'];
		$email = $_REQUEST['email'];
		$website = $_REQUEST['website'];

		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_supplier(no_supplier, nm_supplier, alamat, telp, email, website) VALUES('$newID','$nm_supplier', '$alamat', '$telp', '$email', '$website')") or die( mysqli_error($koneksi) );; 

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=supplier">';
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
            <h1 class="m-0 text-dark"> Tambah Data Master Supplier Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=supplier">Supplier</a></li>
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
<!-- atribut enctype berfungsi untuk memberikan intruksi pada php form ini untuk mengupload file -->
<form method="post" action="" class="form-horizontal" role="form" enctype="multipart/form-data">
	<div class="form-group row">
		<label for="nm_supplier" class="col-sm-2 col-form-label">Nama supplier</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_supplier" name="nm_supplier" placeholder="Nama supplier" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="telp" class="col-sm-2 col-form-label">Telpon</label>
		<div class="col-sm-4">
			<input class="form-control" id="telp" name="telp" placeholder="Telpon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">email</label>
		<div class="col-sm-4">
			<input class="form-control" id="email" name="email" placeholder="email" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="website" class="col-sm-2 col-form-label">Website</label>
		<div class="col-sm-4">
			<input class="form-control" id="website" name="website" placeholder="Website" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=supplier" class="btn btn-danger">Batal</a>
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
