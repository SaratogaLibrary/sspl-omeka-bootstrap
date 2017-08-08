<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>
    <?php /* <link rel="shortcut icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon" /> */ ?>
    <?php /* <link rel="apple-touch-icon" href="<?php echo img('favicon.svg'); ?>" type="image/svg+xml" /> */ ?>
    <?php
    echo auto_discovery_link_tags();

    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Merriweather%7CPoppins');
    if (get_theme_option('Use Internal Bootstrap')) {
        queue_css_file('bootstrap3.min');
        queue_css_file('font-awesome.min');
    } else {
        queue_css_url('//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
        queue_css_url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    }
    queue_css_file('style');
    $displayBanner = get_theme_option('Display Corner Banner');
    if ($displayBanner) {
        queue_css_file('corner-banner');
    }
    if (get_theme_option('Display Grid Rotator') && is_current_url('/')) {
        queue_css_file('grid-rotator-style');
    ?>
        <noscript>
        <link rel="stylesheet" type="text/css" href="<?php css_src('grid-rotator-fallback') ?>" />
        </noscript>
        <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php css_src('grid-rotator-fallback') ?>" />
        <![endif]-->
    <?php
    }
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php queue_js_file(array('globals', 'vendor/jquery-accessibleMegaMenu')); ?>
    <?php // see footer for bootstrap-related js...
    echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" class="sr-only sr-only-focusable" id="to-content"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view' => $this)); ?>
    <?php if ($displayBanner): ?>
    <span id="corner-banner">
        <em><?php echo $displayBanner; ?></em>
    </span>
    <?php endif; ?>
    <header class="header">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php echo str_replace('/>', 'class="navbar-left" height="100" />', theme_logo()); ?>
                    <h1 class="navbar-text visible-lg-inline"><?php echo link_to_home_page(); ?></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php $nav = bootstrap_nav(public_nav_main(), array(
                        'ulClass' => 'navigation nav navbar-nav navbar-right',
                        'addExternalLinks' => false,
                    ));
                    echo $nav;

                    // Set a second part of the navbar.
                    $twitter = get_theme_option('Link Twitter');
                    $facebook = get_theme_option('Link Facebook');
                    if ($twitter || $facebook): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($twitter): ?>
                        <li><a href="<?php echo $twitter; ?>" target="__blank" class="navbar-link"><span class="fa fa-lg fa-twitter"></span></a></li>
                        <?php endif; ?>
                        <?php if ($facebook): ?>
                        <li><a href="<?php echo $facebook; ?>" target="__blank" class="navbar-link"><span class="fa fa-lg fa-facebook"></span></a></li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
    <section class="jumbotron hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo search_form(array(
                        'show_advanced' => get_theme_option('Use Advanced Search'),
                        'submit_value' => __('Search'),
                        'form_attributes' => array('class' => 'form-search', 'role' => 'form'))); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <?php if ($breadcrumb = get_theme_option('Display Breadcrumb Trail')):
                echo common('breadcrumb', array('title' => @$title, 'mode' => $breadcrumb));
            endif; ?>
        </div>
    </section>

    <div id="wrapper">
        <div class="container" id="content">
