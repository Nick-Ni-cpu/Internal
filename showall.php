<?php include('topbit.php'); 

	$find_sql = 'SELECT * FROM `wine_data`';
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
					<?php echo $find_rs["VarietyID"];?>
					<?php echo $find_rs["Variety"];?>
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