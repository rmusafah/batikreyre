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
            <h3>Data Laporan Barang</h3>
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
			<th width="3%">No. Barang</th>
			<th width="5%">Nama Barang</th>
			<th width="5%">Tgl Masuk</th>
			<th width="5%">Kategori</th>
			<th width="5%">Ketersediaan</th>
			<th width="5%">HPP</th>
			<th width="5%">Harga</th>
			<th width="1%">Diskon</th>
			<th width="5%">Harga Akhir</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_barang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['no_brg']; ?></td>
			<td><?php echo $data['nm_brg']; ?></td>
			<td><?php echo date("d M Y", strtotime($data['tgl_msk'])); ?></td>
			<td><?php echo $data['ktgri_brg']; ?></td>
			<td><?php echo $data['ketersediaan']; ?></td>
			<td>Rp.<?php echo number_format($data['hpp_barang'],2,",",".");?></td>
			<td>Rp.<?php echo number_format($data['harga'],2,",",".");?></td>
			<td><?php echo $data['diskon']; ?>%</td>
			<td>Rp.<?php echo number_format($data['harga_akhir'],2,",",".");?></td>
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