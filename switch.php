<?php
		  	if (!isset($_GET['pg'])){
				  	$pg = "home";
				  } else {
				  	$pg = $_GET['pg'];
				  }
				  
				  switch($pg){
					//Common Info
					case "home":
						include ("home.php");
						break;
						
					case "overview":
						include ("overview.php");
						break;
						  
					case "company":
						include ("company.php");
						break;
						  
					case "profile":
						include ("profile.php");
						break;
						  
					case "terms":
						include ("terms.php");
						break;
						  
					case "warranty":
						include ("warranty.php");
						break;
						
					case "invoices":
						include ("invoices.php");
						break;
					
					case "view-invoice":
						include ("view-invoice.php");
						break;	
						
					case "statements":
						include ("statements.php");
						break;
						  
					case "view-statement":
						include ("view-statement.php");
						break;
						
					case "tickets":
						include ("tickets.php");
						break;
						  
					case "add-ticket":
						include ("add-ticket.php");
						break;
						  
					case "edit-ticket":
						include ("edit-ticket.php");
						break;
						  
					case "view-ticket":
						include ("view-ticket.php");
						break;
						  
					case "notifications":
						include ("notifications.php");
						break;
						  
					case "view-notification":
						include ("view-notification.php");
						break;

						
					}
?>
						 