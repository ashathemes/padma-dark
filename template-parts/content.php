<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Padma Dark
 */
if ( ! is_singular( ) ) : ?>
<div class="col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-post">
			<?php if ( has_post_thumbnail ()): ?>
				<?php padma_post_thumbnail(); ?>
			<?php endif; ?>
			<div class="post-content">
				<ul class="meta-list">
					<li><?php padma_posted_by(); ?></li>
					<li><?php padma_posted_on(); ?></li>
				</ul>
				<?php
				the_title( '<h3 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				the_excerpt(); ?>
				<?php
		        echo'<a class="button-one" href="'.esc_url ( get_the_permalink( $post->ID ) ).'"><span>'.esc_html__('Read More','padma-dark').'</span></a>'; 
		        ?>
			</div>
		</div>
	</article>
</div>
<?php else: ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php padma_post_thumbnail(); ?>
		<div class="post-content">
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );

				endif;

				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php 
							padma_posted_on();
							padma_posted_by(); 
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php

				if(is_single( )){
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'padma-dark' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
				}
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'padma-dark' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
			<?php if ( is_singular() ) : ?>
				<footer class="entry-footer">
					<?php padma_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>