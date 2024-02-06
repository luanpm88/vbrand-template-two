<?php
    $themeData = vbrand_load_theme_data();
?>

<!-- Start Footer Section -->
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<?php if (is_front_page()):?>
					<img src="<?=$themeData->get('footer_logo')?>" alt="Image" class="img-fluid">
					<?php endif ?>
					
				</div>
				
				<div class="row d-none">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center">
								<span class="me-1"><img src="<?=get_template_directory_uri()?>/images/envelope-outline.svg" alt="Image" class="img-fluid"></span>
								<span>Đăng ký nhận báo giá mới</span>
							</h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Tên của bạn">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Email của bạn">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										Đăng ký
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5 d-none">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Woo vBrand<span>.</span></a></div>
						<p class="mb-4">  
							Thương hiệu hàng đầu về nội thất và các thiết bị nội thất dành cho bạn.
						</p>
						<p class="mb-4"> 
							Thương hiệu được bình chọn là một trong 10 thương hiệu hàng đầu tại Việt Nam năm 2023
						</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Giới thiệu</a></li>
									<li><a href="#">Về chúng tôi</a></li>
									<li><a href="#">Tầm nhìn & sứ mệnh</a></li>
									<li><a href="#">giá trị cốt lõi</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Hỗ trợ</a></li>
									<li><a href="#">Hotline</a></li>
									<li><a href="#">Online SMS</a></li>
									<li><a href="#">Gửi liên hệ</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Đại lý, của hàng</a></li> 
									<li><a href="#">Địa chỉ Đại lý</a></li>
									<li><a href="#">Địa chỉ Cửa hàng</a></li>
									<li><a href="#">Đăng ký</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Dịch vụ</a></li>
									<li><a href="#">Tư vấn thiết kế</a></li>
									<li><a href="#">Hoàn thiện công trình</a></li>
									<li><a href="#">Phụ kiện nội thất</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">
								<?=$themeData->get('copyright_line')?>
            				</p>
						</div>

						<div class="col-lg-6 text-center text-lg-end d-none">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Điều khoản</a></li>
								<li class="me-4"><a href="#">Hỗ trợ</a></li>
								<li><a href="#">Bảo trì</a></li>
							</ul>
						</div>

					</div>
				</div>
        
			</div>
		</footer>
		<!-- End Footer Section -->
		<script src="<?=get_template_directory_uri()?>/js/bootstrap.bundle.min.js"></script>
		<script src="<?=get_template_directory_uri()?>/js/tiny-slider.js"></script>
		<script src="<?=get_template_directory_uri()?>/js/custom.js"></script>
		<?php  wp_footer();   ?>
	</body>
</html>
		