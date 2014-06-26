<?php

$config = array();

$config['name'] = "My own alcoholic forum";
$config['description'] = "Anonymous, but not really";

$config['theme'] = "default";

$config['db'] = array(
	"dsn"=>"mysql:host=localhost;dbname=rum",
	"user"=>"root",
	"pass"=>"",
	"prefix"=>"rum_"
);