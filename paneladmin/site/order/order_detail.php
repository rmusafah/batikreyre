<?php 
require_once'koneksi.php';
?>
<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	error_reporting(0);
	
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Data Master Order Detail</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item active">Order</li>
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
	<div class="card-header">
		<div class="box pull-right">
			<a href="./admin.php?hlm=order&aksi=baru" type="button" class="btn btn-primary btn-xs"><i class="fas fa-plus nav-icon"></i>Tambah Data</a>
			<a href="./admin.php?hlm=order&aksi=cetak" target="_blank" type="button" class="btn btn-success btn-xs"><i class="fas fa-print nav-icon"></i>Cetak Data</a>
			<a href="./admin.php?hlm=order&aksi=rekap" target="_blank" type="button" class="btn btn-info btn-xs"><i class="fas fa-book nav-icon"></i>rekap Data</a>
		</div>
	</div>
<!-- /.card-header -->
<?php
$no_order = $_REQUEST['no_order'];
$sql3 = "SELECT * FROM tbl_order_detail WHERE no_order='$no_order'";
$no3 = 0;
$query3 = mysqli_query($koneksi, $sql3);
$data3 = mysqli_fetch_array($query3);
if($data3["no_order"] == $no_order){
?>
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-xs">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. order</th>
					 <th>No. Barang</th>
					 <th>Nama Barang</th>
					 <th>Harga</th>
					 <th>Jumlah Order</th>
					 <th>Diskon</th>
					 <th>Total Harga</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$no_order = $_REQUEST['no_order'];
$sql2 = "SELECT * FROM tbl_order_detail WHERE no_order='$no_order'";
$no2 = 0;
$query2 = mysqli_query($koneksi, $sql2);
while ($row2 = mysqli_fetch_array($query2)){
$no2++;

?>
<tr>
 <td><?php echo $no2; ?></td>
 <td><?php echo $row2['no_order']; ?></td>
 <td><?php echo $row2['no_brg']; ?></td>
 <td><?php echo $row2['nm_brg']; ?></td>
 <td>Rp.<?php echo number_format($row2['harga'],2,",",".");?></td>
 <td><?php echo $row2['jml_order']; ?> Buah</td>
 <td><?php echo $row2['diskon']; ?>%</td>
 <td>Rp.<?php echo number_format($row2['jumlah_harga'],2,",",".");?></td>
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) return true;
			else return false;
			}
		</script>

		<a href="?hlm=order&aksi=edit&no_order=<?php echo $row2['no_order']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
		<a href="?hlm=order&aksi=hapus&submit=yes&no_order=<?php echo $row2['no_order']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_order");
if(mysqli_num_rows($sql2) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=order&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';}
?>
	</tbody>
</table>
<?php  } else { ?>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-xs">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. order</th>
					 <th>No. Barang</th>
					 <th>Harga</th>
					 <th>Biaya</th>
					 <th>Ukuran</th>
					 <th>Catatan</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$no_order = $_REQUEST['no_order'];
$sql2 = "SELECT * FROM tbl_custom WHERE no_order='$no_order'";
$no2 = 0;
$query2 = mysqli_query($koneksi, $sql2);
while ($row2 = mysqli_fetch_array($query2)){
$no2++;

?>
<tr>
 <td><?php echo $no2; ?></td>
 <td><?php echo $row2['no_order']; ?></td>
 <td><?php echo $row2['no_brg']; ?></td>
 <td>Rp.<?php echo number_format($row2['harga'],2,",",".");?></td>
 <td>Rp.<?php echo number_format($row2['biaya'],2,",",".");?></td>
 <td>Lebar Bahu <?php echo $row2['lebar_bahu']; ?> cm, Lingkar Dada <?php echo $row2['lingkar_dada']; ?> cm, Panjang Tangan <?php echo $row2['pjg_tgn']; ?> cm, Lingkar Lengan <?php echo $row2['lingkar_lengan']; ?> cm, Lingkar Pinggan <?php echo $row2['lingkar_pinggang']; ?> cm, Lingkar Pinggul <?php echo $row2['lingkar_pinggul']; ?> cm, Panjang <?php echo $row2['panjang']; ?> cm</td>
 <td>
 <?php
	$string = $row2['catatan'];
	echo nl2br($string);
 ?>
 </td>
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) return true;
			else return false;
			}
		</script>

		<a href="?hlm=order&aksi=edit&no_order=<?php echo $row2['no_order']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
		<a href="?hlm=order&aksi=hapus&submit=yes&no_order=<?php echo $row2['no_order']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_custom");
if(mysqli_num_rows($sql2) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=order&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';}
?>
<?php } ?>
	</tbody>
</table>

<?php } ?>
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
	</div>
	<!-- /.content-wrapper -->


