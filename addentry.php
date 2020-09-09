<?php include("topbit.php");

// Get Province list from database
$province_sql="SELECT * FROM `province` ORDER BY `province`.`Province` ASC ";
$province_query=mysqli_query($dbconnect,$province_sql);
$province_rs=mysqli_fetch_assoc($province_query);



// Initialise form variables

$title = "";
$variety = "";
$winery = "";
$point = "";
$price = "";
$provinceID = "";
$taster_name = "";
$taster_twitter_handle = "";
$designation = "";
$description = "";

$has_errors = "no";

// Code below excutes when the form is submitted...
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Get values from form...
	$title = mysqli_real_escape_string($dbconnect, $_POST['title']);
	$variety = mysqli_real_escape_string($dbconnect, $_POST['variety']);
	$winery = mysqli_real_escape_string($dbconnect, $_POST['winery']);
	$point = mysqli_real_escape_string($dbconnect, $_POST['point']);
	$price = mysqli_real_escape_string($dbconnect, $_POST['price']);
	$provinceID = mysqli_real_escape_string($dbconnect, $_POST['province']);
	// if ProvinceID is not blank, get province so that province box does lose its value if there are errors
	if ($provinceID != ""){
		$provinceitem_sql="SELECT * FROM `province` WHERE `ProvinceID` = $provinceID";
		$provinceitem_query=mysqli_query($dbconnect,$provinceitem_sql);
		$provinceitem_rs=mysqli_fetch_assoc($provinceitem_query);
		$province = $provinceitem_rs['Province'];
	} // End ProvinceID if
	
	$taster_name = mysqli_real_escape_string($dbconnect, $_POST['taster_name']);
	$taster_twitter_handle = mysqli_real_escape_string($dbconnect, $_POST['taster_twitter_handle']);
	$designation = mysqli_real_escape_string($dbconnect, $_POST['designation']);
	$description = mysqli_real_escape_string($dbconnect, $_POST['description']);
	
	// error checking will go here...
	
	// if there are no errors...
	if ($has_errors == "no"){
	
	// GO to succes page...
	header('Location: add_success.php');
	
	// get varietyID if it exists..
	$variety_sql = "SELECT * FROM `variety` WHERE `Variety` LIKE '$variety'";
	$variety_query=mysqli_query($dbconnect, $variety_sql);
	$variety_rs=mysqli_fetch_assoc($variety_query);
	$variety_count=mysqli_num_rows($variety_query);
	// if variety not already in variety table, add them and get the new varietyID
	if($variety_count > 0){
		$varietyID = $variety_rs['VarietyID'];

	}
	else{
		$add_variety_sql = "INSERT INTO `wine`.`variety` (`VarietyID`, `Variety`) VALUES (NULL, '$variety');";
		$add_variety_query=mysqli_query($dbconnect, $add_variety_sql);
	
	//Get variety ID
	$newvariety_sql = "SELECT * FROM `variety` WHERE `Variety` LIKE '$variety'";
	$newvariety_query=mysqli_query($dbconnect, $newvariety_sql);
	$newvariety_rs=mysqli_fetch_assoc($newvariety_query);
	
	$varietyID = $newvariety_rs['VarietyID'];
	
	
	} // end adding variety to variety table
	
	// get wineryID if it exists..
	$winery_sql = "SELECT * FROM `winery` WHERE `Winery` LIKE '$winery'";
	$winery_query=mysqli_query($dbconnect, $winery_sql);
	$winery_rs=mysqli_fetch_assoc($winery_query);
	$winery_count=mysqli_num_rows($winery_query);
	// if winery not already in winery table, add them and get the new wineryID
	if($winery_count > 0){
		$wineryID = $winery_rs['WineryID'];

	}
	else{
		$add_winery_sql = "INSERT INTO `wine`.`winery` (`WineryID`, `Winery`) VALUES (NULL, '$winery');";
		$add_winery_query=mysqli_query($dbconnect, $add_winery_sql);
	
	//Get winery ID
	$newwinery_sql = "SELECT * FROM `winery` WHERE `Winery` LIKE '$winery'";
	$newwinery_query=mysqli_query($dbconnect, $newwinery_sql);
	$newwinery_rs=mysqli_fetch_assoc($newwinery_query);
	
	$wineryID = $newwinery_rs['WineryID'];
	
	} // end adding winery to winery table
	
	
	
	
	
	// get designationID if it exists..
	$designation_sql = "SELECT * FROM `designation` WHERE `Designation` LIKE '$designation'";
	$designation_query=mysqli_query($dbconnect, $designation_sql);
	$designation_rs=mysqli_fetch_assoc($designation_query);
	$designation_count=mysqli_num_rows($designation_query);
	// if designation not already in designation table, add them and get the new designationID
	if($designation_count > 0){
		$designationID = $designation_rs['DesignationID'];

	}
	else{
		$add_designation_sql = "INSERT INTO `wine`.`designation` (`DesignationID`, `Designation`) VALUES (NULL, '$designation');";
		$add_designation_query=mysqli_query($dbconnect, $add_designation_sql);
	
	//Get designation ID
	$newdesignation_sql = "SELECT * FROM `designation` WHERE `Designation` LIKE '$designation'";
	$newdesignation_query=mysqli_query($dbconnect, $newdesignation_sql);
	$newdesignation_rs=mysqli_fetch_assoc($newdesignation_query);
	
	$designationID = $newdesignation_rs['DesignationID'];
	
	} // end adding designation to designation table
	
	
	
	
	
	// get Taster_nameID if it exists..
	$Taster_name_sql = "SELECT * FROM `Taster_name` WHERE `Taster_name` LIKE '$taster_name'";
	$Taster_name_query=mysqli_query($dbconnect, $Taster_name_sql);
	$Taster_name_rs=mysqli_fetch_assoc($Taster_name_query);
	$Taster_name_count=mysqli_num_rows($Taster_name_query);
	// if Taster_name not already in Taster_name table, add them and get the new Taster_nameID
	if($Taster_name_count > 0){
		$Taster_nameID = $Taster_name_rs['Taster_nameID'];

	}
	else{
		$add_Taster_name_sql = "INSERT INTO `wine`.`Taster_name` (`Taster_nameID`, `Taster_name`) VALUES (NULL, '$taster_name');";
		$add_Taster_name_query=mysqli_query($dbconnect, $add_Taster_name_sql);
	
	//Get Taster_name ID
	$newTaster_name_sql = "SELECT * FROM `Taster_name` WHERE `Taster_name` LIKE '$taster_name'";
	$newTaster_name_query=mysqli_query($dbconnect, $newTaster_name_sql);
	$newTaster_name_rs=mysqli_fetch_assoc($newTaster_name_query);
	
	$Taster_nameID = $newTaster_name_rs['Taster_nameID'];
	
	} // end adding Taster_name to Taster_name table
	
	
	
	// get Taster_twitter_handleID if it exists..
	$Taster_twitter_handle_sql = "SELECT * FROM `Taster_twitter_handle` WHERE `Taster_twitter_handle` LIKE '$taster_twitter_handle'";
	$Taster_twitter_handle_query=mysqli_query($dbconnect, $Taster_twitter_handle_sql);
	$Taster_twitter_handle_rs=mysqli_fetch_assoc($Taster_twitter_handle_query);
	$Taster_twitter_handle_count=mysqli_num_rows($Taster_twitter_handle_query);
	// if Taster_twitter_handle not already in Taster_twitter_handle table, add them and get the new Taster_twitter_handleID
	if($Taster_twitter_handle_count > 0){
		$Taster_twitter_handleID = $Taster_twitter_handle_rs['Taster_twitter_handleID'];

	}
	else{
		$add_Taster_twitter_handle_sql = "INSERT INTO `wine`.`Taster_twitter_handle` (`Taster_twitter_handleID`, `Taster_twitter_handle`) VALUES (NULL, '$taster_twitter_handle');";
		$add_Taster_twitter_handle_query=mysqli_query($dbconnect, $add_Taster_twitter_handle_sql);
	
	//Get Taster_twitter_handle ID
	$newTaster_twitter_handle_sql = "SELECT * FROM `Taster_twitter_handle` WHERE `Taster_twitter_handle` LIKE '$taster_twitter_handle'";
	$newTaster_twitter_handle_query=mysqli_query($dbconnect, $newTaster_twitter_handle_sql);
	$newTaster_twitter_handle_rs=mysqli_fetch_assoc($newTaster_twitter_handle_query);
	
	$Taster_twitter_handleID = $newTaster_twitter_handle_rs['Taster_twitter_handleID'];
	
	} // end adding Taster_twitter_handle to Taster_twitter_handle table
	
	
	

	
	
	// Add entry to database
	$addentry_sql = "INSERT INTO `wine`.`wine_data` (`ID`, `Description`, `DesignationID`, `Point`, `Price`, `ProvinceID`, `Taster_nameID`, `Taster_twitter_handleID`, `Title`, `VarietyID`, `WineryID`) VALUES (NULL, '$description', '$designationID', '$point', '$price', '$provinceID', '$Taster_nameID', '$Taster_twitter_handleID', '$title', '$varietyID', '$wineryID');";
	$addentry_query = mysqli_query($dbconnect,$addentry_sql);
	
	// Get ID for next page
	$getid_sql="SELECT * 
FROM `wine_data` 
WHERE `Description` LIKE '$description'
AND `Title` LIKE '$title'";
	$getid_query=mysqli_query($dbconnect,$getid_sql);
	$getid_rs=mysqli_fetch_assoc($getid_query);
	
	$ID = $getid_rs['ID'];
	$_SESSION['ID'] = $ID;

	
	} // end of 'no errors' if

} // end of button submitted code


 ?>
			<div class="box main">
				<div class="add-entry">
				<h2>Add An Entry</h2>
				
				<form method="post" enctype="mutipart / form-data" 
				action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					
					<!-- Title (required) -->
					<input class="add-field" type="text" name="title" title="The title of the wine review, which often contains the vintage if you're interested in extracting that feature"
					value="<?php echo $title; ?>"
					placeholder="Title(required)..." />
					<!-- Variety (required) -->
					<input class="add-field" type="text" name="variety" title="The type of grapes used to make the wine (ie Pinot Noir)"
					value="<?php echo $variety; ?>"
					placeholder="Variety(required)..." />
					<!-- Winery (required) -->
					<input class="add-field" type="text" name="winery" title="The winery that made the wine"
					value="<?php echo $winery; ?>"
					placeholder="Winery(required)..." />
					<!-- Point (required, integer, between 0-100) -->
						<div>
							<input class="add-field" type="text" name="point" title="The number of points WineEnthusiast rated the wine on a scale of 1-100 (though they say they only post reviews for)"
							value="<?php echo $point; ?>" placeholder="Point(0-100 required)..." />
						</div>
					<!-- Price (optional, float, set to 0 if blank) -->
						<div>
							<input class="add-field" type="text" name="price" title="The cost for a bottle of the wine"
							value="<?php echo $price; ?>" placeholder="Price(optional)..." />
						</div>
					<!-- Province dropdown (required) -->
					<select class="adv" name="province" title="The province or state that the wine is from">
					
					<?php
					if($provinceID==""){
						?>
						<option value="" selected>Province(Choose something)....</option>
						<?php
					}
					else{
						?>
							<option value="<?php echo $provinceID; ?>" selected><?php echo $province; ?></option>
						<?php
						
					}
					?>
						
					
					<!-- Get options from database -->
					
					<?php
					do{
						
						?>
						
						<option value="<?php echo $province_rs['ProvinceID']; ?>"><?php echo $province_rs['Province']; ?></option>
						
						
						<?php
						
					}// end province do loop
					
					while($province_rs=mysqli_fetch_assoc($province_query))
					
					?>
					
					</select>
					<!-- Taster_name (required) -->
					<input class="add-field" type="text" name="taster_name" 
					value="<?php echo $taster_name; ?>"
					placeholder="Taster_name(required)..." />
					<!-- Taster_twitter_handle (required, must start with @) -->
					<input class="add-field" type="text" name="taster_twitter_handle" 
					value="<?php echo $taster_twitter_handle; ?>"
					placeholder="Taster_twitter_handle(required, must have @ in the front)..." />
					<!-- Designation (optional) -->
					<input class="add-field" type="text" name="designation" 
					title="The vineyard within the winery where the grapes that made the wine are from"
					value="<?php echo $designation; ?>"
					placeholder="Designation(optional)..." />
					<!-- Description (required) -->
					<textarea class="add-field <?php echo $description_field; ?>" name="description" 
					value="<?php echo $description; ?>"
					placeholder="Description(required)..." rows="6" ><?php echo $description; ?></textarea>
					<!-- Submit Button-->
					<p>
					<input class="submit advanced-button" type='submit'
					value="Submit" />
					</p>
					
					
				</form>
				</div> <!-- / add-entry-->
			</div> <!-- / main -->
			
<?php include("bottombit.php"); ?>