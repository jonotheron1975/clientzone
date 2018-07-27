<?php
$results = DB::query( "SELECT * FROM bluhawk_clients WHERE `clientID`=%s", $_COOKIE[ 'clientID' ] );
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

	$results = DB::query( "SELECT * FROM bluhawk_finance_statements WHERE statementID=%s", $_GET[ 'statementid' ] );
	foreach ( $results as $row ) {
		$statementID = $row[ 'statementID' ];
		$invoiceReference = $row[ 'invoiceReference' ];
		$statementDate = $row[ 'statementDate' ];
		$statementAmount = $row[ 'statementAmount' ];
		$statementDescription = $row[ 'statementDescription' ];

		$results = DB::query( "SELECT * FROM bluhawk_finance_invoices WHERE invoiceNumber=%s", $invoiceReference );
		foreach ( $results as $row ) {
			$invoiceDate = $row[ 'invoiceDate' ];
		}

		if ( $statementAmount > 0 ) {
			$debitAmount = $statementAmount;
			$creditAmount = '0.00';
			$totalAmount = $debitAmount;
		} elseif ( $statementAmount < 0 ) {
			$creditAmount = $statementAmount;
			$debitAmount = '0.00';
			$totalAmount = $creditAmount;
		}
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
												<h1>STATEMENT</h1>
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
												<?php echo $statementDate; ?>
											</td>
										</tr>
										<tr>
											<td align="left" valign="top" class="border-tbl">Account No:</td>
											<td width="25%" align="right" valign="top" class="border-tbr">
												<?php echo $clientCode; ?>
											</td>
										</tr>
										<tr>
											<td colspan="2" align="left" valign="middle" class="border-tblr">
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
									<col width="15%">
									<col width="10%">
									<col width="30%">
									<col width="15%">
									<col width="15%">
									<col width="15%">
									<thead>
										<tr>
											<th align="left" valign="middle" class="border-tlr grey">Date</th>
											<th align="left" valign="middle" class="border-tlr grey">Reference</th>
											<th align="left" valign="middle" class="border-tlr grey">Description</th>
											<th align="left" valign="middle" class="border-tlr grey">Debit</th>
											<th align="left" valign="middle" class="border-tlr grey">Credit</th>
											<th align="left" valign="middle" class="border-tlr grey">Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td align="left" valign="top" class="border-tbl">
												<?php echo $statementDate; ?>
											</td>
											<td align="left" valign="top" class="border-tbl">
												<?php echo $invoiceReference; ?>
											</td>
											<td align="left" valign="top" class="border-tbl">
												TAX INVOICE
											</td>
											<td align="left" valign="top" class="border-tbl">
												R
												<?php echo $debitAmount; ?>
											</td>
											<td class="border-tblr" align="left" valign="top">
												R
												<?php echo $creditAmount; ?>
											</td>
											<td class="border-tblr" align="left" valign="top">
												R
												<?php echo $totalAmount; ?>
											</td>
										</tr>
										<tr>
											<td colspan="3" valign="top" style="padding:0px;">
												<table width="100%" border="0">
													<tbody>
														<tr>
															<td colspan="5">&nbsp;</td>
														</tr>
														<tr>
															<td class="border-tblr">120+ Days</td>
															<td class="border-tblr">90 Days</td>
															<td class="border-tblr">60 Days</td>
															<td class="border-tblr">30 Days</td>
															<td class="border-tblr">Current</td>
														</tr>
														<tr>
															<td class="border-tblr">R 0.00</td>
															<td class="border-tblr">R 0.00</td>
															<td class="border-tblr">R 0.00</td>
															<td class="border-tblr">R 0.00</td>
															<td class="border-tblr">
																R <?php echo $totalAmount; ?>
															</td>
														</tr>
														<tr>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
														</tr>
													</tbody>
												</table>
											</td>
											<td colspan="3" align="right" valign="top" style="padding:0px;">
												<table width="90%" border="0">
													<tbody>
														<tr>
															<td colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td class="border-tbl">Amount Due:</td>
															<td class="border-tbr" background="" align="right">R <?php echo $totalAmount; ?>
															</td>
														</tr>
														<tr>
															<td class="border-tbl">Amount Paid:</td>
															<td class="border-tbr" align="right">R 0.00</td>
														</tr>
														<tr>
															<td>&nbsp;</td>
															<td>&nbsp;</td>
														</tr>
													</tbody>
												</table>
											</td>
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