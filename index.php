<?php
    require 'books.php';
    $books= getUsers();

    include 'partials/header.php';

?>
 <div class="conntainer">
 <p>
        <a class="btn btn-success" href="create.php">Create new book</a>
    </p>   
 <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Available</th>
                    <th>Pages</th>
                    <th>ISBN</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($books as $book):?>
                    <tr>
                        <td><?php echo $book['title']?></td>
                        <td><?php echo $book['author']?></td>
                        <td><?php echo $book['available']?></td>
                        <td><?php echo $book['pages']?></td>
                        <td><?php echo $book['isbn']?></td>
                        <td>
                            <a href="view.php?id=<?php echo $book['id']?>" class="btn btn-sm btn-outline-info">View</a>
                            <a href="update.php?id=<?php echo $book['id']?>" class="btn btn-sm btn-outline-secondary">Update</a>
                            <a href="delete.php?id=<?php echo $book['id']?>" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;; ?>
            </tbody>

        </table>
 </div>

 <?php include 'partials/footer.php' ?>

