<?php 
session_start();
include "./database/env.php";
$qurey = "SELECT * FROM posts";
$result = mysqli_query($conn,$qurey);
$fetch = mysqli_fetch_all($result,1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>all post</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="./index.php">POST SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">add post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./all_post.php">all post</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if(isset( $_SESSION['success'])){
    ?>
    <div class="toast show" style="position:absolute; botton:20px; right:20px;" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">POST SYSTEM</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?=  $_SESSION['success'] ?>
        </div>
    </div>
    <?php
     }
    ?>
    <div class="container mt-5">
        <h2>All Post</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">post title</th>
                    <th scope="col">post detail</th>
                    <th scope="col">Author</th>
                    <th scope="col">action</th>
                </tr>
                <?php
                   foreach($fetch as $key=>$post){
                ?>
            <tbody>
                <tr>
                    <th scope="row"><?= ++$key ?></th>
                    <td><?= $post['title'] ?></td>
                    <td><?= strlen($post['detail']) > 50 ? substr($post['detail'], 0 , 100).'...' : $post['detail'] ?>
                    </td>
                    <td><?= $post['author'] ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="./show_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">show</a>
                            <a href="./edit_post.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-danger">edit</a>
                            <a href="./controller/post_delete.php?id=<?= $post['id'] ?>"
                                class="btn btn-sm btn-warning">delete</a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <?php
                   }
                ?>
            </thead>
            <?php
               if(mysqli_num_rows($result) == 0){
            ?>
            <tr class="text-center">
                <td colspan="5">No post found</td>
            </tr>
            <?php
               }
            ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
session_unset();
?>