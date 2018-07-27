<?php
$results = DB::query( "SELECT * FROM bluhawk_finance_invoices WHERE `invoiceNumber`=%s", $_GET[ 'invoiceno' ] );
//$db->debug();
foreach ( $results as $row ) {
	$invoiceID = $row[ 'invoiceID' ];
	$invoiceNumber = $row[ 'invoiceNumber' ];
	$clientCode = $row[ 'clientCode' ];
	$invoiceDate = $row[ 'invoiceDate' ];
	$orderNo = $row[ 'orderNo' ];
	$orderDescription = $row[ 'orderDescription' ];
	$invoiceTotal = $row[ 'invoiceTotal' ];
	$invoiceTax = $row[ 'invoiceTax' ];

	$results = DB::query( "SELECT * FROM bluhawk_clients WHERE `clientCode`=%s", $clientCode );
	foreach ( $results as $row ) {
		$companyName = $row[ 'companyName' ];
		$registeredName = $row[ 'registeredName' ];
		$clientCode = $row[ 'clientCode' ];
		$telephone = $row[ 'telephone' ];
		$website = $row[ 'website' ];
		$physicalAddress = $row[ 'physicalAddress' ];
		$suburbPhysical = $row[ 'suburbPhysical' ];
		$cityPhysical = $row[ 'cityPhysical' ];
		$postalCode = $row[ 'postalCode' ];
		$postalAddress = $row[ 'postalAddress' ];
		$suburbPostal = $row[ 'suburbPostal' ];
		$cityPostal = $row[ 'cityPostal' ];
		$postalAddressCode = $row[ 'postalAddressCode' ];
		$registrationNumber = $row[ 'registrationNumber' ];
		$vatNumber = $row[ 'vatNumber' ];

		$invoiceSubTotal = $invoiceTotal - $invoiceTax;
	}

}
?>
<link href="css/quote.css" rel="stylesheet" type="text/css">

<!-- Main content -->
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 invoice border">
				<div class="box">
					<div class="box-body" style="margin: 0 auto">
						<div class="row sales-quote">
							<div class="col-md-12 text-center">
								<img src="userfiles/header.png" width="1123" height="143" alt=""/>
							</div>
							<div class="col-md-12 text-center">
								<table width="100%" border="0">
									<tbody>
										<tr>
											<td align="center">
												<h1>TAX INVOICE</h1>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-12 text-center client">
								<table width="100%" border="0">
									<tbody>
									</tbody>
									<tbody>
										<tr>
											<td width="49%" rowspan="3" align="left" valign="top" class="border-tblr">
												<p>Mci IT (Pty) Ltd<br> Suite 210, Soetdoring Building, <br> 7 Protea Street, Doringkloof, <br> Centurion, 0157<br>
													<br> Tel: 012 663 5200<br> Fax: 012 004 0868<br> E-mail: info@mci-it.co.za</p>
												<p>Registration No: 2012/087691/07<br> VAT No: 4810272015</p>
											</td>
											<td width="3%" rowspan="3" align="left" valign="top">&nbsp;</td>
											<td width="23%" align="left" valign="top" class="border-tbl">Date:</td>
											<td width="25%" align="right" valign="top" class="border-tbr">
												<?php echo $invoiceDate; ?>
											</td>
										</tr>
										<tr>
											<td align="left" valign="top" class="border-tbl">Invoice No:</td>
											<td width="25%" align="right" valign="top" class="border-tbr">
												<?php echo $invoiceNumber; ?>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="left" valign="top" class="border-tblr">
												<p>Deliver To:</p>
												<p>
													<?php echo $registeredName; ?><br>
													<?php echo $physicalAddress; ?><br>
													<?php echo $suburbPhysical; ?>,
													<?php echo $cityPhysical; ?><br>
													<?php echo $postalAddressCode; ?><br>
													<br> VAT No:
													<?php echo $vatNumber; ?>
												</p>
											</td>
										</tr>
									</tbody>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="col-md-12 text-center spacer">
								<table width="100%" border="0">
									<tbody>
										<tr>
											<td align="center">
												<h1></h1>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-12 quote">
								<table width="100%" border="0">
									<col width="5%">
									<col width="5%">
									<col width="60%">
									<col width="15%">
									<col width="15%">
									<thead>
										<tr>
											<th align="left" valign="middle" class="border-tlr grey">Qty</th>
											<th align="left" valign="middle" class="border-tlr grey">Code</th>
											<th align="left" valign="middle" class="border-tlr grey">Description</th>
											<th align="left" valign="middle" class="border-tlr grey">Unit Price</th>
											<th align="left" class="border-tr grey">Nett Price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td align="left" valign="top" class="border-tbl">
												1.0
										  </td>
											<td align="left" valign="top" class="border-tbl"><?php echo $clientCode; ?></td>
											<td align="left" valign="top" class="border-tbl">
												<?php echo $orderDescription; ?>
											</td>
											<td align="left" valign="top" class="border-tbl">R <?php echo $invoiceSubTotal; ?>.00</td>
											<td class="border-tblr" align="left" valign="top">R
												<?php echo $invoiceSubTotal; ?>.00
											</td>
										</tr>
										<tr>
											<td colspan="3" rowspan="3">&nbsp;</td>
											<td align="right">Sub Total </td>
											<td class="border-blr" align="left">R
												<?php echo $invoiceSubTotal; ?>.00
											</td>
										</tr>
										<tr>
											<td align="right">VAT (15%) </td>
											<td class="border-blr" align="left">R
												<?php echo $invoiceTax; ?>
											</td>
										</tr>
										<tr>
											<td align="right"><strong>TOTAL</strong>
											</td>
											<td class="border-blr" align="left">
												<strong>R <?php echo $invoiceTotal; ?></strong>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-12 quote-terms">
										<table width="100%" border="0">
											<tbody>
												<tr>
													<td width="35%" align="left" valign="top">Banking Details:</br>
														ABSA Bank Ltd</br>
														Account No: 40-8355-1084<br>
														Branch Code: 632005<br>
														Branch: Centurion</td>
													<td align="left" width="65%" valign="top">Received in Good Order:<br>
                                                      <br>
                                                      Signature _____________________________
													  
													  <br>
                                                      <br>
                                                      Date __________________________________
													   <br></td>
												</tr>
											</tbody>
										</table>
						  </div>

					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>