<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->category->getTitle(); ?> | <?=$this->name; ?></title>
</head>
<body>
	<?php $this->posts = $this->category->getReplies();$this->render('bits/list'); ?>
</body>
</html>