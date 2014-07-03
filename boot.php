<?php

session_name('rum');
session_start();

if(!isset($_SESSION['user'])){
	$_SESSION['user'] = false;
}

$tplEngine->user = $user = $_SESSION['user'];