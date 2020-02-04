<?php get_header(); // Gets header.php ?>

	<section class="main">

		<?php if(have_posts()) : while(have_posts()) : the_post(); // This is where the WordPress Loop starts ?>

		<article>
			<h1>THIS IS A PAGE TEMPLATE</h1>
			<h1><?php the_title(); // This gets the post title ?></h1>
			<?php the_content(); // This gets the post content, making sense yet? ?>

		</article>

		<?php endwhile; endif; // This is where the WordPress Loop ends ?>

	</section>

<?php get_footer(); // Gets footer.php ?>