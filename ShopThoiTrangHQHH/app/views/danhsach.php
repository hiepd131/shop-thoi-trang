<?php include_once('../app/views/shares/header.php') ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Ma So Phieu</th>
            <th scope="col">Ho Ten</th>
            <th scope="col">Ma Sinh Vien</th>
            <th scope="col">Chuyen Nganh</th>
            <th scope="col">Cong Ty</th>
            <th scope="col">Sua</th>
            <th scope="col">Xoa</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($danhSachPhieuDK as $phieu) : ?>
        <tr>
            <td><?= $phieu['MaSoPhieu'] ?></td>
            <td><?= $phieu['HoTen'] ?></td>
            <td><?= $phieu['MaSinhVien'] ?></td>
            <td><?= $phieu['ChuyenNganh'] ?></td>
            <td><?= $phieu['CongTy'] ?></td>
            <td><a href="?route=edit&masophieu=<?= $phieu['MaSoPhieu'] ?>">Sua</a></td>
            <td><a href="?route=delete&masophieu=<?= $phieu['MaSoPhieu'] ?>">Xoa</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class="row" id="phieu-container">
    <?php foreach ($danhSachPhieuDK as $phieu) : ?>
    <div class="col-3" id="<?= $phieu['MaSoPhieu'] ?>">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img src="../app/uploads/<?= $phieu['Cv'] ?>" class="card-img-top" alt="...">
                <h5 class="card-title"><?= $phieu['MaSoPhieu'] ?></h5>
                <p class="card-text"><?= $phieu['HoTen'] ?> - <?= $phieu['MaSinhVien'] ?></p>
                <a href="?route=add-cart&masophieu=<?= $phieu['MaSoPhieu'] ?>" class="btn btn-primary">Add to cart</a>

                <button class="btn btn-danger delete-phieu" data-maSoPhieu="<?= $phieu['MaSoPhieu'] ?>">Delete</button>
                <button class="btn btn-warning" data-id="<?= $phieu['MaSoPhieu'] ?>" data-bs-toggle="modal"
                    data-bs-target="#EditModal<?= $phieu['MaSoPhieu'] ?>">Edit</button>

                <div class="modal fade" id="EditModal<?= $phieu['MaSoPhieu'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $phieu['MaSoPhieu'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form class="EditForm" id="EditForm<?= $phieu['MaSoPhieu'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" name="masophieu" value="<?= $phieu['MaSoPhieu'] ?>">
                                    <div class="form-group">
                                        <label for="hoten">Ho Ten</label>
                                        <input type="text" class="form-control" id="hoten" name="hoten"
                                            value="<?= $phieu['HoTen'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="masinhvien">Ma sinh vien</label>
                                        <input type="text" class="form-control" id="masinhvien" name="masinhvien"
                                            value="<?= $phieu['MaSinhVien'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="chuyennganh">Chuyen nganh</label>
                                        <input type="text" class="form-control" id="chuyennganh" name="chuyennganh"
                                            value="<?= $phieu['ChuyenNganh'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="congty">Cong ty</label>
                                        <input type="text" class="form-control" id="congty" name="congty"
                                            value="<?= $phieu['CongTy'] ?>" required>
                                    </div>
                                    <br />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary update-phieu"
                                        id="update-phieu<?= $phieu['MaSoPhieu'] ?>">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br><br>
    </div>

    <?php endforeach ?>
</div>

<!-- <div class="modal-body">
    <input type="hidden" name="masophieu" value="<?= $phieu['MaSoPhieu'] ?>">
    <div class="form-group">
        <label for="hoten">Ho Ten</label>
        <input type="text" class="form-control" id="hoten" name="hoten" value="<?= $phieu['HoTen'] ?>" required>
    </div>
    <div class="form-group">
        <label for="mssv">Ma sinh vien</label>
        <input type="text" class="form-control" id="mssv" name="mssv" value="<?= $phieu['MaSinhVien'] ?>" required>
    </div>
    <div class="form-group">
        <label for="chuyennganh">Chuyen nganh</label>
        <input type="text" class="form-control" id="chuyennganh" name="chuyennganh" value="<?= $phieu['ChuyenNganh'] ?>"
            required>
    </div>
    <div class="form-group">
        <label for="congty">Cong ty</label>
        <input type="text" class="form-control" id="congty" name="congty" value="<?= $phieu['CongTy'] ?>" required>
    </div>
    <br />
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary update-phieu" id="update-phieu<?= $phieu['MaSoPhieu'] ?>"
        data-maSoPhieu="<?= $phieu['MaSoPhieu'] ?>" data-HoTen="<?= $phieu['HoTen'] ?>"
        data-MaSinhVien="<?= $phieu['MaSinhVien'] ?>" data-ChuyenNganh="<?= $phieu['ChuyenNganh'] ?>"
        data-CongTy="<?= $phieu['CongTy'] ?>">Save changes</button>
</div> -->