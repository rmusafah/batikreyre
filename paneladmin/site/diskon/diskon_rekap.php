<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

      if(isset($_REQUEST['submit'])){

	     $submit = $_REQUEST['submit'];
         $tgl1 = $_REQUEST['tgl1'];
         $tgl2 = $_REQUEST['tgl2'];

		 $sql = mysqli_query($koneksi, "SELECT * FROM tbl_diskon_detail, tbl_barang WHERE tbl_diskon_detail.no_brg=tbl_barang.no_brg AND tbl_diskon_detail.tgl_diskon BETWEEN '$tgl1' AND '$tgl2'");
		 if(mysqli_num_rows($sql) > 0){
			 $no = 0;

		 echo '
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h1>Data Master Diskon</h1>
          </div>
          <div class="col-sm-6">
		  <a href="./admin.php?hlm=diskon" id="tombol" class="btn btn-info pull-left noprint"><i class="fas fa-undo nav-icon"></i>Kembali</a>

		  <button id="tombol" onclick="window.print()" class="btn btn-success noprint"><i class="fas fa-print nav-icon"></i>Cetak</button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">

	<div class="card-header">
	<h3><img src="aset/dist/img/reyre kop.png"/></h3>
        <div class="row mb-2">
          <div class="col-sm-6">
            <span>Rekap Laporan Diskon</span>
          </div>
          <div class="col-sm-6">
			<span class="float-right">
			Banjarmasin, (<a>'.date('d-m-Y').'</a>) 
			</span>
          </div>
        </div>
	<span>Tanggal : '.$tgl1.' sampai '.$tgl2.'</span>
	</div>	


		  <div class="card-body">
		  <table class="table table-bordered">
		  <thead>
			<tr class="text-center">
			  <th width="5%">No</th>
			  <th width="5%">No. Diskon</th>
			  <th width="8%">Nama Diskon</th>
			  <th width="5%">Barang</th>
			  <th width="14%">Tgl Diskon</th>
			  <th width="2%">Jumlah</th>
			  <th width="15%">Keterangan</th>
			</tr>
		  </thead>
		  <tbody>';

		  while($row = mysqli_fetch_array($sql)){
			 $no++;
		 echo '

			<tr class="text-center">
			  <td>'.$no.'</td>
			  <td>'.$row['no_diskon'].'</td>
			  <td>'.$row['nm_diskon'].'</td>
			  <td>'.$row['no_brg'].'/'.$row['nm_brg'].'</td>
			  <td>'.date("d M Y", strtotime($row['tgl_diskon'])).' - '.date("d M Y", strtotime($row['tgl_diskon_akhir'])).'</td>
			  <td>'.$row['jml_diskon'].'%</td>
			  <td>'.$row['ket'].'</td>';
		 }
	 }
	 echo '
		 </tbody>
	 </table>';
		 echo '
		   </div>
		   </div>
		 </div>
		 
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
<!-- /.content-wrapper -->';

	 } else {

		echo '
	<div class="content-wrapper">	
	
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Laporan diskon</h1>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>';

?>
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
	<div class="card-body">
	<form class="form-inline" role="form" method="post" action="">
	  <div class="form-group">
	    <label class="sr-only" for="tgl1">Mulai</label>
	    <input type="date" class="form-control" id="tgl1" name="tgl1" required>
	  </div>
	  <div class="form-group">
	    <label class="sr-only" for="tgl2">Hingga</label>
	    <input type="date" class="form-control" id="tgl2" name="tgl2" required>
	  </div>
	  <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>
	</form>
	</div>
<?php

      echo '
	  	</div>
	  </div>
	  </div>
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
	<!-- /.content-wrapper -->';
   }
   }
?>
