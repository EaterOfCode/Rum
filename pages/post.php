<?php

$tplEngine->post = new Post($page['params']['id']);
$tplEngine->replies = $tplEngine->post->getReplies();
$tplEngine->title = $tplEngine->post->getTitle();
$tplEngine->render('post', 'main');
