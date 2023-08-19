<?php include_once('../app/views/shares/header.php')?>
<main id="main" class="main">
    <div>
        <h1>TRANG SHOPPING CART</h1>
    </div>
    <table class="table my-3">
        <a href="?route=empty-cart" class="btn btn-sm btn-danger mt-2">Xoa Gio Hang</a>
    <thead>
        <tr class="text-center"></tr>
        <th>Ma So Phieu</th>
        <th>Ho Va Ten</th>
        <th>IMG</th>
        <th>So Luong</th>
    </thead>
    <tbody>
        <?php
        if(isset($_SESSION['cart'])):
            foreach($_SESSION['cart'] as $cart):
        ?>
        <tr class="text-center">
            <td><?= $cart['masophieu'];?></td>
            <td><?= $cart['ten'];?></td>
            <td><img class="pull-left" src="../app/uploads/<?= $cart['img'];?>" width="80px" height="80px" alt=""></td>
            <td><form action="?route=update-cart-item" method="POST">
                <input type="number" value="<?= $cart['soluong'];?>" name="soluong" min="1">
                <input type="hidden" name="masophieu" value="<?= $cart['masophieu'];?>"> 
                <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
            </form>
        </td>
            <td>
                <a class = "btn btn-sm btn-danger" href="?route=delete-cart-item&masophieu=<?= $cart['masophieu'];?>"> Remove </a>
            </td>
        </tr>
        <?php
        endforeach;
    endif;
        ?>
    </tbody>
    </table>
</main>