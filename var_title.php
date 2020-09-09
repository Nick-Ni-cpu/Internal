<?php include('topbit.php'); 

	$var_title = mysqli_real_escape_string($dbconnect, $_POST['var_title']);

	$find_sql = "SELECT * FROM `wine_data`
	JOIN Variety ON (wine_data.VarietyID = variety.VarietyID)
	JOIN Winery ON (wine_data.WineryID = winery.WineryID)
	LEFT JOIN Designation ON (wine_data.DesignationID = designation.DesignationID)
	JOIN Province ON (wine_data.ProvinceID = province.ProvinceID)
	JOIN Taster_name ON (wine_data.Taster_nameID = taster_name.Taster_nameID)
	JOIN Taster_twitter_handle ON (wine_data.Taster_twitter_handleID = taster_twitter_handle.Taster_twitter_handleID)
	WHERE `Title` LIKE '%$var_title%' OR `Variety` LIKE '%$var_title%'
	";
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_rs = mysqli_fetch_assoc($find_query);
	$count = mysqli_num_rows($find_query);

?>			
			
			<div class="box main">
				<h2>Title and variety results</h2>
				
				
				<?php
				include("results.php");
				?>


			</div> <!-- / main -->
			
<?php include('bottombit.php');?>