<?php include_once('../app/views/shares/header.php')?>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">UPLOAD AVATAR</h3>
            <p  class="text-danger">
            </p>
          </div>
          <div class="card-body">
            <form method="post" action="?route=upload-avatar" enctype="multipart/form-data">
              <div class="form-group">
                <label for="Pass">Mật khẩu</label>
                <input type="text" class="form-control" id="Pass" name="Pass" required>
              </div>
              <div class="form-group">
                <label for="FullName">Họ tên</label>
                <input type="text" class="form-control" id="FullName" name="FullName" value="<?= $user['FullName']?>" required>
              </div>
              <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" id="Email" name="Email" value="<?= $user['Email']?>" required>
              </div>
            <div class="form-group">
                <label for="Phone">Số điện thoại</label>
                <input type="text" class="form-control" id="Phone" name="Phone" value="<?= $user['Phone']?>" required>
              </div>
              <div class="form-group">
                <label for="Address">Địa chỉ</label>
                <input type="text" class="form-control" id="Address" name="Address" value="<?= $user['Address']?>" required>
              </div>  
            <div class="form-group">
                <label for="avatar">UPLOAD FILE</label>
                <input type="file" class="form-control" name="avatar">
              </div>
             
              <br/>
              <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('../app/views/shares/footer.php')?>