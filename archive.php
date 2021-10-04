<?php get_header();?>
<div class="row h-100">
	<div class="col-lg-8 DarkDef">
		<?php 
		if ( is_category() ) {
			echo '<h1 class="mt-5 pt-5 WhitCloudText"> Showing posts with category: '.get_the_category( $id )[0]->name.'</h1>';
			global $post;
			$args = array( 'numberposts' => 10, 'category_name' => get_the_category( $id )[0]->name );
			$posts = get_posts( $args );
			foreach( $posts as $post ): setup_postdata($post);
				get_template_part('PostShow');
			endforeach;
		}elseif ( is_tag() ) {
			$current_tag = single_tag_title( "", false );
			$the_query = new WP_Query( 'tag='.$current_tag );
			if ( $the_query->have_posts() ) {
				echo '<h1 class="mt-5 pt-5 WhitCloudText"> Showing posts with tag: '.$current_tag.'</h1>';
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					get_template_part('PostShow');
				}
			} else {
				echo 'No posts found with the specified category: '.$current_tag;
			}
			wp_reset_postdata();
		}elseif ( is_author() ) {
			$args = array(
				'author'        =>  $current_user->ID, 
				'orderby'       =>  'post_date',
				'order'         =>  'ASC',
				'posts_per_page' => -1);
			$posts = get_posts( $args );
			echo '<h1 class="mt-5 pt-5 WhitCloudText"> Showing posts from user: '.get_the_author().'</h1>';
			foreach( $posts as $post ): setup_postdata($post);
				get_template_part('PostShow');
			endforeach;
		}elseif ( is_month() ) {
			echo '<h1 class="mt-5 pt-5 WhitCloudText"> Showing posts of: '.get_the_date("F Y").'</h1>';
			$args = array(
				'posts_per_page'  => 5,
				'post_type'       => 'post',
				'post_status'     => 'publish',
				'date_query' => array(
					'month' => get_the_date("m") 
				),
				'suppress_filters' => false
			);
			$posts = get_posts($args);
			foreach( $posts as $post ): setup_postdata($post);
				get_template_part('PostShow');
			endforeach;
		}else{
			single_cat_title();
		}?>
	</div>
	<div class="col-lg-4 mt-5">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();?>