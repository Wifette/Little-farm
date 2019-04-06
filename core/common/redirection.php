<?php

function redirection($page){
    $pages = array();
    $root = '/projet_ajax/';
    $pages['accueil'] = 'index.php';
    $pages['liste'] = 'core/api/liste.php';
    
    header("location: $root$pages[$page]");
}