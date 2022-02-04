<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_brg = $_REQUEST['no_brg'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_barang WHERE no_brg='$no_brg'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=barang">';
        die();
    }
    }
}
?>
