<?php

$tplEngine->category = new Post(array(
	"id"=>-1,
	"title"=>"Index"
));

$tplEngine->parsedown = new Parsedown();

$tplEngine->render('category','main');