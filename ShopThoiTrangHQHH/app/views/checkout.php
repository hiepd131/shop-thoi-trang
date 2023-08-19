<?php include_once('../app/views/shares/header.php') ?>
<!-- #header -->
<div class="container">
	<div id="content">

		<form action="#" method="post" class="beta-form-checkout">
			<div class="row">
				<div class="col-sm-6">
					<h4>Billing Address</h4>
					<div class="space20">&nbsp;</div>

					<form id="checkout-form">

						<div class="form-block">
							<label for="your_full_name">Full name*</label>
							<input type="text" name="full_name" id="full_name" value="<?= $user['FullName']; ?>" readonly required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="adress" id="adress" value="<?= $user['Address']; ?>" placeholder="179 Nation route 13" readonly required>
						</div>

						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" value="<?= $user['Email']; ?>" id="email" readonly required>
						</div>

						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" value="<?= $user['Phone']; ?>" id="phone" readonly required>
						</div>

						<div class="form-block">
							<label for="notes">Order notes</label>
							<textarea name="notes" id="notes"></textarea>
						</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head">
							<h5>Your Order</h5>
						</div>
						<div class="your-order-body">
							<div class="your-order-item">
								<div>
									<?php
									$total = 0;
									if (isset($_SESSION['cart'][$_SESSION['UserId']])) {
										foreach ($_SESSION['cart'][$_SESSION['UserId']] as $cart) {
											$total += $cart['soluong'] * $cart['gia'];
									?>
											<!--  one item	 -->
											<div class="media">
												<img width="25%" src="../app/uploads/<?= $cart['img']; ?>" width="80px" height="80px" alt="" class="pull-left">
												<div class="media-body">
													<p class="font-large text-end"><?= $cart['ten']; ?></p>
													<span name="mau" class="color-gray your-order-info text-end">Color: <?= $cart['mau']; ?></span>
													<span name="size" class="color-gray your-order-info text-end">Size: <?= $cart['size']; ?></span>
													<span name="qty" class="color-gray your-order-info text-end">Qty: <?= $cart['soluong']; ?></span>
												</div>
											</div>
											<!-- end one item -->
									<?php
										}
									}
									?>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left">
									<p class="your-order-f18 text-danger">Total:</p>
								</div>
								<input type="hidden" value="<?= $cart['Id'] ?>">
								<!-- <div class="space20">&nbsp;</div> -->
								<div class="pull-right">
									<h5 class="color-black text-danger" >$<?= $total ?></h5>
									<input type="hidden" name="total" value="<?= $total ?>">
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head">
							<h5>Payment Method</h5>
						</div>

						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="Bank" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Direct Bank Transfer </label>
									<div class="payment_box payment_method_bacs" style="display: block;">
										Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
									</div>
								</li>

								<li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="Ship COD" data-order_button_text="">
									<label for="payment_method_cheque">Cheque Payment </label>
									<div class="payment_box payment_method_cheque" style="display: none;">
										Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
									</div>
								</li>

								<li class="payment_method_paypal">
									<input id="payment_method_paypal" type="radio" class="input-radio" name="payment_method" value="Paypal" data-order_button_text="Proceed to PayPal">
									<label for="payment_method_paypal">PayPal</label>
									<div class="payment_box payment_method_paypal" style="display: none;">
										Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account
									</div>
								</li>
							</ul>
						</div>

						<div class="text-center"><button class="beta-btn primary" type="submit" id="checkout">Checkout <i class="fa fa-chevron-right"></i></button></div>
		</form>
	</div> <!-- .your-order -->
</div>
</div>
</form>
</div> <!-- #content -->
</div> <!-- .container -->
<?php include_once('../app/views/shares/footer.php') ?>