<?php

function view_contact()
{
    DH::logPost();
    Mur::render('simple', array('title' => 'Contact', 'content' => 'Thank you for reaching out to us. Please feel free to contact us again at any time.'));
}
