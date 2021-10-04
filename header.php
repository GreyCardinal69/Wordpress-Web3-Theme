<!DOCTYPE html>
<html style="height:100%">
<head>
	<title><?php bloginfo('name');?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Baskervville&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="height:100%">
	<header>
		<div class="container-fluid DarkestNav">
			<div class="row">
				<div class="d-flex align-items-center">
					<div class="col-md-2 DarkestNav d-flex justify-content-center NoLinkDec align-items-center">
						<h2 class="text-center mt-4">
							<a href="<?php echo home_url(); ?>">
								<?php bloginfo('name'); ?>
							</a>
							<p class="DescriptionMain d-none d-sm-block"><?php bloginfo('description') ?></p>			
						</h2>
					</div>
					<div class="col-9">
						<nav class="navbar navbar-expand text-responsive">
							<div class="container">
								<div class="collapse navbar-collapse d-flex justify-content-end" id="navbarResponsive">
									<ul class="navbar-nav Lier d-flex">
										<li<?php if ( is_home() ) { echo ' class="current_page_item"'; } ?>><a href="<?php echo get_option('home'); ?>"><span>Home</span></a>
										</li>
										<?php wp_list_pages('depth=1&title_li'); ?>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 d-flex justify-content-center align-items-center PinkText WhitCloudText h-5" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/6154b9e0ba907.jpg);   
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover; min-height: 400px;">
			<h1 class="PinkText">
				<?php 
				if (is_home()) {
					echo 'Home';
				}else{
					wp_title('');
				}?>	
			</h1>
		</div>
	</div>
</div>
<div class="container" style="height:100%" id="wrap">