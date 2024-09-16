<?php

// TOP LEVEL
$page = getRequestedPage();
showResponsePage($page);


// FUNCTIONS
function getRequestedPage();
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
    <title>' . $page . ' | Educom Webshop Basis</title>
    </head>';
};

function showBodySection($page)
{
    showBodyStart();
    showHeader($page);
    showMenu();
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

function showMenu ();

function showHeader ($page);

function showContent ($page);

function showFooter ();

function showBodyEnd ()
{
    echo '</body>';
};
?>