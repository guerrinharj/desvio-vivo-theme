
<?php
/**
 * The template for displaying all pages
 * Template Name: PageLivro
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Desvio_Vivo_Theme
 */

get_header();
?>

	<div class="livro">

	<?php 			
					$args = array(
						'category_name' => 'livro',
						'posts_per_page' => 2,
						'order' => 'ASC'
					);

					$loop = new WP_Query( $args ); 
					
					if ( $loop->have_posts() ) : 
						while ( $loop->have_posts() ) : $loop->the_post(); 
						get_template_part('template-parts/content-livro');
						endwhile; 
					endif; 
					?>	

	</div><

<?php
get_sidebar();
get_footer();
