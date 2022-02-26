<?php
include 'partials/header.php';
require __DIR__.'/books.php';

if(!isset($_GET['id'])){
    include "partials/not_found.php";
    exit;
}
$bookID =$_GET['id'];

$book = getUserById($bookID);
if(!$book){
    include "partials/not_found.php";
    exit; 
}
$errors = [
    'title' => "",
    'author' => "",
    'available' => "",
    'pages' => "",
    'isbn' => "",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = array_merge($book, $_POST);

    $isValid = validateUser($book, $errors);
    if($isValid){
        $book=updateUser($_POST,$bookID);
    }
    header("Location: index.php");      
     
}

?>

<?php include '_form.php' ?>