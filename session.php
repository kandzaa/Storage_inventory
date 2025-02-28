<?php
session_set_cookie_params(86400); //set session to expire in 24 hours
if(!isset($_SESSION)) {
    session_start();
}
$_SESSION['token'] = md5(uniqid(mt_rand(), true));

header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Origin, Content-Type, X-CSRF-Token, Accept');