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
		  <h2>My Statements</h2>
		  <h4>View your Statement history below</h4>
		  <div class="row">
			  <div class="col-md-12">
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-2"><h5>Invoice Ref</h5></div>
					<div class="col-md-2"><h5>Statement Date</h5></div>
					<div class="col-md-6"><h5>Statement Description</h5></div>
					<div class="col-md-2"><h5>Statement Total</h5></div>
			    </div>
<?php
$results = DB::query("SELECT * FROM bluhawk_clients WHERE clientID=%i", $_COOKIE['clientID']);
	foreach($results as $row){
		$clientCode = $row['clientCode'];
	}				  
		$results = DB::query( "SELECT * FROM bluhawk_finance_statements WHERE clientCode=%s", $clientCode );
			foreach ( $results as $row ) {
				$statementID = $row[ 'statementID' ];
				$invoiceReference = $row[ 'invoiceReference' ];
				$statementDate = $row[ 'statementDate' ];
				$statementAmount = $row[ 'statementAmount' ];
				$statementDescription = $row[ 'statementDescription' ];


		if($statementID >= 1){
    		echo '
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-2">
						<p>
							<a href="index.php?pg=view-statement&statementid='.$statementID.'">'.$invoiceReference.'</a>
						</p>
					</div>
					<div class="col-md-2"><p>'.$statementDate.'</p></div>
					<div class="col-md-6"><p>'.$statementDescription.'</p></div>
					<div class="col-md-2"><p>R '.$statementAmount.'</p></div>
			    </div>
			';
		}elseif($statementID < 1){
    		echo '
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-12"><p>No Statements Found</p></div>
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