<?php
require("models/email.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có tồn tại khóa "user_email" trong mảng $_POST hay không
    if (isset($_POST['name_email'])) {
        $user_email = $_POST['name_email'];
        // Gọi hàm để thêm email vào cơ sở dữ liệu
        $user = new Email;
        $addEmail = $user->addEmail($user_email);
        if ($addEmail) {
            // Chuyển hướng hoặc hiển thị thông báo thành công
            echo "Thêm thành công.";
            exit();
        } else {
            // Xử lý trường hợp thêm email thất bại
            echo "Lỗi thêm email vào cơ sở dữ liệu.";
        }
    } else {
        // Trường hợp không có "user_email" trong $_POST
      //  echo "Dữ liệu không hợp lệ.";
    }
}
?>
<style>
    /* CSS cho modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }


    /* CSS cho nội dung modal */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 600px; /* Đặt kích thước rộng của modal */
        height: 400px; /* Đặt kích thước dài của modal */
        overflow: auto;
        text-align: center;
        line-height: 400px;
        font-size: 20px;
        font-weight: bold;
    }


    /* CSS cho nút đóng modal */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


</style>
<!-- NEWSLETTER -->
<div id="newsletter" class="section">
	<!-- container -->

	<div class="container">
		<!-- row -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Email của bạn đã được lưu lại</p>
            </div>
        </div>
		<div class="row">
			<div class="col-md-12">
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        var modal = document.getElementById("myModal");
                        var modalContent = document.getElementsByClassName("modal-content")[0];

                        // Khi form được submit
                        document.getElementById("myForm").addEventListener("submit", function (event) {
                            event.preventDefault();

                            // Hiển thị modal
                            modal.style.display = "block";

                            // Canh chỉnh vị trí modal giữa màn hình
                            var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
                            var modalHeight = modalContent.clientHeight;
                            modalContent.style.marginTop = Math.max((windowHeight - modalHeight) / 2, 0) + "px";

                            // Ẩn modal sau 2 giây
                            setTimeout(function () {
                                modal.style.display = "none";
                            }, 2000);
                        });

                        // Khi người dùng thay đổi kích thước màn hình
                        window.addEventListener("resize", function () {
                            var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
                            var modalHeight = modalContent.clientHeight;
                            modalContent.style.marginTop = Math.max((windowHeight - modalHeight) / 2, 0) + "px";
                        });
                    });
                </script>


                <!-- Modal -->


                <div class="newsletter">
					<p>Đăng ký nhận <strong>THÔNG TIN</strong></p>
					<form id="myForm"  method="POST">
						<input class="input" type="email" name="name_email" placeholder="Email Của Bạn">
						<button class="newsletter-btn" type="submit">Đăng Ký</button>
					</form>

					<ul class="newsletter-follow">
						<li>
							<a href="#"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
						<ul class="footer-links">
							<li><a href="#"><i class="fa fa-map-marker"></i>53 Võ Văn Ngân</a></li>
							<li><a href="#"><i class="fa fa-phone"></i>+84 845 455 584</a></li>
							<li><a href="#"><i class="fa fa-envelope-o"></i>TongTanHuy@gmail.com</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							<?php foreach ($getAllProtypes as $value) : ?>
								<li><a href="store_menu.php?typeid=<?php echo $value['type_id'] ?>"><?php echo $value['type_name']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Information</h3>
						<ul class="footer-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Orders and Returns</a></li>
							<li><a href="#">Terms & Conditions</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Service</h3>
						<ul class="footer-links">
							<li><a href="#">My Account</a></li>
							<li><a href="blank.php">View Cart</a></li>
							<li><a href="#">Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="#">Help</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->

	<!-- bottom footer -->
	<div id="bottom-footer" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</span>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /bottom footer -->
</footer>
<!-- /FOOTER -->