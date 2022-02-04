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
				include 'order_baru.php';
				break;
			case 'edit':
				include 'order_edit.php';
				break;
			case 'detail':
				include 'order_detail.php';
				break;
			case 'invoice':
				include 'order_invoice.php';
				break;
			case 'hapus':
				include 'order_hapus.php';
				break;
			case 'cetak':
				include 'order_print.php';
				break;
			case 'rekap':
				include 'order_rekap.php';
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
            <h1 class="m-0 text-dark"> Data Master Order</h1>
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
<div class="card-body">
<table id="example1" class="table table-bordered table-striped text-xs">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. order</th>
					 <th>Tanggal order</th>
					 <th>Jatuh Tempo</th>
					 <th>No. Member</th>
					 <th>List Belanja</th>
					 <th>Total Harga</th>
					 <th>Alamat Pengiriman</th>
					 <th>Bukti Transfer</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
<tbody>
<?php
if(!ISSET($_POST['submit'])){

$sql = "SELECT * FROM tbl_order";
$no = 0;
$query = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_array($query)){
$no++;

?>
<tr>
 <td><?php echo $no; ?></td>
 <td><?php echo $row['no_order']; ?></td>
 <td><?php echo date("d M Y", strtotime($row['tgl_order'])) ?></td>
 <td><?php echo date("d M Y", strtotime($row['jatuh_tempo'])) ?></td>	 	 
 <td><?php echo $row['no_member']; ?></td>
 <td><?php echo $row['list_belanja']; ?></td>
 <td>Rp.<?php echo number_format($row['total_harga'],2,",",".");?></td>
 <td><?php echo $row['provinsi_ord']; ?>, <?php echo $row['kota_ord']; ?> </br>
 <?php echo $row['alamat_ord']; ?>, <?php echo $row['kode_pos_ord']; ?>
 </td>	
 <td>
	<a href="aset/file/Bukti Transfer/<?php echo $row['transfer']; ?>" target="_blank">Lihat</a>
 </td> 
 <td>
 		<script type="text/javascript" language="JavaScript">
			function konfirmasi(){
			tanya = confirm("Anda yakin akan menghapus user ini?");
			if (tanya == true) return true;
			else return false;
			}
		</script>

		<a href="?hlm=order&aksi=detail&no_order=<?php echo $row['no_order']; ?>" class="btn btn-info btn-xs"><i class="fas fa-info-circle nav-icon"></i>Detail</a>
		<a href="?hlm=order&aksi=invoice&no_order=<?php echo $row['no_order']; ?>" class="btn btn-success btn-xs"><i class="fas fa-file nav-icon"></i>Invoice</a>
		<a href="?hlm=order&aksi=edit&no_order=<?php echo $row['no_order']; ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit nav-icon"></i>Edit</a>
		<a href="?hlm=order&aksi=hapus&submit=yes&no_order=<?php echo $row['no_order']; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-xs"><i class="fas fa-trash nav-icon"></i>Hapus</a>

 </td>
</tr>

<?php } } ?>

<?php  
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_order");
if(mysqli_num_rows($sql) < 1){
 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=order&aksi=baru">Tambah data baru</a></u> </p></center></td></tr>';}
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


