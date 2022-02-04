<?php require_once("koneksi.php");
	  require_once("cart_proses.php");
    if( empty( $_SESSION['no_member'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./login.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batik Reyre | Batik Online telengkap dan terpercaya</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	

    <!-- Css Styles -->
	<link rel="stylesheet" href="paneladmin/aset/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

<?php include "menu.php"; ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Return</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
                <div class="row">
                    <div class="col-lg-6">
					<div class="contact-form">
                        <div class="leave-comment">
                        <h4>Return Barang</h4>
						<form action="#" class="comment-form">
                        <div class="row">
<?php
	// membaca kode barang terbesar
$hasil = mysqli_query($koneksi, "SELECT max(no_return) as maxKode FROM tbl_return");
$data  = mysqli_fetch_array($hasil);
$kodeID = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeID, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "RTN";
$newID = $char . sprintf("%03s", $noUrut);

	if( isset( $_REQUEST['submit'] )){
		
			
		$no_member = $_REQUEST['no_member'];
		$status_ajuan = $_REQUEST['status_ajuan'];
		$no_order = $_REQUEST['no_order'];
		$ket_return = $_REQUEST['ket_return']; 
		
		$sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_return WHERE tbl_return.no_order='$no_order'");
		$data2 = mysqli_fetch_array($sql2);

		if ($data2['no_order'] == $no_order){
			echo'<script>
					alert("Anda Sudah Mengajukan Return");
				</script>';
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./return.php">';
			die();
		} else {
			
		$sql = mysqli_query($koneksi, 
		"INSERT INTO tbl_return(no_return, no_order, no_member, tgl_ajuan, ket_return, status_ajuan) VALUES('$newID','$no_order', '$no_member', CURRENT_DATE, '$ket_return', '$status_ajuan')") or die( mysqli_error($koneksi) );;
		
		if($sql == true){
			echo'<script>
					alert("Permintaan anda akan diproses");
				</script>';
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./return_list.php">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} } else {
?>
							<div class="col-lg-12">
                                <input type="hidden" id="no_member" name="no_member" value="<?php echo $_SESSION['no_member']; ?>">
                            </div>
							<div class="col-lg-12">
                                <input type="hidden" id="status_ajuan" name="status_ajuan" value="Di Proses">
                            </div>
                            <div class="col-lg-12">
                                <label for="no_order">No. Order</label>
                                <select class="form-control" name="no_order" required>
								<?php
								//Perintah sql untuk menampilkan semua data pada tabel jurusan
									$sql=mysqli_query($koneksi, "SELECT * FROM tbl_order WHERE tbl_order.no_member='$_SESSION[no_member]'");
									$no=0;
									while ($data = mysqli_fetch_array($sql)) {
									$no++;
								?>
									<option value="<?php echo $data['no_order'];?>"><?php echo $data['no_order'];?></option>
								<?php 
									}
								?>
								</select>
                            </div>
							<div class="col-lg-12">
							</br>
							<label for="ket_return">Keterangan<span>*</span></label>
							</div>
                            <div class="col-lg-12">
                                <textarea id="ket_return" name="ket_return" placeholder="Masukan Nama Barang dan alasan pengembaliannya" required></textarea>
								<button type="submit" name="submit" class="site-btn">Kirim Pesan</button>
                            </div>
                        </div>
						</form>
						</div>
					</div>
                    </div>
<?php
	} 
?>
                </div>
            </form>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

<?php include "footer.php"; ?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
	
	<script src="jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
        $("#formku").validate();
    });
    </script> 
</body>

</html>