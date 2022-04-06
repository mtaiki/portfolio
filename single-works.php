<?php get_header(); ?>

        <section class="single-works">
            <div class="container">
                <div class="single-works-inner">
                    <div class="works-img wow fadeInUp">
                        <img src="<?php echo $cfs->get('works-img'); ?>" alt="">
                    </div>
                    <div class="works-content wow fadeInUp">
                        <div class="works-content-title">
                            <h2 class="works-site-name">
                                <?php the_title(); ?>
                            </h2>
                            <div class="works-link-pass">
                                <p class="works-link-pass">
                                    <?php echo $cfs->get('works-pass'); ?>
                                </p>
                                <?php echo $cfs->get('works-link'); ?>
                            </div>
                        </div>
                        <div class="works-detail-item">
                            <h3 class="works-detail">
                                担当範囲
                            </h3>
                            <p class="works-detail-text">
                                <?php echo $cfs->get('works-text1'); ?>
                            </p>
                        </div>
                        <div class="works-detail-item">
                            <h3 class="works-detail">
                                制作期間
                            </h3>
                            <p class="works-detail-text">
                                <?php echo $cfs->get('works-text2'); ?>
                            </p>
                        </div>
                        <div class="works-detail-item">
                            <h3 class="works-detail">
                                使用言語
                            </h3>
                            <p class="works-detail-text">
                                <?php echo $cfs->get('works-text3'); ?>
                            </p>
                        </div>
                        <div class="works-detail-item">
                            <h3 class="works-detail">
                                使用ツール
                            </h3>
                            <p class="works-detail-text">
                                <?php echo $cfs->get('works-text4'); ?>
                            </p>
                        </div>
                        <div class="works-detail-item">
                            <h3 class="works-detail">
                                制作概要
                            </h3>
                            <p class="works-detail-text">
                                <?php echo $cfs->get('works-textarea'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="single-works-btn btn">
                        <a href="/works/" class="btn-link">
                            <span>
                                制作物一覧
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

<?php get_footer(); ?>