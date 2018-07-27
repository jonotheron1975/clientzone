    <!-- header-section start -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-8 hidden-sm col-sm-12">
                    <div class="call-info">
						<p class="call-text"><small>Tel: +27 12 004 0868</small> &nbsp;&nbsp;|&nbsp;&nbsp; 2nd Floor, Soetdoring Building, 7 Protea Street, Centurion, Gauteng.</p>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="call-info pull-right">
						<p class="call-text">
							<a href="">
								<?php 
									if(isset($_COOKIE['contactID'])){ 
										echo '<i class="fa fa-user-circle-o"></i> &nbsp;'; 
										echo $_COOKIE['contactName'].'&nbsp;'; 
										echo $_COOKIE['contactSurname']; echo ' | '; 
									} 
								?>
							</a>  
							<a href="">
								<small>
									<?php 
										if(isset($_COOKIE['contactID'])){
											echo '<i class="fa fa-unlock-alt"></i> <a href="index.php?pg=home&type=logout">SIGN OUT</a>';
										} else {
											echo '<i class="fa fa-lock"></i> <a href="index.php?pg=home#login">SIGN IN</a>';
										}
									?>
								</small>
							</a>
						</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-wrapper">
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-2 col-sm-12 col-xs-12" style="padding-top: 4px;">
                        <a href="index.php"><img src="images/mci-it.png" width="150"></a>
                    </div>
                    <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
                        <div class="navigation">
                            <div id="navigation">
                                <ul>
                                    <li class="active"><a href="index.php?pg=home">Home</a></li>
	 								<?php 
										if($_COOKIE['accessLevel'] >= 1){ 
											echo '
                                    <li class="has-sub"><a href="">My Account</a>
                                        <ul>
											'; 
										} 
									?> 	
	 								<?php 
										if($_COOKIE['accessLevel'] >= 1){ 
											echo '
												<li><a href="index.php?pg=profile">My Profile</a></li>
											'; 
										} 
									?>   
									<?php 
										if($_COOKIE['accessLevel'] >= 2){ 
											echo '
												<li><a href="index.php?pg=company">My Company</a></li>
											'; 
										} 
									?>
	 								<?php 
										if($_COOKIE['accessLevel'] >= 1){ 
											echo '
                                        </ul>
                                    </li>
											'; 
										} 
									?> 	
									<?php 
										if($_COOKIE['accessLevel'] >= 3){ 
											echo '
                                    <li class="has-sub"><a href="">My Billing</a>
                                        <ul>
											<li><a href="index.php?pg=invoices">My Invoices</a></li>
											<li><a href="index.php?pg=statements">My Statements</a></li>
                                        </ul>
                                    </li>
											'; 
										} 
									?>
									<?php 
										if($_COOKIE['accessLevel'] >= 1){ 
											echo '
                                    <li class="has-sub"><a href="">My Support</a>
                                        <ul>
											<li><a href="index.php?pg=notifications">Notifications</a></li>
											<li><a href="index.php?pg=tickets">Tickets</a></li>
                                        </ul>
                                    </li>
											'; 
										} 
									?> 
                                    <li class="has-sub"><a href="">Legal</a>
                                        <ul>
                                            <li><a href="index.php?pg=terms">Terms & Conditions</a></li>
											<li><a href="index.php?pg=warranty">Warranty</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="../index.php#contact">Contact Us</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-section close -->