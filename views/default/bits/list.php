<?php
if(count($this->list['categories']) > 0){
	 ?>
<div class="category-list-header">Categories</div>
<?php } ?>
<div class="category-list">
	<?php
		foreach ($this->list['categories'] as $post) { ?>
		<div data-id="<?=$post->getId() ?>" class="category">
			<div class="category-info">
				<div class="category-title"><?=$post->getTitle(); ?></div>
				<div class="category-description"><?=$post->getText(); ?></div>
			</div>
			<div class="category-meta">
				<div class="category-author"><?=$post->getCreator()->getLink(); ?></div>
				<div class="category-created"><?=$post->getCreated() ?></div>
			</div>
		</div>
	</div>
<?php }
if(count($this->list['posts']) > 0){?>
<div class="category-list-header">Posts</div>
<div class="category-list">
	<?php
	if(count($this->list['posts']) > 0){
		foreach ($this->list['posts'] as $post) { ?>
		<div data-id="<?=$post->getId() ?>" class="category">
			<div class="category-text">
				<div class="category-title"><?=$post->getTitle(); ?></div>
				<div class="category-description"><?=$post->getText(); ?></div>
			</div>
			<div class="category-meta">
				<div class="category-author"><?=$post->getCreator()->getLink(); ?></div>
				<div class="category-created"><?=$post->getCreated() ?></div>
			</div>
		</div>
		<?php } 
	} ?>
</div>
<?php } ?>