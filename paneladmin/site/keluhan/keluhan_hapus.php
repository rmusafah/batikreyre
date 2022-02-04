<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_pesan = $_REQUEST['no_pesan'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_cs WHERE no_pesan='$no_pesan'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=keluhan">';
        die();
    }
    }
}
?>
