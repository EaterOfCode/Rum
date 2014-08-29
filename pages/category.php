<?php

$tplEngine->category = new Post($page['params']['id']);
$tplEngine->title = $tplEngine->category->getTitle();
$tplEngine->render('category', 'main');
