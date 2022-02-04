<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_brg_detail) as maxKode FROM tbl_barang_detail");
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
$char = "BDL";
$newID = $char . sprintf("%03s", $noUrut);

$no_brg = $_REQUEST['no_brg'];

	if( isset( $_REQUEST['submit'] )){

		$no_brg = $_REQUEST['no_brg'];
		$ukuran = $_REQUEST['ukuran'];
		$stok = $_REQUEST['stok'];
		
		$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_barang_detail WHERE tbl_barang_detail.ukuran='$_REQUEST[ukuran]' AND tbl_barang_detail.no_brg='$_REQUEST[no_brg]'");

		if(mysqli_num_rows($sql2) >= 1){
			echo 'UKuran Tidak Boleh Sama';
			die();
		} else {
			
		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_barang_detail(no_brg_detail, no_brg, ukuran, stok) VALUES('$newID','$no_brg', '$ukuran', '$stok')") or die( mysqli_error($koneksi) );; 
		}

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=barang&aksi=detail&no_brg='.$no_brg.'">';
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
            <h1 class="m-0 text-dark"> Tambah Data Master Detail Barang Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=barang">Barang</a></li>
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
		<label for="no_brg_detail" class="col-sm-2 col-form-label">No. Barang Detail</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $newID; ?>" class="form-control" id="no_brg_detail" name="no_brg_detail" placeholder="No. Barang Detail" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_brg" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $no_brg; ?>" class="form-control" id="no_brg" name="no_brg" placeholder="No. Barang" required>
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
		<label for="stok" class="col-sm-2 col-form-label">Stok</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=barang&aksi=detail&no_brg=<?php echo $no_brg; ?>" class="btn btn-danger">Batal</a>
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
