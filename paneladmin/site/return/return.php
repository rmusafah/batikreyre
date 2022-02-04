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
				include 'return_baru.php';
				break;
			case 'edit':
				include 'return_edit.php';
				break;
			case 'hapus':
				include 'return_hapus.php';
				break;
			case 'cetak':
				include 'return_print.php';
				break;
			case 'rekap':
				include 'return_rekap.php';
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
            <h1 class="m-0 text-dark"> Data Master Retur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item active">Return</li>
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
			<a href="./admin.php?hlm=return&aksi=baru" type="button" class="btn btn-primary btn-xs"><i class="fas fa-plus nav-icon"></i>Tambah Data</a>
			<a href="./admin.php?hlm=return&aksi=cetak" target="_blank" type="button" class="btn btn-success btn-xs"><i class="fas fa-print nav-icon"></i>Cetak Data</a>
			<a href="./admin.php?hlm=return&aksi=rekap" target="_blank" type="button" class="btn btn-info btn-xs"><i class="fas fa-book nav-icon"></i>rekap Data</a>
		</div>
	</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-xs">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. return</th>
					 <th>No. Order</th>
					 <th>No. Member</th>
					 <th>Tgl Ajuan</th>
					 <th>Tgl Return</th>
					 <th>Keterangan</th>
					 <th>Status</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$sql = "SELECT * FROM tbl_return";
$no = 0;
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_array($query)){
$no++;

?>
<tr>
 <td><?php echo $no; ?></td>
 <td><?php echo $row['no_return']; ?></td>
 <td><?php echo $row['no_order']; ?></td>
 <td><?php echo $row['no_member']; ?></td>
 <td><?php echo date("d M Y", strtotime($row['tgl_ajuan'])) ?></td>
 <td><?php echo date("d M Y", strtotime($row['tgl_return'])) ?></td>
 <td><?php echo $row['ket_return']; ?></td>
 <td><?php echo $row['status_ajuan']; ?></td>
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) return true;
			else return false;
			}
		</script>

		<a href="?hlm=return&aksi=edit&no_return=<?php echo $row['no_return']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
		<a href="?hlm=return&aksi=hapus&submit=yes&no_return=<?php echo $row['no_return']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_return");
if(mysqli_num_rows($sql) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=return&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';}
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


