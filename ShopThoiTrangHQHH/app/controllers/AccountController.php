<?php
require_once('../app/models/User.php');
class AccountController
{
    public function register()
    {
        $ErrorMessage = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserName = $_POST['UserName'];
            $Pass = $_POST['Pass'];
            $FullName = $_POST['FullName'];
            $PassWord = $_POST['PassWord'];

            if ($Pass != $PassWord) {
                $ErrorMessage = "Passwords do not match";
            } else {
                $ErrorMessage = "";
                $Pass = Password_hash($PassWord, PASSWORD_BCRYPT);

                $isSuccess = User::create($UserName, $Pass, $FullName);

                if ($isSuccess)
                    // Redirect to homepage
                    header('Location: ?route=login');
                else
                    header('Location: ?route=register');
                exit;
            }
        }
        require_once('../app/views/register.php');
    }

    public function login()
    {
        session_start();
        $ErrorMessage = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserName = $_POST['UserName'];
            $Pass = $_POST['Pass'];

            if (empty($UserName) || empty($Pass)) {
                $ErrorMessage = "Vui long nhap day du UserName va PassWord";
                header('Location: ?route=login');
                exit;
            }
            $user = User::find($UserName);
            if (!empty($user)) {
                $isSuccess = Password_verify($Pass, $user['Pass']);
                if ($isSuccess) {
                    $_SESSION['UserId'] = $user['UserName'];
                    $_SESSION['FullName'] = ($user['FullName']);
                    $_SESSION['Avatar'] = $user['Avatar'];
                    $_SESSION['cart'][$_SESSION['UserId']] = json_decode($_COOKIE[$_SESSION['UserId']], true);
                    header('Location: ?');
                } else
                    $ErrorMessage = "Mat khau khong chinh xac!";
            } else
                $ErrorMessage = "Tai khoan khong chinh xac!";
        }
        require_once('../app/views/login.php');
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['Avatar']);
        unset($_SESSION['UserId']);
        // unset($_SESSION['cart'][$_SESSION['UserId']]);
        unset($_SESSION['FullName']);
        header('Location: ?route=login');
    }


    public function uploadAvatar()
    {
        session_start();
        $UserName = $_SESSION['UserId'];
        $user = User::find($UserName);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $PassWord = $_POST['Pass'];
            $FullName = $_POST['FullName'];
            $Email = $_POST['Email'];
            $Phone = $_POST['Phone'];
            $Address = $_POST['Address'];

            $Pass = Password_hash($PassWord, PASSWORD_BCRYPT);

            if ($_FILES['avatar']['size']>0) {
                $target_dir = "../app/uploads/";

                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                // if (file_exists($target_file)) {
                // echo "Sorry, file already exists.";
                // $avatar = htmlspecialchars(basename( $_FILES["avatar"]["name"]));
                //         $isSuccess = User::update($userId, $avatar);
                //         if($isSuccess){
                //             $_SESSION['Avatar']=$avatar;
                //             header('Location: ?');
                //         }
                //             // Redirect to homepage

                // $uploadOk = 0;
                // }

                // Check file size
                if ($_FILES["avatar"]["size"] > 5000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
                        $avatar = htmlspecialchars(basename($_FILES["avatar"]["name"]));
                        $isSuccess = User::update($UserName, $Pass, $FullName, $Email, $Phone, $Address, $avatar);
                        if ($isSuccess) {
                            $_SESSION['Avatar'] = $avatar;
                            header('Location: ?');
                        }
                        // Redirect to homepage
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }else{
                $avatar = $user['Avatar'];
                $isSuccess = User::update($UserName, $Pass, $FullName, $Email, $Phone, $Address, $avatar);
                        if ($isSuccess) {
                            header('Location: ?');
                        }
            }
        }
        require_once('../app/views/avatar.php');
    }
}
