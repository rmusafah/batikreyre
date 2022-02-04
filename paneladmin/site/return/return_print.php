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
            <h3>Laporan Retur Barang</h3>
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
		<tr class="text-center">
			<th width="1%">No</th>
			<th width="5%">No. Return</th>
			<th width="5%">No. Order</th>
			<th width="5%">Member</th>
			<th width="8%">Tgl Ajuan</th>
			<th width="8%">Tgl Return</th>
			<th width="20%">Keterangan</th>
			<th width="5%">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_return, tbl_member WHERE tbl_return.no_member=tbl_member.no_member");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['no_return']; ?></td>
			<td><?php echo $data['no_order']; ?></td>
			<td><?php echo $data['no_member']; ?>/<?php echo $data['nm_dpn']; ?> <?php echo $data['nm_blkg']; ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_ajuan'])); ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_return'])); ?></td>
			<td><?php echo $data['ket_return']; ?></td>
			<td><?php echo $data['status_ajuan']; ?></td>
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