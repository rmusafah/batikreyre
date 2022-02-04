<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$no_order = $_REQUEST['no_order'];
		$tgl_order = $_REQUEST['tgl_order'];
		$jatuh_tempo = $_REQUEST['jatuh_tempo'];
		$tgl_terbayar = $_REQUEST['tgl_terbayar'];
		$no_member = $_REQUEST['no_member'];
		$total_harga = $_REQUEST['total_harga'];
		$pajak = $_REQUEST['pajak'];
		$ongkir = $_REQUEST['ongkir'];
		$total = $total_harga + ($total_harga * $pajak/100) + $ongkir;
		$provinsi_ord = $_REQUEST['provinsi_ord'];
		$kota_ord = $_REQUEST['kota_ord'];
		$alamat_ord = $_REQUEST['alamat_ord'];
		$kode_pos_ord = $_REQUEST['kode_pos_ord'];
		$status = $_REQUEST['status'];
		$no_resi = $_REQUEST['no_resi'];
		$kurir = $_REQUEST['kurir'];


		$sql = mysqli_query($koneksi, "UPDATE tbl_order SET tgl_order='$tgl_order', jatuh_tempo='$jatuh_tempo', tgl_terbayar='$tgl_terbayar', no_member='$no_member', total_harga='$total_harga', pajak='$pajak', ongkir='$ongkir', total='$total', provinsi_ord='$provinsi_ord', kota_ord='$kota_ord', alamat_ord='$alamat_ord', kode_pos_ord='$kode_pos_ord', status='$status', no_resi='$no_resi', kurir='$kurir' WHERE no_order='$no_order'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=order">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$no_order = $_REQUEST['no_order'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE no_order='$no_order'") or die( mysqli_error($koneksi));
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master order Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=order">order</a></li>
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
		<label for="no_order" class="col-sm-2 col-form-label">No. order</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_order" name="no_order" value="<?php echo $row['no_order']; ?>" placeholder="No. order" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_order" class="col-sm-2 col-form-label">Tanggal Order</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_order" name="tgl_order" value="<?php echo $row['tgl_order']; ?>" placeholder="Tanggal Order" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="jatuh_tempo" class="col-sm-2 col-form-label">Jatuh Tempo</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" value="<?php echo $row['jatuh_tempo']; ?>" placeholder="Jatuh Tempo" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="tgl_terbayar" class="col-sm-2 col-form-label">Tanggal Terbayar</label>
		<div class="col-sm-4">
			<input type="date" class="form-control" id="tgl_terbayar" name="tgl_terbayar" value="<?php echo $row['tgl_terbayar']; ?>" placeholder="Tanggal Terbayar">
		</div>
	</div>
	<div class="form-group row">
		<label for="no_member" class="col-sm-2 col-form-label">No. Member</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="no_member" name="no_member" value="<?php echo $row['no_member']; ?>" placeholder="No. Member" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
		<div class="col-sm-4">
			<input type="text" readonly="" class="form-control" id="total_harga" name="total_harga" value="<?php echo $row['total_harga']; ?>" placeholder="Total Harga" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="pajak" class="col-sm-2 col-form-label">Pajak</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="pajak" name="pajak" value="<?php echo $row['pajak']; ?>" placeholder="Pajak" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ongkir" class="col-sm-2 col-form-label">Ongkir</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="ongkir" name="ongkir" value="<?php echo $row['ongkir']; ?>" placeholder="Ongkir" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="provinsi_ord" class="col-sm-2 col-form-label">Provinsi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="provinsi_ord" name="provinsi_ord" value="<?php echo $row['provinsi_ord']; ?>" placeholder="Provinsi" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="kota_ord" class="col-sm-2 col-form-label">Kota</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kota_ord" name="kota_ord" value="<?php echo $row['kota_ord']; ?>" placeholder="Provinsi" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="alamat_ord" class="col-sm-2 col-form-label">Alamat</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="alamat_ord" name="alamat_ord" value="<?php echo $row['alamat_ord']; ?>" placeholder="Alamat" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="kode_pos_ord" class="col-sm-2 col-form-label">Kode Pos</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kode_pos_ord" name="kode_pos_ord" value="<?php echo $row['kode_pos_ord']; ?>" placeholder="Kode Pos" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-4">
			<select name="status" class="form-control" required>
				<option value="<?php echo $row['status']; ?>">--- <?php echo $row['status']; ?> ---</option>
				<option value="Di Proses">Di Proses</option>
				<option value="Dalam Pengiriman">Dalam Pengiriman</option>
				<option value="Selesai">Selesai</option>
				<option value="Batal">Batal</option>
			</select>
		</div>
	</div>
	<div class="form-group row">
		<label for="no_resi" class="col-sm-2 col-form-label">No. Resi</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="no_resi" name="no_resi" value="<?php echo $row['no_resi']; ?>" placeholder="No. Resi" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="kurir" class="col-sm-2 col-form-label">Kurir</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="kurir" name="kurir" value="<?php echo $row['kurir']; ?>" placeholder="Kurir" required>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-4">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=order" type="submit" class="btn btn-danger">Batal</a>
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
