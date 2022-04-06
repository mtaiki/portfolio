<?php get_header(); ?>

        <section class="page-works">
            <div class="container">
                <div class="page-works-inner">
                    <?php
                        if ( have_posts() ) :
                    ?>
                    <div class="works-item-wrap">
                        <?php
                            while ( have_posts() ) :
                            the_post();
                        ?>
                        <a href="<?php the_permalink(); ?>" class="works-item wow fadeInUp" data-wow-delay="0.3s">
                            <div class="hover-bg"></div>
                            <div class="works-item-img">
                               <img src="<?php echo $cfs->get('works-img'); ?>" alt="">
                            </div>
                            <h3 class="site-title"><?php the_title(); ?></h3>
                        </a>
                        <?php
                        endwhile;
                        ?>
                    </div>                          
                        <?php if ( paginate_links() ) : ?>
                        <!-- pagenation -->
                        <div class="pagenation">
                            <?php
                            echo wp_kses_post(
                            paginate_links(
                                array(
                                'end_size'  => 0,
                                'mid_size'  => 1,
                                'prev_next' => true,
                                'prev_text' => '<i class="fas fa-angle-left"></i>',
                                'next_text' => '<i class="fas fa-angle-right"></i>',
                                )
                            )
                            );
                            ?>
                        </div><!-- /.pagenation -->
                        <?php endif; ?>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="page-works-btn btn">
                    <a href="/top/" class="btn-link">
                        <span>
                            トップに戻る
                        </span>
                    </a>
                </div>
            </div>
        </section>

    </main>

<?php get_footer(); ?>