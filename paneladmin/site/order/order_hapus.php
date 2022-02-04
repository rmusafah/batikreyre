<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_order = $_REQUEST['no_order'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_order_detail WHERE no_order='$no_order'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=order">';
		$sql2 = mysqli_query($koneksi, "DELETE FROM tbl_order WHERE no_order='$no_order'");
        die();
    }
    }
}
?>
