<div class="row sliderApo">
	<div class="container-slideApo">
		<ul class="list-slideApo">
		<?php foreach ( $recent_posts as $post ): ?>
            <?php $imagePost = get_the_post_thumbnail($post["ID"], array(150, 150), array( 'class' => 'col-md-12 col-centered' ) ); ?>
            <?php if (empty($imagePost)):
                $imagePost = plugins_url('default.jpg', __FILE__);
            endif; ?>
            <?php $titlePost = $post["post_title"]; ?>
            <?php $cutTitle = Core_LSlide::substrwords($titlePost, 10); ?>
            <?php $hrefPost = get_permalink($post["ID"]); ?>
			<?php $first = ''; ?>
			<?php if ($post === reset($recent_posts)): ?>
				<?php $first = "current"; ?>
			<?php endif; ?>
			<?php if ($count === 0):?>
				<li class="list-item-sliderApo <?php echo 'list'.$numlist.' '.$first?>">
			<?php endif; ?>
					<div class="content-item">
						<h2 class="item-title">
                            <a title="<?= $titlePost ?>" href="<?= $hrefPost ?>"> <?= $cutTitle ?> </a>
                        </h2>
                        <a href="<?= $hrefPost ?>" class="content-item-list">
    						<div class="item-list item-image1 animated flipInX">
    							<img title="<?= $titlePost ?>" src="<?= $imagePost ?>" >
    						</div>
    						<div class="item-list item-image2 animated flipInY">
    							<img title="<?= $titlePost ?>" src="<?= $imagePost ?>" >
    						</div>
    						<div class="item-list item-image3 animated flipInX">
    							<img title="<?= $titlePost ?>" src="<?= $imagePost ?>" >
    						</div>
                        </a>
					</div>
			<?php if ($count === $maxcount || $post === end($recent_posts)):?>
				</li>
				<?php $count = 0; ?>
                <?php $numlist++; ?>
			<?php else: ?>
				<?php $count++; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>
        <div class="arrowAction">
            <span class="arrow-slide arrow-left">
                <img src="<?php echo plugins_url('img/arrowL.png', __FILE__); ?>" alt="">
            </span>
            <span class="arrow-slide arrow-right">
                <img src="<?php echo plugins_url('img/arrowR.png', __FILE__); ?>" alt="">
            </span>
        </div>
	</div>
</div>
