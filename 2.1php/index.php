<?php

// TOP LEVEL
$page = getRequestedPage();
showResponsePage($page);


// FUNCTIONS
function getRequestedPage();
// what is the REQUEST METHOD?
    // if POST, get information from POST action
    // if GET, get information from URL 
    // store in $page variable 

function showResponsePage($page)
{
    showDocumentStart();
    showHeadSection();
    showBodySection($page);
    showDocumentEnd();
};

function showDocumentStart();

function showHeadSection();

function showBodySection($page)
{
    showBodyStart();
    showHeader($page);
    showMenu();
    showContent($page);
    showFooter();
    showBodyEnd();
};

function showDocumentEnd();

function showBodyStart();

function showHeader ($page);
function showMenu ();
function showContent ($page);
function showFooter ();
function showBodyEnd ();
?>