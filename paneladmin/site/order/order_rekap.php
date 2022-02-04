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

		 $sql = mysqli_query($koneksi, "SELECT * FROM tbl_order, tbl_member WHERE tbl_order.no_member=tbl_member.no_member AND tgl_terbayar BETWEEN '$tgl1' AND '$tgl2'");
		 if(mysqli_num_rows($sql) > 0){
			 $no = 0;

		 echo '
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h1>Data Master order</h1>
          </div>
          <div class="col-sm-6">
		  <a href="./admin.php?hlm=order" id="tombol" class="btn btn-info pull-left noprint"><i class="fas fa-undo nav-icon"></i>Kembali</a>

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
            <span>Rekap Laporan order</span>
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
			<tr class="info">
			  <th width="5%">No</th>
			  <th width="7%">No. Order</th>
			  <th width="7%">Member</th>
			  <th width="10%">Tgl Order</th>
			  <th width="10%">Tgl Terbayar</th>
			  <th width="10%">Sub Total</th>
			  <th width="3%">Pajak</th>
			  <th width="10%">Ongkir</th>
			  <th width="10%">Total</th>
			  <th width="10%">Status</th>
			  <th width="5%">Terbeli</th>
			</tr>
		  </thead>
		  <tbody>';
		  $terjual = 0;
		  while($row = mysqli_fetch_array($sql)){
			  $terjual += $row['total_order'];
			 $no++;
		 echo '

			<tr>
			  <td>'.$no.'</td>
			  <td>'.$row['no_order'].'</td>
			  <td>'.$row['no_member'].'/'.$row['nm_dpn'].' '.$row['nm_blkg'].'</td>
			  <td>'.date("d M Y", strtotime($row['tgl_order'])).'</td>
			  <td>'.date("d M Y", strtotime($row['tgl_terbayar'])).'</td>
			  <td>Rp.'.number_format($row['total_harga'],2,",",".").'</td>
			  <td>'.$row['pajak'].'%</td>
			  <td>Rp.'.number_format($row['ongkir'],2,",",".").'</td>
			  <td>Rp.'.number_format($row['total'],2,",",".").'</td>
			  <td>'.$row['status'].'</td>
			  <td>'.$row['total_order'].' Buah</td>';
		 }
	 }
	 echo '
		 </tbody>
	 </table>
	 
	 <table class="table table-bordered">
		<thead>
			<th style="text-align:right;" width="5%">Total Terjual '.$terjual.' Buah</th>
		</thead>
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
            <h1>Rekap Laporan order</h1>
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
