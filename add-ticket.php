<?php
//-- CHECK USER LOGIN --//
if(!isset($_COOKIE['ClientZone'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
?>
<?php include('nav-blocks.php'); ?>

<?php
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
    //$db->debug();
?>
<section class="ticket-sec">
  <div class="container">
	<form action="index.php?pg=tickets&type=add-ticket" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-12 text-center" style="border: 0px solid red;">
		  <h2>New Ticket</h2>
		  <h4>Please complete the information below</h4>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row">
			  <div class="col-md-6" style="border: 0px solid green;">
 			  	<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-9"><h3>Ticket Info</h3></div>
			    </div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Help Topic: </p></div>
					<div class="col-md-9">
						<select name='help-topic' class="form-control" required>
							<option selected="selected" value="">-- select topic --</option>
						<?php
							$results = DB::query("SELECT * FROM bluhawk_tickets_help_topics ORDER BY ticketHelpTopic ASC");
								foreach($results as $row){
									$topicID = $row['topicID'];
									$ticketHelpTopic = $row['ticketHelpTopic'];
									
									echo '<option value="'.$topicID.'">'.$ticketHelpTopic.'</option>';
								}
						?>
						</select>
					</div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Department: </p></div>
					<div class="col-md-9">
						<select name='department' class="form-control" required>
							<option selected="selected" value="">-- select department --</option>
						<?php
							$results = DB::query("SELECT * FROM bluhawk_tickets_department ORDER BY ticketDepartment ASC");
								foreach($results as $row){
									$departmentID = $row['departmentID'];
									$ticketDepartment = $row['ticketDepartment'];
									
									echo '<option value="'.$departmentID.'">'.$ticketDepartment.'</option>';
								}
						?>
						</select>
					</div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Priority: </p></div>
					<div class="col-md-9">
						<select name='priority' class="form-control" required>
							<option value="">-- select priority --</option>
							<option value="1">Low</option>
							<option selected="selected" value="2">Medium</option>
							<option value="3">High</option>
						</select>
					</div>
		  		</div>
			  </div>
			  <div class="col-md-6" style="border: 0px solid blue;">
 			  	<div class="row">
					<div class="col-md-3">&nbsp;</div><div class="col-md-9"><h3>Your Info</h3></div>
			    </div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Company: </p></div><div class="col-md-9"><input type="text" name="client" class="form-control" value="<?php echo $companyName; ?>"></div>
		  		</div>
			  	<div class="row">
			  		<div class="col-md-3"><p>Contact: </p></div><div class="col-md-9"><input type="text" name="contact" class="form-control" value="<?php echo $_COOKIE['contactName']; echo '&nbsp;'; echo $_COOKIE['contactSurname']; ?>"></div>
		  		</div>
 			  	<div class="row">
			  		<div class="col-md-3"><p>Email: </p></div><div class="col-md-9"><input type="email" name="email" class="form-control" value="<?php echo $contactEmail; ?>"></div>
		  		</div> 
			  </div>
		  </div>
		  
		  <div class="row">
			  <div class="col-md-12">
			  	<div style="width: 100%; height: 1px; background-color: #03F"></div>
			  </div>
		  </div>
		  
		  <div class="row">
			  <div class="col-md-12"><h3>Ticket Details</h3></div>
		  </div>
		  <div class="row">
			  <div class="col-md-12"><input type="text" name="subject" class="form-control" placeholder="Subject / Fault Title" required></div>
		  </div>
		  <div class="row" style="margin-top: 10px;">
			  <div class="col-md-12">
				<p style="text-align:left">Please describe the problem you are having in as much detail as possible. Feel free to add screenshots by clicking on the Image Icon.</p>
				<textarea rows="10" id="editor" class="form-control" name="response"></textarea>
				  	<style>
				  		.ck-editor__editable {
    						min-height: 400px;
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
		  
		  <div class="row" style="margin-top: 15px;">
			  <div class="col-md-12">
			  	<input class="btn btn-aqua" type="submit" name="submit" value="CREATE TICKET">
			  </div>
		  </div>
		  
		</div>
	</div>
    </form>
  </div>
</section>