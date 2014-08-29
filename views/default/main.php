<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?=$this->baseUrl?>/css/main.css">
  <script src="<?=$this->baseUrl?>/js/jquery.js"></script>
  <script src="<?=$this->baseUrl?>/js/main.js"></script>
  <title>
    <?=$this->title . ' | ' . $this->cfgVars['name']; ?>
  </title>
</head>

<body>
  <div class="header">
    <div class="header-middle">
      <a href="<?=$this->baseUrl?>" class="title"><?=$this->cfgVars['name']; ?> <small><?=$this->cfgVars['description']; ?></small></a>

      <div class="user">
        <?php if($this->user === false){ ?>
        <input type="text" placeholder="Username..." class="username">
        <input type="password" placeholder="Password..." class="password">
        <span class="login">
            Login
        </span>
        <?php }else{ ?>
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
