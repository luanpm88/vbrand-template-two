<?php 
/**
 * ------ import-demo-data.php
 */

// Kiểm tra xem đã import dữ liệu demo chưa
$demo_data_imported = get_option('demo_data_imported');

if ($demo_data_imported !== '1') {
    /**
     *---------------- Tạo menu
     */
    $menu_exists = wp_get_nav_menu_object('Primary vBrand One Menu');
    $menu_id = '';
    if (!$menu_exists) {
        // Nếu menu chưa tồn tại, hãy tạo nó
        $menu_id = wp_create_nav_menu('Primary vBrand One Menu');
    
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary-menu'] = $menu_id;  
        set_theme_mod('nav_menu_locations', $locations);
 
    }else {
        // Nếu menu đã tồn tại, lấy ID của nó
        $menu_id = $menu_exists->term_id;
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary-menu'] = $menu_id;  
        set_theme_mod('nav_menu_locations', $locations);
    }

    /**
     *---------------- Tạo page và add vào menu
     */
    $page_args = array(
        array(
            'post_title'    => 'Home Page',
            'post_content'  => 'This is front page',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ),
        array(
            'post_title'    => 'About Us',
            'post_content'  => 'This is About Us page',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ),        
        array(
            'post_title'    => 'Shop',
            'post_content'  => 'Your Shop page content goes here.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ),
        array(
            'post_title'    => 'News',
            'post_content'  => 'News list.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ),
        array(
            'post_title'    => 'Contact',
            'post_content'  => 'Your contact page content goes here.',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ),
    );
    foreach($page_args as $page_arg){ 
       solv_page($menu_id, $page_arg['post_title'], $page_arg); 
    }

    // Đánh dấu là đã import dữ liệu để không import lần nữa
    update_option('demo_data_imported', '1');
    update_option('vbrand_one_menu_setup', true);
    update_option('vbrand_logitech_menu_setup', false);
}
// Hook để chạy hàm import khi theme được kích hoạt
//add_action('after_switch_theme', 'import_demo_data');



function solv_page($menu_id, $title_page ='', $page_arg =''){ 

    $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'title' => $page_arg['post_title'],
    );
    
    $page_query = new WP_Query($args);
    $page ='';
    $page_id = '';
    if ($page_query->have_posts()) {
        $page = $page_query->posts[0];
        $page_title = $page->post_title;
        $page_id = $page->ID;
        page_to_menu($menu_id, $page_id, $page->post_title);
    } else {
        $page_id = wp_insert_post($page_arg);
        $page = get_post($page_id);
        page_to_menu($menu_id, $page_id, $page->post_title);
    } 

    //var_dump($page_id);

    if( $page->post_title == 'Home Page' ){
        // Gán template cho trang Home
        $homepage_template = 'page-homepage.php';
        update_post_meta($page_id, '_wp_page_template', $homepage_template);
        // Đặt trang Home làm trang frontpage
        update_option('page_on_front', $page_id);
        update_option('show_on_front', 'page');
    }
    
    if( $page->post_title == 'About Us' ){
        $aboutus_template = 'page-aboutus.php';
        update_post_meta($page_id, '_wp_page_template', $aboutus_template);
    }

    if( $page->post_title == 'News' ){
        $post_template = 'page-post.php';
        update_post_meta($page_id, '_wp_page_template', $post_template);
    }

    if( $page->post_title == 'Shop' ){
        // Đặt trang vừa cập nhật làm trang shop của WooCommerce
        update_option('woocommerce_shop_page_id', $page_id);
    }
    
}
function page_to_menu($menu_id, $page_id='', $page_title=''){
    
    // Thực hiện các thao tác cần thiết với thông tin trang
    $menu_item_data = array(
        'menu-item-object-id' => $page_id,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-title'     => $page_title,
        'menu-item-status'    => 'publish',
    );
    // Thêm mục menu vào menu
    wp_update_nav_menu_item($menu_id, 0, $menu_item_data);
}


?>