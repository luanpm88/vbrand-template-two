<?php
    $themeData = vbrand_load_theme_data();
?>
<!doctype html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
       
        <!-- fonts google-->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

        <!-- Woo themes CSS -->
        <link href="<?=get_template_directory_uri()?>/css/tiny-slider.css" rel="stylesheet">
        <link href="<?=get_template_directory_uri()?>/css/style.css" rel="stylesheet">   
        <title>Funiture shop</title>
        <?php wp_head(); ?>
        <link href="<?=get_template_directory_uri()?>/css/mystyle.css" rel="stylesheet">
    </head>
    <body <?php body_class(); ?>>
        <!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

            <div class="container">
                <a class="navbar-brand" href="<?php echo home_url('/');?>">
                    <?php if ($themeData->get('site_logo')) { ?>
                        <img src="<?php echo $themeData->get('site_logo'); ?>" width="150" alt="">
                    <?php } else { ?>
                        Woo vBrand<span>.</span>
                    <?php } ?> 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsFurni">                    
                    <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <?php foreach ($themeData->get('menus') as $key => $menu) {  ?>
                        <?php if ($menu['show'] == 'true') { ?>
                            <?php 
                                if ($menu['type'] == 'page-homepage.php')
                                {
                                    // lấy page có template là 'Logitech - Homepage' đầu tiên, nếu chưa có thì tạo
                                    $page = vbrand_getOrCreatePageByTemplate('page-homepage.php');
                                    $menuLink = get_permalink( $page->ID );

                                }else if ($menu['type'] == 'page-aboutus.php')
                                {
                                    // lấy page có template là 'Logitech - Homepage' đầu tiên, nếu chưa có thì tạo
                                    $page = vbrand_getOrCreatePageByTemplate('page-aboutus.php');
                                    $menuLink = get_permalink( $page->ID );

                                } else if ($menu['type'] == 'shop') {
                                    if (class_exists('WooCommerce')) {
                                        if(get_option( 'woocommerce_shop_page_id' )){
                                            $menuLink = get_permalink( get_option( 'woocommerce_shop_page_id' ) ); 
                                        }else{
                                            echo "không tim thấy trang shop, vui lòing kiểm tra cấu hình của woocomerce";
                                        }
                                    } else {
                                        echo "chưa cài WooCommerce";
                                    }
                                } else if ($menu['type'] == 'page-news.php') {

                                    $page = vbrand_getOrCreatePageByTemplate('page-news.php');
                                    $menuLink = get_permalink( $page->ID );

                                } else if ($menu['type'] == 'page-contact.php') {
                                    $page = vbrand_getOrCreatePageByTemplate('page-contact.php');
                                    $menuLink = get_permalink( $page->ID );
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $menuLink ?>">
                                        <?= $menu['title'] ?>
                                    </a>
                                </li> 
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <?php  if (class_exists('WooCommerce')):
                            $cart_count = WC()->cart->get_cart_contents_count();
                            $cart_total = WC()->cart->get_cart_total(); 
                            ?>
                            <li> 
                                <a class="nav-link" href="<?= wc_get_cart_url()?>">
                                    <img src="<?=get_template_directory_uri()?>/images/cart.svg">
                                    <?php if($cart_count>0):?>
                                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?=esc_html($cart_count)?></span>
                                    <?php endif ?>
                                </a> 
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>                
        </nav>
        <!-- End Header/Navigation -->
 