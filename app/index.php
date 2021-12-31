<?php

require "../vendor/autoload.php";

$m = new Mustache_Engine(array('entity_flags' => ENT_QUOTES));

Nanite::get('/', function(){
    // echo "Front page";
    echo $m->render('Hello {{planet}}', array('planet' => 'World!')); // "Hello World!"

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

