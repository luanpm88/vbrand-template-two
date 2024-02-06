<?php
/**
 * Template Name: Sản phẩm define
 */
?> 
<?php
	get_header();
?>

<?php
    $themeData = vbrand_load_theme_data();
?>

<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>
                        <?php echo $themeData->get('banner_title');?>
                    <?php 
                    ?>
                    </h1>
                    <p class="mb-4">
						<?php echo $themeData->get('banner_description');?>
					</p>
                    <p>
						<a href="<?php echo $themeData->get('banner_main_button_link'); ?>" class="btn btn-secondary me-2"><?php echo $themeData->get('banner_main_button_text'); ?></a>
						<?php if($themeData->get('banner_second_button_link') !=''){?>
							<a href="<?php echo $themeData->get('banner_second_button_link'); ?>" class="btn btn-white-outline"><?php echo $themeData->get('banner_second_button_text'); ?></a>
						<?php }?>
					</p> 
                </div>
            </div>
			<div class="col-lg-7">
				<div class="hero-img-wrap">
					<img src="<?php echo $themeData->get('banner_image'); ?>" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<?php if ($themeData->get('products_module_show')) { ?>
	<!-- Start Product Section -->
	<div class="product-section" id="product">
		<div class="container">
			<div class="row">
				<?php
					$count = $themeData->get('products_module_number');					
					$case = $themeData->get('products_module_type');
				?>
				<!-- Start Column 1 -->
				<div class="col-lg-4">
					<h2 class="mb-4 section-title">
						<?php echo $themeData->get('products_module_title'); ?>
					</h2>
					<p class="mb-4">
						<?php echo $themeData->get('products_module_description'); ?>	
					</p>
					<p>
						<?php 
						if (class_exists('WooCommerce')) {
							// Get the shop page ID from the options table
							$shop_page_id = get_option('woocommerce_shop_page_id');					
							// Check if the shop page ID is valid
							if ($shop_page_id) {
								// Get the permalink of the shop page
								$shop_page_link = get_permalink($shop_page_id);
								echo '<a href="'.esc_url($shop_page_link).'" class="btn btn btn-dark-outline">Xem sản phẩm</a>'; 
							}else{
								echo "...";
							}
						}
						?> 
					</p>
				</div> 
				<!-- End Column 1 -->
				<div class="col-lg-8">
					<div class="row">
					<?php
						switch ($case) {
							case "hot":
								$args = array(
									'post_type'      => 'product',
									'posts_per_page' => $count,
									'meta_query'     => array(
										'relation' => 'OR',
										array(
											'key'   => 'hot_product', // Change this to your hot product custom field
											'value' => '1',           // Assuming '1' means it's marked as hot
										)
									),
								); 
								break;                        
							case "feature":
								$args = array(
									'post_type'      => 'product',
									'posts_per_page' => $count,
									'meta_query'     => array(
										'relation' => 'OR' ,
										array(
											'key'   => '_featured',   // WooCommerce uses '_featured' for featured products
											'value' => 'yes',
										),
									),
								);
								break;
							case "new":
								$args = array(
									'post_type'      => 'product',
									'posts_per_page' => $count,
									'meta_query'     => array(
										'relation' => 'OR',
										array(
											'key'   => 'new_product', // Change this to your new product custom field
											'value' => '1',           // Assuming '1' means it's marked as new
										), 
									),
								);
							default:
								$args = array(
									'post_type'      => 'product',
									'posts_per_page' => $count,
								);
						} 
						
						$products = new WP_Query($args);
						if ($products->have_posts()){ 
							$i=1;
							while ($products->have_posts()){
								$products->the_post();
								// Ensure visibility.
								if ( empty( $product ) || ! $product->is_visible() ) {
									return;
								}
								?>
								<!-- Start Column 2 -->
								<div class="col-lg-<?php echo round(12/($count)); ?>">
									<a class="product-item" href="<?=esc_url(get_permalink())?>">
										<?php if (wp_get_attachment_image_src(get_the_ID())) { ?>
											<?php the_post_thumbnail('single-post-thumbnail', array('class' => 'img-fluid product-thumbnail')); ?>
										<?php } else { ?>
											<img src="<?=get_template_directory_uri()?>/images/empty-<?=$i?>.png" class="img-fluid product-thumbnail">
										<?php } ?>
										
										<h3 class="product-title"><?=the_title()?></h3>
										<strong class="product-price"><?=wc_price(get_post_meta(get_the_ID(), '_price', true))?></strong>

										<span class="icon-cross">
											<img src="<?=get_template_directory_uri()?>/images/cross.svg" class="img-fluid">
										</span>
									</a>
								</div> 
								<!-- End Column 2 --> 
							<?php	
								$i++;
							}
						}
						wp_reset_postdata(); // Đặt lại truy vấn sản phẩm
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($themeData->get('why_us_module_show')) { ?>
	<!-- Start Why Choose Us Section -->
	<div class="why-choose-section" id="why-us">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-6">
					<h2 class="section-title">
						<?php echo $themeData->get('why_us_module_title');?>
					</h2>
					<p>
						<?php echo $themeData->get('why_us_module_description');?> 				
					</p>

					<div class="row my-5">
						<div class="col-6 col-md-6">
							<div class="feature">

								<div class="icon">
									<img src="<?=$themeData->get('why_us_module_block_1_icon')?>" alt="Image" class="imf-fluid">
								</div>
								<h3><?php echo $themeData->get('why_us_module_block_1_title');?></h3>
								<p><?php echo $themeData->get('why_us_module_block_1_description');?></p>

							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="<?=$themeData->get('why_us_module_block_2_icon')?>" alt="Image" class="imf-fluid">
								</div>
								<h3><?php echo $themeData->get('why_us_module_block_2_title');?></h3>
								<p><?php echo $themeData->get('why_us_module_block_2_description');?></p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="<?=$themeData->get('why_us_module_block_3_icon')?>" alt="Image" class="imf-fluid">
								</div>
								<h3><?php echo $themeData->get('why_us_module_block_3_title');?></h3>
								<p><?php echo $themeData->get('why_us_module_block_3_description');?></p>
							</div>
						</div>

						<div class="col-6 col-md-6">
						<div class="feature">
								<div class="icon">
									<img src="<?=$themeData->get('why_us_module_block_4_icon')?>" alt="Image" class="imf-fluid">
								</div>
								<h3><?php echo $themeData->get('why_us_module_block_4_title');?></h3>
								<p><?php echo $themeData->get('why_us_module_block_4_description');?></p>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-5">
					<div class="img-wrap">
						<img src="<?php echo $themeData->get('why_us_module_banner');?>" alt="Image" class="img-fluid">
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Why Choose Us Section -->
<?php } ?>
 

<div class="container">
	<div class="row section-heading align-items-end">
		<h6 class="text-danger mb-3 col-12 text-uppercase ls-2"><?php echo $themeData->get('our_project_module_title');?></h6>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<h2 class="display-5 fw-700 lh-1 m-0 text-dark"><?php echo $themeData->get('our_project_module_alias');?></h2>
				</div>
				<div class="col-md-6 pt-3 pt-md-0">
					<p class="m-0"><?php echo $themeData->get('our_project_module_description');?></p>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-md-end pt-4 pt-md-0">
			<a class="btn btn-dark ls-2 text-uppercase" href="#">
				<span>Xem sản phẩm</span>
				<i class="bi-arrow-right btn-icon"></i>
			</a>
		</div>
	</div>
	<div class="row g-3">
		<div class="col-md-6">
			<img src="<?php echo $themeData->get('our_project_project_1');?>" alt="Image" class="img-fluid rd-9">
		</div>
		<div class="col-md-6">
			<img src="<?php echo $themeData->get('our_project_project_2');?>" alt="Image" class="img-fluid rd-9">
		</div>
	</div>
</div> 



<!-- Start We Help Section -->
<!--div class="we-help-section" id="help">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-7 mb-5 mb-lg-0">
				<div class="imgs-grid">
					<div class="grid grid-1"><img src="<?=get_template_directory_uri()?>/images/img-grid-1.jpg" alt="Untree.co"></div>
					<div class="grid grid-2"><img src="<?=get_template_directory_uri()?>/images/img-grid-2.jpg" alt="Untree.co"></div>
					<div class="grid grid-3"><img src="<?=get_template_directory_uri()?>/images/img-grid-3.jpg" alt="Untree.co"></div>
				</div>
			</div>
			<div class="col-lg-5 ps-lg-5">
				<h2 class="section-title mb-4">KIẾN TẠO NHỮNG KHÔNG GIAN SÁNG TẠO TRÀN ĐẦY SỨC SỐNG</h2>
				<p>
				Với đội ngũ thiết kế chuyên nghiệp và giàu kinh nghiệm, cam kết tạo ra những không gian sáng tạo, độc đáo và tràn đầy sức sống. Bằng sự tận tâm và tài năng, chúng tôi luôn sẵn sàng biến những ý tưởng thành hiện thực, đem lại cho bạn những trải nghiệm không gì sánh bằng trong việc thiết kế và tạo dựng không gian sống hoàn hảo
				</p>

				<ul class="list-unstyled custom-list my-4">
					<li>Thiết kế hoàn hảo</li>
					<li>Màu sắc trẻ trung</li>
					<li>Đa dạng mẫu mã</li>
					<li>Chất liệu tự nhiên</li>
				</ul>
				<p><a herf="#" class="btn">Khám phá ngay</a></p>
			</div>
		</div>
	</div>
</div-->
<!-- End We Help Section -->

<!-- Start Popular Product -->
<!--div class="popular-product">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="<?=get_template_directory_uri()?>/images/product-1.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Ghế nội thất</h3>
						<p>
							Thời trang, phong cách thời thượng kết hợp với gam màu đày quyến rũ	cho không gian của bạn
						</p>
						<p><a href="#">Xem thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="<?=get_template_directory_uri()?>/images/product-2.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Bàn làm việc</h3>
						<p>
							Không gian làm việc sáng tạo, tràn đầy sức sống giúp bạn tiếp tục có thêm nhũng ý tưởng mới cho công việc hàng ngày
						</p>
						<p><a href="#">xem thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="<?=get_template_directory_uri()?>/images/product-3.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Bàn học cho bé</h3>
						<p>
							Mẫu bàn với thiết kế sáng tạo giúp bế có thêm không gian sáng tạo cho mỗi ngày học tập
						</p>
						<p><a href="#">xem thêm</a></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div-->
<!-- End Popular Product -->

<!-- Start Popular Product -->
<!--div class="popular-product">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="<?=get_template_directory_uri()?>/images/product-1.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Ghế nội thất</h3>
						<p>
							Thời trang, phong cách thời thượng kết hợp với gam màu đày quyến rũ	cho không gian của bạn
						</p>
						<p><a href="#">Xem thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="<?=get_template_directory_uri()?>/images/product-2.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Bàn làm việc</h3>
						<p>
							Không gian làm việc sáng tạo, tràn đầy sức sống giúp bạn tiếp tục có thêm nhũng ý tưởng mới cho công việc hàng ngày
						</p>
						<p><a href="#">xem thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="<?=get_template_directory_uri()?>/images/product-3.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Bàn học cho bé</h3>
						<p>
							Mẫu bàn với thiết kế sáng tạo giúp bế có thêm không gian sáng tạo cho mỗi ngày học tập
						</p>
						<p><a href="#">xem thêm</a></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div-->
<!-- End Popular Product -->


<?php if ($themeData->get('articles_module_show')) : ?>
	<?php

	/**
	 * Hiển thị bài viết mới nhất
	 */

	$number_of_posts = $themeData->get('articles_module_number');

	// Truy vấn các bài viết mới nhất
	$args = array(
		'post_type' => 'post', // Loại bài viết
		'posts_per_page' => $number_of_posts, // Số lượng bài viết muốn hiển thị
		'post_status' => 'publish',
		// 'orderby' => 'date', // Sắp xếp theo ngày đăng
		// 'order' => 'DESC', // Thứ tự giảm dần (mới nhất trước)
	);

	$sort = $themeData->get('articles_module_sort');
	
	if ($sort == 'newest') {
		$args['order'] = 'DESC';
		$args['orderby'] = 'post_date';
	} else if ($sort == 'oldest') {
		$args['order'] = 'ASC';
		$args['orderby'] = 'post_date';
	} else {
		$args['order'] = 'DESC';
		$args['orderby'] = 'post_date';
	}

	$query = new WP_Query($args);

	// Kiểm tra xem có bài viết nào không
	if ($query->have_posts()) : ?>
	<!-- Start Blog Section -->
	<div class="blog-section" id="news">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md-6">
					<h2 class="section-title">TIN MỚI</h2>
				</div>
				<div class="col-md-6 text-start text-md-end">
					<a href="<?=home_url('/')?>tin-tuc" class="more">Xem thêm</a>
				</div>
			</div>

			<div class="row">
		<?php	
			// Bắt đầu vòng lặp để hiển thị bài viết
			while ($query->have_posts()):
				$query->the_post();

				$content = get_the_content();
				$content = strip_tags($content);
				$shortDescription = substr($content, 0, 100);
				// Hiển thị tiêu đề bài viết và liên kết đến bài viết
				$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); // 'thumbnail' là kích thước hình ảnh nhỏ
				?> 
				<div class="col-lg-<?= 12/$number_of_posts ?>">
					<div class="post-entry">
						<a href="<?=get_permalink()?>" class="post-thumbnail">

							<?php if ($thumbnail_url): ?>
								<img width="100%" src="<?=esc_url($thumbnail_url)?>" alt="<?=get_the_title()?>" />
							<?php else: ?> 
								<img width="100%" class="border" src="<?=get_template_directory_uri()?>/images/placeholder.svg" alt="<?=get_the_title()?>" />   
							<?php endif ?>

						</a>
						<div class="post-content-entry">
							<h3><a href="<?=get_permalink()?>"><?=get_the_title()?></a></h3> 
							<div class="post-alias"><a href="<?=get_permalink()?>"><?=the_excerpt()?></a></div>
						</div>
					</div>
				</div>
	
				<?php endwhile ?> 
				<?php  wp_reset_postdata();?>

			</div>
		</div>
	</div>
	<!-- End Blog Section --> 
<?php endif ?>
 
<?php endif ?> 

<?php
	get_footer();
?>