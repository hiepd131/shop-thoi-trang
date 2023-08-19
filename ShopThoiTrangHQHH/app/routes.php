<?php
$routes = [
  '/' => [
    'controller' => 'HomeController',
    'action' => 'Index'
  ],
  'contact' => [
    'controller' => 'HomeController',
    'action' => 'Contact'
  ],
  'about' => [
    'controller' => 'HomeController',
    'action' => 'About'
  ],
  'error' => [
    'controller' => 'HomeController',
    'action' => 'Error'
  ],
  'product-detail' => [
    'controller' => 'ProductController',
    'action' => 'showProduct'
  ]
  ,
  'create-sp' => [
    'controller' => 'ProductController',
    'action' => 'createProduct'
  ]
  ,
  'update-sp' => [
    'controller' => 'ProductController',
    'action' => 'updateProduct'
  ]
  ,
  'delete-sp' => [
    'controller' => 'ProductController',
    'action' => 'deleteProduct'
  ]
  ,
  'register' => [
    'controller' => 'AccountController',
    'action' => 'register'
  ]
  ,
  'login' => [
    'controller' => 'AccountController',
    'action' => 'login'
  ]
  ,
  'logout' => [
    'controller' => 'AccountController',
    'action' => 'logout'
  ],
  'upload-avatar' => [
    'controller' => 'AccountController',
    'action' => 'uploadAvatar'
  ],
  'add-cart' => [
    'controller' => 'ProductController',
    'action' => 'addCart'
  ],
  'view-cart' => [
    'controller' => 'ProductController',
    'action' => 'viewCart'
  ],
  'delete-cart-item' => [
    'controller' => 'ProductController',
    'action' => 'deleteCartItem'
  ],
  'update-cart-item' => [
    'controller' => 'ProductController',
    'action' => 'updateCartItem'
  ],
  'empty-cart' => [
    'controller' => 'ProductController',
    'action' => 'emptyCart'
  ],
  'update-ajax' => [
    'controller' => 'ProductController',
    'action' => 'updateAjax'
  ],
  'checkout' => [
    'controller' => 'ProductController',
    'action' => 'checkoutCart'
  ],
  'statistics' => [
    'controller' => 'ProductController',
    'action' => 'Statistics'
  ]
];
?>