<?php

include('start.php');
use Controllers\Users;

//verify the session, start if not active
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

try {
    //  grab post data from index.php, trim and sanitize and send to controllers for verification
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $sanitizedPass = filter_var($password, FILTER_SANITIZE_STRING);
    $user = '';

    // check if user data exists in DB
    $userExists = Users::check_user($sanitizedEmail, $sanitizedPass);
    // if controller returns 'password' assign 'no entry' to $user for redirect in main.js
    if ($userExists === 'password') {
        $user = 'no entry';
        echo $user;
    }
    // if user not found in DB, create user
    if ($userExists == null) {
        $user = Users::create_user($sanitizedEmail, $sanitizedPass);
        // set session data here, as it is a completely different object
        $_SESSION['user'] = $user['attributes']['email'];
    }
    // if above checks don't trigger assign $user to returned user in initial DB check
    if ($user !== 'no entry' && $userExists !== null) {
        $user = $userExists;
    }
    if ($user == 'no entry' || !empty($_SESSION['user'])) {
        // do nothing
    } else {
        $_SESSION['user'] = $user[0]['email'];
    }
} catch (Exception $e) {
//    var_dump($e);
}

