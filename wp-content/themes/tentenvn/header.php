<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo BASE_URL; ?>/images/favicon.ico">
	<!-- css -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
	<!-- js -->
	<script src="<?php echo BASE_URL; ?>/js/jquery.min.js"></script>
	<script src="<?php echo BASE_URL; ?>/js/custom.js"></script>
	<?php wp_head(); ?>
</head>


<body <?php body_class() ?>>

	<div class="bg_opacity"></div>

	<?php if ( wp_is_mobile() ) { ?>
		<div id="menu_mobile_full">
			<nav class="mobile-menu">
				<p class="close_menu"><span><i class="fa fa-times" aria-hidden="true"></i></span></p>
				<?php 
				$args = array('theme_location' => 'menu_mobile');
				?>
				<?php wp_nav_menu($args);?>
			</nav>
		</div>
	<?php }?>

	<header class="header">
		<div class="top_header">
			<span class="icon_mobile_click"><i class="fa fa-bars" aria-hidden="true"></i></span>
				<div class="logo_site">
					<?php 
					if(has_custom_logo()){
						the_custom_logo();
					}
					else { ?> 
						<h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
					<?php } ?>
				</div>
				<nav class="nav nav_primary">
					<?php 
					$args = array('theme_location' => 'primary');
					?>
					<?php wp_nav_menu($args); ?>
				</nav>
		</div>
		<?php if(!is_home() && is_front_page()){ ?>
			<div class="tg_banner">
				<?php echo do_shortcode('[smartslider3 slider=2]'); ?>
			</div>
		<?php }else{?>
			<div class="tg_banner banner_fpage">
				<div class="container">
					<img src="<?php echo BASE_URL; ?>/images/img_banner_frontpage.jpg">
				</div>
			</div>
		<?php } ?>
		<div class="our_list_contact">
			<div class="container">
				<ul class="row">
					<li class="col-sm-3">
						<div class="tg_skype">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/sk.png"></a>
						</div>
						<div class="tg_zalo">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/zalo.png"></a>
						</div>
						<div class="tg_phone">
							<p>MS.MAI : <a href="tel:0909784800">0909784800</a></p>
						</div>
					</li>
						<li class="col-sm-3">
						<div class="tg_skype">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/sk.png"></a>
						</div>
						<div class="tg_zalo">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/zalo.png"></a>
						</div>
						<div class="tg_phone">
							<p>MS.XUYẾN : <a href="tel:0909784800">0906828896</a></p>
						</div>
					</li>
						<li class="col-sm-3">
						<div class="tg_skype">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/sk.png"></a>
						</div>
						<div class="tg_zalo">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/zalo.png"></a>
						</div>
						<div class="tg_phone">
							<p>MR.TUẤN : <a href="tel:0909784800">0918771713</a></p>
						</div>
					</li>
						<li class="col-sm-3">
						<div class="tg_skype">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/sk.png"></a>
						</div>
						<div class="tg_zalo">
							<a href="#"><img src="<?php echo BASE_URL; ?>/images/zalo.png"></a>
						</div>
						<div class="tg_phone">
							<p>MR.QUỐC : <a href="tel:0909784800">0913158185</a></p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>



