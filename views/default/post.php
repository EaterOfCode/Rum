<div class="main-post">
  <?=$this->post->getPost()?>
</div>
<div class="reply-list">
  <?php foreach($this->replies as $reply){ ?>

  <div class="reply">
    
    <?=$reply->getPost();?>
  </div>

  <?php } ?>
</div>
