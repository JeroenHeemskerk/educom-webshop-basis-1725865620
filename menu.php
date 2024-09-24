<?php
require_once 'session_manager.php';
echo 
   '<div class="navbar">
    <ul>
        <li><a href="index.php?page=home">HOME</a></li>
        <li><a href="index.php?page=about">ABOUT</a></li>
        <li><a href="index.php?page=contact">CONTACT</a></li>';
if (empty($_SESSION)){
    echo 
        '<li><a href="index.php?page=register">REGISTER</a></li>
        <li><a href="index.php?page=login">LOGIN</a></li>';
} else {
     echo 
        '<li><a href="index.php?page=logout">LOGOUT</a></li>';
}
echo 

    '</ul>
    </div>'; 