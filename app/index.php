<?php

require "../vendor/autoload.php";

Nanite::get('/', function(){
    echo "Front page";
});

// All routes start with /
Nanite::get('/about', function(){
    echo "About page";
});

// Regex enabled, groups get passed to the function.
Nanite::get('/projects/([a-zA-Z0-9\-_]+)', function($project){
    echo "Project page for {$project}";
});

// Handle a POST request
Nanite::post('/contact', function(){
    // Handle submitted contact form.
});
