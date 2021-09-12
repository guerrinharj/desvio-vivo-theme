<div class="hero-container"> 
	<div class="titulo">
	<?php 			
					$args = array(
						'category_name' => 'titulo',
						'posts_per_page' => 2,
						'order' => 'ASC'
					);

					$loop = new WP_Query( $args ); 
					
					if ( $loop->have_posts() ) : 
						while ( $loop->have_posts() ) : $loop->the_post(); 
						get_template_part('template-parts/content-titulo');
						endwhile; 
					endif; 
					?>	
	</div>

	<div class="sobre">
	<?php 			
					$args = array(
						'category_name' => 'sobre',
						'posts_per_page' => 2,
						'order' => 'ASC'
					);

					$loop = new WP_Query( $args ); 
					
					if ( $loop->have_posts() ) : 
						while ( $loop->have_posts() ) : $loop->the_post(); 
						get_template_part('template-parts/content-sobre');
						endwhile; 
					endif; 
					?>	

	</div>
</div>