<?php 
get_header();?>
<div class="row h-100">
	<div class="col-lg-8 DarkDef">
		<?php
		if(have_posts()){
			while(have_posts()){
				the_post();
				get_template_part('PostShow');
			}
		}
		else{
			echo "No content found";
		}?>
	</div>
	<!-- Side Bar and widgets -->
	<div class="col-lg-4 mt-5">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();?>