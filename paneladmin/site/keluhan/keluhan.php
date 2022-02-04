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
				include 'keluhan_baru.php';
				break;
			case 'edit':
				include 'keluhan_edit.php';
				break;
			case 'hapus':
				include 'keluhan_hapus.php';
				break;
			case 'cetak':
				include 'keluhan_print.php';
				break;
			case 'rekap':
				include 'keluhan_rekap.php';
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
            <h1 class="m-0 text-dark"> Data Master Feedback</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item active">Feedback</li>
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
		<!--
			<a href="./admin.php?hlm=keluhan&aksi=baru" type="button" class="btn btn-primary btn-xs"><i class="fas fa-plus nav-icon"></i>Tambah Data</a>
		-->
			<a href="./admin.php?hlm=keluhan&aksi=cetak" target="_blank" type="button" class="btn btn-success btn-xs"><i class="fas fa-print nav-icon"></i>Cetak Data</a>
			<a href="./admin.php?hlm=keluhan&aksi=rekap" target="_blank" type="button" class="btn btn-info btn-xs"><i class="fas fa-book nav-icon"></i>rekap Data</a>
		</div>
	</div>
<!-- /.card-header -->
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-xs">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. Pesan</th>
					 <th>No. Member</th>
					 <th>Nama</th>
					 <th>Tanggal Feedback</th>
					 <th>Isi Pesan</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$sql = "SELECT * FROM tbl_cs, tbl_member WHERE tbl_cs.no_member=tbl_member.no_member";
$no = 0;
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_array($query)){
$no++;

?>
<tr>
 <td><?php echo $no; ?></td>
 <td><?php echo $row['no_pesan']; ?></td>
 <td><?php echo $row['no_member']; ?></td>
 <td><?php echo $row['nm_dpn']; ?> <?php echo $row['nm_blkg']; ?></td>
 <td><?php echo date("d M Y", strtotime($row['tgl_pesan'])) ?></td>	 	 
 <td><?php echo $row['isi_pesan']; ?></td>
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) return true;
			else return false;
			}
		</script>
<!--
		<a href="?hlm=keluhan&aksi=edit&no_pesan=<?php echo $row['no_pesan']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
-->
		<a href="?hlm=keluhan&aksi=hapus&submit=yes&no_pesan=<?php echo $row['no_pesan']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_cs");
if(mysqli_num_rows($sql) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=keluhan&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';}
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


