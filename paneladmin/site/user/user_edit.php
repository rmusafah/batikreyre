<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

        if( $_SESSION['level'] == 2 ){
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php">';
            die();
        }

	if( isset( $_REQUEST['submit'] )){

        $id_user = $_REQUEST['id_user'];
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$nm_admin = $_REQUEST['nm_admin'];
		$level = $_REQUEST['level'];

		$sql = mysqli_query($koneksi, "UPDATE tbl_user SET username='$username', password='$password', nm_admin='$nm_admin', level='$level' WHERE id_user='$id_user'");

		if($sql == true){
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=./admin.php?hlm=user">';
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_user = $_REQUEST['id_user'];

		$sql = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='$id_user'");
		while($row = mysqli_fetch_array($sql)){

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Edit Data Master Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
              <li class="breadcrumb-item"><a href="./admin.php?hlm=user">Admin</a></li>
			  <li class="breadcrumb-item active">Edit Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	
	
<!-- Main content -->
<div class="content">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group row">
		<label for="username" class="col-sm-2 col-form-label">Username</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="nm_admin" class="col-sm-2 col-form-label">Nama Admin</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nm_admin" name="nm_admin" value="<?php echo $row['nm_admin']; ?>" placeholder="Nama Admin" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="ptg_menerima" class="col-sm-2 col-form-label">Level Admin</label>
		<div class="col-sm-4">
			<select name="level" class="form-control" required>
				<option value="<?php echo $row['level']; ?>">--- 
				<?php
					$level = $row['level'];
					if($level == 1){
						echo 'Super Admin';
					} else {
						echo 'Admin';
					}
				?> ---</option>
				<option value="1">Super Admin</option>
				<option value="2">Admin</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=user" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
</div>
<!-- /.content -->
<?php
    }
	}
}
?>
