<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_pesan) as maxKode FROM tbl_cs");
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
$char = "BRG";
$newID = $char . sprintf("%03s", $noUrut);

	if( isset( $_REQUEST['submit'] )){

		$no_pesan = $_REQUEST['no_pesan'];
		$nm_brg = $_REQUEST['nm_brg'];
		$tgl_msk = $_REQUEST['tgl_msk'];
		$ktgri_brg = $_REQUEST['ktgri_brg'];
		$ukuran = $_REQUEST['ukuran'];
		$harga = $_REQUEST['harga'];
		$diskon = $_REQUEST['diskon'];
		$stok = $_REQUEST['stok'];
		$deskripsi = $_REQUEST['deskripsi'];
		
// ambil data file
$namaFile = $_FILES['gambar']['name'];
$namaSementara = $_FILES['gambar']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "aset/file/$ktgri_brg/";
$upFile = $dirUpload.$namaFile;

		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_cs(no_pesan, nm_brg, tgl_msk, ktgri_brg, ukuran, harga, diskon, stok, deskripsi, gambar) VALUES('$no_pesan','$nm_brg', '$tgl_msk', '$ktgri_brg', '$ukuran', '$harga', '$diskon', '$stok', '$deskripsi', '$$upFile')") or die( mysqli_error($koneksi) );; 

		if($sql == true){
			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=keluhan">';
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
            <h1 class="m-0 text-dark"> Tambah Data Master Feedback Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=keluhan">Barang</a></li>
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
		<label for="no_pesan" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $newID; ?>" class="form-control" id="no_pesan" name="no_pesan" placeholder="No. Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_brg" class="col-sm-2 col-form-label">Nama Barang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_brg" name="nm_brg" placeholder="Nama Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_msk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_msk" name="tgl_msk" placeholder="Tanggal Masuk" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ktgri_brg" class="col-sm-2 col-form-label">Kategori</label>
		<div class="col-sm-4">
			<select name="ktgri_brg" class="form-control" required>
				<option value="">--- Kategori ---</option>
				<option value="Batik Pria">Batik Pria</option>
				<option value="Batik Wanita">Batik Wanita</option>
				<option value="Batik Anak-anak">Batik Anak-anak</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
		<div class="col-sm-4">
			<select name="ukuran" class="form-control" required>
				<option value="">--- Ukuran ---</option>
				<option value="XL">XL</option>
				<option value="L">L</option>
				<option value="M">M</option>
				<option value="S">S</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="harga" class="col-sm-2 col-form-label">Harga</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="diskon" name="diskon" placeholder="Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="stok" class="col-sm-2 col-form-label">Stok</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required></textarea>
		</div>
	</div>
	<div class="form-group row">
		<label for="gambar" class="col-sm-2 col-form-label">Upload Gambar</label>
		<div class="col-sm-4">
			<input type="file" class="form-control" id="gambar" name="gambar" placeholder="Upload Gambar" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=keluhan" class="btn btn-danger">Batal</a>
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
