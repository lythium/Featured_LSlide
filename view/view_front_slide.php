<?php
$args = array( 	'numberposts' => $settings_LSlide,
'orderby' => 'post_date',
'post_status' => 'publish',
'order' => 'ASC' );
$recent_posts = wp_get_recent_posts( $args );
$count = 0;

 ?>
<div class="row sliderApo">
	<div class="container-slideApo">
		<ul class="list-slideApo">
		<?php foreach ( $recent_posts as $post ): ?>
            <?php $imagePost = get_the_post_thumbnail($post["ID"], array(150, 150), array( 'class' => 'col-md-12 col-centered' ) ); ?>
            <?php if (empty($imagePost)):
                $imagePost = '/default.jpg';
            endif; ?>
            <?php $titlePost = $post["post_title"]; ?>
            <?php $hrefPost = get_permalink($post["ID"]); ?>
			<?php $first = ''; ?>
			<?php if ($post === reset($recent_posts)): ?>
				<?php $first = "current"; ?>
			<?php endif; ?>
			<?php if ($count === 0):?>
				<li class="list-item-sliderApo <?php echo 'list'.$count.' '.$first?>">
			<?php endif; ?>
					<div class="content-item">
						<h3>
                            <a href="<?= $hrefPost ?>"> <?= $titlePost ?> </a>
                        </h3>
						<div class="item-list item-image1 animated flipInX">
							<img src="<?= $imagePost ?>" >
						</div>
						<div class="item-list item-image2 animated flipInY">
							<img src="<?= $imagePost ?>" >
						</div>
						<div class="item-list item-image3 animated flipInX">
							<img src="<?= $imagePost ?>" >
						</div>
					</div>
			<?php if ($count === 2 || $post === end($recent_posts)):?>
				</li>
				<?php $count = 0; ?>
			<?php else: ?>
				<?php $count++; ?>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	</div>
	<div class="btn">
		<button type="button" name="button">Test</button>
	</div>
</div>
