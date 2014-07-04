<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?=$this->baseUrl?>/css/main.css">
	<script src="<?=$this->baseUrl?>/js/jquery.js"></script>
	<script src="<?=$this->baseUrl?>/js/main.js"></script>
	<title><?=$this->category->getTitle(); ?> | <?=$this->cfgVars['name']; ?></title>
</head>
<body>
	<div class="header">
        <div class="header-middle">
            <span class="title"><?=$this->cfgVars['name']; ?> <small><?=$this->cfgVars['description']; ?></small></span>

            <div class="user">
                <?php 
                    if($this->user === false){
                ?>
                <span class="login">
                    Login    
                    <div class="login-form">
                        <input type="text" placeholder="Username..." class="username">
                        <input type="passwprd" placeholder="Password..." class="password">
                        <button class="login-submit">Login</button>
                    </div>
                </span>
                   <?php
                    }else{
                ?>
                   <span class="name"><?=$this->user->getLink();?></span><span class="name">Logout</span>
                   <?php } ?>
            </div>
        </div>
	</div>
	<div class="main">
		<?php $this->render($this->innerTemplate); ?>
	</div>
</body>
</html>