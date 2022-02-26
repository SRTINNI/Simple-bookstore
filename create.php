<?php
include 'partials/header.php';
require __DIR__.'/books.php';

$book = [
    'id' => '',
    'title' => '',
    'author' => '',
    'available' => '',
    'pages' => '',
    'isbn' => '',
];

$errors = [
    'title' => "",
    'author' => "",
    'available' => "",
    'pages' => "",
    'isbn' => "",
];

$isValid=true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = array_merge($book, $_POST);

    $isValid = validateUser($book, $errors);
    if($isValid){
        $book=createUser($_POST);
        header("Location: index.php");   
    } 
}
?>
<?php include '_form.php' ?>