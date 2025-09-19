<?php
// INIT
//session_name("www.cgchamber.org");
//session_set_cookie_params(0, '/', '.cgchamber.org');
session_start();
require __DIR__ . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "config.php";

// HANDLE AJAX REQUEST
switch ($_POST['req']) {
  /* [INVALID REQUEST] */
  default:
    die("ERR");
    break;

  /* [LOGIN] */
  case "in":
    // ALREADY SIGNED IN
    if (is_array($_SESSION['user']) && isset($_SESSION['user']['id'])) { die("OK"); }

    // VERIFY
    else {
      // INIT
      require PATH_LIB . "lib-users.php";
      $usrLib = new Users();

      // GET + CHECK PASSWORD
      //$user = $usrLib->getByEmail($_POST['email']);
      $user = $usrLib->getByUserName($_POST['username']);
      $pass = is_array($user);
      if ($pass) {
        $pass = (md5($_POST['password'])==$user['user_password'])?true:false;
       // $pass = password_verify($_POST['password'], $user['user_password']);
      }
      if ($pass) {
        $_SESSION['user'] = [
          "id" => $user['user_id'],
          "UserTypeId" => $user['UserTypeId'],
          "first_name" => $user['first_name'],
          "last_name" => $user['last_name'],
          "name" => $user['user_name'],
          "email" => $user['user_email']
        ];
		setcookie('user_id', $user['user_id'] , time()+86000, '/');
		setcookie('UserTypeId', $user['UserTypeId'] , time()+86000, '/');
	    setcookie('UserName', $user['name'] , time()+86000, '/');
		setcookie('UserFirstName', $user['first_name'] , time()+86000, '/');
		setcookie('ccciUser', '0' , time()+86000, '/');
      }
      echo $pass ? "OK" : "ERR" ;
    }
    break;

  /* [LOGOUT] */
  case "out":
    unset($_SESSION['user']);
	 //setcookie('user_id', FALSE, -1, '/cgc', '.cgchamber.org');
	//setcookie('UserTypeId', FALSE, -1, '/cgc', '.cgchamber.org');

	setcookie('user_id', '0' , time()+86000, '/');
	setcookie('UserTypeId', '0' , time()+86000, '/');
    die("OK");
    break;
}
?>