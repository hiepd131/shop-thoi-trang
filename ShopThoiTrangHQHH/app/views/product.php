<?php include_once('../app/views/shares/header.php')?>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">THÊM SẢN PHẨM MỚI</h3>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="TenSp">Tên sản phẩm</label>
                <input type="text" class="form-control" id="TenSp" name="TenSp" required>
              </div>
              <div class="form-group">
                <label for="MauSp">Màu sản phẩm</label>
                <input type="text" class="form-control" id="MauSp" name="MauSp" required>
              </div>
              <div class="form-group">
                <label for="SizeSp">Kích thước sản phẩm</label>
                <input type="text" class="form-control" id="SizeSp" name="SizeSp" required>
              </div>
              <div class="form-group">
                <label for="SoLuongSp">Số lượng sản phẩm</label>
                <input type="text" class="form-control" id="SoLuongSp" name="SoLuongSp" required>
              </div>
              <div class="form-group">
                <label for="GiaTienSp">Giá tiền sản phẩm</label>
                <input type="text" class="form-control" id="GiaTienSp" name="GiaTienSp" required>
              </div>
              <div class="form-group">
                <label for="MoTaSp">Mô tả sản phẩm</label>
                <input type="text" class="form-control" id="MoTaSP" name="MoTaSp" required>
              </div>
              <div class="form-group">
                <label for="LoaiSp">Loại sản phẩm</label>
                <input type="text" class="form-control" id="LoaiSp" name="LoaiSp" required>
              </div>
              <div class="form-group">
                <label for="HinhAnhSp">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" id="HinhAnhSp" name="HinhAnhSp" required>
              </div>
              <br/>
              <button type="submit" class="btn btn-primary w-100">Thêm mới</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../app/views/shares/footer.php')?>