# WordPress Theme Requirements
   1. Cài Woocomerce và cấu hình: để sinh ra các page cần thiết: Shop, cart, ..
   2. Cài vBrandSync plugin:
      - cd wp-content/plugins
      - git clone git@github.com:luanpm88/vbrandsync.git
      - # Activate vBrandSync plugin.
      - php composer.phar install
      - cp .env.example .env
      - php artisan key:generate
      - php artisan migrate

# WordPress Theme Installation Instructions
   1. Cài theme vBrand Template One:
      - cd wp-content/themes
      - git clone git@github.com:luanpm88/vbrand-template-one.git
   2. Activate vBrand Template One: Đăng nhập vào WordPress Admin Panel, vào menu Appearance, activate theme vBrand Template One
   3. Tạo page mới: Vào menu Pages, tạo 1 mới 1 page bất kỳ (VD: Homepage). Bên tay phải mục Template, chọn Homepage. Chọn publish.
   4. Cấu hình homepage: Vào menu Appearance => Customize => Homepage settings => HomePage => Chọn Homepage. Chọn Publish.
   5. Mở trang chính của WordPress site sẽ thấy theme đẹp full nội dung...

# Kết nối vBrand Customer và WordPress site để quản trị nội dung theme từ vBrand
   1. Trong WordPress admin panel. Chọn menu vBrand Connect. Copy API endpoint của WP tại section OUT
   2. Đăng nhập vào admin view của vBrand Admin (nhánh brand, cờ APP_BRAND=true). Vào Customer --> Customers. Chọn edit customer tương ứng với WordPress site. Vào tab WordPress Connect
   3. Dán API enpoint ở bước 1 vào phần WordPress conntect. Nhấn lưu.
   4. Customer tương ứng sau khi đăng nhập, thấy website menu của mình gồm:
      - Giao diện: danh sách, mua theme, activate theme.
      - Cấu hình nội dung: edit toàn bộ nội dung trên WP theme tại đây (site logo, banner text, woo mudle settings,...)


# Sử dụng theme woocomerce
   - Sử dụng khai báo này trong functiuons.php để sử dụng tính năng hỗ trợ của woocommerce: templates, card, checkout,..
      add_theme_support('woocommerce');
   - Templates woocommerce ( thư mục plugins/woocommerce/templates) sẽ có những file template cần thiết để sử lý cho mỗi request: 
   
   Templates:
      single-product.php – Cấu trúc hiển thị trang chi tiết một sản phẩm.
      archive-product.php – Template hiển thị cấu trúc trang lưu trữ của sản phẩm.
      single-product-reviews.php – Cấu trúc hiển thị danh sách đánh giá của khách hàng trong trang chi tiết sản phẩm.
      taxonomy-product_cat.php – Cấu trúc hiển thị trang danh mục sản phẩm.
      taxonomy-product_tag.php – Cấu trúc hiển thị trang từ khóa sản phẩm.
      product-searchform.php – Cấu trúc hiển thị form tìm sản phẩm.

   Templates Content ( nội dụng hiển thị )
      content-product.php – Template hiển thị cấu trúc nội dung hiển thị sản phẩm được gọi từ archive-product.php.
      content-product_cat.php – Template hiển thị cấu trúc nội dung sản phẩm trong category.
      content-single-product.php – Template hiển thị cấu trúc nội dung hiển thị trong trang chi tiết một sản phẩm.
      content-widget-product.php – Cấu trúc hiển thị nội dung sản phẩm trong widget.  

   Các trang Woocommerce sinh ra:
      Cart  : Lầy nội dung qua Shortcode: [woocommerce_cart]  
      Checkout :  
      Shop
      My Account
      Privacy Policy
      Refund and Returns Policy 
      
      Việc thay đổi các trang mặc đinh dành cho woocomerce thực hiện trong phần cấu hình của woocommerce:  
         Trang giỏ hàng: cart (ID: 8)                    /* 8 là ID của bài Posts */
         Trang thanh toán: Checkout (ID: 9)              /* 9 là ID của bài Posts */
         Trang tài khoản của tôi: My Account (ID: 10)    /* 10 là ID của bài Posts */
      
   Cáu trúc hiển thị dữ liệu:


      cart/ – Các tập tin template liên quan đến hiển thị giỏ hàng

         cart-empty.php – Hiển thị giỏ hàng trống.
         cart-item-data.php – Hiển thị biến thể bên trong giỏ hàng.
         cart-shipping.php – Hiển thị khu vực chọn kiểu giao nhận trong giỏ hàng.
         cart-total.php – Hiển thị hộp tính tổng giỏ hàng.
         cart.php – Hiển thị cả giỏ hàng.
         cross-sell.php – Hiển thị sản phẩm bán chéo.
         mini-cart.php – Hiển thị giỏ hàng mini ở widget.
         process-to-checkout-button.php – Nút chuyển qua trang thanh toán. Thế mà nó cũng nhét vô thành một template nữa.
         shipping-calculator.php – Hiển thị hộp tính phí giao nhận trong giỏ hàng.

      checkout/ – Các tập tin template hiển thị phần thanh toán.

         cart-errors.php – Hiển thị trang giỏ hàng bị lỗi.
         form-billing.php – Hiển thị các form nhập thông tin hóa đơn của khách hàng.
         form-checkout.php – Cấu trúc toàn bộ form trang thanh toán.
         form-coupon.php – Hiển thị form nhập mã ưu đãi.
         form-login.php – Hiển thị form đăng nhập.
         form-pay.php – Hiển thị phần trả tiền, bao gồm phần tổng kết giỏ hàng và phần chọn phương thức thanh toán.
         form-shipping.php  – Hiển thị khung nhập địa chỉ nhận hàng.
         payment-method.php – Hiển thị nút chọn phương thức thanh toán.
         payment.php – Hiển thị thông tin các phương thức thanh toán và nút đặt hàng.
         review-order.php – Hiển thị phần xem lại hóa đơn.
         thankyou.php – Hiển thị trang cám ơn sau khi thanh toán xong.

      emails/ – Các template hiển thị email thông báo của Woocommerce.

         plain/ – Template hiển thị email dạng chữ thông thường.
         admin-cancelled-order.php – Nội dung email báo đơn hàng bị hủy cho admin.
         admin-new-order.php – Nội dung email thông báo đơn hàng mới cho admin.
         customer-completed-order.php – Nội dung email thông báo đơn hàng đã hoàn thành cho khách hàng.
         customer-invoice.php – Nội dung email thông báo hóa đơn cho khách hàng.
         customer-new-account.php – Nội dung email thông báo thông tin tài khoản mới cho khách hàng.
         customer-note.php – Nội dung email thông báo có ghi chú mới vừa thêm vào hóa đơn cho khách hàng.
         customer-processing-order.php – Nội dung email thông báo đơn hàng đang xử lý cho khách hàng.
         customer-refunded-order.php – Nội dung email thông báo đơn hàng đã được hoàn trả.
         customer-reset-password.php – Nội dung email thông báo khôi phục mật khẩu cho khách hàng.
         email-addresses.php – Phần hiển thị địa chỉ trong email.
         email-footer.php – Phần hiển thị footer trong email.
         email-order-items.php – Phần hiển thị các sản phẩm của đơn hàng trong email.
         email-styles.php  – CSS của email.

      global/ – Các template hiển thị các thành phần trên toàn bộ các trang của Woocommerce.

         breadcrumb.php – Hiển thị thanh điều hướng.
         form-login.php – Hiển thị form đăng nhập.
         quantity-input.php – Hiển thị trường chọn số lượng.
         sidebar.php – Hiển thị sidebar của Woocommerce.
         wrapper-end.php – Hiển thị phần kết thúc của phần tử bao quanh cấu trúc trang.
         wrapper-start.php – Hiển thị phần bắt đầu của phần tử bao quanh cấu trúc trang.

      loop/ – Toàn bộ các phần tử trong vòng lặp hiển thị sản phẩm của Woocommerce.

         add-to-cart.php – Nút thêm vào giỏ hàng.
         loop-end.php – Phần tử kết thúc vòng lặp, chỉ có mỗi thẻ <ul> trong đó hehe.
         loop-start.php – Phần tử bắt đầu vòng lặp.
         no-product-found.php – Dòng hiển thị không tìm thấy sản phẩm.
         order.php – Khung hiển thị kiểu sắp xếp hiển thị sản phẩm.
         pagination.php – Hiển thị phần phân trang.
         price.php – Hiển thị giá.
         rating.php – Hiển thị cái đánh giá sản phẩm.
         result-count.php – Hiển thị số đếm két quả.
         sale-flash.php – Hiển thị cái nhãn hiển thị chữ SALE trên sản phẩm khi sản phẩm đó được giảm giá.
         title.php – Hiển thị tiêu đề sản phẩm.

      myaccount/ – Các template hiển thị phần tài khoản trong Woocommerce.

         form-add-payment-method.php – Form hiển thị trang thêm phương thức thanh toán.
         form-edit-account.php – Hiển thị form sửa tài khoản.
         form-edit-address.php – Hiển thị form sửa email.
         form-login.php – Form đăng nhập.
         form-lost-password.php – Form quên mật khẩu.
         my-account.php – Template hiển thị trang My Account.
         my-address.php – Template hiển thị trang My Address.
         my-downloads.php – Template hiển thị phần các sản phẩm đã mua có thể download.
         my-orders.php – Template hiển thị phần My orders.
         view-order.php – Template hiển thị trang xem đơn hàng trong trang tài khoản.

      notices/ – Các template hiển thị thông báo.

         error.php – Thông báo lỗi.
         notice.php – Thông báo.
         success.php – Thông báo thành công.

      order/ – Các template hiển thị đơn hàng.

         form-tracking.php – Form theo dõi đơn hàng.
         order-again.php – Hiển thị phần đặt lại đơn hàng.
         order-details-customer.php – Hiển thị thông tin chi tiết khách hàng trong đơn hàng.
         order-details-item.php – Hiển thị thông tin chi tiết sản phẩm trong đơn hàng.
         order-details.php – Hiển thị thông tin chi tiết của đơn hàng.
         tracking.php – Hiển thị trang theo dõi đơn hàng.

      single-product/ – Các template hiển thị các phần tử trong trang hiển thị chi tiết các sản phẩm.

         add-to-cart/ – Các template hiển thị nút thêm vào giỏ hàng trong trang chi tiết sản phẩm.
            exernal.php – Nút thêm vào giỏ hàng đối với sản phẩm liên kết ngoài.
            grouped.php – Nút thêm vào giỏ hàng đối với sản phẩm được nhóm.
            simple.php – Nút thêm vào giỏ hàng với sản phẩm đơn giản.
            variable.php – Nút thêm vào giỏ hàng với sản phẩm chứa biến thể.
         tabs/ – Các template hiển thị nội dung của tab thông tin trong sản phẩm.
            additonal-information.php – Tab hiển thị thông tin thêm của sản phẩm.
            description.php – Tab hiển thị mô tả sản phẩm.
            tabs.php – Cấu trúc các tab.
         meta.php – Hiển thị phần thông tin meta của sản phẩm như danh mục, từ khóa,…
         price.php – Hiển thị giá.
         product-attributes.php – Hiển thị thuộc tính sản phẩm.
         product-image.php – Hiển thị hình ảnh sản phẩm.
         product-thumbnails.php – Hiển thị các hình ảnh gallery của sản phẩm.
         rating.php – Hiển thị phần đánh giá điểm sao.
         related.php – Hiển thị phần sản phẩm liên quan.
         review.php – Hiển thị danh sách đánh giá khách hàng.
         sale-flash.php – Hiển thị nhãn hiển thị chứ Sale.
         share.php – Hiển thị phần chia sẻ sản phẩm lên mạng xã hội.
         short-description.php – Hiển thị phần mô tả ngắn.
         title.php – Hiển thị tiêu đề.
         up-sells.php – Hiển thị sản phẩm bán thêm.

      
      


