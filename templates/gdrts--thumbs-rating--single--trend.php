<?php // GDRTS Template: Trend // ?>

<div class="<?php gdrts_loop()->render()->classes(); ?>">
    <div class="gdrts-inner-wrapper">

		<?php do_action( 'gdrts-template-rating-block-before' ); ?>

		<?php

		$_cr = new gdrts_trend_render_single_thumbs_rating();
		$_cr->thumbs();

		?>

		<?php

		gdrts_loop()->json();

		do_action( 'gdrts-template-rating-block-after' );
		do_action( 'gdrts-template-rating-rich-snippet' );

		?>

    </div>
</div>