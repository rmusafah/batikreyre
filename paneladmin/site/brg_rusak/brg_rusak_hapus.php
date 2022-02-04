<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_brg_rusak = $_REQUEST['no_brg_rusak'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_brg_rusak WHERE no_brg_rusak='$no_brg_rusak'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=brg_rusak">';
        die();
    }
    }
}
?>
