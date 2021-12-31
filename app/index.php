<?php

require "../vendor/autoload.php";
require "../lib/Mur.php";

Nanite::get('/', function(){
    Mur::render('primary');
});

Nanite::get('/category/(', function($category){
    Mur::render('category', array('category' => $category));
});

// All routes start with /
// Nanite::get('/about', function(){
//     echo "About page";
// });

// Regex enabled, groups get passed to the function.
Nanite::get('/product/([a-zA-Z0-9\-_]+)', function($product){
    Mur::render('product', array('product' => $product));
});

// Handle a POST request
Nanite::post('/contact', function(){
    // Handle submitted contact form.
    var_dump($_POST);
});

