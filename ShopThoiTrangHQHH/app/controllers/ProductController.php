<?php
require_once('../app/models/Product.php');
require_once('../app/models/User.php');
require_once('../app/models/Bill.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('../app/vendor/autoload.php');

require_once('../app/PHPMailer/src/Exception.php');
require_once('../app/PHPMailer/src/PHPMailer.php');
require_once('../app/PHPMailer/src/SMTP.php');

class ProductController
{
    public function showProduct()
    {
        $Type = $_GET['type'] ?? 'NULL';
        if ($Type != 'NULL') {
            $danhSachSp = Product::getByType($Type);
            require_once('../app/views/product_type.php');
        } else {
            $danhSachSp = Product::getAll();
            require_once('../app/views/product_detail.php');
        }
    }

    public function Statistics()
    {
        session_start();
        if (isset($_SESSION['UserId'])) {
            $UserName = $_SESSION['UserId'];
            $countBill = Bill::countBill($UserName);
            $danhSachBill = Bill::getByUser($UserName);
            $countBills = Bill::countBills($UserName);
            $countPrice = Bill::countPrice($UserName);

            foreach ($danhSachBill as $bill) {
                $sanpham = Product::findProduct($bill['Id_Product'], $bill['Product_M'], $bill['Product_S']);
                if ($sanpham['Id'] == $bill['Id_Product'] && $sanpham['MauSp'] == $bill['Product_M'] && $sanpham['Size'] = $bill['Product_S']) {
                    $sl = $bill['Qty'];
                }
                $danhSachSp[] = $sanpham;
            }

            require_once('../app/views/statistics.php');
        } else {
            header('Location: ?route=login');
            exit;
        }
    }
    function createProduct()
    {
        session_start();

        $user = User::find($_SESSION['UserId']);
        if ($user['Role'] == 1) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $TenSp = $_POST['TenSp'];
                $MauSp = $_POST['MauSp'];
                $SizeSp = $_POST['SizeSp'];
                $SoLuongSp = $_POST['SoLuongSp'];
                $GiaTienSp = $_POST['GiaTienSp'];
                $MoTaSp = $_POST['MoTaSp'];
                $LoaiSp = $_POST['LoaiSp'];
                $target_dir = "../app/uploads/";
                $target_file = $target_dir . basename($_FILES["HinhAnhSp"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if file already exists
                // if (file_exists($target_file)) {
                //     echo "Sorry, file already exists.";
                //     $HinhAnhSp = htmlspecialchars(basename($_FILES["HinhAnhSp"]["name"]));

                //     $uploadOk = 0;
                // }

                // Check file size
                if ($_FILES["HinhAnhSp"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp"
                ) {
                    echo "Sorry, only JPG, JPEG , WEBP & PNG files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["HinhAnhSp"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["HinhAnhSp"]["name"])) . " has been uploaded.";
                        $HinhAnhSp = htmlspecialchars(basename($_FILES["HinhAnhSp"]["name"]));
                        $isSuccess = Product::create($TenSp, $MauSp, $SizeSp, $SoLuongSp, $GiaTienSp, $HinhAnhSp, $MoTaSp, $LoaiSp);
                        if ($isSuccess) {
                            header('Location: ?route=create-sp');
                        }
                        // Redirect to homepage
                        else
                            header('Location: ?route=error');
                        exit;

                        // Redirect to homepage
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            require_once('../app/views/product.php');
        } else {
            header('Location: ?route=error');
            exit;
        }
    }

    function updateProduct()
    {
        session_start();
        $user = User::find($_SESSION['UserId']);

        if ($user['Role'] == 1) {

            $Id = $_GET['Id'];
            $MauSp = $_GET['MauSp'];
            $SizeSp = $_GET['SizeSp'];

            $sanpham = Product::findProduct($Id, $MauSp, $SizeSp);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $Id = $sanpham['Id'];
                $MauSp = $_POST['MauSp'];
                $SizeSp = $_POST['SizeSp'];
                $TenSp = $_POST['TenSp'];
                $SoLuongSp = $_POST['SoLuongSp'];
                $GiaTienSp = $_POST['GiaTienSp'];
                $MoTaSp = $_POST['MoTaSp'];
                $LoaiSp = $_POST['LoaiSp'];
                $target_dir = "../app/uploads/";
                $target_file = $target_dir . basename($_FILES["HinhAnhSp"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if file already exists
                // if (file_exists($target_file)) {
                //     echo "Sorry, file already exists.";
                //     $HinhAnhSp = htmlspecialchars(basename($_FILES["HinhAnhSp"]["name"]));

                //     $uploadOk = 0;
                // }

                // Check file size
                if ($_FILES["HinhAnhSp"]["size"] > 0) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;

                    // Allow certain file formats
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp"
                    ) {
                        echo "Sorry, only JPG, JPEG , WEBP & PNG files are allowed.";
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["HinhAnhSp"]["tmp_name"], $target_file)) {
                            echo "The file " . htmlspecialchars(basename($_FILES["HinhAnhSp"]["name"])) . " has been uploaded.";
                            $HinhAnhSp = htmlspecialchars(basename($_FILES["HinhAnhSp"]["name"]));
                            $isSuccess = Product::update($TenSp, $MauSp, $SizeSp, $SoLuongSp, $GiaTienSp, $HinhAnhSp, $MoTaSp, $LoaiSp, $Id);
                            if ($isSuccess) {
                                header('Location: ?');
                            }
                            // Redirect to homepage
                            else
                                header('Location: ?route=error');
                            exit;

                            // Redirect to homepage
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                } else {
                    $HinhAnhSp = $sanpham['HinhAnhSp'];

                    $isSuccess = Product::update($TenSp, $MauSp, $SizeSp, $SoLuongSp, $GiaTienSp, $HinhAnhSp, $MoTaSp, $LoaiSp, $Id);
                    if ($isSuccess) {
                        header('Location: ?');
                    } // Redirect to homepage
                    else
                        header('Location: ?route=error');
                    exit;
                }
            }
            require_once('../app/views/update.php');
        } else {
            header('Location: ?route=error');
            exit;
        }
    }

    function deleteProduct()
    {
        session_start();
        $user = User::find($_SESSION['UserId']);
        if ($user['Role'] == 1) {
            $Id = $_GET['Id'];
            $MauSp = $_GET['MauSp'];
            $SizeSp = $_GET['SizeSp'];

            $isSuccess = Product::delete($Id, $MauSp, $SizeSp);
            if ($isSuccess)
                // Redirect to homepage
                header('Location: ?');
            else
                header('Location: ?route=delete-sp');
            exit;
        } else {
            header('Location: ?route=error');
            exit;
        }
    }
    function addCart()
    {
        session_start();
        if (isset($_SESSION['UserId'])) {
            if (isset($_POST['Id'])) {
                $Id = $_POST['Id'];
                $MauSp = $_POST['MauSp'];
                $SizeSp = $_POST['SizeSp'];
                $SoLuongSp = $_POST['SoLuongSp'] ?? 1;

                $_Product = Product::findProduct($Id, $MauSp, $SizeSp);
                if (!empty($_SESSION['cart'][$_SESSION['UserId']])) {
                    if (isset($_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp])) {
                        $_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp]['soluong'] += $SoLuongSp;
                    } else {
                        $item = [
                            'Id' => $Id . $MauSp . $SizeSp,
                            'gia' => $_Product['GiaTienSp'],
                            'mau' => $_Product['MauSp'],
                            'type' => $_Product['LoaiSp'],
                            'size' => $_Product['SizeSp'],
                            'trangthai' => $_Product['TrangThaiSp'],
                            'soluong' => $SoLuongSp,
                            'ten' => $_Product['TenSp'],
                            'img' => $_Product['HinhAnhSp']
                        ];
                        $_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp] = $item;
                    }
                } else {
                    $item = [
                        'Id' => $Id . $MauSp . $SizeSp,
                        'gia' => $_Product['GiaTienSp'],
                        'mau' => $_Product['MauSp'],
                        'type' => $_Product['LoaiSp'],
                        'size' => $_Product['SizeSp'],
                        'trangthai' => $_Product['TrangThaiSp'],
                        'soluong' => $SoLuongSp,
                        'ten' => $_Product['TenSp'],
                        'img' => $_Product['HinhAnhSp']
                    ];
                    $_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp] = $item;
                }
                setcookie($_SESSION['UserId'], json_encode($_SESSION['cart'][$_SESSION['UserId']]), time() + 86400, "/");
                header("location: ?route=view-cart");
                exit;
            } else if (isset($_GET['Id'])) {
                $Id = $_GET['Id'];
                $MauSp = $_GET['MauSp'];
                $SizeSp = $_GET['SizeSp'];
                $SoLuongSp = $_POST['SoLuongSp'] ?? 1;

                $_Product = Product::findProduct($Id, $MauSp, $SizeSp);
                if (!empty($_SESSION['cart'][$_SESSION['UserId']])) {
                    if (isset($_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp])) {
                        $_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp]['soluong'] += $SoLuongSp;
                    } else {
                        $item = [
                            'Id' => $Id . $MauSp . $SizeSp,
                            'gia' => $_Product['GiaTienSp'],
                            'mau' => $_Product['MauSp'],
                            'type' => $_Product['LoaiSp'],
                            'size' => $_Product['SizeSp'],
                            'trangthai' => $_Product['TrangThaiSp'],
                            'soluong' => $SoLuongSp,
                            'ten' => $_Product['TenSp'],
                            'img' => $_Product['HinhAnhSp']
                        ];
                        $_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp] = $item;
                    }
                } else {
                    $item = [
                        'Id' => $Id . $MauSp . $SizeSp,
                        'gia' => $_Product['GiaTienSp'],
                        'mau' => $_Product['MauSp'],
                        'type' => $_Product['LoaiSp'],
                        'size' => $_Product['SizeSp'],
                        'trangthai' => $_Product['TrangThaiSp'],
                        'soluong' => $SoLuongSp,
                        'ten' => $_Product['TenSp'],
                        'img' => $_Product['HinhAnhSp']
                    ];
                    $_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp] = $item;
                }
                setcookie($_SESSION['UserId'], json_encode($_SESSION['cart'][$_SESSION['UserId']]), time() + 86400, "/");
                header("location: ?route=view-cart");
                exit;
            } else {
                header("Location: ?route=error");
                exit;
            }
        } else {
            header("Location: ?route=login");
            exit;
        }
    }
    function viewCart()
    {
        $danhSachSp = Product::getAll();
        require_once('../app/views/shopping_cart.php');
    }

    function emptyCart()
    {
        session_start();
        unset($_SESSION['cart'][$_SESSION['UserId']]);
        header("location: ?route=view-cart");
        exit;
    }

    function deleteCartItem()
    {
        session_start();
        if (isset($_POST['Id'])) {
            $Id = $_POST['Id'];
            unset($_SESSION['cart'][$_SESSION['UserId']][$Id]);
            setcookie($_SESSION['UserId'], json_encode($_SESSION['cart'][$_SESSION['UserId']]), time() + 86400, "/");
            echo json_encode(['success' => true]);
        }
    }

    function updateCartItem()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $soluong = $_POST['soluong'];
            $Id = $_POST['Id'];
            // $MauSp = $_POST['MauSp'];
            // $SizeSp = $_POST['SizeSp'];
            // if (!empty($_SESSION['cart'][$_SESSION['UserId']])) {
            //     if (isset($_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp])) {
            //         $_SESSION['cart'][$_SESSION['UserId']][$Id . $MauSp . $SizeSp]['soluong'] = $soluong;
            //     }
            // }
            if (!empty($_SESSION['cart'][$_SESSION['UserId']])) {
                if (isset($_SESSION['cart'][$_SESSION['UserId']][$Id])) {
                    $_SESSION['cart'][$_SESSION['UserId']][$Id]['soluong'] = $soluong;
                    setcookie($_SESSION['UserId'], json_encode($_SESSION['cart'][$_SESSION['UserId']]), time() + 86400, "/");
                }
            }
        }
    }

    function deleteAjax()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // $Id = $_POST['Id'];
            // $isSuccess = Product::delete($Id);
            // echo json_encode(['success' => $isSuccess]);
        }
    }

    function updateAjax()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // $Id = urldecode($_POST['Id']);
            // parse_str(urldecode($_POST['Id']), $form_data);

            // Access each element of the array using its key
            $Id1 = $_POST['Id'];
            $Id2 = $_POST['CartId'];
            $MauSp = $_POST['MauSp'];
            $SizeSp = $_POST['SizeSp'];
            // echo $Id2.$Id1.$MauSp;
            $_Product = Product::findProduct($Id1, $MauSp, $SizeSp);
            // print_r( $_SESSION['cart'][$_SESSION['UserId']][$Id1 . $MauSp . $SizeSp]);
            if (!isset($_SESSION['cart'][$_SESSION['UserId']][$Id1 . $MauSp . $SizeSp]) && !empty($_Product)) {
                $item = [
                    'Id' => $Id1 . $MauSp . $SizeSp,
                    'gia' => $_Product['GiaTienSp'],
                    'mau' => $_Product['MauSp'],
                    'type' => $_Product['LoaiSp'],
                    'size' => $_Product['SizeSp'],
                    'trangthai' => $_Product['TrangThaiSp'],
                    'soluong' => 1,
                    'ten' => $_Product['TenSp'],
                    'img' => $_Product['HinhAnhSp']
                ];

                // array_unshift($_SESSION['cart'][$_SESSION['UserId']], $item);
                $_SESSION['cart'][$_SESSION['UserId']][$Id1 . $MauSp . $SizeSp] = $item;
                unset($_SESSION['cart'][$_SESSION['UserId']][$Id2]);
                // Retrieve the session value
                $isSuccess = true;
                // Extract the first value from the session
                // $firstValue = reset($_SESSION['cart'][$_SESSION['UserId']]);
            } else {
                $isSuccess = false;
            }
        }
        echo json_encode(['success' => $isSuccess]);
    }
    function checkoutCart()
    {
        session_start();
        if (isset($_SESSION['UserId'])) {
            $user = User::find($_SESSION['UserId']);

            $Payment = $_POST['payment_method'] ?? "";
            $ini = parse_ini_file('../config/app.ini');

            switch ($Payment) {
                case "COD":
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $Id_User = $user['UserName'];
                        $Notes = $_POST['notes'];
                        $Total = $_POST['total'];

                        foreach ($_SESSION['cart'][$_SESSION['UserId']] as $cart) {
                            $Product_T = $cart['ten'];
                            $Product_M = $cart['mau'];
                            $Product_S = $cart['size'];
                            $Product_IMG = $cart['img'];
                            $Qty = $cart['soluong'];
                            preg_match('/\d+/', $cart['Id'], $Id_Product);
                            $product = Product::findProduct($Id_Product[0], $Product_M, $Product_S);
                            $isSuccess = Bill::create($Id_User, $Id_Product[0], $Product_M, $Product_S, $Qty, $Payment, $Total, $Notes);
                            // $substrings will be array("This", "Is", "A", "String", "With", "123", "Numbers")
                            if ($isSuccess && $product['SoLuongSp'] <= 0) {
                                $mail = new PHPMailer(true);
                                // SMTP configuration
                                $mail->isSMTP();
                                $mail->Host = $ini['host'];
                                $mail->SMTPAuth = true;
                                $mail->Username = $ini['email'];
                                $mail->Password = $ini['password'];
                                $mail->SMTPSecure = 'tls';
                                $mail->Port = $ini['port'];
                                $mail->addAttachment("../app/uploads/$Product_IMG", 'Hinh anh minh hoa san pham');

                                // Sender and recipient settings
                                $mail->setFrom($ini['email'], $ini['from']);
                                $mail->addAddress($user['Email'], $user['FullName']);

                                // Email content
                                $mail->isHTML(true);
                                $mail->Subject = 'Thong bao xac nhan don hang';
                                $mail->Body = "<h3>Xin chào {$user['FullName']}, rất tiếc khi phải thông báo rằng <strong>$Qty</strong> sản phẩm <strong>$Product_T, Size: $Product_S, Màu: $Product_M</strong> bạn vừa đặt tạm thời đã hết, nếu sản phẩm này có sẵn hàng chúng tôi sẽ gửi thông tin đến bạn hãy giữ liên lạc nhé!</h3><p>Duong Van Hiep.</p>";

                                // Send email
                                if ($mail->send()) {
                                    echo "<script>alert('Email sent successfully.')</script>";
                                } else {
                                    echo "<script>alert('Error sending email: '" . $mail->ErrorInfo . ")</script>";
                                }
                            }



                            unset($_SESSION['cart'][$_SESSION['UserId']][$cart['Id']]);
                        }
                        // Redirect to homepage
                        // header("Location: ?route=view-cart");
                        // exit;
                    }
                    break;

                case "Stripe":
                    $publishableKey = $ini['stripe_api_key'];
                    require_once('../app/views/stripe_payment.php');
                    break;

                default:
                    require_once('../app/views/checkout.php');
            }
        } else {
            header("Location: ?route=login");
            exit;
        }
    }
    function stripeAjax()
    {
        $ini = parse_ini_file('../config/app.ini');

        \Stripe\Stripe::setApiKey($ini['stripe_secret_key']);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            try {
                // Create a Payment Intent
                $paymentIntent = \Stripe\PaymentIntent::create([
                    'amount' => 14000, // Amount in cents
                    'currency' => 'vnd'
                ]);

                // Send the Payment Intent's client secret to the client-side for confirmation
                echo json_encode(['clientSecret' => $paymentIntent->client_secret]);

                // $clientSecret = $paymentIntent->client_secret;
                // Get your Stripe Publishable Key
            } catch (\Stripe\Exception\CardException $e) {
                echo json_encode(['error' => $e->getMessage()]);
            }

            // header("Location: ../app/views/stripe_payment.php");
            // exit;
        }
    }
}
