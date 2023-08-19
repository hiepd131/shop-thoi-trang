<?php include_once('../app/views/shares/header.php')?>
  <div class="container">
    <div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">SHOP THỜI TRANG HQHH</h3>
            <p  class="text-danger">
                <?php echo($ErrorMessage);
                ?>
            </p>
          </div>
          <div class="card-body">
            <form method="post" style="text-align:left;">
              <div class="form-group">
                <label for="UserName">Tên tài khoản</label>
                <input type="text" class="form-control" id="UserName" name="UserName" required>
              </div>
              <div class="form-group">
                <label for="Pass">Mật khẩu</label>
                <input type="text" class="form-control" id="Pass" name="Pass" required>
              </div>
              <br/>
              <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../app/views/shares/footer.php')?>