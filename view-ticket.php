<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<?php
$results = DB::query("SELECT * FROM bluhawk_tickets WHERE ticketNo=%i", $_GET['ticketno']);

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
		
		if(isset($_GET['type']) && $_GET['type'] == 'add-comment'){
			DB::insert('bluhawk_tickets_tracking', array('ticketID' => $ticketID, 'ticketClientID' => $clientID, 'ticketContactID' => $contactID, 'ticketAssignedID' => $ticketAssignedID, 'ticketComment' => $_POST['response'], 'ticketPostedBy' => 'client', 'datetime' => $datetime, 'active' => 'yes' ));
		}
		
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
		$results = DB::query("SELECT * FROM bluhawk_tickets_help_topics WHERE topicID=%i", $ticketHelpTopicID);
			foreach($results as $row){
				$ticketHelpTopic = $row['ticketHelpTopic'];
			}
		$results = DB::query("SELECT * FROM bluhawk_clients WHERE clientID=%i", $_COOKIE['clientID']);
			foreach($results as $row){
				$companyName = $row['companyName'];
				$companyLogo = $row['companyLogo'];
			}
		$results = DB::query("SELECT * FROM bluhawk_client_contacts WHERE contactID=%i", $_COOKIE['contactID']);
			foreach($results as $row){
				$contactMobile = $row['tel_mobile'];
				$contactOffice = $row['tel_office'];
				$contactEmail = $row['email'];
			}
		$results = DB::query("SELECT * FROM bluhawk_users WHERE userID=%i", $ticketAssignedID);
			foreach($results as $row){
				$agentName = $row['name'];
			}
	}
    //$db->debug;
?>
<section class="profile-sec" id="benefits">
  <div class="container">

    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>Ticket #<?php echo $ticketNO; ?></h2>
		  <h4>Please see details of the ticket below</h4>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row">
			  <div class="col-md-6">
 			  	<div class="row">
					<div class="col-md-3">&nbsp;</div><div class="col-md-9"><h3>Ticket Info</h3></div>
			    </div>
 			  	<div class="row">
					<div class="col-md-3"><p>Date: </p></div><div class="col-md-9"><h5><?php echo $ticketDate; ?></h5></div>
		  		</div> 
			  	<div class="row">
					<div class="col-md-3"><p>Status: </p></div><div class="col-md-9"><h5><?php echo $statusIcon; ?> <?php echo $ticketStatus; ?></h5></div>
		  		</div>
			  	<div class="row">
					<div class="col-md-3"><p>Priority: </p></div><div class="col-md-9"><h5><?php echo $priorityIcon; ?> <?php echo $ticketPriority; ?></h5></div>
		  		</div>
			  	<div class="row">
					<div class="col-md-3"><p>Department: </p></div><div class="col-md-9"><h5><?php echo $ticketDepartment; ?></h5></div>
		  		</div>
			  	<div class="row">
					<div class="col-md-3"></div>
		  		</div>
			  </div> 
			  
			  <div class="col-md-6">
 			  	<div class="row">
					<div class="col-md-3">&nbsp;</div><div class="col-md-9"><h3>Your Info</h3></div>
			    </div>
			  	<div class="row">
					<div class="col-md-3"><p>Company: </p></div><div class="col-md-9"><h5><?php echo $companyName; ?></h5></div>
		  		</div>
 			  	<div class="row">
					<div class="col-md-3"><p>Name: </p></div><div class="col-md-9"><h5><?php echo $_COOKIE['contactName']; ?> <?php echo $_COOKIE['contactSurname']; ?></h5></div>
		  		</div> 
			  	<div class="row">
					<div class="col-md-3"><p>Email: </p></div><div class="col-md-9"><h5><?php echo $contactEmail; ?></h5></div>
		  		</div>
			  	<div class="row">
					<div class="col-md-3"><p>Office Tel: </p></div><div class="col-md-9"><h5><?php echo $contactOffice; ?></h5></div>
		  		</div>
			  	<div class="row">
					<div class="col-md-3"><p>Mobile Tel: </p></div><div class="col-md-9"><h5><?php echo $contactMobile; ?></h5></div>
		  		</div>
		  	</div>
		  </div>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row">
			  <div class="col-md-6">
 			  	<div class="row">
					<div class="col-md-12"><h3>Ticket Details</h3></div>
			    </div>			  
<?php
		echo '
 			  	<div class="row">
					<div class="col-md-12">
						<div class="chatbox">
							<div class="chattop">
								<b>'.$_COOKIE['contactName'].'</b> posted '.$ticketDate.'
							</div>
							<div class="chatbottom">
								'.$ticketDescription.'
							</div>
						</div>
					</div>
			    </div>
		';
?>
 			  	<div class="row">
					<div class="col-md-12" style="margin-bottom:-15px"><h3>Ticket Actions / Comments</h3></div>
			    </div>	
<?php				  
if($results = DB::query("SELECT * FROM bluhawk_tickets_tracking WHERE ticketID='".$ticketID."' ORDER BY datetime DESC")){
	foreach($results as $row){
		$ticketComment = $row['ticketComment'];
		$ticketPostedBy = $row['ticketPostedBy'];
		
		if($ticketPostedBy == "client"){
			echo '
 			  	<div class="row" style="margin-top: 15px;">
					<div class="col-md-12">
						<div class="chatbox">
							<div class="chattop">
								<b>'.$_COOKIE['contactName'].'</b> posted '.$datetime.'
							</div>
							<div class="chatbottom">
								'.$ticketComment.'
							</div>
						</div>
					</div>
			    </div>
			';
		}
		
		if($ticketPostedBy == "mci"){
			echo '
 			  	<div class="row" style="margin-top: 15px;">
					<div class="col-md-12">
						<div class="chatbox">
							<div class="chattop2">
								<b>'.$agentName.'</b> (Mci IT) posted '.$datetime.'
							</div>
							<div class="chatbottom">
								'.$ticketComment.'
							</div>
						</div>
					</div>
			    </div>';
		}
		
	}
}
//$db->debug();
?>
			  </div>
			  <div class="col-md-6">
				<form action="index.php?pg=view-ticket&type=add-comment&ticketno=<?php echo $_GET['ticketno']; ?>" method="post">
 			  	<div class="row">
					<div class="col-md-1"></div><div class="col-md-11"><h3>Post a Reply</h3></div>
			    </div>
 			  	<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-11">
					<textarea id="editor" name="response" placeholder="Post your response here... To best assist you, we request that you be as specific and detailed as possible..."></textarea>
				  	<style>
				  		.ck-editor__editable {
    						min-height: 200px;
						}
						.ck-editor__editable p{
							text-align: left;
							color: black;
							font-size: 14px;
							font-weight: 400;
						}
						.ck-editor__editable .image .ck-widget .image-style-side .ck-widget_selected{
							text-align: left;
						}
						.ck-editor__editable figcaption{
							min-height: 20px;
						}
				    </style>
					<script>
						ClassicEditor
							.create( document.querySelector( '#editor' ), {
								toolbar: [
									'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'table', 'link', 'imageUpload', 'undo', 'redo'
								],
								ckfinder: {
									uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
								}
							} )
							.then( editor => {
								console.log( editor );
								console.log( Array.from( editor.ui.componentFactory.names ) );
							} )
							.catch( error => {
								console.error( error );
							} );
					</script>
					</div>
			    </div>
				<div class="row" style="margin-top: 10px; text-align: left;">
					<div class="col-md-1"></div>
					<div class="col-md-11">
						<input class="btn btn-aqua" type="submit" name="submit" value="POST REPLY">
					</div>
				</div>
				  </form>
		  	</div>
		  </div>	  
	  </div>
	</div>

  </div>
</section>