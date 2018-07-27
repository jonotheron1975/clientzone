<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone']) && $_COOKIE['ClientZone']=="loggedIn"){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<div class="swiper-container main-slider" id="myCarousel">
  <div class="swiper-wrapper">
    <div class="swiper-slide slider-bg-position" style="background:url('images/slider/slider-07.png')" data-hash="slide1">
		<div class="col-md-8 col-md-offset 2" style="text-align: right;">
			<h1>Client Zone</h1>
			<h3>Welcome to the Client Zone</h3>
		</div>
    </div>
    <div class="swiper-slide slider-bg-position" style="background:url('images/slider/slider-02.png')" data-hash="slide2">
		<div class="col-md-8 col-md-offset 2" style="text-align: left;">
			<h1>Smart Services</br></h1>
			<h3>Log Support Calls, View Invoices & Statements,</br>Update your profile and more...</h3>
		</div>
    </div>
  </div>
  <div class="swiper-pagination"></div>
  <div class="swiper-button-prev"><i class="fa fa-chevron-left"></i></div>
  <div class="swiper-button-next"><i class="fa fa-chevron-right"></i></div>
</div>

<?php include('nav-blocks.php'); ?>

<section class="home-sec" id="home">
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="border: 0px solid red;">
		  <h2>Welcome to the MCI Client Zone</h2>
		  <h4>Client Zone Version 1.0</h4>
		  <p>We have been hard at work creating this Client Zone just for you - our valued client.</p>
		  <p><b>Your Profile:</b> By using this portal - you will be able to update your business profile and personal contact information - thereby ensuring that we always have the latest company and contact information.</p>
		  <p><b>Billing Info:</b> View all your Invoices and Statements.</p>
		  <p><b>Support & Notifications:</b> Our Client Support ticket system has been integrated into the Client Zone, making it easier for you to Log and Track your support tickets. You will also be able to see any System Notifications that we have issued - like bug fixes and updates</p>
		  <p><b>New Orders:</b> Purchase Licences and Software directly via E-Commerce.</p>
	  </div>
	</div>
  </div>
</section>