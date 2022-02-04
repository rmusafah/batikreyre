<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_supply) as maxKode FROM tbl_supply");
$data  = mysqli_fetch_array($hasil);
$kodeID = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeID, 6, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "BRGMSK";
$newID = $char . sprintf("%03s", $noUrut);

	if( isset( $_REQUEST['submit'] )){

		$no_supplier = $_REQUEST['no_supplier'];
		$tgl_supply = $_REQUEST['tgl_supply'];
		$tgl_terima = $_REQUEST['tgl_terima'];
		$no_brg = $_REQUEST['no_brg'];
		$jml_supply = $_REQUEST['jml_supply'];
		$harga_supply = $_REQUEST['harga_supply'];
		$total_supply = $harga_supply*$jml_supply;
		$status = $_REQUEST['status'];

		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_supply(no_supply, no_supplier, tgl_supply, tgl_terima, no_brg, jml_supply, harga_supply, total_supply, status) VALUES('$newID', '$no_supplier', '$tgl_supply', '$tgl_terima', '$no_brg', '$jml_supply', '$harga_supply', '$total_supply', '$status')") or die( mysqli_error($koneksi) );; 

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=supply">';
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
            <h1 class="m-0 text-dark"> Tambah Data Master Barang Masuk Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=supply">supply</a></li>
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
		<label for="no_supply" class="col-sm-2 col-form-label">No. Supply</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $newID; ?>" class="form-control" id="no_supply" name="no_supply" placeholder="No. Supply" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_supplier" class="col-sm-2 col-form-label">No. Supplier</label>
		<div class="col-sm-4">
			<select class="form-control" name="no_supplier" required>
			<?php
			//Perintah sql untuk menampilkan semua data pada tabel jurusan
				$sql=mysqli_query($koneksi, "SELECT * FROM tbl_supplier");
				$no=0;
				while ($data = mysqli_fetch_array($sql)) {
				$no++;
			?>
				<option value="<?php echo $data['no_supplier'];?>"><?php echo $data['no_supplier'];?></option>
			<?php 
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_supply" class="col-sm-2 col-form-label">Tanggal Barang Masuk</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_supply" name="tgl_supply" placeholder="Tanggal Barang Masuk" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_terima" class="col-sm-2 col-form-label">Tanggal Terima</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_terima" name="tgl_terima" placeholder="Tanggal Terima" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_brg" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<select class="form-control" name="no_brg" required>
			<?php
			//Perintah sql untuk menampilkan semua data pada tabel jurusan
				$sql=mysqli_query($koneksi, "SELECT * FROM tbl_barang");
				$no=0;
				while ($data = mysqli_fetch_array($sql)) {
				$no++;
			?>
				<option value="<?php echo $data['no_brg'];?>"><?php echo $data['no_brg'];?></option>
			<?php 
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="jml_supply" class="col-sm-2 col-form-label">Jumlah</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jml_supply" name="jml_supply" placeholder="Jumlah" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="harga_supply" class="col-sm-2 col-form-label">Harga</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="harga_supply" name="harga_supply" placeholder="Harga" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-4">
			<select name="status" class="form-control" required>
				<option value="">--- Status---</option>
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
			<a href="./admin.php?hlm=supply" class="btn btn-danger">Batal</a>
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
