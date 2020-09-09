<?php include('topbit.php'); 

	$title = mysqli_real_escape_string($dbconnect, $_POST['title']);
	$variety = mysqli_real_escape_string($dbconnect, $_POST['variety']);
	$province = mysqli_real_escape_string($dbconnect, $_POST['province']);
	$designation = mysqli_real_escape_string($dbconnect, $_POST['designation']);
	$point = mysqli_real_escape_string($dbconnect, $_POST['point']);
	$taster_name = mysqli_real_escape_string($dbconnect, $_POST['taster_name']);
	$taster_twitter_handle = mysqli_real_escape_string($dbconnect, $_POST['taster_twitter_handle']);
	$winery = mysqli_real_escape_string($dbconnect, $_POST['winery']);
	$price = mysqli_real_escape_string($dbconnect, $_POST['price']);

	// Point
	$point_more_less = mysqli_real_escape_string($dbconnect, $_POST['point_more_less']);
	
	if($point == ""){
		$point =0;
		$point_more_less = "at least";
	}
	
	if($point_more_less == "at most"){
		$point_op = "<=";
	}
	
	else{
		$point_op = ">=";
	} // end point if / elseif / else
	
	// Price
	$price_more_less = mysqli_real_escape_string($dbconnect, $_POST['price_more_less']);
	
	if($price == ""){
		$price =0;
		$price_more_less = "at least";
	}
	
	if($price_more_less == "at most"){
		$price_op = "<=";
	}
	
	else{
		$price_op = ">=";
	} // end price if / elseif / else
	
	$find_sql = "SELECT * FROM `wine_data`
	JOIN Variety ON (wine_data.VarietyID = variety.VarietyID)
	JOIN Winery ON (wine_data.WineryID = winery.WineryID)
	LEFT JOIN Designation ON (wine_data.DesignationID = designation.DesignationID)
	JOIN Province ON (wine_data.ProvinceID = province.ProvinceID)
	JOIN Taster_name ON (wine_data.Taster_nameID = taster_name.Taster_nameID)
	JOIN Taster_twitter_handle ON (wine_data.Taster_twitter_handleID = taster_twitter_handle.Taster_twitter_handleID)
	WHERE `Title` LIKE '%$title%' 
	AND `Variety` LIKE '%$variety%'
	AND `Province` LIKE '%$province%'
	AND `Designation` LIKE '%$designation%'
	AND `Taster_name` LIKE '%$taster_name%'
	AND `Taster_twitter_handle` LIKE '%$taster_twitter_handle%'
	AND `Winery` LIKE '%$winery%'
	AND `Point` $point_op $point
	AND `Price` $price_op $price
	";
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_rs = mysqli_fetch_assoc($find_query);
	$count = mysqli_num_rows($find_query);

?>			
			
			<div class="box main">
				<h2>Advanced Search Results</h2>
				
				
				<?php
				include("results.php");
				?>


			</div> <!-- / main -->
			
<?php include('bottombit.php');?>