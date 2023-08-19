<?php include_once('../app/views/shares/header.php')?>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">PHIEU DANG KY THUC TAP</h3>
          </div>
          <div class="card-body">
            <form action="?route=add" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="hoten">Ho Ten</label>
                <input type="text" class="form-control" id="hoten" name="hoten" required>
              </div>
              <div class="form-group">
                <label for="mssv">Ma sinh vien</label>
                <input type="text" class="form-control" id="mssv" name="mssv" required>
              </div>
              <div class="form-group">
                <label for="chuyennganh">Chuyen nganh</label>
                <input type="text" class="form-control" id="chuyennganh" name="chuyennganh" required>
              </div>
              <div class="form-group">
                <label for="congty">Cong ty</label>
                <input type="text" class="form-control" id="congty" name="congty" required>
              </div>
              <div class="form-group">
                <label for="cv">CV</label>
                <input type="file" class="form-control" id="cv" name="cv" required>
              </div>
              <br/>
              <button type="submit" class="btn btn-primary w-100">Gui Phieu Dang Ky</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>