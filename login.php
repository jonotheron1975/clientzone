<?php
if(isset($_GET['type']) && $_GET['type'] == 'login'){
		if(isset($_POST['password'])){
			$hashed_password = md5($_POST["password"]);	
		}
		
		$results = $db->get_results("SELECT * FROM bluhawk_client_contacts WHERE username='".$_POST['username']."' AND password='".$hashed_password."'");
		foreach($results as $result){
			$contactID = $result->contactID;
			$clientID = $result->clientID;
			$contactName = $result->contactName;
			$contactSurname = $result->contactSurname;
			$_SESSION['clientID'] = $clientID;
			$_SESSION['contactID'] = $contactID; 
			$_SESSION['contactName'] = $contactName; 
			$_SESSION['contactSurname'] = $contactSurname;
			
			//-- LOGIN TIMEOUT --//
			$active = time() + 28800;
			setcookie('ClientZone', $_POST['username'], $active);
			
			//-- Remember Me Function --//
			$year = time() + 31536000;
			
			if($_POST['remember']) {
				setcookie('rememberUser', $_POST['username'], $year);
				setcookie('rememberPass', $_POST['password'], $year);
			}
			elseif(!$_POST['remember']) {
				if(isset($_COOKIE['rememberUser'])) {
					$past = time() - 100;
					setcookie(rememberUser, gone, $past);
				}
				if(isset($_COOKIE['rememberPass'])) {
					$past = time() - 100;
					setcookie(rememberPass, gone, $past);
				}
			}

			//echo '<script type="text/javascript">window.location = "index.php?pg=tickets"</script>';		
		}
	$db->debug();
}

if(isset($_GET['type']) && $_GET['type'] == 'logout'){
	$past = time() - 9999;
	setcookie('ClientZone', gone, $past);
	session_unset();
	$message = 'index.php#login';
	//header("Location: index.php");
	echo '<script type="text/javascript">window.location = "index.php#login"</script>';
}
//-- END USER LOGIN --//
?>