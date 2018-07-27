<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<section class="profile-sec" id="benefits">
  <div class="container">
	<form>
    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>My Notifications</h2>
		  <h4>Please see notifications below</h4>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row" style="min-height: 250px;">
			  <div class="col-md-12">		  
<?php
if($results= $db->get_results("SELECT * FROM bluhawk_notifications ORDER BY datetime DESC")){

	foreach($results as $result){
		$notifyID = $result->notifyID;
		$notifyTitle = $result->notifyTitle;
		$notifyDescription = $result->notifyDescription;
		$notifyDate = $result->datetime;

		echo '
 			  	<div class="row" style="margin-top: 15px;">
					<div class="col-md-12">
						<div class="chatbox">
							<div class="chattop2">
								<b>'.$notifyTitle.'</b> posted '.$notifyDate.'
							</div>
							<div class="chatbottom">
								'.$notifyDescription.'
							</div>
						</div>
					</div>
			    </div>
		';
	}
}else{
	echo '<p style="text-align: left;">There are no notifications</p>';
}
//$db->debug();
?>
			  </div>

		  	</div>
		  </div>	  
	  </div>
	</div>
    </form>
  </div>
</section>