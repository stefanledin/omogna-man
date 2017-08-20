<?php get_header(); ?>

    <div class="site-wrapper">
        <div class="page">
            <header class="site-header">
                <img class="site-logo" src="<?php echo asset('img/logga_1x.png');?>" srcset="<?php  echo asset('img/logga_1x.png') . ' 768w, ' . asset('img/logga_2x.png');?> 1400w" sizes="768px" alt="Omogna män">
                <div class="site-description">
                    <p>En podcast där Mats och Stefan diskuterar allt från kända mord till att bajsa på jobbet. Däremellan sidospår om kvinnor, fyllor och politik. Kryddat med interna skämt och Seinfeld-referenser.</p>
                </div>
                <div class="site-slogan">
                    <h2>Lyssna ansvarsfullt!</h2>
                </div>
                <div>
                    <div class="media-logos">

                        <div class="media-logos__item">
                            <a href="https://itunes.apple.com/se/podcast/omogna-m%C3%A4n/id1265025746?mt=2" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6.043 17.496l-1.483 1.505c-2.79-2.201-4.56-5.413-4.56-9.001s1.77-6.8 4.561-9l1.483 1.504c-2.327 1.835-3.805 4.512-3.805 7.496s1.478 5.661 3.804 7.496zm8.957-7.496c0-1.657-1.344-3-3-3s-3 1.343-3 3c0 1.304.838 2.403 2 2.816v10.184h2v-10.184c1.162-.413 2-1.512 2-2.816zm-8.282 0c0-1.791.887-3.398 2.282-4.498l-1.481-1.502c-1.86 1.467-3.04 3.608-3.04 6s1.18 4.533 3.04 6l1.481-1.502c-1.396-1.1-2.282-2.707-2.282-4.498zm12.722-9l-1.483 1.504c2.326 1.835 3.804 4.512 3.804 7.496s-1.478 5.661-3.804 7.496l1.483 1.505c2.79-2.201 4.56-5.413 4.56-9.001s-1.77-6.8-4.56-9zm-2.959 3l-1.481 1.502c1.396 1.101 2.282 2.707 2.282 4.498s-.886 3.398-2.282 4.498l1.481 1.502c1.86-1.467 3.04-3.608 3.04-6s-1.179-4.533-3.04-6z"/></svg>
                                <span>Apple Podcasts</span>
                            </a>
                        </div>

                        <div class="media-logos__item">
                            <a href="https://www.facebook.com/omognaman/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.35C0 23.408.593 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128v-2.67c0-3.1 1.893-4.79 4.66-4.79 1.324 0 2.462.1 2.794.144v3.24h-1.918c-1.504 0-1.795.716-1.795 1.764v2.313h3.588l-.467 3.622h-3.12V24h6.117c.73 0 1.323-.593 1.323-1.325V1.325C24 .593 23.407 0 22.675 0z"/></svg>
                                <span>Facebook</span>
                            </a>
                        </div>
                    
                        <div class="media-logos__item">
                            <a href="https://www.instagram.com/omognaman_podcast/" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21.23 0H2.77C1.24 0 0 1.24 0 2.77v18.46C0 22.76 1.24 24 2.77 24H21.23C22.762 24 24 22.76 24 21.23V2.77C24 1.24 22.76 0 21.23 0zM12 7.385c2.55 0 4.616 2.065 4.616 4.615 0 2.55-2.067 4.616-4.616 4.616S7.385 14.548 7.385 12c0-2.55 2.066-4.615 4.615-4.615zm9 12.693c0 .51-.413.922-.924.922H3.924c-.51 0-.924-.413-.924-.922V10h1.897c-.088.315-.153.64-.2.97-.05.338-.08.68-.08 1.03 0 4.08 3.305 7.385 7.383 7.385S19.384 16.08 19.384 12c0-.35-.03-.692-.08-1.028-.048-.33-.113-.656-.2-.97H21v10.076zm0-13.98c0 .51-.413.923-.924.923h-2.174c-.51 0-.923-.413-.923-.922V3.923c0-.51.41-.923.922-.923h2.174c.51 0 .924.413.924.923v2.175z" fill-rule="evenodd" clip-rule="evenodd"/></svg>
                                <span>Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>
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