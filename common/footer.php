
        </div><!-- end content -->
    </div><!-- end wrap -->
    <footer>
        <section class="container">
            <div class="row">
                <?php if ( $footerText = get_theme_option('Footer Text') ): ?>
                <div id="footer-text" class="col-sm-12 text-center">
                    <p><?php echo $footerText; ?></p>
                </div>
                <?php endif; ?>
                <div class="col-sm-12 text-center">
                    <a href="#to-top" class="sr-only sr-only-focusable" id="to-top"><span class="glyphicon glyphicon-arrow-up"></span> Back to Top</a>
                </div>
                <div class="col-sm-6">
                    <p class="lead">Open Hours</p>
                    <ul>
                        <li>9a-5p Monday, Wednesday, Friday, Saturday</li>
                        <li>5p-9p Tuesday, Thursday</li>
                        <li>Closed on Sundays</li>
                    </ul>
                    <p class="lead">Contact Details</p>
                    <ul>
                        <li>Phone: 518-584-7860 x255</li>
                        <li>Email: <a href="https://www.sspl.org/contact/form/history/">Contact Form</a></li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <p class="lead">Helpful Links</p>
                    <ul>
                        <li><a href="https://www.sspl.org/research/local_history/">Saratoga History Room Page at SSPL</a></li>
                        <li><a href="http://nyheritage.nnyln.net/cdm/landingpage/collection/sspl">NY Heritage Collections</a></li>
                        <li><a href="https://www.sspl.org/">Library Homepage</a></li>
                        <li><a href="http://pac.sals.edu/polaris/?ctx=90.1033.0.0.3&type=Default&lp=1">Library Catalog</a></li>
                    </ul>
                    <p class="lead">Find Us on Social Media</p>
                    <p class="social-links">
                        <a href="https://www.facebook.com/SaratogaLibrary" title="Facebook"><span class="fa fa-fw fa-facebook"></span></a>
                        <a href="https://twitter.com/SaratogaLibrary" title="Twitter"><span class="fa fa-fw fa-twitter"></span></a>
                        <a href="http://saratogahistoryroom.tumblr.com/" title="Tumblr"><span class="fa fa-fw fa-tumblr"></span></a>
                        <a href="https://youtube.com/user/SaratogaLibrary/" title="YouTube"><span class="fa fa-fw fa-youtube-play"></span></a>
                    </p>
                </div>
                <div class="col-sm-12">
                    <hr />
                </div>
                <div class="col-sm-9 small copyright">
                    <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                        <p><?php echo $copyright; ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-3 text-right small copyright">
                    <p class="omeka-props-footer text-right"><?php echo __('Proudly powered by <a href="https://omeka.org">Omeka</a>.'); ?></p>
                </div>
            </div>
        </section>
    </footer>

    <?php
    // Omeka 2.4 and Bootstrap 3.3.7 use the same jQuery (1.12), so it is not
    // recalled.
    ?>
    <?php if (get_theme_option('Use Internal Bootstrap')) :?>
    <script src="<?php echo src('bootstrap.min', 'javascripts', 'js'); ?>"></script>
    <?php else: ?>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php endif; ?>

    <?php
    if (is_current_url('/')):
        $displayGridRotator = (boolean) get_theme_option('Display Grid Rotator');
        if ($displayGridRotator):
            echo js_tag('modernizr-custom');
            echo js_tag('jquery.gridrotator');
        endif;
    else:
        $displayGridRotator = false;
    endif;
    ?>

     <script type="text/javascript">
    jQuery(document).ready(function () {
        <?php if (get_theme_option('Use Advanced Search')): ?>
        Omeka.showAdvancedForm();
        <?php endif; ?>
        Omeka.dropDown();
        <?php if ($displayGridRotator): ?>
        Omeka.displayGridRotator();
        <?php endif; ?>
    });
    </script>

    <?php if (get_theme_option('Use Google Analytics') && $googleAccount = get_theme_option('Google Analytics Account')): ?>
    <?php echo common('analyticstracking.php', array('account' => $googleAccount)); ?>
    <?php endif; ?>
</body>
</html>
