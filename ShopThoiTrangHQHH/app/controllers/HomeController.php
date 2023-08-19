<?php
require_once('../app/models/Product.php');

class HomeController
{
  public function Index()
  {
    $danhSachSp = Product::getAll();
    if (isset($_GET['TenSp'])) {
      $danhSachSp = Product::find($_GET['TenSp']);
    }
    require_once('../app/views/index.php');
  }
  public function Contact()
  {
    require_once('../app/views/contact.php');
  }
  public function About()
  {
    require_once('../app/views/about.php');
  }

  public function Error()
  {
    // $users = User::getAll();
    require_once('../app/views/404.php');
  }
  public function Find()
  {
  }
}
