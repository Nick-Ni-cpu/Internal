<?php include('topbit.php'); 

	$find_sql = "SELECT * FROM `wine_data`
	JOIN Variety ON (wine_data.VarietyID = variety.VarietyID)
	JOIN Winery ON (wine_data.WineryID = winery.WineryID)
	JOIN Designation ON (wine_data.DesignationID = designation.DesignationID)
	JOIN Province ON (wine_data.ProvinceID = province.ProvinceID)
	JOIN Taster_name ON (wine_data.Taster_nameID = taster_name.Taster_nameID)
	JOIN Taster_twitter_handle ON (wine_data.Taster_twitter_handleID = taster_twitter_handle.Taster_twitter_handleID)
	";
	$find_query = mysqli_query($dbconnect, $find_sql);
	$find_rs = mysqli_fetch_assoc($find_query);
	$count = mysqli_num_rows($find_query);

?>			
			
			<div class="box main">
				<h2>All Results</h2>
				
				<?php
				
				if($count < 1) {
					
					?>
					
				<div class="error">
					Sorry, there are no results that matches your search. Please use the search box in the side bar to try again.
				</div><!--/end error-->
				
				<?php
				
				}//end no results if
				
				else{
					do
					{
						
						?>
						
				<!--/Results go here-->
				<div class="results">
					<span class="sub_heading">
							<?php echo $find_rs['Title']; ?>
					</span>
					
					<br />
					<b>Variety</b>:
					<?php echo $find_rs["Variety"];?>
					
					<br />
					
					<b>Winery</b>:
					<?php echo $find_rs["Winery"];?>
					
					<br />
					
					<b>Designation</b>:
					<?php echo $find_rs["Designation"];?>
					
					<br />
					
					<b>Province</b>:
					<?php echo $find_rs["Province"];?>
					
					<br />
					
					<b>Taster_name</b>:
					<?php echo $find_rs["Taster_name"];?>
					
					<br />
					
					<b>Taster_twitter_handle</b>:
					<?php echo $find_rs["Taster_twitter_handle"];?>
					
				</div> <!--/results-->
				
				<br />
				
				<?php
			
					}//end results 'do'
					
					while
						($find_rs=mysqli_fetch_assoc($find_query));
				
				}//end else
	
				?>
				


			</div> <!-- / main -->
			
<?php include('bottombit.php');?>