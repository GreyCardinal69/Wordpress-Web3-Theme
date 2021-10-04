<?php get_header(); ?>
<div class="row h-100">
	<div class="col-lg-8 DarkDef mt-5 pt-5 PageMain">
		<?php if(have_posts()) : ?>
			<?php while(have_posts())  : the_post(); ?>                  
				<?php the_content(); ?>          
				<?php comments_template( '', true ); ?> 
			<?php endwhile; ?>                   
		<?php else : ?>                       
			<h3><?php _e('404 Error&#58; Not Found'); ?></h3>
		<?php endif; ?>
	</div>
	<div class="col-lg-4 mt-5">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>