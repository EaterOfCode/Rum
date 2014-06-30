<div class="post-list">
	<?php
	if(count($this->posts) > 0){
		foreach ($this->posts as $post) { 
			if($post->isCategory()) continue; ?>
		<div id="post-<?=$post->getId() ?>" class="post <?=($post->isCategory()?'post-sticky':'')?>">
			<div class="post-text">
				<?=$this->parsedown->text($post->post); ?>
			</div>
			<div class="post-meta">
				<div class="post-author"><?=$post->getCreator()->getLink(); ?></div>
				<div class="post-created"><?=$post->getCreated() ?></div>
			</div>
		</div>
		<?php }
	}else{ ?>
		<div class="post-list-empty">No posts in this category</div>
	<?php } ?>
</div>