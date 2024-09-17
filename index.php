<?php

// TOP LEVEL
$page = getRequestedPage();
showResponsePage($page);


// FUNCTIONS
function getRequestedPage()
{
    $request_type = $_SERVER['REQUEST_METHOD'];
    if($request_type=='POST'){
        $requested_page = getPostVar('page','home');
    } else {
        $requested_page = getUrlVar('page', 'home');
    }
    return $requested_page;
}
// what is the REQUEST METHOD?
    // if POST, get information from POST action
    // if GET, get information from URL 
    // store in $page variable 

function getPostVar($key, $default = '')
{
    if(isset($_POST[$key])){
        return $_POST[$key];
    } else {
        return $default;
    }
};

function getUrlVar($key, $default='')
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
    showHeader();
    showContent($page);
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
    </ul>
    </div>'; 
};

function showHeader ()
{
    include 'header.php';
};


function showContent ($page)
{
    switch($page)
    {
        case 'home':
            require 'home.php';
            break;
        case 'about':
            require 'about.php';
            break;
        case 'contact':
            require 'contact.php';
            break;
        default:
            require 'home.php';
            break;
    }
};

function showFooter ()
{
    include 'footer.php';
};

function showBodyEnd ()
{
    echo '</body>';
};


?>