<?php

require "../vendor/autoload.php";
require "../lib/Mur.php";
require "../lib/DH.php";

Nanite::get('/', function () {
    Mur::render('primary');
});

Nanite::get('/category/([a-zA-Z0-9\-_]+)', function ($category) {
    Mur::render('category', array('category' => $category));
});

// Regex enabled, groups get passed to the function.
Nanite::get('/product/([a-zA-Z0-9\-_]+)', function ($product) {
    Mur::render('product', array('product' => $product));
});

// Handle a POST request
Nanite::post('/contact', function () {
    // Handle submitted contact form.
    $dh = new DH();
    $dh->log(print_r($_POST, true));
});

Nanite::get('/login', function () { Mur::render('login'); });
// Handle submitted login form.
Nanite::post('/auth', function () { $dh = new DH(); $dh->log(print_r($_POST, true)); });
Nanite::get('/signup', function () {
    Mur::render('signup');
});

Nanite::post('/create-account', function () {
    // Handle submitted signup form.
    $dh = new DH();
    $dh->log(print_r($_POST, true));
});

// Check if the user is logged in.
if(isset($_SESSION['user'])) {
    // User is logged in.
    // Add routes that require authentication.
    Nanite::get('/account', function () {
        Mur::render('account');
    });

    // handle logout
    Nanite::get('/logout', function () {
        // Logout user.
        unset($_SESSION['user']);
        header('Location: /');
    });

    // review order
    Nanite::get('/orders', function () {
        Mur::render('orders');
    });
} else {
    // User is not logged in.
    Nanite::get('/cart', function () {
        Mur::render('cart');
    });
}
