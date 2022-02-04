<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_brg_rusak) as maxKode FROM tbl_brg_rusak");
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
$char = "RSK";
$newID = $char . sprintf("%03s", $noUrut);

	if( isset( $_REQUEST['submit'] )){

		$no_brg = $_REQUEST['no_brg'];
		$no_supplier = $_REQUEST['no_supplier'];
		$tgl_rusak = $_REQUEST['tgl_rusak'];
		$jumlah = $_REQUEST['jumlah'];
		$keterangan = $_REQUEST['keterangan'];
		$status = $_REQUEST['status'];

		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_brg_rusak(no_brg_rusak, no_brg, no_supplier, tgl_rusak, jumlah, keterangan, status) VALUES('$newID','$no_brg','$no_supplier', '$tgl_rusak', '$jumlah', '$keterangan', '$status')") or die( mysqli_error($koneksi) );; 

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=brg_rusak">';
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
            <h1 class="m-0 text-dark"> Tambah Data Master Barang Rusak Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=brg_rusak">Barang Rusak</a></li>
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
		<label for="no_brg_rusak" class="col-sm-2 col-form-label">ID</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $newID; ?>" class="form-control" id="no_brg_rusak" name="no_brg_rusak" placeholder="No. Barang" required>
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
		<label for="tgl_rusak" class="col-sm-2 col-form-label">Tanggal Rusak</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_rusak" name="tgl_rusak" placeholder="Tanggal Rusak" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
		<div class="col-sm-4">
			<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" required></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="status" name="status" placeholder="Status" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=brg_rusak" class="btn btn-danger">Batal</a>
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
