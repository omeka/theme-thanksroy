<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo settings('site_title'); echo $title ? ' | ' . $title : ''; ?></title>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo settings('description'); ?>" />

<?php echo auto_discovery_link_tag(); ?>

<!-- Stylesheets -->
<link rel="stylesheet" media="screen" href="<?php echo html_escape(css('screen')); ?>" />
<style type="text/css" media="screen">
    <?php if($headerBackground = get_theme_option('Header Background')): ?>
    #header {
        background:transparent url('<?php echo WEB_THEME_UPLOADS.DIRECTORY_SEPARATOR.$headerBackground; ?>') top left no-repeat;
    }
    <?php endif; ?>
</style>

<!-- JavaScripts -->
<?php echo js('default'); ?>

<!-- Plugin Stuff -->
<?php echo plugin_header(); ?>

</head>
<body<?php echo $bodyid ? ' id="'.$bodyid.'"' : ''; ?><?php echo $bodyclass ? ' class="'.$bodyclass.'"' : ''; ?>>
	<div id="wrap">

		<div id="header">
		<div id="site-title"><?php echo link_to_home_page(thanksroy_display_logo()); ?></div>
		</div>
		
		<div id="content">
		    
			<div id="primary-nav">
				<div id="search-wrap">
				    <h2>Search</h2>
				    <?php echo simple_search(); ?>
				    <?php echo link_to_advanced_search(); ?>
    			</div>
    			
    			<ul class="navigation">
    			    <?php echo thanksroy_display_navigation(); ?>
    			</ul>
			</div>