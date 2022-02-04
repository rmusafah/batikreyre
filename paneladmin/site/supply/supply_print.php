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
            <h3>Data Laporan Barang Masuk</h3>
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
			<th width="5%">Supplier</th>
			<th width="8%">Tgl Barang Masuk</th>
			<th width="8%">Tgl Terima</th>
			<th width="15%">Barang</th>
			<th width="10%">Jumlah</th>
			<th width="10%">Harga</th>
			<th width="10%">Total</th>
			<th width="5%">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_supply, tbl_barang, tbl_supplier WHERE tbl_supply.no_brg=tbl_barang.no_brg AND tbl_supply.no_supplier=tbl_supplier.no_supplier");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['no_supplier']; ?>/<?php echo $data['nm_supplier']; ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_supply'])); ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_terima'])); ?></td>
			<td><?php echo $data['no_brg']; ?>/<?php echo $data['nm_brg']; ?></td>
			<td><?php echo $data['jml_supply']; ?></td>
			<td>Rp.<?php echo number_format($data['harga_supply'],2,",",".");?></td>
			<td>Rp.<?php echo number_format($data['total_supply'],2,",",".");?></td>
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