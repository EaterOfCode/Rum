<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/main.css">
	<title><?=$this->category->getTitle(); ?> | <?=$this->cfgVars['name']; ?></title>
</head>
<body>
	<div class="header">
		<span class="title"><?=$this->cfgVars['name']; ?> <small><?=$this->cfgVars['description']; ?></small></span>

		<div class="user">
			<?php 
				if($this->user === false){
			?><span class="login">Login</span><?php
				}else{
			?><span class="name"><?=$this->user->getLink();?></span><span class="name">Logout</span><?php
				}
			?>
		</div>
	</div>
	<div class="main">
		<?php $this->render($this->innerTemplate); ?>
	</div>
</body>
</html>