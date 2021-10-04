<?php
register_nav_menus(array(
	'primary'=>__('Primary Menu'),
	'footer'=>__('Footer Menu')
));

function custom_excerpt_length(){
	return 64;
}

function custom_theme_setup(){
	add_image_size('small-thumbnail', 600, 420, true);
	add_image_size('banner-image', 2000, 2000, array('left', 'top'));
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	add_theme_support('post-thumbnails');
}

function widgetsInit(){
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => 'Sidebar',
		'before_widget' => '<div class="card mt-5 SideBarPlug"><div class="card-body d-flex align-items-center">',
		'after_widget' => '</div></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}

function Backgr(){
	$defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
	);
}

function connect_resources(){
  wp_enqueue_style('style', get_template_directory_uri().'/style.css');
}

function LastThreeAuthorPosts(){
	global $authordata;
	$author_3_posts = new WP_Query(array(
		"author" => $authordata->ID,
		"posts_per_page" => 3
	));
	$Authorname = get_the_author();
	if ($author_3_posts->have_posts()) {
		echo "<h1>Last Posts by ".$Authorname."</h1>";
		echo "<ul class='LastPostList'>";
		while ($author_3_posts->have_posts()) {
			$author_3_posts->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</li>
			<?php
		}
		echo "</ul>";
	}
}

add_theme_support( 'custom-background', $defaults );
add_filter('excerpt_length', 'custom_excerpt_length');
add_action('widgets_init', 'widgetsInit');
add_action('after_setup_theme','custom_theme_setup');
add_action("wp_enqueue_scripts", "connect_resources");
?>