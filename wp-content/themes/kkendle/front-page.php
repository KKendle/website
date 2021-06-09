<?php get_header('landing'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="l-row l-row__container l-flex__middle">

            <?php
            /**
             * ABOUT
             */
            ?>
            <div class="l-column l-column--1-2@handsWide-up">
                <div class="l-squish l-squeeze">
                    <h2>About</h2>
                    <p>I’m a front-end developer, primarily experienced with developing UI/UX. With over 6.5 years experience, I've architected Design Systems - both in Sketch and in code, documented Use Cases for the various components, and always took the initiative to improve team efficiency and reduce tech debt wherever possible.</p>
                    <p>I excel at writing semantic and accessible HTML, reusable and flexible Scss, testing and documenting accessibility concerns, and creating responsive designs that account for edge cases.</p>
                    <p>When I'm not working, you can find me playing or building PC games, scrolling until the end of time on Pinterest, or cuddled with my wife watching a movie (nearly always suggesting a sci-fi movie).</p>
                    <p>Find me on <a href="https://github.com/kkendle" target="_blank" rel="noopener noreferrer nofollow">Github</a> and <a href="https://linkedin.com/in/kevinkendle" target="_blank" rel="noopener noreferrer nofollow">LinkedIn</a> or <a href="https://kkendle.com/wp-content/uploads/2020/04/KKendle-Resume.pdf" target="_blank" rel="noopener noreferrer nofollow">view my resume (pdf, 75kb)</a>.</p>
                </div>
            </div>

            <?php
            /**
             * HIRE ME
             */
            ?>
            <div class="l-column l-column--1-2@handsWide-up">
                <div class="l-squish l-flex l-flex__center">
                    <div class="c-hire">
                        <h2 class="c-hire__title">I am currently available for hire.</h2>
                        <div class="c-button__container">
                            <a class="c-button c-button__2" href="#contact">Hire Me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        /**
         * SKILLS
         */
        ?>
        <div class="l-row l-row__container">
            <div class="l-column">
                <div class="l-squish--large">
                    <header class="l-squeeze">
                        <h2>What I can do</h2>
                    </header>

                    <div class="l-flex l-flex__wrap">
                        <div class="l-column l-column--1-2@handsWide-up">
                            <div class="l-squeeze _margin-bottom">
                                <h3>Front-end development</h3>
                                <p>I enjoy developing beautiful, high-quality websites.</p>
                                <div>Capabilities</div>
                                <ul class="c-list c-list__columns--2">
                                    <li class="c-list__item">Accessibility</li>
                                    <li class="c-list__item">CSS</li>
                                    <li class="c-list__item">Git</li>
                                    <li class="c-list__item">Gulp</li>
                                    <li class="c-list__item">HTML</li>
                                    <li class="c-list__item">Javascript</li>
                                    <li class="c-list__item">PHP</li>
                                    <li class="c-list__item">Responsive Design</li>
                                    <li class="c-list__item">User Experience (UX)</li>
                                    <li class="c-list__item">User Interface (UI)</li>
                                    <li class="c-list__item">WCAG 2.1 AA</li>
                                    <li class="c-list__item">WordPress</li>
                                </ul>
                            </div>
                        </div>

                        <div class="l-column l-column--1-2@handsWide-up">
                            <div class="l-squeeze">
                                <h3>WordPress Theme Development</h3>
                                <p>I can build or customize your WordPress site.</p>
                                <div>Capabilities</div>
                                <ul class="c-list">
                                    <li class="c-list__item">Custom Theme Development</li>
                                    <li class="c-list__item">Theme design customizations</li>
                                    <li class="c-list__item">Theme development customizations</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        /**
         * WORK
         */
        ?>
        <?php
        $args = [
            'post_type' => 'work',
            'posts_per_page' => -1,
        ];
        $works = new WP_Query($args);
        if ($works->have_posts()) : ?>
            <div class="l-row l-row__container l-squish--large">
                <div class="l-column">
                    <div class="l-squeeze">
                        <h2>Recent Work</h2>
                    </div>
                </div>
                <?php while ($works->have_posts()) :
                    $works->the_post(); ?>

                    <div class="l-column l-column--1-2@handsWide-up">
                        <div class="l-squeeze">

                            <div class="c-work">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="c-work__img">
                                        <img src="<?php echo get_the_post_thumbnail_url(null, 'work'); ?>" alt="" />
                                    </div>
                                <?php endif; ?>
                                <div class="c-work__content">
                                    <div class="c-work__icon">
                                        <img src="<?php echo get_stylesheet_directory_uri() . '/dist/images/icons/icon-code.svg'; ?>" alt="">
                                    </div>
                                    <h3 class="c-work__title"><?php esc_html_e(get_the_title(), 'kkendle'); ?></h3>
                                    <?php if (has_excerpt()) : ?>
                                        <div class="c-work__excerpt">
                                            <?php echo wp_trim_words(get_the_excerpt(), 15, null); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="c-button__container">
                                        <a class="c-button c-button__2" href="<?php echo get_the_permalink(); ?>" aria-label="Learn more about <?php echo get_the_title(); ?>">Learn More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>

        <section>
            <?php the_content(); ?>
        </section>
    </main>
</div>

<?php get_footer(); ?>
