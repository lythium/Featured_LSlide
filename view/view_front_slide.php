<?php
$Image = "images/default.jpg";
$Article = array('Article1', 'Article2', 'Article3', 'Article4', 'Article5', 'Article6');
$count = 0;

 ?>
<div class="row sliderApo">
	<div class="container-slideApo">
		<ul class="list-slideApo">
		<?php foreach ( $Article as $post ): ?>
			<?php $first = ''; ?>
			<?php if ($post === reset($Article)): ?>
				<?php $first = "current"; ?>
			<?php endif; ?>
			<?php if ($count === 0):?>
				<li class="list-item-sliderApo <?php echo 'list'.$count.' '.$first?>">
			<?php endif; ?>
					<div class="content-item">
						<h5><?= $post ?></h5>
						<div class="item-list item-image1 animated flipInX">
							<img src="<?= $Image ?>" alt="">
						</div>
						<div class="item-list item-image2 animated flipInY">
							<img src="<?= $Image ?>" alt="">
						</div>
						<div class="item-list item-image3 animated flipInX">
							<img src="<?= $Image ?>" alt="">
						</div>
					</div>
			<?php if ($count === 2 || $post === end($Article)):?>
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
