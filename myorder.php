<?php session_start(); ?>
<?php
require("config/Database.php");
require("models/model.php");
require("models/productsModel.php");
require("models/protypesModel.php");
require("models/manufactures.php");
require("models/userModel.php");
require("models/orderModel.php");
// Products
$Products = new Products;
$getAllProducts = $Products->getAllProducts();
$getAllProductsNew = $Products->getAllProductsNew();
$getProductsLimit3 = $Products->getProductsLimit3();
$getProductsLimit6 = $Products->getProductsLimit6();
$getProductsLimit66 = $Products->getProductsLimit66();
$getProductsLimit12 = $Products->getProductsLimit12();
$getAllProductsSelling = $Products->getAllProductsSelling();
$user = new User;
//$edit_user =$user->editUser($username,$email,$telephone,$address,$user_id);
$order = new orderModel;
$getAllOrders = $order->getAllOrdersByUserID($_SESSION['user']['user_id']);
// $editUser=$User->editUser($_SESSION['user']['user_id']);
// Protypes
$Protypes = new Protypes;
$getAllProtypes = $Protypes->getAllProtypes();
$orderCancel = [];
if (isset($_COOKIE['orderCancel'])) {
	$arrId = json_decode($_COOKIE['orderCancel'], true);

	// $orderCancel = $order->getOrderByIds($arrId);
}


?>

<!-- HEADER -->
<?php include("header.php"); ?>
<!-- /HEADER -->

<!-- SECTION -->
<style>
	/* Thêm animation vào modal */
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

	.modal-content {
		position: relative;
		background-color: #fefefe;
		margin: 10% auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
		height: 50%;
		animation: fadeIn 0.5s;
		/* Thêm animation ở đây */
	}

	@keyframes fadeIn {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	/* Thêm animation vào nút đóng modal */
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
<form action="order.php" method="post">
	<main class="">

		<div class="layout-info-account">
			<br>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-1 sidebar-account">

					</div>
					<div class="col-xs-12 col-sm-11">
						<div class="row">
							<div class="col-xs-12" id="customer_sidebar">
								<h2 class="title-detail">Thông tin tài khoản <button type="button" id="openModalBtn"><i class="bi bi-gear"></i></button></h2>



								<p class="name_account">Name acount: <?php echo $_SESSION['username'] ?></p>


								<p class="email ">Email:
									<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['email'] ?></p>
								<div class="address ">

									<p>Address:
										<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['address'] ?>
									</p>


									<p> Vietnam</p>
									<p>Telephone:
										<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['telephone'] ?>
									</p>


								</div>
							</div>
							<div class="col-xs-12" id="customer_orders">
								<div class="customer-table-wrap">
									<div class="customer_order customer-table-bg">

										<p class="title-detail">
											Danh sách đơn hàng mới nhất
										</p>
										<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<th class="order_number text-center">Mã đơn hàng</th>
														<th class="date text-center">Ngày đặt</th>
														<th class="total text-right">Thành tiền</th>
														<th class="payment_status text-center">Trạng thái thanh toán
														</th>
														<th class="fulfillment_status text-center">Trạng Thái đặt hàng
														</th>
														<th class="fulfillment_status text-center">Hủy đơn </th>

													</tr>
												</thead>
												<?php foreach ($getAllOrders as $value) {

												?>
													<tbody>

														<tr>
															<?php $id = trim($value['id'], "#") ?>
															<td class="text-center"><a href="mydetail.php?id=<?php echo $id ?>" title="">
																	<?php echo $value['id'] ?>
																</a></td>
															<td class="text-center">
																<span>
																	<?php echo $value['time'] ?>
																</span>
															</td>
															<td class="text-right"><span class="total money">
																	<?php echo $value['total'] ?>đ
																</span>
															</td>
															<td class="text-center"><span class="status_paid">Chưa thanh
																	toán</span></td>
															<td class="text-center"><span class="status_fulfilled">Đã đặt
																	hàng</span></td>
															<td class="text-center btn-dark"><span class="status_fulfilled">
																	<?php
																	foreach ($arrId as $key) {
																		$i = 0;
																		if ($key == $value['id']) {
																			$order_id = trim($value['id'], "#")
																	?>

																			<a href="cancelOrder.php?id=<?php echo $order_id ?>"><i class="bi bi-x-circle-fill" onclick="return confirm('Bạn có muốn hủy không??')">Cancel</i></a>

																		<?php
																			$i = 1;
																			break;
																		}
																	}
																	if ($i == 0) {
																		?>
																		Không thể hủy
																	<?php
																	}

																	?>
																</span></td>

														</tr>




													</tbody>
												<?php }
												?>

											</table>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</main>
</form>
<form action="myorder.php" method="post">
	<div id="myModal" class="modal">
		<div class="modal-content">
			<span class="close" id="closeModalBtn">&times;</span>
			<h2>Chỉnh sửa thông tin</h2>
			<label for="name_account">Name Account</label><br>
			<input type="text" name="name_account" class="name_account" value="<?php echo $_SESSION['username'] ?>"><br>
			<label for="email">Email</label><br>
			<input type="text" class="email" value="<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['email'] ?> "><br>
			<label for="address">Address</label><br>
			<input type="text" class="address" value="<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['address'] ?>"><br>
			<label for="telephone">Telephone</label><br>
			<input type="text" class="telephone " value="<?php echo $user->getAllUserByID($_SESSION['user']['user_id'])[0]['telephone'] ?>"><br>
			<button type="submit">OK</button>
		</div>
	</div>
</form>
<!-- FOOTER -->
<?php include("footer.php"); ?>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var openModalBtn = document.getElementById('openModalBtn');

	// Get the <span> element that closes the modal
	var closeModalBtn = document.getElementById('closeModalBtn');

	// When the user clicks the button, open the modal
	openModalBtn.onclick = function() {
		modal.style.display = 'block';
	}

	// When the user clicks on <span> (x), close the modal
	closeModalBtn.onclick = function() {
		modal.style.display = 'none';
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = 'none';
		}
	}
	//sua thong tin
</script>
</body>

</html>