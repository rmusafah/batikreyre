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
            <h3>Data Laporan order</h3>
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
			<th width="3%">No. order</th>
			<th width="8%">Tgl Order</th>
			<th width="8%">Jatuh Tempo</th>
			<th width="8%">Tgl Terbayar</th>
			<th width="5%">Member</th>
			<th width="15%">List Belanja</th>
			<th width="5%">Total</th>
			<th width="20%">Alamat</th>
			<th width="5%">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_order, tbl_member WHERE tbl_order.no_member=tbl_member.no_member");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['no_order']; ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_order'])); ?></td>
			<td><?php echo date("d M Y", strtotime($data['jatuh_tempo'])); ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_terbayar'])); ?></td>
			<td><?php echo $data['no_member']; ?>/<?php echo $data['nm_dpn']; ?> <?php echo $data['nm_blkg']; ?></td>
			<td><?php echo $data['list_belanja']; ?></td>
			<td>Rp.<?php echo number_format($data['total_harga'],2,",",".");?></td>
			<td><?php echo $data['provinsi_ord']; ?>, <?php echo $data['kota_ord']; ?>, <?php echo $data['alamat_ord']; ?> <?php echo $data['kode_pos_ord']; ?></td>
			<td><?php echo $data['status']; ?></td>
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