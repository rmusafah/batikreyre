<?php

//fetch_data.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM tbl_barang WHERE ketersediaan = 'ada'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND harga_akhir BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["kategori"]))
	{
		$kategori_filter = implode("','", $_POST["kategori"]);
		$query .= "
		 AND ktgri_brg IN('".$kategori_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			
			$output .= '	
			<div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="paneladmin/'.$row['gambar'].'" alt="">';
										
                                        if ($row['diskon'] > 0){
										$output .= '
										<div class="sale pp-sale">Diskon '.$row['diskon'].'%</div>';
											}
											
										$output .= '
                                        <div class="icon">
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="produk.php?kd='.$row['no_brg'].'"><i class="icon_bag_alt"></i>Detail</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">'.$row['ktgri_brg'].'</div>
                                        <a href="#">
                                            <h5>'.$row['nm_brg'].'</h5>
                                        </a>
                                        <div class="product-price">
                                            Rp.'.number_format($row['harga_akhir'],2,",",".").'';
											
											if ($row['diskon'] > 0){
											$output .= '
											<span>Rp.'.number_format($row['harga'],2,",",".").'</span>';
											}
											
											$output .= '
                                        </div>
                                    </div>
                                </div>
            </div>
			';
		}
	}
	else
	{
		print_r($statement->errorInfo());
	}
	echo $output;
}

?>