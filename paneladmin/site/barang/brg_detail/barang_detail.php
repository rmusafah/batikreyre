<?php 
require_once'koneksi.php';
?>
<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	
	if( isset( $_REQUEST['aksi2'] )){
		$aksi2 = $_REQUEST['aksi2'];
		switch($aksi2){
			case 'baru2':
				include 'barang_detail_baru.php';
				break;
			case 'edit2':
				include 'barang_detail_edit.php';
				break;
			case 'hapus2':
				include 'barang_detail_hapus.php';
				break;
		}
	} else {
	
	$no_brg = $_REQUEST['no_brg'];
	
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Data Master Detail Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
			<a href="./admin.php?hlm=barang&aksi=detail&no_brg=<?php echo $no_brg; ?>&aksi2=baru2" type="button" class="btn btn-primary btn-xs"><i class="fas fa-plus nav-icon"></i>Tambah Data</a>
		</div>
	</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-xs">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. Barang</th>
					 <th>Ukuran</th>
					 <th>Jumlah barang</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$no_brg = $_REQUEST['no_brg'];
$sql2 = "SELECT * FROM tbl_barang_detail WHERE no_brg='$no_brg'";
$no2 = 0;
$query2 = mysqli_query($koneksi, $sql2);
while ($row2 = mysqli_fetch_array($query2)){
$no2++;

?>
<tr>
 <td><?php echo $no2; ?></td>
 <td><?php echo $row2['no_brg']; ?></td>
 <td><?php echo $row2['ukuran']; ?></td>
 <td><?php echo $row2['stok']; ?> Buah</td>
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) return true;
			else return false;
			}
		</script>

		<a href="?hlm=barang&aksi=detail&no_brg=<?php echo $no_brg; ?>&aksi2=edit2&no_brg_detail=<?php echo $row2['no_brg_detail']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
		<a href="?hlm=barang&aksi=detail&no_brg=<?php echo $no_brg; ?>&aksi2=hapus2&submit=yes&no_brg_detail=<?php echo $row2['no_brg_detail']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_barang_detail WHERE no_brg='$no_brg'");
if(mysqli_num_rows($sql2) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=barang&aksi=detail&no_brg='.$no_brg.'&aksi2=baru2">Tambah data baru</a></u> </p></center></td></tr>';}
?>
<?php }} ?>
	</tbody>
</table>

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


