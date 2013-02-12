<?php get_header(); ?>

    <div id="content">
        <?php $post = $posts[0]; ?>
		<?php if (is_category()) : ?>
			<h3 class="archive"><?php single_cat_title(); ?></h3>
 	  	<?php elseif (is_day()) : ?>
			<h3 class="archive"><?php printf('Daily Archives: <span>%s</span>', get_the_date() ); ?></h3>
 	 	<?php elseif (is_month()) : ?>
			<h3 class="archive"><?php printf('Monthly Archives: <span>%s</span>', get_the_date( 'F Y' ) ); ?></h3>
 	  	<?php elseif (is_year()) : ?>
			<h3 class="archive"><?php printf('Yearly Archives: <span>%s</span>', get_the_date( 'Y' ) ); ?></h3>
 	  	<?php elseif( is_tag() ) : ?>
			<h3 class="archive"><?php single_tag_title(); ?></h3>
 	  	<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
			<h3 class="archive">Blog Archives</h3>
 	  	<?php endif; ?>
        
        <?php if (have_posts()) : ?>
        	<?php while (have_posts()) : the_post(); ?>
        		<div class="post hentry" id="post-<?php the_ID(); ?>">
        		    <div class="entry-title">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( array('before' => 'Permalink to: ', 'after' => '')); ?>"><?php the_title(); ?></a></h2>
                    </div>
                    <div class="postdata">
                        <span class="vcard">Posted by <span class="fn"><?php the_author() ?></span></span>
                        <span class="published posted_date" title="<?php the_time('Y-m-d H:i:sP') ?>">on <?php the_time('F d, Y') ?></span>
                        <br/>
                        <?php the_category(', ') ?> /
                        <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                    </div>
                    <div class="entry-content"><?php the_content('Continue reading...'); ?></div>
                    <?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>
        		</div>
        	<?php endwhile; ?>
        	<div class="navigation">
        		<span class="alignleft"><?php next_posts_link('&laquo; Previous Page') ?></span>
        		<span class="alignright"><?php previous_posts_link('Next Page &raquo;') ?></span>
        	</div>
    	<?php else : ?>
    		<h2>Not Found</h2>
    		<p>Sorry, but you are looking for something that isn't here.</p>
    	<?php endif; ?>
    </div>
<?php get_footer(); ?>

