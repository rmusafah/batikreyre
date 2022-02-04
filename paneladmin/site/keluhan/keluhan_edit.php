	<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

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
		$harga_akhir = $harga - ($harga*($diskon/100));
		
// ambil data file
$namaFile = $_FILES['gambar']['name'];
$namaSementara = $_FILES['gambar']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "aset/file/$ktgri_brg/";
$upFile = $dirUpload.$namaFile;

		$sql = mysqli_query($koneksi, "UPDATE tbl_cs SET nm_brg='$nm_brg', tgl_msk='$tgl_msk', ktgri_brg='$ktgri_brg', ukuran='$ukuran', harga='$harga', diskon='$diskon', harga_akhir='$harga_akhir', stok='$stok', deskripsi='$deskripsi', gambar='$upFile' WHERE no_pesan='$no_pesan'");

		if($sql == true){
			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=keluhan">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_pesan = $_REQUEST['no_pesan'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_cs WHERE no_pesan='$no_pesan'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Feedback Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=keluhan">Barang</a></li>
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
		<label for="no_pesan" class="col-sm-2 col-form-label">No. Barang</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_pesan" name="no_pesan" value="<?php echo $row['no_pesan']; ?>" placeholder="No. Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_brg" class="col-sm-2 col-form-label">Nama Barang</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_brg" name="nm_brg" value="<?php echo $row['nm_brg']; ?>" placeholder="Nama Barang" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_msk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_msk" name="tgl_msk" value="<?php echo $row['tgl_msk']; ?>" placeholder="Tanggal Masuk" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ktgri_brg" class="col-sm-2 col-form-label">Kategori</label>
		<div class="col-sm-4">
			<select name="ktgri_brg" class="form-control" required>
				<option value="<?php echo $row['ktgri_brg']; ?>">--- <?php echo $row['ktgri_brg']; ?> ---</option>
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
				<option value="<?php echo $row['ukuran']; ?>">--- <?php echo $row['ukuran']; ?> ---</option>
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
			<input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" placeholder="Nama Harga" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
		<div class="col-sm-4">
			<input type="number" min="0" max="100" class="form-control" id="diskon" name="diskon" value="<?php echo $row['diskon']; ?>" placeholder="Diskon" required>
			<a class="text-sm">* Diskon berupa persenan dari harga barang</a>
		</div>
	</div>
	</br>
	<div class="form-group row">
		<label for="stok" class="col-sm-2 col-form-label">Stok</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="stok" value="<?php echo $row['stok']; ?>" name="stok" placeholder="Stok" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
		<div class="col-sm-4">
			<textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
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
			<a href="./admin.php?hlm=keluhan" type="submit" class="btn btn-danger">Batal</a>
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
