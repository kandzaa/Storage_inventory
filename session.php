<?php
session_set_cookie_params(86400);
if (!isset($_SESSION) || session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['token'] = md5(uniqid(mt_rand(), true));
