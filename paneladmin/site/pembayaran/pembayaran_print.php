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
			<th width="3%">Nama order</th>
			<th width="5%">Jenis Perkara</th>
			<th width="5%">Penggugat & Tergugat</th>
			<th width="5%">Ketua Majelis</th>
			<th width="5%">harga</th>
			<th width="5%">Stok/order</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_order, tbl_perkara WHERE tbl_order.nm_brg=tbl_perkara.nm_brg");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nm_brg']; ?></td>
			<td><?php echo $data['kategori_perkara']; ?>/<?php echo $data['jns_perkara']; ?></td>
			<td><?php echo $data['penggugat']; ?>/<?php echo $data['tergugat']; ?></td>
			<td><?php echo $data['ketua_majelis']; ?></td>
			<td><?php echo $data['harga']; ?></td>
			<td><?php echo date("d M Y", strtotime($data['stok'])); ?></td>
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