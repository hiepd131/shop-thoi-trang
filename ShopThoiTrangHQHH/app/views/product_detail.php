<?php include_once('../app/views/shares/header.php') ?>
<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Product</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb font-large">
				<a href="index.html">Home</a> / <span>Product</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">

				<div class="row">
					<?php $count = 0;
					foreach ($danhSachSp as $sanpham) : $count++;
						if ($sanpham['Id'] == $_GET['Id'] && $sanpham['MauSp'] == $_GET['MauSp'] && $sanpham['SizeSp'] == $_GET['SizeSp']) { ?>
							<div class="col-sm-4">
								<img src="../app/uploads/<?= $sanpham['HinhAnhSp'] ?>" width="270px" height="320px" alt="">
							</div>
							<div class="col-sm-8">
								<div class="single-item-body">
									<p class="single-item-title"><?= $sanpham['TenSp'] ?></p>
									<p class="single-item-price">
										<span>$<?= $sanpham['GiaTienSp'] ?></span>
									</p>
								</div>

								<div class="clearfix"></div>
								<div class="space20">&nbsp;</div>

								<div class="single-item-desc">
									<p><?= $sanpham['MoTaSp'] ?></p>
								</div>
								<div class="space20">&nbsp;</div>

								<p>Options:</p>
								<div class="single-item-options">
									<form action="?route=add-cart" method="POST">
										<input type="hidden" name="Id" value="<?=$_GET['Id']?>">
										<?php
										echo "<select class='wc-select' name='SizeSp' id='SizeSp" . $_GET['Id'] . "'><option>Size</option>";
										foreach ($danhSachSp as $sanpham) {
											// Add each database value to an option element
											$selected = '';
											if ($sanpham['Id'] == $_GET['Id']) {
												if ($sanpham["SizeSp"] == $_GET['SizeSp']) {
													$selected = 'selected';
												}
												echo "<option value='" . $sanpham["SizeSp"] . "' $selected>" . $sanpham["SizeSp"] . "</option>";
											}
										}
										// Close the select element
										echo "</select>";
										?>
										<?php
										echo "<select class='wc-select' name='MauSp' id='MauSp" . $_GET['Id'] . "'><option>Color</option>";
										foreach ($danhSachSp as $sanpham) {
											// Add each database value to an option element
											$selected = '';
											if ($sanpham['Id'] == $_GET['Id']) {
												if ($sanpham["MauSp"] == $_GET['MauSp']) {
													$selected = 'selected';
												}
												echo "<option value='" . $sanpham["MauSp"] . "' $selected>" . $sanpham["MauSp"] . "</option>";
											}
										}
										// Close the select element
										echo "</select>";
										?>
										<select class="wc-select" name="SoLuongSp">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
										<button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
									</form>
									<div class="clearfix"></div>
								</div>
							</div>
					<?php }
					endforeach ?>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Description</a></li>
						<li><a href="#tab-reviews">Reviews (0)</a></li>
					</ul>

					<div class="panel" id="tab-description">

						<!-- <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p> -->
						<p><b> Chất liệu</b>: vải tổng hợp cao cấp <br>
							<b>Kiểu dáng </b>: ​chân váy bút chì cạp cao, tone màu xanh trơn<br>
							<b>Sản phẩm thuộc dòng</b>: NEM NEW<br>
							<b> Thông tin người mẫu</b>: mặc sản phẩm size 2<br>
							<b> Sản phẩm kết hợp</b>:áo SM18312
						</p>
						<!-- <p>Consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequaturuis autem vel eum iure reprehenderit qui in ea voluptate velit es quam nihil molestiae consequr, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? </p> -->
					</div>
					<div class="panel" id="tab-reviews">
						<p>No Reviews</p>
					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Related Products</h4>

					<div class="row">
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="product.html"><img src="assets/dest/images/products/4.jpg" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">Sample Woman Top</p>
									<p class="single-item-price">
										<span>$34.55</span>
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="single-item">
								<div class="single-item-header">
									<a href="product.html"><img src="assets/dest/images/products/5.jpg" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">Sample Woman Top</p>
									<p class="single-item-price">
										<span>$34.55</span>
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="single-item">
								<div class="ribbon-wrapper">
									<div class="ribbon sale">Sale</div>
								</div>

								<div class="single-item-header">
									<a href="#"><img src="assets/dest/images/products/6.jpg" alt=""></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">Sample Woman Top</p>
									<p class="single-item-price">
										<span class="flash-del">$34.55</span>
										<span class="flash-sale">$33.55</span>
									</p>
								</div>
								<div class="single-item-caption">
									<a class="add-to-cart pull-left" href="#"><i class="fa fa-shopping-cart"></i></a>
									<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Best Sellers</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">New Products</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
							<div class="media beta-sales-item">
								<a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
								<div class="media-body">
									Sample Woman Top
									<span class="beta-sales-price">$34.55</span>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->

<?php include_once('../app/views/shares/footer.php') ?>