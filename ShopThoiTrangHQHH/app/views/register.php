<?php include_once('../app/views/shares/header.php')?>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">TẠO TÀI KHOẢN</h3>
            <p  class="text-danger">
                <?php echo($ErrorMessage);
                ?>
            </p>
          </div>
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <label for="UserName">TÊN TÀI KHOẢN</label>
                <input type="text" class="form-control" id="UserName" name="UserName" required>
              </div>
              <div class="form-group">
                <label for="Pass">MẬT KHẨU</label>
                <input type="text" class="form-control" id="Pass" name="Pass" required>
              </div>
              <div class="form-group">
                <label for="PassWord">NHẬP LẠI MẬT KHẨU</label>
                <input type="text" class="form-control" id="PassWord" name="PassWord" required>
              </div>
              <div class="form-group">
                <label for="FullName">HỌ TÊN</label>
                <input type="text" class="form-control" id="FullName" name="FullName" required>
              </div>
              <br/>
              <button type="submit" class="btn btn-primary w-100">ĐĂNG KÝ</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../app/views/shares/footer.php')?>