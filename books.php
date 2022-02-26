<?php
function getUsers()
{
   return json_decode(file_get_contents(__DIR__.'/books.json'),true);
   
}
function getUserById($id)
{
    $books = getUsers();
    foreach ($books as $book){
       if ($book['id']== $id){
          return $book;
       }
    }
    return null;
}
function createUser($data)
{

   $books = getUsers();
   $data['id'] = rand(1000000, 2000000);

    $books[] = $data;

    putJson($books);

    return $data;
}
function updateUser($data,$id)
{

    $updateUser = [];
    $books = getUsers();
    foreach ($books as $i => $book) {
        if ($book['id'] == $id) {
            $books[$i] = $updateUser = array_merge($book, $data);
        }
    }

    putJson($books);
    return $updateUser;
}
function deleteUser($id)
{
    $books = getUsers();

    foreach ($books as $i => $book) {
        if ($book['id'] == $id) {
            array_splice($books, $i, 1);
        }
    }

    putJson($books);

}
function putJson($books){
   file_put_contents(__DIR__.'/books.json',json_encode($books,JSON_PRETTY_PRINT));
}

function validateUser($book, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$book['title']) {
        $isValid = false;
        $errors['title'] = 'Title is mandatory';
    }
    if (!$book['author'] || strlen($book['author']) < 3 || strlen($book['author']) > 16) {
        $isValid = false;
        $errors['author'] = 'Author is required and it must be more than 3 and less then 16 character';
    }
    if (!filter_var($book['available'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['available'] = 'This must be integer.';
    }

    if (!filter_var($book['pages'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['pages'] = 'This must be integer.';
    }
    if (!filter_var($book['isbn'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['isbn'] = 'This must be integer.';
    }
    // End Of validation

    return $isValid;
}

