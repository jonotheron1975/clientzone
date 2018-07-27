<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<section class="profile2-sec" id="benefits">
  <div class="container">
	<form>
    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>My Invoices</h2>
		  <h4>View your Invoice history below</h4>
		  <div class="row">
			  <div class="col-md-12">
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-1"><h5>Invoice#</h5></div>
					<div class="col-md-2"><h5>Invoice Date</h5></div>
					<div class="col-md-7"><h5>Invoice Description</h5></div>
					<div class="col-md-2"><h5>Invoice Total</h5></div>
			    </div>
<?php
$results = DB::query("SELECT * FROM bluhawk_clients WHERE clientID=%i", $_COOKIE['clientID']);
	foreach($results as $row){
		$clientCode = $row['clientCode'];
	}				  
			  			  
$results = DB::query("SELECT * FROM bluhawk_finance_invoices WHERE clientCode=%s ORDER BY invoiceDate DESC", $clientCode);
	foreach($results as $row){
		$invoiceID = $row['invoiceID'];
		$invoiceNumber = $row['invoiceNumber'] ;
		$clientCode = $row['clientCode'];
		$invoiceDate = $row['invoiceDate'];
		$orderNo = $row['orderNo'];
		$orderDescription = $row['orderDescription'];
		$invoiceTotal = $row['invoiceTotal'];
		$invoiceTax = $row['invoiceTax'];

	if($invoiceID >= 1){
    	echo '
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-1">
						<p>
							<a href="index.php?pg=view-invoice&invoiceno='.$invoiceNumber.'">'.$invoiceNumber.'</a>
						</p>
					</div>
					<div class="col-md-2"><p>'.$invoiceDate.'</p></div>
					<div class="col-md-7"><p>'.$orderDescription.'</p></div>
					<div class="col-md-2"><p>R '.$invoiceTotal.'</p></div>
			    </div>
		';
	}elseif($invoiceID < 1){
    	echo '
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-12"><p>No Invoices Found</p></div>
			    </div>
		';
	}
}
?>
			  </div>
		  </div>	  
	  </div>
	</div>
    </form>
  </div>
</section>