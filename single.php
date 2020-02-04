<?php get_header(); // Gets header.php ?>

	<section class="main">

		<?php if(have_posts()) : while(have_posts()) : the_post(); // This is where the WordPress Loop starts ?>

		<article>
			<p class="post-date"><?php the_date(); ?></p>
			<h1><?php the_title(); ?></h1>
			<p class="mood"><?php the_field('my_mood'); ?></p>
			<?php the_content(); // This gets the post content, making sense yet? ?>

		</article>

		<?php endwhile; endif; // This is where the WordPress Loop ends ?>

	</section>

<?php get_footer(); // Gets footer.php ?>