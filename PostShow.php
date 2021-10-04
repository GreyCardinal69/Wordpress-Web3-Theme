		<article class="mb-5 mt-5 pt-5 BottomBorder">
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
					<a class="LinkPMajor" href="<?php
					$archive_year  = get_the_time('Y');
					$archive_month = get_the_time('m');
					echo get_month_link( $archive_year, $archive_month ); ?>">
						<p>
							<?php the_time("F j, Y g:i a");?>
						</p>	
					</a>
				</div>
				<div class="post-thumbnail zoom img-fluid">
					<a href="<?php the_permalink();?>">
						<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']) ?>
					</a>
				</div>
				<?php 
				if ( has_post_thumbnail() ){
					echo '<div class="FloralText mt-5">';
				}else{
					echo '<div class="FloralText">';
				}?>
				<h5>
					<?php
					$my_excerpt = get_the_excerpt();
					if($my_excerpt !='') {
						the_excerpt();
					}else{
						the_content();
					}?>
					<button type="button" class="btn mb-5 ReadMoreBorder btn-secondary btn-lg ReadMore DarkDef ">
						<a href="<?php the_permalink();?>">
							Read More&raquo
						</a>
					</button>
				</h5>
			</div>
		</article>