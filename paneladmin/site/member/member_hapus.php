<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

if(isset($_REQUEST['submit'])){

    $no_member = $_REQUEST['no_member'];

    $sql = mysqli_query($koneksi, "DELETE FROM tbl_member WHERE no_member='$no_member'");
    if($sql == true){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=member">';
        die();
    }
    }
}
?>
