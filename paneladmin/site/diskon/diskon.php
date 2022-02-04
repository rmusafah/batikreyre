<?php 
require_once'koneksi.php';
?>
<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'diskon_baru.php';
				break;
			case 'edit':
				include 'diskon_edit.php';
				break;
			case 'hapus':
				include 'diskon_hapus.php';
				break;
			case 'cetak':
				include 'diskon_print.php';
				break;
			case 'rekap':
				include 'diskon_rekap.php';
				break;
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
            <h1 class="m-0 text-dark"> Data Master Diskon</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item active">Diskon</li>
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
			<a href="./admin.php?hlm=diskon&aksi=baru" type="button" class="btn btn-primary btn-xs"><i class="fas fa-plus nav-icon"></i>Tambah Data</a>
			<a href="./admin.php?hlm=diskon&aksi=cetak" target="_blank" type="button" class="btn btn-success btn-xs"><i class="fas fa-print nav-icon"></i>Cetak Data</a>
			<a href="./admin.php?hlm=diskon&aksi=rekap" target="_blank" type="button" class="btn btn-info btn-xs"><i class="fas fa-book nav-icon"></i>Rekap Data</a>
		</div>
	</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-xs">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. Diskon</th>
					 <th>Nama Diskon</th>
					 <th>No. Barang</th>
					 <th>Tgl Diskon</th>
					 <th>Jumlah</th>
					 <th>Keterangan</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$sql = "SELECT * FROM tbl_diskon, tbl_diskon_detail WHERE tbl_diskon.no_diskon=tbl_diskon_detail.no_diskon";
$no = 0;
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_array($query)){
$no++;

?>
<tr>
 <td><?php echo $no; ?></td>
 <td><?php echo $row['no_diskon']; ?></td>
 <td><?php echo $row['nm_diskon']; ?></td>
 <td><?php echo $row['no_brg']; ?></td>
 <td><?php echo date("d M Y", strtotime($row['tgl_diskon'])) ?> - <?php echo date("d M Y", strtotime($row['tgl_diskon_akhir'])) ?></td>
 <td><?php echo $row['jml_diskon']; ?>%</td>
 <td><?php echo $row['ket']; ?></td>
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) diskon true;
			else diskon false;
			}
		</script>

		<a href="?hlm=diskon&aksi=edit&no_diskon=<?php echo $row['no_diskon']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
		<a href="?hlm=diskon&aksi=hapus&submit=yes&no_diskon=<?php echo $row['no_diskon']; ?>" onclick="diskon konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_diskon, tbl_diskon_detail WHERE tbl_diskon.no_diskon=tbl_diskon_detail.no_diskon");
if(mysqli_num_rows($sql) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=diskon&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';}
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


