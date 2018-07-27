<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<?php
$results= $db->get_results("SELECT * FROM bluhawk_client_contacts WHERE contactID='".$_COOKIE['contactID']."'");

	foreach($results as $result){
		$clientID = $result->clientID;
		$contactID = $result->contactID;
		$contactName = $result->contactName;
		$contactSurname = $result->contactSurname;
		$designation = $result->designation;
		$tel_office = $result->tel_office;
		$tel_mobile = $result->tel_mobile;
		$email = $result->email;
		$likesDislikes = $result->likesDislikes;
		$username = $result->username;
		$password = $result->password;
		$datetime = $result->datetime;
	}
	//$db->debug();
?>
<section class="profile-sec" id="benefits">
  <div class="container">
	<form>
    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>My Profile</h2>
		  <h4>Please complete the information below</h4>
		  <div class="row">
			  <div class="col-md-6" style="border: 0px solid blue;">
 			  	<div class="row">
					<div class="col-md-4">&nbsp;</div><div class="col-md-8"><h3>Basic Info</h3></div>
			    </div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Name: </p></div><div class="col-md-8"><input type="text" name="name" value="<?php echo $contactName; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Surname: </p></div><div class="col-md-8"><input type="text" name="surname" value="<?php echo $contactSurname; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Designation: </p></div><div class="col-md-8"><input type="text" name="designation" value="<?php echo $designation; ?>"></div>
		  		</div>
 			  	<div class="row">
			  		<div class="col-md-4"><p>Office Tel: </p></div><div class="col-md-8"><input type="tel" name="tel" value="<?php echo $tel_office; ?>"></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-4"><p>Mobile Tel: </p></div><div class="col-md-8"><input type="tel" name="mobile" value="<?php echo $tel_mobile; ?>"></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-4"><p>Email: </p></div><div class="col-md-8"><input type="email" name="email" value="<?php echo $email; ?>"></div>
		  		</div> 
 			  	<div class="row">
			  		<div class="col-md-4"><p>Username: </p></div><div class="col-md-8"><input type="text" name="username" value="<?php echo $username; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-4"><p>Password: </p></div><div class="col-md-8"><input type="password" name="password" value=""></div>
		  		</div>
			  </div>
			  <div class="col-md-6" style="border: 0px solid green;">
 			  	<div class="row">
					<div class="col-md-3">&nbsp;</div><div class="col-md-9"><h3>My Interests</h3></div>
			    </div>
 			  	<div class="row">
					<div class="col-md-3"><p>Likes / Dislikes: </p></div><div class="col-md-9"><textarea placeholder="What are your Interests?"><?php echo $likesDislikes; ?></textarea></div>
			    </div>
		  </div>	  
	  </div>
	  <div class="col-md-12 text-center" style="margin-top: 10px;">
		  <input class="btn btn-aqua" type="submit" name="submit" value="SAVE MY INFO">
	  </div>
	</div>
    </form>
  </div>
</section>