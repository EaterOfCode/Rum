<?php
$username = $page['params']['username'];

$selectedUser = new User($username);

$tplEngine->title = $username;

$tplEngine->render('user','main');
