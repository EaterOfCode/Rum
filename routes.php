<?php

$routes = array(
	"user"=>array(
		"pattern"=>"/user/[a-z0-9:username]"
	),
	"category"=>array(
		"pattern"=>'/category/[0-9:id]/[a-z\-0-9:title]'
	)
);