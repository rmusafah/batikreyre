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
            <h3>Data Laporan Diskon</h3>
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
			<th width="5%">No. Diskon</th>
			<th width="8%">Nama Diskon</th>
			<th width="5%">Barang</th>
			<th width="14%">Tgl Diskon</th>
			<th width="2%">Jumlah</th>
			<th width="15%">Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_diskon_detail, tbl_barang WHERE tbl_diskon_detail.no_brg=tbl_barang.no_brg");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['no_diskon']; ?></td>
			<td><?php echo $data['nm_diskon']; ?></td>
			<td><?php echo $data['no_brg']; ?>/<?php echo $data['nm_brg']; ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_diskon'])); ?> - <?php echo date("d M Y", strtotime($data['tgl_diskon_akhir'])); ?></td>
			<td><?php echo $data['jml_diskon']; ?>%</td>
			<td><?php echo $data['ket']; ?></td>
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