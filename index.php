<?php

// TOP LEVEL
$page = getRequestedPage();
showResponsePage($page);


// FUNCTIONS
function getRequestedPage()
{
    $request_type = $_SERVER['REQUEST_METHOD'];
    if($request_type=='POST'){
        $requested_page = getPageFromPost('page','home');
    } else {
        $requested_page = getPageFromUrl('page', 'home');
    }
    return $requested_page;
}

function getPageFromPost($key, $default = '')
{
    if(isset($_POST[$key])){
        return $_POST[$key];
    } else {
        return $default;
    }
};

function getPageFromUrl($key, $default='')
{
    if(isset($_GET[$key])){
        return $_GET[$key];
    } else {
        return $default;
    }
};

function showResponsePage($page)
{
    showDocumentStart();
    showHeadSection();
    showBodySection($page);
    showDocumentEnd();
};

function showDocumentStart()
{
    echo '<!DOCTYPE html>
    <html>';
};

function showHeadSection()
{
    echo '<head>
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Educom Webshop Basis</title>
    </head>';
};

function showBodySection($page)
{
    showBodyStart();
    showMenu();
    include 'header.php';
    showHeader();
    showContent($page);
    include 'footer.php';
    showFooter();
    showBodyEnd();
};

function showDocumentEnd()
{
    echo '</html>';
};

function showBodyStart()
{
    echo '<body>';
};

function showMenu ()
{
   echo 
   '<div class="navbar">
    <ul>
        <li><a href="index.php?page=home">HOME</a></li>
        <li><a href="index.php?page=about">ABOUT</a></li>
        <li><a href="index.php?page=contact">CONTACT</a></li>
        <li><a href="index.php?page=register">REGISTER</a></li>
        <li><a href="index.php?page=login">LOGIN</a></li>
    </ul>
    </div>'; 
};

function showContent ($page)
{
    switch($page)
    {
        case 'home':
            require 'home.php';
            showHomePage();
            break;
        case 'about':
            require 'about.php';
            showAboutPage ();
            break;
        case 'contact':
            require 'contact.php';
            showContactPage();
            break;
        case 'register':
            require 'register.php';
            showRegisterPage();
            break;
        case 'login';
            require 'login.php';
            showLoginPage();
            break;
        default:
            require 'home.php';
            break;
    }

};

function showBodyEnd ()
{
    echo '</body>';
};

function cleanString($string){
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

function getPostVar ($key, $default=''){
    if(isset($_POST[$key])){
        return cleanString($_POST[$key]);
    } else {
        return $default;
    }
}