<?php get_header(); // Gets header.php ?>

	<section class="main">
		
		<div class="custom">
			<?php 
			$args = array('pagename' => 'page-5');
			$custom_query = new WP_Query($args); // exclude category 9
			while($custom_query->have_posts()) : $custom_query->the_post(); ?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php the_content(); ?>
				</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); // reset the query ?>
		</div>
		
		<?php global $query_string; // required
		$posts = query_posts($query_string.'&order=ASC&orderby=title'); // exclude category 9 ?>
		
		<?php if(have_posts()) : while(have_posts()) : the_post(); // This is where the WordPress Loop starts ?>

		<article>
			<p class="post-date"><?php the_date(); ?></p>
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<?php the_excerpt(); // This gets the post content, making sense yet? ?>

		</article>

		<?php endwhile; endif; // This is where the WordPress Loop ends ?>

	</section>

<?php get_footer(); // Gets footer.php ?>