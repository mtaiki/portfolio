<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Taiki Minoda｜ Portfolio</title>
        <?php wp_head(); ?>
    </head>
<body>
    <!-- ローディング -->
    <div id="loading">
    <div id="loading_box">
        <div class="loading-one animation_loading">
        <p class="loading-txt">Loading</p>
        </div>
    </div>
    </div>
    <header id="js-header" class="header">
        <div class="header-inner">
            <div href="#" class="header-logo">
                <a href="/top/">
                    <img src="<?php echo get_template_directory_uri(); ?>/image/logo.png" alt="Taiki Minoda Portfolio">
                </a>
            </div>
            <nav class="header-nav" id="js-header-nav">
            <?php if(is_front_page()): //トップページにのみ表示 ?>
                <ul class="header-list">
                    <li class="list-item"><a href="#">TOP</a></li>
                    <li class="list-item"><a href="#about">ABOUT</a></li>
                    <li class="list-item"><a href="#skill">SKILL</a></li>
                    <li class="list-item"><a href="#works">WORKS</a></li>
                    <li class="list-item"><a href="#contact">CONTACT</a></li>
                </ul>
            <?php else: ?>
                <ul class="header-list">
                    <li class="list-item"><a href="/top/">TOP</a></li>
                    <li class="list-item"><a href="/top/#about">ABOUT</a></li>
                    <li class="list-item"><a href="/top/#skill">SKILL</a></li>
                    <li class="list-item"><a href="/top/#works">WORKS</a></li>
                    <li class="list-item"><a href="/top/#contact">CONTACT</a></li>
                </ul>
            <?php endif; ?>
            </nav>
            <div class="burger-btn" id="js-header-btn">
                <span class="bars">
                    <span class="bar bar-top"></span>
                    <span class="bar bar-mid"></span>
                    <span class="bar bar-bottom"></span>
                </span>
            </div>
            <div id="js-burger-musk"></div>
        </div>
    </header>

    <main class="main">
        <div class="bg"></div>

        <?php if(is_front_page()): //トップページにのみ表示 ?>

        <section class="mv">
            <div class="mv-inner">
                <h1 class="mv-title">
                    <p class="wow fadeInUp">TAIKI MINODA</p>
                    <p class="wow fadeInUp">PORTFOLIO</p>
                </h1>
                <div class="scrolldown">
                    <span>Scroll</span>
                </div>
            </div>
            <div id="mv-background"></div>
        </section>

        <?php elseif ( is_post_type_archive( "works" ) ): //カスタム投稿のアーカイブページにのみ表示 ?>

        <section class="page-head">
            <h2 class="mv-title">
                <p class="title-en wow fadeInUp">WORKS</p>
                <p class="title-js wow fadeInUp">制作物一覧</p>
            </h2>
            <div id="mv-background"></div>
        </section>

        <?php elseif ( is_single() ): //投稿ページに表示 ?>

        <section class="page-head">
            <h2 class="mv-title">
                <p class="title-en wow fadeInUp">WORKS</p>
                <p class="title-js wow fadeInUp">制作物</p>
            </h2>
            <div id="mv-background"></div>
        </section>

        <?php endif; ?>