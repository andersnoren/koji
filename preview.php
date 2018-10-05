<article <?php post_class( 'preview preview-' . get_post_type() . ' do-spot' ); ?> id="post-<?php the_ID(); ?>">

	<div class="preview-wrapper">

		<a href="<?php the_permalink(); ?>" class="preview-image">

			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large' );
			} else {
				echo '<img class="fallback-image" src="' . koji_get_fallback_image_url() . '" />';
			}
			?>
			
		</a>

		<div class="preview-inner">

			<h3 class="preview-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

			<?php

			// Output the post meta
			koji_the_post_meta( $post->ID, 'preview' ); ?>

		</div><!-- .preview-inner -->

	</div><!-- .preview-wrapper -->

</article>
