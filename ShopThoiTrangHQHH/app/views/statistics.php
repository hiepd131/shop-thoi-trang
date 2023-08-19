<?php include_once('../app/views/shares/header.php') ?>
<div class="container">
	<div id="content">
		<h3> Tổng số lượng đơn hàng của bạn là: <b><?= $countBills ?></b><br> <br> Tổng giá trị của các đơn hàng bạn đặt là: <b><?= $countPrice ?></b><br><br>Bạn đã đặt <b><?= $countBill ?> </b> đơn hàng trong 30 phút vừa qua
		</h3>
		<div class="space25">&nbsp;</div><br><br>

		<!--price table-->
		<h3 class="text-center"><?php if($countBill>0) echo'Một số đơn đặt hàng gần đây' ?> </h3>
		<div class="row">
			<?php $count = 0;
			if ($countBill > 0) {
				foreach ($danhSachSp as $sanpham) : $count++; ?>
					<div class="col-sm-3" id="<?= $sanpham['Id'] ?>">
						<div class="beta-pricing">
							<div class="pri-title">
								<h4><?= $sanpham['TenSp'] ?></h4>
							</div>
							<div class="clear"></div>
							<span class="pri-amo">
								<!-- <span class="price-currency">$</span> -->
								<span class="price-amount"><img src="../app/uploads/<?= $sanpham['HinhAnhSp'] ?>" width="270px" height="320px" alt=""></span>
								<!-- <sup>99</sup> -->
								<!-- <sub>$</sub> -->
							</span>
							<div class="clear"></div>
							<span class="beta-price-list">Giá tiền: <?= $sanpham['GiaTienSp'] ?>$</span>
							<span class="beta-price-list">Kích cỡ: <?= $sanpham['SizeSp'] ?></span>
							<span class="beta-price-list">Màu sắc: <?= $sanpham['MauSp'] ?></span>
							<span class="beta-price-list">Số lượng: <?= $sl ?></span>
							<!-- <span class="beta-price-button"><a href="#" class="beta-btn beta-btn-2d">Check Now <i class="fa fa-chevron-right"></i></a></span> -->
						</div>
					</div>
			<?php if ($count == 4) {
						$count = 0;
						echo '<div class="space50">&nbsp;</div>';
					}
				endforeach;
			}
			?>
			<!--price table-->
			<!--price table-->
			<!-- <div class="col-sm-3">
			<div class="beta-pricing">
				<div class="pri-title"><h4>Standard</h4></div>
				<div class="clear"></div>
				<span class="pri-amo">
				<span class="price-currency">$</span>
					<span class="price-amount">5</span>
					<sup>99</sup>
					<sub>mountly</sub>
				</span>
				<div class="clear"></div>
				<span class="beta-price-list">5 Projects</span>
				<span class="beta-price-list">5 GB Storage</span>
				<span class="beta-price-list">Unlimited Users</span>
				<span class="beta-price-list">10 GB Bandwith</span>
				<span class="beta-price-list">Enhanced Security</span>
				<span class="beta-price-button"><a href="#" class="beta-btn beta-btn-2d">Sign up Now <i class="fa fa-chevron-right"></i></a></span>
			</div>
			</div> -->
			<!--price table-->
			<!--price table-->
			<!-- <div class="col-sm-3">
			<div class="beta-pricing">
				<div class="pri-title"><h4>Standard</h4></div>
				<div class="clear"></div>
				<span class="pri-amo">
				<span class="price-currency">$</span>
					<span class="price-amount">5</span>
					<sup>99</sup>
					<sub>mountly</sub>
				</span>
				<div class="clear"></div>
				<span class="beta-price-list">5 Projects</span>
				<span class="beta-price-list">5 GB Storage</span>
				<span class="beta-price-list">Unlimited Users</span>
				<span class="beta-price-list">10 GB Bandwith</span>
				<span class="beta-price-list">Enhanced Security</span>
				<span class="beta-price-button"><a href="#" class="beta-btn beta-btn-2d">Sign up Now <i class="fa fa-chevron-right"></i></a></span>
			</div>
			</div> -->
			<!--price table-->
			<!--price table-->
			<!-- <div class="col-sm-3">
			<div class="beta-pricing">
				<div class="pri-title"><h4>Standard</h4></div>
				<div class="clear"></div>
				<span class="pri-amo">
				<span class="price-currency">$</span>
					<span class="price-amount">5</span>
					<sup>99</sup>
					<sub>mountly</sub>
				</span>
				<div class="clear"></div>
				<span class="beta-price-list">5 Projects</span>
				<span class="beta-price-list">5 GB Storage</span>
				<span class="beta-price-list">Unlimited Users</span>
				<span class="beta-price-list">10 GB Bandwith</span>
				<span class="beta-price-list">Enhanced Security</span>
				<span class="beta-price-button"><a href="#" class="beta-btn beta-btn-2d">Sign up Now <i class="fa fa-chevron-right"></i></a></span>
			</div>
			</div>
			</div> -->
			<!--price table-->


			<div class="clear"></div>
			<div class="space20">&nbsp;</div>
			<h4 class="text-center">
				Nhóm Shop thời trang HQHH
				<b>
					<br>
					1. Dương Văn Hiệp - 1911062166<br>
					2. Trần Lê Quân - 1911065647<br>
					3. Huỳnh Nhật Hòa - 1911065782<br>
					4. Phan Thanh Hoàng - 1911065786</b>
				<!-- <a href="mailto:duonghiep131@gmail.com">duonghiep131@gmail.com</a> -->
		</h4>
		</div> <!-- #content -->
	</div> <!-- .container -->
	<?php include_once('../app/views/shares/footer.php') ?>