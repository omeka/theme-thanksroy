<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    
    <title><?php echo option('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_theme_header'); ?>

    <!-- Stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <?php
    queue_css_file('style');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_theme_body'); ?>

            <header>
                <?php fire_plugin_hook('public_theme_page_header'); ?>
                <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
            </header>


        <div id="wrap">                
            <div id="content">
                <?php fire_plugin_hook('public_theme_page_content'); ?>
                <nav id="primary-nav">
                    <div id="search-wrap">
                        <h2>Search</h2>
                        <?php echo search_form(array('show_advanced' => true)); ?>
                    </div>
                    <?php echo public_nav_main(); ?>
                </nav>