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
					<b>Points</b>:
					<?php echo $find_rs["Point"];?>&nbsp;&nbsp;&nbsp;&nbsp;
					
					<?php
					if($find_rs["Price"] == 0){
						?>
							<b>Price</b>: Not Recorded
					<?php
					}
					else{
						?>
						<b>Prices</b>:&nbsp;$<?php echo $find_rs["Price"];?>
					<?php
					}
					?>
					
					
					
					
					<br />
					<b>Winery</b>:<?php echo $find_rs["Winery"];?>

					<br />
					
					
					
					<b>Designation</b>:
					<?php
					if($find_rs["DesignationID"] == 0){
						?>
							None
					<?php
					}
					else{
						?>
						<?php echo $find_rs["Designation"];?>
					<?php
					}
					?>
					<br />
					
					
					
					
					<b>Province</b>:
					<?php echo $find_rs["Province"];?>
					
					<br />
					
					<b>Taster_name</b>:
					<?php echo $find_rs["Taster_name"];?>&nbsp;&nbsp;&nbsp;&nbsp;<b>Taster_twitter_handle</b>:<?php echo $find_rs["Taster_twitter_handle"];?>		
					<br />
					<hr />
					<b>Description</b>:
					<?php echo $find_rs["Description"];?>
				</div> <!--/results-->
				
				<br />
				
				<?php
			
					}//end results 'do'
					
					while
						($find_rs=mysqli_fetch_assoc($find_query));
				
				}//end else
	
				?>