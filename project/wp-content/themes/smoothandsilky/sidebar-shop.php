<aside id="sidebar" class="cf">
	<?php if(is_tax()): ?>
	<section class="widget">
		<a class="button" href="<?php echo get_post_type_archive_link('product'); ?>">Clear Filter</a>
	</section>
	<?php endif; ?>

	<section class="widget">
		<h3 class="widget-title">Filter by Brand</h3>
		<ul>
			<?php
				wp_list_categories(array(
					'taxonomy'			=>	'brand',
					'title_li'			=>	'',
					'show_count'		=>	true,
				));
			?>
		</ul>
	</section>
</aside>