<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<?php
$datetime = date('Y-m-d H:i:s');
$date_today = date('Y-m-d');

if(isset($_GET['type']) && $_GET['type']=="add-ticket"){
	$ticketNewNo = rand(1000000, 9999999);

	DB::insert('bluhawk_tickets', array( 
		'clientID' => $_COOKIE['clientID'], 'contactID' => $_COOKIE['contactID'], 'ticketNO' => $ticketNewNo, 'ticketSubject' => $_POST['subject'], 		
		'ticketHelpTopicID' => $_POST['help-topic'], 'ticketDescription' => $_POST['response'], 'ticketStatusID' => '1', 'ticketPriorityID' => $_POST['priority'],	'ticketDepartmentID' => $_POST['department'], 'ticketAssignedID' => '3', 'ticketDate' => $datetime, 'ticketDueDate' => $date_today, 'active' => 'yes' 
	));
}

if(isset($_GET['type']) && $_GET['type']=="edit-ticket"){
	DB::update('bluhawk_tickets', array( 'clientID' => $_COOKIE['clientID'], 'contactID' => $_COOKIE['contactID'], 'ticketSubject' => $_POST['subject'], 'ticketHelpTopicID' => $_POST['help-topic'], 'ticketDescription' => $_POST['response'], 'ticketStatusID' => $_POST['status'], 'ticketPriorityID' => $_POST['priority'],	'ticketDepartmentID' => $_POST['department'],	'ticketAssignedID' => '3', 'ticketDate' => $datetime, 'ticketDueDate' => $date_today, 'active' => 'yes' ), 'ticketID=%i', $_GET['ticketid']);
}

if(isset($_GET['type']) && $_GET['type']=="delete-ticket"){
	DB::query("DELETE FROM bluhawk_tickets WHERE ticketID=%i", $_GET['ticketid']);
}

?>

<section class="profile2-sec" id="benefits">
  <div class="container">
	<form>
    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>My Tickets</h2>
		  <h4>View your ticket history below</h4>
	  	  <div style="margin-bottom: 25px;">
			  <a href="index.php?pg=tickets&type=open"><button class="btn btn-grey" type="button"><i class="fa fa-folder-open-o" aria-hidden="true"></i> OPEN</button></a>
			  <a href="index.php?pg=tickets&type=waiting"><button class="btn btn-grey" type="button"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> WAITING</button></a>
			  <a href="index.php?pg=tickets&type=overdue"><button class="btn btn-grey" type="button"><i class="fa fa-circle-o-notch" aria-hidden="true"></i> OVERDUE</button></a>
			  <a href="index.php?pg=tickets&type=closed"><button class="btn btn-grey" type="button"><i class="fa fa-times" aria-hidden="true"></i> CLOSED</button></a>
			  <a href="index.php?pg=add-ticket"><button class="btn btn-blue" type="button"><i class="fa fa-plus" aria-hidden="true"></i> NEW TICKET</button></a>
	  	  </div>
		  <div class="row">
			  <div class="col-md-12">
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-2"><h5>Ticket#</h5></div>
					<div class="col-md-2"><h5>Create Date</h5></div>
					<div class="col-md-1"><h5>Status</h5></div>
					<div class="col-md-1"><h5>Priority</h5></div>
					<div class="col-md-2"><h5>Department</h5></div>
					<div class="col-md-4"><h5>Subject</h5></div>
			    </div>
<?php
if(!isset($_GET['type'])){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}
if(isset($_GET['type']) && $_GET['type']=='add-ticket'){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}
if(isset($_GET['type']) && $_GET['type']=='edit-ticket'){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}
if(isset($_GET['type']) && $_GET['type']=='delete-ticket'){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}
if(isset($_GET['type']) && $_GET['type']=='open'){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}
if(isset($_GET['type']) && $_GET['type']=='waiting'){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}
if(isset($_GET['type']) && $_GET['type']=='closed'){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}
if(isset($_GET['type']) && $_GET['type']=='overdue'){
	$results = DB::query("SELECT * FROM bluhawk_tickets WHERE contactID=%i AND ticketStatusID=%i ORDER BY ticketNO DESC", $_COOKIE['contactID'], '1');
}

	foreach($results as $row){
		$ticketID = $row['ticketID'];
		$clientID = $row['clientID'];
		$contactID = $row['contactID'];
		$ticketNO = $row['ticketNO'];
		$ticketSubject = $row['ticketSubject'];
		$ticketHelpTopicID = $row['ticketHelpTopicID'];
		$ticketDescription = $row['ticketDescription'];
		$ticketStatusID = $row['ticketStatusID'];
		$ticketPriorityID = $row['ticketPriorityID'];
		$ticketDepartmentID = $row['ticketDepartmentID'];
		$ticketAssignedID = $row['ticketAssignedID'];
		$ticketDate = $row['ticketDate'];
		$ticketDueDate = $row['ticketDueDate'];
		$active = $row['active'];
		
		$results = DB::query("SELECT * FROM bluhawk_tickets_department WHERE departmentID=%i", $ticketDepartmentID);
			foreach($results as $row){
				$ticketDepartment = $row['ticketDepartment'];
			}
		$results = DB::query("SELECT * FROM bluhawk_tickets_status WHERE statusID=%i", $ticketStatusID);
			foreach($results as $row){
				$ticketStatus = $row['ticketStatus'];
				
				if($ticketStatus=='Open'){
					$statusIcon = '<i class="fa fa-folder-open-o" aria-hidden="true" style="color: green; font-size : 18px;"></i>';
				}
				if($ticketStatus=='Waiting'){
					$statusIcon = '<i class="fa fa-exclamation-circle" aria-hidden="true" style="color: orange; font-size : 18px;"></i>';
				}
				if($ticketStatus=='Closed'){
					$statusIcon = '<i class="fa fa-times" aria-hidden="true" style="color: red; font-size : 18px;"></i>';
				}
				if($ticketStatus=='Overdue'){
					$statusIcon = '<i class="fa fa-circle-o-notch" aria-hidden="true" style="color: red; font-size : 18px;"></i>';
				}
			}
		$results = DB::query("SELECT * FROM bluhawk_tickets_priority WHERE priorityID=%i", $ticketPriorityID);
			foreach($results as $row){
				$ticketPriority = $row['ticketPriority'];
				
				if($ticketPriority=='Low'){
					$priorityIcon = '<i class="fa fa-check" aria-hidden="true" style="color: green; font-size : 18px;"></i>';
				}
				if($ticketPriority=='Medium'){
					$priorityIcon = '<i class="fa fa-exclamation-triangle" aria-hidden="true" style="color: orange; font-size : 18px;"></i>';
				}
				if($ticketPriority=='High'){
					$priorityIcon = '<i class="fa fa-bolt" aria-hidden="true" style="color: red; font-size : 18px;"></i>';
				}
			}
	if($ticketID >= 1){
    	echo '
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-2">
						<p>
							<a href="index.php?pg=edit-ticket&ticketno='.$ticketNO.'"><i class="fa fa-pencil" style="color: grey; font-size : 18px;"></i></a>
							<a href="index.php?pg=tickets&ticketid='.$ticketID.'&type=delete-ticket"><i class="fa fa-trash" style="color: grey; font-size : 18px;"></i></a>
							<a href="index.php?pg=view-ticket&ticketno='.$ticketNO.'">'.$ticketNO.'</a>
						</p>
					</div>
					<div class="col-md-2"><p>'.$ticketDate.'</p></div>
					<div class="col-md-1"><p>'.$statusIcon.'  '.$ticketStatus.'</p></div>
					<div class="col-md-1"><p>'.$priorityIcon.'  '.$ticketPriority.'</p></div>
					<div class="col-md-2"><p>'.$ticketDepartment.'</p></div>
					<div class="col-md-4"><p>'.$ticketSubject.'</p></div>
			    </div>
		';
	}elseif($ticketID < 1){
    	echo '
 			  	<div class="row" style="border-bottom: 1px solid #ccc;">
					<div class="col-md-12"><p>No Tickets Found</p></div>
			    </div>
		';
	}
		
}
//$db->debug();
?>
			  </div>
		  </div>	  
	  </div>
	</div>
    </form>
  </div>
</section>