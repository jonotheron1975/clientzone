<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<?php
if(isset($_POST['submit'])){
	if(isset($_POST['password'])){
		$password = $_POST['password'];
		$password_encrypted = password_hash($password, PASSWORD_BCRYPT);
	}
	DB::update('bluhawk_client_contacts', array ( 'contactName' => $_POST['contactName'], 'contactSurname' => $_POST['contactSurname'], 'designation' => $_POST['designation'], 
		'tel_office' => $_POST['tel_office'], 'tel_mobile' => $_POST['tel_mobile'], 'email' => $_POST['email'], 'password' => $password_encrypted, 'likesDislikes'=> $_POST['response'] ),
		"contactID=%i", $_COOKIE['contactID']);
}

$results = DB::query("SELECT * FROM bluhawk_client_contacts WHERE contactID='".$_COOKIE['contactID']."'");

	foreach($results as $row){
		$contactID = $row['contactID'];
		$cID = $row['clientID'];
		$contactName = $row['contactName'];
		$contactSurname = $row['contactSurname'];
		$designation = $row['designation'];
		$tel_office = $row['tel_office'];
		$tel_mobile = $row['tel_mobile'];
		$email = $row['email'];
		$likesDislikes = $row['likesDislikes'];
		$username = $row['username'];
		$password = $row['password'];
	}
    //$db->debug();
?>
<section class="profile-sec" id="benefits">
  <div class="container">
	<form action="index.php?pg=profile" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>Edit Profile</h2>
		  <h4>Please complete the information below</h4>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  
		  
		  <div class="row">
			  
			  <div class="col-md-6" style="border: 0px solid blue;">
		  		<div class="row">
					<div class="col-md-3"></div><div class="col-md-9"><h3>Basic Info</h3></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Name: </p></div><div class="col-md-9"><input type="text" name="contactName" value="<?php echo $contactName; ?>" required></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Surname: </p></div><div class="col-md-9"><input type="text" name="contactSurname" value="<?php echo $contactSurname; ?>" required></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Designation: </p></div><div class="col-md-9"><input type="text" name="designation" value="<?php echo $designation; ?>"></div>
		  		</div>  				  
			  </div>
			  
			  <div class="col-md-6" style="border: 0px solid green;">
		  		<div class="row">
					<div class="col-md-3"></div><div class="col-md-9"><h3>Contact Info</h3></div>
		  		</div>
 			  	<div class="row">
			  		<div class="col-md-3"><p>Office Tel: </p></div><div class="col-md-9"><input type="tel" name="tel_office" value="<?php echo $tel_office; ?>"></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-3"><p>Mobile Tel: </p></div><div class="col-md-9"><input type="tel" name="tel_mobile" value="<?php echo $tel_mobile; ?>" required></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-3"><p>Email: </p></div><div class="col-md-9"><input type="email" name="email" value="<?php echo $email; ?>" required></div>
		  		</div> 
			  </div>
				  
		  </div>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>		  
		  
		  <div class="row">
			  
			  <div class="col-md-6" style="border: 0px solid blue;">
		  		<div class="row">
					<div class="col-md-3"></div><div class="col-md-9"><h3>Login Details</h3></div>
		  		</div>
 			  	<div class="row">
			  		<div class="col-md-3">
						<p>Password: </p>
					</div>
					<div class="col-md-9">
						<input id="password-field" type="password" placeholder="&#xf023;  Password" class="form-control" name="userPassword" value="<?php
echo $_COOKIE['rememberPass']; ?>">
              			<span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon2 toggle-password" required></span>
					</div>
		  		</div>  				  
			  </div>
			  
			  <div class="col-md-6" style="border: 0px solid green;">
		  		<div class="row">
					<div class="col-md-3"></div><div class="col-md-9"><h3>&nbsp;</h3></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-3"></div>
		  		</div>  
			  </div>
				  
		  </div>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row">
			  <div class="col-md-12"><h3>My Interests (Likes / Dislikes)</h3></div>
		  </div>
		  <div class="row" style="margin-top: 10px;">
			  <div class="col-md-12">
	<textarea name="response" placeholder="Post your message here..."><?php echo $likesDislikes; ?></textarea>
	<script>
		CKEDITOR.replace( 'response', {
			// Define the toolbar groups as it is a more accessible solution.
			toolbarGroups: [
				{"name":"basicstyles","groups":["basicstyles"]},
				{"name":"paragraph","groups":["list","blocks"]},
				{"name":"links","groups":["links"]},
				{"name":"insert","groups":["insert"]}
			],
			// Remove the redundant buttons from toolbar groups defined above.
			removeButtons: 'Strike,Subscript,Superscript,Anchor'
		} );
	</script>
			  </div>
		  </div>
		  
		  <div class="row" style="margin-top: 15px;">
			  <div class="col-md-12">
			  	<input class="btn btn-aqua" type="submit" name="submit" value="SAVE PROFILE INFO">
			  </div>
		  </div>
		  
	  </div>
		
	</div>
    </form>
  </div>
</section>