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
            <h3>Data Laporan Supplier</h3>
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
			<th width="3%">No. supplier</th>
			<th width="3%">Nama supplier</th>
			<th width="5%">Alamat</th>
			<th width="5%">Telpon</th>
			<th width="5%">E-Mail</th>
			<th width="5%">Website</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tbl_supplier");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['no_supplier']; ?></td>
			<td><?php echo $data['nm_supplier']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['telp']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['website']; ?></td>
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