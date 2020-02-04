<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/app.min.css" />
	<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7133514/6353752/css/fonts.css" />
</head>
<body <?php body_class( flask_page_name() ); ?>>
	<header></header>
	<section class="wrapper">