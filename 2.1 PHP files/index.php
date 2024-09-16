<?php

$page = requestedPage(/* get requested page from URL */);

$pageTitle="Educom Webshop Basis"


    if($page=="home"){
        $pageTitle = "Home | Educom Webshop Basis";
    } 

    if($page=="about"){
        $pageTitle = "About | Educom Webshop Basis";
    } 
  
    if($page=="contact"){
        $pageTitle = "Contact | Educom Webshop Basis";
    } 

    
function showResponsePage($page);{
    echo /* documentStart */;

    echo /* headSection */;

    /* Page Title */
    echo /* whatever goes in the head, + */ <title>$pageTitle</title>

    

    echo /* bodySection */;

    $page="home" //--> display home body (if($page=="home"), include home.php)
    $page="about" //--> display about body (if($page=="about"), include about.php)
    $page="contact" //--> display contact body (if($page=="contact"), include contact.php)

    echo /* documentEnd */;

}


/* showDocumentEnd */


?>