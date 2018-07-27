<?php
session_start([ 
    'cookie_httponly' => true,
    'cookie_secure' => true
]);
/*
echo 'ClientZone '.$_COOKIE['ClientZone'].'</br>';
echo 'clientID '.$_COOKIE['clientID'].'</br>';
echo 'contactID '.$_COOKIE['contactID'].'</br>';
echo 'contactName '.$_COOKIE['contactName'].'</br>';
echo 'contactSurname '.$_COOKIE['contactSurname'].'</br>';
echo 'accessLevel '.$_COOKIE['accessLevel'].'</br>';
*/

require_once('connect.php');

//DB::debugMode();
//error_reporting(0);

$datetime = date('Y-m-d H:i:s');
$date_today = date('Y-m-d');

if(isset($_GET['type']) && $_GET['type']=='login'){
	$email = $_POST['userEmail'];
	$password = $_POST['userPassword'];
	$password_encrypted = password_hash($password, PASSWORD_BCRYPT);

	if (password_verify($password, $password_encrypted)) {
    	// Authenticated.
		
		$results = DB::query("SELECT * FROM bluhawk_client_contacts WHERE email=%s", $email);
		foreach($results as $row){
			$contactID = $row['contactID'];
			$clientID = $row['clientID'];
			$contactName = $row['contactName'];
			$contactSurname = $row['contactSurname'];
			$accessLevel = $row['accessLevel'];
			$firstLogin = $row['firstLogin'];
			
			//-- LOGIN TIMEOUT --//
			
			$active = time() + 28800;
			setcookie('ClientZone', 'loggedIn', $active);
			setcookie('clientID', $clientID, $active);
			setcookie('contactID', $contactID, $active);
			setcookie('contactName', $contactName, $active);
			setcookie('contactSurname', $contactSurname, $active);
			setcookie('accessLevel', $accessLevel, $active); 
			
			//-- Remember Me Function --//
			$year = time() + 31536000;
			
			if($_POST['remember']) {
				setcookie('rememberUser', $_POST['userEmail'], $year);
				setcookie('rememberPass', $_POST['userPassword'], $year);
			}
			elseif(!$_POST['remember']) {
				if(isset($_COOKIE['rememberUser'])) {
					$past = time() - 100;
					setcookie('rememberUser','gone', $past);
				}
				if(isset($_COOKIE['rememberPass'])) {
					$past = time() - 100;
					setcookie('rememberPass','gone', $past);
				}
			}
			
			if($firstLogin == 0){ //Go to Terms and Conditions
				echo '<script type="text/javascript">window.location = "index.php?pg=home#first"</script>';
			}elseif($firstLogin == 1){
				echo '<script type="text/javascript">window.location = "index.php?pg=home"</script>';
			}
		}
	}
}

//UPDATE LOGIN & TC's
if(isset($_GET['type']) && $_GET['type'] == 'first'){
	if(isset($_POST['password'])){
		$password = $_POST['password'];
		$password_encrypted = password_hash($password, PASSWORD_BCRYPT);
	}
	DB::update('bluhawk_client_contacts', array( 'password' => $password_encrypted, 'firstLogin' => '1' ),  "contactID=%s", $_COOKIE['contactID']);
	echo '<script type="text/javascript">window.location = "index.php?pg=home"</script>';
}

if(!isset($_COOKIE['clientID'])){
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}

if(isset($_GET['type']) && $_GET['type']=='logout'){
	$past = time() - 9999;
	setcookie('ClientZone', 'loggedOut', ''.$past.'');
	setcookie('clientID', '', ''.$past.'');
	setcookie('contactID', '', ''.$past.'');
	setcookie('contactName', '', ''.$past.'');
	setcookie('contactSurname', '', ''.$past.'');
	setcookie('accessLevel', '0', ''.$past.'');
	session_unset();
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}

//if ($result->error) die("Error occurred: " . $result->error);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php'); ?>
</head>
<body>
<!--div class="loader loader-bg">
  <div class="loader-inner ball-clip-rotate-pulse">
    <div></div>
    <div></div>
  </div>
</div-->
	
<?php include('navbar.php'); ?>

<div id="page-height">
	<?php include('switch.php'); ?>
</div>
	
<?php //include('foot.php'); ?>

<!-- Login Modal -->
<div id="login" class="modalDialog">
	<div id="modalpopup">
		<a href="#close" title="Close" class="close">X</a>
		<h2>PLEASE SIGN IN</h2>
		<form name="login" action="index.php?type=login#close" target="_self" method="post">
			<input type="email" name="userEmail" id="email" placeholder="&#9993; E-mail" value="<?php
echo $_COOKIE['rememberUser']; ?>" required>
			<input id="password-field" type="password" placeholder="&#xf023;  Password" class="form-control" name="userPassword" value="<?php
echo $_COOKIE['rememberPass']; ?>">
              <span toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password" required></span>
			<div id="rememberMe"><input type="checkbox" name="remember" 
				<?php 
					if(isset($_COOKIE['rememberUser'])) {
						echo 'checked="checked"';
					} else {
						echo '';
					}
				?> 
             > Remember Me
            </div>
            <input name="submit" type="submit" value="SIGN IN">
		</form>
	</div>
</div>
	
<!-- Set Username & Password Modal -->
<div id="first" class="modalDialog">
	<div id="modalpopup">
		<a href="#close" title="Close" class="close">X</a>
		<h2>First Login</h2>
		<h5>Please change your password</h5>
		<form name="update" action="index.php?type=first&contactid=<?php echo $_COOKIE['contactID']; ?>#close" target="_self" method="post">
			<input id="password-field" type="password" placeholder="&#xf023;  Password" class="form-control" name="userPassword" value="secret">
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" required></span>
			<a href="clientzone.mci-it.co.za/terms.php" target="_blank">Read the Terms & Conditions Here</a>
			<div id="rememberMe">
				<input type="checkbox" name="tcs" required> I accept the Terms & Conditions
            </div>
            <input name="submit" type="submit" value="UPDATE">
		</form>
	</div>
</div>

<?php include('js/javascript.js'); ?>

<!--script>
$(document).ready(function(){
    if (localStorage.getItem('popState') != 'shown') {
      $('#myModal').modal('show');
    };
    
    $('#myModal').on('hide.bs.modal', function () {
        localStorage.setItem('popState', 'shown');
  });
  })
</script-->

</body>
</html>
