<?php get_header(); ?>

    <div class="site-wrapper">
        <div class="page">
            <header class="site-header">
                <h1 class="site-title">Lorem ipsum</h1>
            </header>
            <main>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="episode">
                    <figure class="episode__image">
                        <img src="http://placehold.it/400x400">
                    </figure>
                    <div class="episode__description">
                        <div class="episode__description__inner">
                            <header class="episode__header">
                                <h2 class="episode__title"><?php the_title();?></h2>
                                <div class="episode__metadata">
                                    <span class="episode__duration"><?php echo 'Längd: ' . get_post_meta( $post->ID, 'duration', true ) . ' min.';?></span>
                                    <span class="episode__published">
                                        <?php
                                        $date_recorded = get_post_meta( $post->ID, 'date_recorded', true );
                                        echo 'Publicerat: ' . date('Y-m-d', strtotime($date_recorded) );
                                        ?>
                                    </span>
                                </div>
                            </header>
                            <audio src="<?php echo get_post_meta( $post->ID, 'audio_file', true ); ?>" controls="controls" class="episode__player">
                                Moget
                            </audio>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; endif; ?>
            </main>
        </div>
    </div>

<?php get_footer(); ?>