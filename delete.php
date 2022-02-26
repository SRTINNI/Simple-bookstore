<?php
include 'partials/header.php';
require __DIR__.'/books.php';

if(!isset($_GET['id'])){
    include "partials/not_found.php";
    exit;
}
$bookID =$_GET['id'];

deleteUser($bookID);

header("Location: index.php"); 