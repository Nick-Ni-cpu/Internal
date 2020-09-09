			<div class="box side">
				<h2>Add an App 
				<a class="side" href="showall.php">| Show All</a></h2>
				
				<form class="searchform" method="post" action="var_title.php"
				enctype="multipart/form_data"
				>
				
				<input class="search" type="text" name="var_title" size="30"
				value="" placeholder="Title / Variety ... " required
				/>
				
				<input class="submit" type="submit" name="find_var_title" value="&#xf002;" />
				
				</form>
				
				<br />
				<hr />
				<br />
				
				<div class='advanced-frame'>
				
				<h2>Advanced Search</h2>
				
				<form class='searchform' method='post' action='advanced.php'
				enctype='mutipart/form-data'>
				
				<input class="adv" type="text" name="title" size="40"
				value="" placeholder="Title..." />
				
				<input class="adv" type="text" name="variety" size="40"
				value="" placeholder="Variety..." />
				
				
				
				<!--Province Dropdown-->
				<select class="search adv" name="province">
				
				<option value="" selected>Province...</option>
				
				<!-- get options from database -->
					<?php
						$province_sql="SELECT * FROM `province` ORDER BY `province`.`Province` ASC ";
						$province_query=mysqli_query($dbconnect,$province_sql);
						$province_rs=mysqli_fetch_assoc($province_query);
					
					do{
						
						?>
						
						<option value="<?php echo $province_rs['Province'] ?>"><?php echo $province_rs['Province'] ?></option>
						
						
						<?php
						
					}// end province do loop
					
					while($province_rs=mysqli_fetch_assoc($province_query))
					
					?>
				</select>
				
				<!-- Designation -->
				<input class="adv" type="text" name="designation" size="40"
				value="" placeholder="designation..." />
				<!-- Point -->
				<div class="flex-container">
				
					<div class="adv-txt">
						Point:
					</div><!-- / point label -->
					
					<div>
						<select class="search adv" name="point_more_less">
							<option value="" >Choose...</option>
							<option value="at least" >At Least</option>
							<option value="at most" >At Most</option>
						</select>
					</div> <!-- / point deop down -->
					
					<div>
						<input class="adv" type="text" name="point" size="2" 
						value="" placeholder="Point..." />
					</div><!-- / point amount -->
				
				</div> <!-- / point flexbox -->
				<!-- Price -->
				<div class="flex-container">
				
					<div class="adv-txt">
						Price:
					</div><!-- / price label -->
					
					<div>
						<select class="search adv" name="price_more_less">
							<option value="" >Choose...</option>
							<option value="at least" >At Least</option>
							<option value="at most" >At Most</option>
						</select>
					</div> <!-- / price deop down -->
					
					<div>
						<input class="adv" type="text" name="price" size="2" 
						value="" placeholder="Price..." />
					</div><!-- / price amount -->
				
				</div> <!-- / price flexbox -->
				<!-- Taster_name -->
				<input class="adv" type="text" name="taster_name" size="40"
				value="" placeholder="Taster_name..." />
				<!-- Taster_twitter_handle -->
				<input class="adv" type="text" name="taster_twitter_handle" size="40"
				value="" placeholder="Taster_twitter_handle..." />
				<!-- Winery -->
				<input class="adv" type="text" name="winery" size="40"
				value="" placeholder="Winery..." />
				<!-- Search Button is below-->
				<p style="margin-right:5px;color:red;"><b>P.S.</b>&nbsp;If you leave everything blank, all the data will display.</p>
				<input class="submit advanced-button" type='submit'
				name='advanced' value="Search &nbsp; &#xf002;" />
				</form>
				
				</div> <!-- / advanced frame -->
				
			</div> <!-- / side -->
			
			<div class="box footer">
				<p>CC Nick Ni & Jason Shen 2020</p>
			</div> <!-- / footer -->
			
		</div> <!-- / wrapper -->
	</body>
</html>