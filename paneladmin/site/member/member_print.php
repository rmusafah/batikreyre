<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    @media print
    {
    .noprint {display:none;}
    }
	@page{
		margin:0px auto;
	}
	.hide {
		display: none;
	}
</style>
</head>
<body>

<?php 
include 'koneksi.php';
?>
<div class="content-wrapper">	
    <div class="text-center">
		<h3><img src="aset/dist/img/reyre kop.png"/></h3>
	</div><br/>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
	<div class="card-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Data Laporan Member</h3>
          </div>
          <div class="col-sm-6">
			<span class="float-right">
			Banjarmasin, <?php echo (date('d-m-Y'));?> 
			</span>
          </div>
        </div>
	</div>	
    <div class="card-body">
	<table class="table table-bordered table-striped">
	<thead>
		<tr class="text-black">
			<th width="1%">No</th>
			<th width="5%">No. Member</th>
			<th width="12%">Nama Member</th>
			<th width="10%">Tanggal Daftar</th>
			<th width="5%">Jenis Kelamin</th>
			<th width="20%">Alamat</th>
			<th width="5%">Telp</th>
			<th width="5%">E-Mail</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_member");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['no_member']; ?></td>
			<td><?php echo $data['nm_dpn']; ?> <?php echo $data['nm_blkg']; ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_daftar'])) ?></td>
			<td><?php echo $data['jk']; ?></td>
			<td><?php echo $data['provinsi']; ?>, <?php echo $data['kota']; ?></br><?php echo $data['alamat']; ?> <?php echo $data['kode_pos']; ?></td>
			<td><?php echo $data['telp']; ?></td>
			<td><?php echo $data['email']; ?></td>
		</tr>
		<?php 
		}
		?>
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
    </section>
    <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

<script>
window.print();
</script>


</body>
</html>