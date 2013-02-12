<?php get_header(); ?>
    <div id="content">
        <?php if (have_posts()) : ?>
        	<?php while (have_posts()) : the_post(); ?>
        		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="entry-title">
                        <?php if (get_the_title()) : ?>
                            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => 'Permalink to: ', 'after' => '')); ?>"><?php the_title(); ?></a></h2>
                        <?php else:?>
                            <h2><a href="<?php the_permalink() ?>" rel="nofollow">Permalink</a></h2>
                        <?php endif; ?>
                    </div>
                    <div class="postdata">
                        <span class="vcard">Posted by <span class="fn"><?php the_author() ?></span></span>
                        <span class="published posted_date" title="<?php the_time('Y-m-d H:i:sP') ?>">on <?php the_time('F d, Y') ?></span>
                        <br/>
                        <?php the_category(', ') ?> /
                        <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                    </div>
                    <div class="entry-content"><?php the_post_thumbnail() ?><?php the_content('Continue reading...'); ?></div>
                    <?php wp_link_pages() ?>
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
