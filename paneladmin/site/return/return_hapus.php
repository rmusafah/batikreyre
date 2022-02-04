<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_return = $_REQUEST['no_return'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_return WHERE no_return='$no_return'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=return">';
        die();
    }
    }
}
?>
