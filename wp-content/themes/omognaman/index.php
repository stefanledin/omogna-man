<?php get_header(); ?>

    <div class="site-wrapper">
        <div class="page">
            <header class="site-header">
                <img class="site-logo" src="<?php echo asset('img/logga_1x.png');?>" srcset="<?php  echo asset('img/logga_1x.png') . ' 768w, ' . asset('img/logga_2x.png');?> 1400w" sizes="768px" alt="Omogna män">
            </header>
            <main>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="episode">
                    <div class="episode__inner">
                        <header class="episode__header">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <figure class="episode__image">
                                    <?php the_post_thumbnail(); ?>
                                </figure>
                            <?php endif; ?>
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
                        <?php if ( $audio_file = get_post_meta( $post->ID, 'audio_file', true ) ) : ?>
                            <audio src="<?php echo $audio_file; ?>" controls="controls" preload="none" class="episode__player">
                                Moget
                            </audio>
                        <?php endif; ?>
                        <div class="episode__description">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; endif; ?>
            </main>
        </div>
    </div>

<?php get_footer(); ?>