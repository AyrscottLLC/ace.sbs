<?php

require "../vendor/autoload.php";
require "../lib/Mur.php";

Nanite::get('/', function(){
    // echo "Front page";
    // $m = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));
    // echo $m->render('Hello {{planet}}', array('planet' => 'World!')); // "Hello World!"
    Mur::render('primary', array('planet' => 'World!'));


});

// All routes start with /
Nanite::get('/about', function(){
    echo "About page";
});

// Regex enabled, groups get passed to the function.
Nanite::get('/projects/([a-zA-Z0-9\-_]+)', function($project){
    Mur::render('primary', array('planet' => $project));
});

// Handle a POST request
Nanite::post('/contact', function(){
    // Handle submitted contact form.
});

