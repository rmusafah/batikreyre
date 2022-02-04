<?php
    if( !empty( $_SESSION['id_user'] ) ){
    include "koneksi.php";
?>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-primary navbar-dark">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="aset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Batik Reyre</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="admin.php" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data Master</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
			<?php
				if( $_SESSION['level'] == 1 ){
			?>
              <li><a href="./admin.php?hlm=user" class="dropdown-item">Data User</a></li>
			<?php
				}
			?>
			  <li><a href="./admin.php?hlm=barang" class="dropdown-item">Data Barang</a></li>
			  <li><a href="./admin.php?hlm=brg_rusak" class="dropdown-item">Data Barang Rusak</a></li>
			  <li><a href="./admin.php?hlm=diskon" class="dropdown-item">Data Diskon</a></li>
			  <li><a href="./admin.php?hlm=supplier" class="dropdown-item">Data Supplier</a></li>
			  <li><a href="./admin.php?hlm=supply" class="dropdown-item">Data Barang Masuk</a></li>
			  <li><a href="./admin.php?hlm=member" class="dropdown-item">Data Member</a></li>
			  <li><a href="./admin.php?hlm=order" class="dropdown-item">Data Order</a></li>
			  <li><a href="./admin.php?hlm=keluhan" class="dropdown-item">Data FeedBack</a></li>
			  <li><a href="./admin.php?hlm=return" class="dropdown-item">Data Retur Barang</a></li>
            </ul>
          </li>
		  <li class="nav-item">
            <a href="./admin.php?hlm=labarugi" class="nav-link">Laporan Laba Rugi</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
	  <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="aset/dist/img/images.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $_SESSION['nm_admin']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-info">
            <img src="aset/dist/img/images.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php echo $_SESSION['nm_admin']; ?> - 
					<?php
						if($_SESSION['level'] == 1){
							echo 'Super Admin';
						} else {
							echo 'Admin';
						}
					?>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="?hlm=user&aksi=edit&id_user=<?php echo $_SESSION['id_user']; ?>" class="btn btn-default btn-flat">Edit User</a>
            <a href="logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  

<?php
} else {
	header("Location: ./");
	die();
}
?>
