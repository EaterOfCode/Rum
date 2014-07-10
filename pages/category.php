<?php


$tplEngine->category = new Post($page['params']['id']);
$tplEngine->render('category', 'main');
