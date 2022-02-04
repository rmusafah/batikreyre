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
				include 'member_baru.php';
				break;
			case 'edit':
				include 'member_edit.php';
				break;
			case 'hapus':
				include 'member_hapus.php';
				break;
			case 'cetak':
				include 'member_print.php';
				break;
			case 'rekap':
				include 'member_rekap.php';
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
            <h1 class="m-0 text-dark"> Data Master Member</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item active">Member</li>
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
			<a href="./admin.php?hlm=member&aksi=baru" type="button" class="btn btn-primary btn-xs"><i class="fas fa-plus nav-icon"></i>Tambah Data</a>
			<a href="./admin.php?hlm=member&aksi=cetak" target="_blank" type="button" class="btn btn-success btn-xs"><i class="fas fa-print nav-icon"></i>Cetak Data</a>
			<a href="./admin.php?hlm=member&aksi=rekap" target="_blank" type="button" class="btn btn-info btn-xs"><i class="fas fa-book nav-icon"></i>rekap Data</a>
		</div>
	</div>
<!-- /.card-header -->
<div class="card-body text-sm">
<table id="example1" class="table table-bordered table-striped">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th width="10%">No. Member</th>
					 <th width="10%">Nama</th>
					 <th width="10%">Tgl Daftar</th>
					 <th width="5%">Jenis Kelamin</th>
					 <th width="10%">Alamat</th>
					 <th width="10%">Telepon</th>
					 <th width="10%">E-Mail</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$sql = "SELECT * FROM tbl_member";
$no = 0;
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_array($query)){
$no++;

?>
<tr>
 <td><?php echo $no; ?></td>
 <td><?php echo $row['no_member']; ?></td>
 <td><?php echo $row['nm_dpn']; ?> <?php echo $row['nm_blkg']; ?></td>
 <td><?php echo $row['tgl_daftar']; ?></td>
 <td><?php echo $row['jk']; ?></td>
 <td><?php echo $row['alamat']; ?>, <?php echo $row['kota']; ?>, <?php echo $row['provinsi']; ?> <?php echo $row['kode_pos']; ?></td>
 <td><?php echo $row['telp']; ?></td>
 <td><?php echo $row['email']; ?></td>
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) return true;
			else return false;
			}
		</script>

		<a href="?hlm=member&aksi=edit&no_member=<?php echo $row['no_member']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
		<a href="?hlm=member&aksi=hapus&submit=yes&no_member=<?php echo $row['no_member']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_member");
if(mysqli_num_rows($sql) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=member&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';}
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


