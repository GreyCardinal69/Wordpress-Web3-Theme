<?php get_header();?>
<?php the_post(); ?>
<div class="row h-100">
	<div class="col-lg-8 DarkDef">
		<article class="mb-5 mt-5 pt-5">
					<div class="PostCategory">
						<?php 
						$categories = get_the_category();
						foreach ($categories as $key => $value) {
							$link = get_category_link($value->term_id);
							echo "<a href='$link'>".$value->name."</a>";
						}?>
					</div>
					<div class="Title">
						<h1>
							<a href="<?php the_permalink();?>">
								<?php the_title();?>
							</a>
						</h1>
					</div>
					<?php 
					if ( has_post_thumbnail() ){
						echo '<div class="PostCategory d-flex mb-3">';
					}else{
						echo '<div class="PostCategory d-flex">';
					}?>
					<a class="SmallText" href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>">
						<?php the_author(); ?>
					</a>
					<p class="WhitCloudText SmallText">&emsp;&emsp;•&emsp;&emsp;</p>
					<a href="<?php 
					$archive_year  = get_the_time('Y');
					$archive_month = get_the_time('m');
					echo get_month_link( $archive_year, $archive_month ); ?>">
						<p>
							<?php the_time("F j, Y g:i a");?>
						</p>	
					</a>
				</div>
				<div class="post-thumbnail img-fluid">
					<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']) ?>
				</div>
				<?php 
				if (has_post_thumbnail()){
					echo '<div class="FloralText mt-5">';
				}else{
					echo '<div class="FloralText">';
				}?>
				<h5 class="FloralText">
					<?php the_content();?>
				</h5>
			</div>
			<?php $tags = get_tags(); ?>
			<div class="Tag">
				<?php foreach ( $tags as $tag ) { ?>
					<a href="<?php echo get_tag_link( $tag->term_id ); ?> " rel="tag"><?php echo $tag->name; ?></a>
				<?php } ?>
			</div>
		</article>
		<div class="Division">
			<?php comments_template(); ?> 
		</div>
		<div class="LastUserPosts">
			<?php LastThreeAuthorPosts(); ?>
		</div>
	</div>
	<div class="col-lg-4 mt-5">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();?>