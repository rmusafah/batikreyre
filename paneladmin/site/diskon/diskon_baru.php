<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_diskon) as maxKode FROM tbl_diskon_detail");
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
$char = "DSK";
$newID = $char . sprintf("%03s", $noUrut);

	if( isset( $_REQUEST['submit'] )){

		$no_diskon = $_REQUEST['no_diskon'];
		$nm_diskon = $_REQUEST['nm_diskon'];
		$no_brg = $_REQUEST['no_brg'];
		$tgl_diskon = $_REQUEST['tgl_diskon'];
		$tgl_diskon_akhir = $_REQUEST['tgl_diskon_akhir'];
		$jml_diskon = $_REQUEST['jml_diskon'];
		$ket = $_REQUEST['ket'];
		
		$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_diskon WHERE tbl_diskon.no_brg='$_REQUEST[no_brg]'");
		
		if(mysqli_num_rows($sql2) >= 1){
			echo 'Data Diskon Sudah Ada';
			die();
		} else {
			
		$sql3 = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE tbl_barang.no_brg='$_REQUEST[no_brg]'");
		$row3 = mysqli_fetch_array($sql3);
		$harga_akhir = $row3['harga'] - ($row3['harga']*($jml_diskon/100));
		$sql4 = mysqli_query($koneksi, "UPDATE tbl_barang SET diskon='$jml_diskon', harga_akhir='$harga_akhir' WHERE tbl_barang.no_brg='$_REQUEST[no_brg]'");
			
			
		$query = "INSERT INTO tbl_diskon_detail(no_diskon, nm_diskon, no_brg, tgl_diskon, tgl_diskon_akhir, jml_diskon, ket) VALUES('$no_diskon','$nm_diskon', '$no_brg', '$tgl_diskon', '$tgl_diskon_akhir', '$jml_diskon', '$ket');";
		
		$query .= "INSERT INTO tbl_diskon(no_diskon, no_brg, jml_diskon) VALUES('$no_diskon', '$no_brg', '$jml_diskon');";
		
		$sql = mysqli_multi_query($koneksi, $query) or die( mysqli_error($koneksi) );; 
		}

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=diskon">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya. '. mysqli_error($koneksi);
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
            <h1 class="m-0 text-dark"> Tambah Data Master Diskon Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=diskon">Diskon</a></li>
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
		<label for="no_diskon" class="col-sm-2 col-form-label">No. Diskon</label>
		<div class="col-sm-4">
			<input type="text" readonly="" value="<?php echo $newID; ?>" class="form-control" id="no_diskon" name="no_diskon" placeholder="No. Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_diskon" class="col-sm-2 col-form-label">Nama Diskon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_diskon" name="nm_diskon" placeholder="Nama Diskon" required>
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
				<option value="<?php echo $data['no_brg'];?>"><?php echo $data['no_brg'];?> - <?php echo $data['nm_brg'];?></option>
			<?php 
				}
			?>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_diskon" class="col-sm-2 col-form-label">Tanggal Diskon</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_diskon" name="tgl_diskon" placeholder="Tanggal Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_diskon_akhir" class="col-sm-2 col-form-label">Tanggal Diskon Akhir</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_diskon_akhir" name="tgl_diskon_akhir" placeholder="Tanggal Diskon Akhir" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jml_diskon" class="col-sm-2 col-form-label">Jumlah Diskon</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="jml_diskon" name="jml_diskon" placeholder="Jumlah Diskon" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="ket" name="ket" placeholder="ket" required></textarea>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=diskon" class="btn btn-danger">Batal</a>
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
