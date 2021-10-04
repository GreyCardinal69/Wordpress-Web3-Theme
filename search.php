<?php get_header();?>
<div class="row h-100">
	<div class="col-lg-8 DarkDef">
		<?php
		$s=get_search_query();
		$args = array(
			's' =>$s
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {
			_e("<h1 class='mt-5 pt-5 WhitCloudText'>Search Results for: ".get_query_var('s')."</h1>");
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				get_template_part('PostShow');
			}
		}else{
			?>
			<h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
			<div class="alert alert-info">
				<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
			</div>
		<?php } ?>
	</div>
	<div class="col-lg-4 mt-5">
		<?php get_sidebar(); ?>
	</div>
</div>
</div>
<?php get_footer();?>