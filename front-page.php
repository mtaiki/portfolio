<?php get_header(); ?>

        <section id="about" class="about">
            <div class="container">
                <div class="about-inner">
                    <h2 class="section-title">
                        <p>ABOUT</p>
                    </h2>
                    <div class="about-item">
                        <div class="about-prof wow fadeInLeft">
                            <p class="name">
                                <?php echo $cfs->get('about-name'); ?>
                            </p>
                            <ul class="prof-list">

                                <?php $fields1 = CFS()->get( 'about-loop' );
                                    if ($fields1):
                                    foreach ( $fields1 as $fields ):
                                ?>

                                <li class="list-item">
                                    <?php echo $fields['about-career']; ?>
                                </li>

                                <?php 
                                    endforeach;
                                    endif;
                                ?><!-- ループ終わり -->

                            </ul>
                            <p class="prof-text">
                                <?php echo $cfs->get('about-textarea'); ?>
                            </p>
                        </div>
                        <div class="about-img wow fadeInRight">
                            <img src="<?php echo $cfs->get('about-img'); ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="skill" class="skill">
            <div class="container">
                <div class="skill-inner">
                    <h2 class="section-title">
                        <p>SKILL</p>
                    </h2>
                    <div class="skill-detail wow fadeInUp">
                        <div class="skill-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="skill-item-icon">
                                <i class="fa-brands fa-html5 html"></i>
                                <i class="fa-brands fa-css3-alt css"></i>
                            </div>
                            <div class="skill-item-text">
                                <h3 class="skill-item-title">
                                    HTML5 / CSS3
                                </h3>
                                <p>
                                    ランディングページ、複数ページのサイトをデザインデータからレスポンシブ対応で正確かつ忠実なコーディングが可能です。
                                </p>
                            </div>
                        </div>
                        <div class="skill-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="skill-item-icon">
                                <i class="fa-brands fa-sass sass"></i>
                            </div>
                            <div class="skill-item-text">
                                <h3 class="skill-item-title">
                                    SASS(SCSS)
                                </h3>
                                <p>
                                    Sass(Scss)での変数、入れ子、メディアクエリの指定を使用してCSSの記述が可能です。
                                </p>
                            </div>
                        </div>
                        <div class="skill-item wow fadeInUp" data-wow-delay="0.6s">
                            <div class="skill-item-icon">
                                <i class="fa-brands fa-js js"></i>
                            </div>
                            <div class="skill-item-text">
                                <h3 class="skill-item-title">
                                    JavaScript
                                </h3>
                                <p>
                                    基本的な文法、基礎知識はで学習済みです。
                                    jQueryでのスライダー、ハンバーガーメニューなどの実装が可能です。
                                </p>
                            </div>
                        </div>
                        <div class="skill-item wow fadeInUp" data-wow-delay="0.2s">
                            <div class="skill-item-icon">
                                <i class="fa-brands fa-wordpress wp"></i>
                            </div>
                            <div class="skill-item-text">
                                <h3 class="skill-item-title">
                                    WordPress
                                </h3>
                                <p>
                                    静的HTMLサイトのWordPress化、プラグインを使用したお問い合わせフォームの設置や、カスタム投稿、カスタムフィールドの設定が可能です。
                                </p>
                            </div>
                        </div>
                        <div class="skill-item wow fadeInUp" data-wow-delay="0.4s">
                            <div class="skill-item-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/image/icon-photoshop.png" alt="photoshopアイコン"/>
                                <img src="<?php echo get_template_directory_uri(); ?>/image/icon-xd.png" alt="xdアイコン">
                                <i class="fa-brands fa-figma figma"></i>
                            </div>
                            <div class="skill-item-text">
                                <h3 class="skill-item-title">
                                    Photoshop / XD / figma
                                </h3>
                                <p>
                                    Photoshop、XD、figmaの基本的な操作方法は習得済みです。
                                    上記のデザインデータからのコーディング経験があります。
                                </p>
                            </div>
                        </div>
                        <div class="skill-item wow fadeInUp" data-wow-delay="0.6s">
                            <div class="skill-item-icon">
                                <i class="fa-brands fa-gulp gulp"></i>
                            </div>
                            <div class="skill-item-text">
                                <h3 class="skill-item-title">
                                    Gulp
                                </h3>
                                <p>
                                    Gulpの環境構築、Sassのコンパイル、CSSやJavaScriptファイルの圧縮、HTMLの整形が可能です。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="works" class="works">
            <div class="container">
                <div class="works-inner">
                    <h2 class="section-title">
                        <p>WORKS</p>
                    </h2>
                    <div class="works-item-wrap wow fadeInUp">

                        <!-- カスタム投稿の一覧表示 -->
                        <?php
                            $args = array(
                            'post_type' => 'works', // 投稿タイプを指定
                            'posts_per_page' => 6, // 表示する記事数
                            'order' => 'DESC',     
                            );
                            $the_query = new WP_Query( $args );
                        ?>

                        <div class="slider">

                        <?php 
                            if ( $the_query->have_posts() ): 
                            while ( $the_query->have_posts() ): $the_query->the_post(); 
                        ?>

                            <a href="<?php the_permalink(); ?>" class="works-item-link">
                                <div class="hover-bg"></div>
                                <div class="works-item-img">
                                    <img src="<?php echo $cfs->get('works-img'); ?>" alt="">
                                </div>
                                <h3 class="site-title">
                                    <?php the_title(); ?>
                                </h3>
                            </a>

                        <?php 
                            endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>

                        </div>
                    </div>
                    <div class="btn">
                        <a href="/works/" class="btn-link">
                            <span>
                                制作物一覧
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container">
                <div class="contact-inner">
                    <h2 class="section-title">
                        <p>CONTACT</p>
                    </h2>
                    <div class="contact-form wow fadeInUp">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>