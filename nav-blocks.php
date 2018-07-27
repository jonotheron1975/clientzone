<section class="service-sec" id="benefits">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
<?php 
if($_COOKIE['accessLevel'] >= 1){ 
	echo '
          <div class="col-md-2 text-sm-center service-block">
			<a href="index.php?pg=profile">
			  <div class="block">
				<i class="fa fa-user-circle-o" aria-hidden="true"></i>
				<h3>My Profile</h3>
			  </div>
			</a>
          </div>
	'; 
} 
?> 

<?php 
if($_COOKIE['accessLevel'] >= 2){ 
	echo '
          <div class="col-md-2 text-sm-center service-block">
			 <a href="index.php?pg=company">
			  <div class="block">
				<i class="fa fa-briefcase" aria-hidden="true"></i>
            	<h3>My Company</h3>
			  </div>
			 </a>
          </div>
	'; 
} 
?> 

<?php 
if($_COOKIE['accessLevel'] >= 1){ 
	echo '
          <div class="col-md-2 text-sm-center service-block">
			<a href="index.php?pg=tickets">
			  <div class="block">
				<i class="fa fa-ticket" aria-hidden="true"></i>
				  <h3>My Tickets</h3>
			  </div>
			</a>
          </div>
	'; 
} 
?> 

<?php 
if($_COOKIE['accessLevel'] >= 1){ 
	echo '
          <div class="col-md-2 text-sm-center service-block">
			<a href="index.php?pg=notifications">
			  <div class="block">
				<i class="fa fa-bullhorn" aria-hidden="true"></i>
				  <h3>My Notifications</h3>
			  </div>
			</a>
          </div>
	'; 
} 
?> 

<?php 
if($_COOKIE['accessLevel'] >= 3){ 
	echo '
          <div class="col-md-2 text-sm-center service-block">
			 <a href="index.php?pg=invoices">
			  <div class="block">
				<i class="fa fa-file-text-o" aria-hidden="true"></i>
				<h3>My Invoices</h3>
			  </div>
			</a>
          </div>
	'; 
} 
?> 

<?php 
if($_COOKIE['accessLevel'] >= 3){ 
	echo '
          <div class="col-md-2 text-sm-center service-block">
			<a href="index.php?pg=statements">
			  <div class="block">
				<i class="fa fa-files-o" aria-hidden="true"></i>
				  <h3>My Statements</h3>
			  </div>
			</a>
          </div>
	'; 
} 
?> 		
        </div>
      </div>
    </div>
  </div>
</section>