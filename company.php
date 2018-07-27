<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<?php
if(isset($_POST['submit'])){
	DB::update('bluhawk_clients', array ( 'companyName' => $_POST['companyName'], 'registeredName' => $_POST['registeredName'], 'clientCode' => $_POST['clientCode'], 
		'telephone' => $_POST['telephone'], 'website' => $_POST['website'], 'physicalAddress' => $_POST['physicalAddress'], 'suburbPhysical' => $_POST['suburbPhysical'],
		'cityPhysical' => $_POST['cityPhysical'], 'postalCode' => $_POST['postalCode'], 'postalAddress' => $_POST['postalAddress'], 'suburbPostal' => $_POST['suburbPostal'],
		'cityPostal' => $_POST['cityPostal'], 'postalAddressCode' => $_POST['postalAddressCode'], 'registrationNumber' => $_POST['registrationNumber'], 'vatNumber' => $_POST['vatNumber'], 'purchaseOrderRequired' => $_POST['purchaseOrderRequired'], 'statementRequired' => $_POST['statementRequired'], 'companyDescription' => $_POST['response'], 'active' => '1' ), "clientID=%i", $_COOKIE['clientID']);
}

$results = DB::query("SELECT * FROM bluhawk_clients WHERE clientID=%i", $_COOKIE['clientID']);
	
	foreach($results as $row){
		$clientID = $row['clientID'];
		$companyName = $row['companyName'];
		$registeredName = $row['registeredName'];
		$clientCode = $row['clientCode'];
		$telephone = $row['telephone'];
		$website = $row['website'];
		
		$registrationNumber = $row['registrationNumber'];
		$vatNumber = $row['vatNumber'];
		$customerType = $row['customerType'];
		$purchaseOrderRequired = $row['purchaseOrderRequired'];
		$statementRequired = $row['statementRequired'];
		$chargeVat = $row['chargeVat'];
		$companyLogo = $row['companyLogo'];
		$companyDescription = $row['companyDescription'];
		
		$physicalAddress = $row['physicalAddress'];
		$suburbPhysical = $row['suburbPhysical'];
		$cityPhysical = $row['cityPhysical'];
		$postalCode = $row['postalCode'];
		
		$postalAddress = $row['postalAddress'];
		$suburbPostal = $row['suburbPostal'];
		$cityPostal = $row['cityPostal'];
		$postalAddressCode = $row['postalAddressCode'];
		
		$active = $row['active'];
	}
	//$db->debug();
?>
<section class="profile-sec" id="benefits">
  <div class="container">
	<form action="index.php?pg=company" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>My Company</h2>
		  <h4>Please complete the information below</h4>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row">
			  
			  <div class="col-md-6" style="border: 0px solid blue;">
 			  	<div class="row">
					<div class="col-md-4">&nbsp;</div><div class="col-md-8"><h3>Basic Info</h3></div>
			    </div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Company Name: </p></div><div class="col-md-8"><input type="text" name="companyName" value="<?php echo $companyName; ?>" required></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Registered Name: </p></div><div class="col-md-8"><input type="text" name="registeredName" value="<?php echo $registeredName; ?>"></div>
		  		</div>
 			  	<div class="row">
			  		<div class="col-md-4"><p>Reg No: </p></div><div class="col-md-8"><input type="text" name="registrationNumber" value="<?php echo $registrationNumber; ?>"></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-4"><p>VAT No: </p></div><div class="col-md-8"><input type="text" name="vatNumber" value="<?php echo $vatNumber; ?>"></div>
		  		</div> 
			  	<div class="row">
			  		<div class="col-md-4"><p>Office Tel: </p></div><div class="col-md-8"><input type="tel" name="telephone" value="<?php echo $telephone; ?>" required></div>
		  		</div>
 			  	<div class="row">
			  		<div class="col-md-4"><p>Website: </p></div><div class="col-md-8"><input type="text" name="website" value="<?php echo $website; ?>"></div>
		  		</div> 
 			  	<div class="row">
					<div class="col-md-4">&nbsp;</div><div class="col-md-8"><h3>Financial Info</h3></div>
			    </div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Purchase Order: </p></div><div class="col-md-8"><input type="text" name="purchaseOrderRequired" placeholder="Purchase Ordered required for Invoice" value="<?php echo $purchaseOrderRequired; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Statements: </p></div><div class="col-md-8"><input type="text" name="statementRequired" placeholder="Do you require a Statement?" value="<?php echo $statementRequired; ?>"></div>
		  		</div>
			  </div>
			  
			  <div class="col-md-6" style="border: 0px solid green;">
 			  	<div class="row">
					<div class="col-md-4">&nbsp;</div><div class="col-md-8"><h3>Physical Address</h3></div>
			    </div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Physical Address: </p></div><div class="col-md-8"><input type="text" name="physicalAddress" value="<?php echo $physicalAddress; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Suburb: </p></div><div class="col-md-8"><input type="text" name="suburbPhysical" value="<?php echo $suburbPhysical; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>City: </p></div><div class="col-md-8"><input type="text" name="cityPhysical" value="<?php echo $cityPhysical; ?>"></div>
		  		</div>
 			  	<div class="row">
			  		<div class="col-md-4"><p>Postal Code: </p></div><div class="col-md-8"><input type="text" name="postalCode" value="<?php echo $postalCode; ?>"></div>
		  		</div> 
 			  	<div class="row">
					<div class="col-md-4">&nbsp;</div><div class="col-md-8"><h3>Postal Address</h3></div>
			    </div>
 			  	<div class="row">
			  		<div class="col-md-4"><p>Postal Address: </p></div><div class="col-md-8"><input type="text" name="postalAddress" value="<?php echo $postalAddress; ?> "></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-4"><p>Suburb: </p></div><div class="col-md-8"><input type="text" name="suburbPostal" value="<?php echo $suburbPostal; ?>"></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-4"><p>City: </p></div><div class="col-md-8"><input type="text" name="cityPostal" value="<?php echo $cityPostal; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Postal Code: </p></div><div class="col-md-8"><input type="text" name="postalAddressCode" value="<?php echo $postalAddressCode; ?>"></div>
		  		</div>
			  </div>
			  
		  </div>
			  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row col-md-12">
 			  	<div class="row col-md-12">
					<div class="col-md-2">&nbsp;</div><div class="col-md-10"><h3>Software Licences</h3></div>
			    </div>
<?php
$results = DB::query("SELECT * FROM bluhawk_software_licences WHERE clientID=%i", $_COOKIE['clientID']);
	
	foreach($results as $row){
		$licenceID = $row['licenceID'];
		$softwarePackage = $row['softwarePackage'];
		$licenceTotalUsers = $row['licenceTotalUsers'];
		$licenceFeesDue = $row['licenceFeesDue'];
		$licenceDetails = 'Software: <b>'.$softwarePackage.'</b>&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;Total Users: <b>'.$licenceTotalUsers.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbspLicence Fees Due: <b>'.$licenceFeesDue.'</b>';
		
		echo '
			  	<div class="row col-md-12">
			  		<div class="col-md-2"><p>Licence: </p></div><div class="col-md-10"><h5>'.$licenceDetails.'</h5></div>
		  		</div>
		';
		
	}
?>
		  </div>
		  
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div> 
		  
		  <div class="row">
			  <div class="col-md-12"><h3>Company Description</h3></div>
		  </div>
		  <div class="row" style="margin-top: 10px;">
			  <div class="col-md-12">
				<textarea id="editor" name="response" placeholder="Post your message here..."><?php echo $companyDescription; ?></textarea>
				  	<style>
				  		.ck-editor__editable {
    						min-height: 400px;
						}
						.ck-editor__editable p{
							text-align: left;
							color: black;
							font-size: 14px;
							font-weight: 400;
						}
						.ck-editor__editable .image .ck-widget .image-style-side .ck-widget_selected{
							text-align: left;
						}
						.ck-editor__editable figcaption{
							min-height: 20px;
						}
				    </style>
					<script>
						ClassicEditor
							.create( document.querySelector( '#editor' ), {
								toolbar: [
									'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'table', 'link', 'imageUpload', 'undo', 'redo'
								],
								ckfinder: {
									uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
								}
							} )
							.then( editor => {
								console.log( editor );
								console.log( Array.from( editor.ui.componentFactory.names ) );
							} )
							.catch( error => {
								console.error( error );
							} );
					</script>
			  </div>
		  </div>
		  
		  <div class="row" style="margin-top: 15px;">
			  <div class="col-md-12">
			  	<input class="btn btn-aqua" type="submit" name="submit" value="SAVE COMPANY INFO">
			  </div>
		  </div>
	
	</div>
    </form>
  </div>
</section>