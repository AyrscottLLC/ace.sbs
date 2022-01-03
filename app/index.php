<?php

set_include_path(get_include_path().';..\\vendor');

require "../vendor/autoload.php";
require "../lib/Mur.php";
require "../lib/DH.php";
require "../views/contact.php";

$data = array(
    'title' => 'Contact',
    'content' => 'Thank you for reaching out to us. Please feel free to contact us again at any time.'
);

Nanite::get('/', function () { Mur::render('primary'); });
Nanite::get('/category/([a-zA-Z0-9\-_]+)', function ($category) { Mur::render('category', array('category' => $category)); });
Nanite::get('/product/([a-zA-Z0-9\-_]+)', function ($product) { Mur::render('product', array('product' => $product)); });
Nanite::get('/cart', function () { Mur::render('cart'); });
Nanite::post('/contact', function () { view_contact(); });

// Check if the user is logged in.
if(isset($_SESSION['user'])) {
    // routes that require authentication.
    Nanite::get('/account', function () { Mur::render('account'); });
    Nanite::get('/logout', function () { unset($_SESSION['user']); header('Location: /'); });
    Nanite::get('/orders', function () { Mur::render('orders'); });
} else {
    // routes that require no authentication.
    Nanite::get('/signup', function () { Mur::render('signup'); });
    Nanite::get('/login', function () { Mur::render('login'); });
    Nanite::post('/auth', function () { DH::logPost(); });
    Nanite::post('/create-account', function () { DH::logPost(); });
}
