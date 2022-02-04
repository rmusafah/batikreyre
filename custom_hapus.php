<?php
require_once("koneksi.php");
require_once("cart_proses.php");
if( empty( $_SESSION['no_member'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./login.php">';
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_custom_cart = $_REQUEST['no_custom_cart'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_custom_cart WHERE no_custom_cart='$no_custom_cart'");
    if($sql == true){
        echo'<script>
					alert("Data Telah di Hapus");
				</script>';
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./custom_daftar.php">';
        die();
    }
    }
}
?>
