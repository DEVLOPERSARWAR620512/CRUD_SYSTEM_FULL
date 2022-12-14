<?php
  session_start();
  include "./database/env.php";
  $id = $_GET['id'];
  $query = "SELECT * FROM posts WHERE id = $id";
  $result = mysqli_query($conn, $query);
  $post = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
    <div class="container">
        <div class="col-6 m-auto mt-5">
            <div class="card">
                <div class="card-header">
                    <strong>Edit post</strong>
                </div>
                <div class="card-body">
                    <form action="./controller/update_post.php" method="POST">
                        <input type="hidden" name="id" value="<?= $post['id']?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">post title</label>
                            <input name="title" class="form-control" id="exampleInputEmail1"
                                value="<?= $post['title']?>">
                            <?php
                             if(isset($_SESSION['errors']['title'])){
                            ?>
                            <span class="text-danger">
                                <?= $_SESSION['errors']['title'] ?>
                            </span>
                            <?php
                             }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">detail</label>
                            <textarea name="detail" class="form-control">
                            <?= $post['detail']?>
                            </textarea>
                            <?php
                               if(isset($_SESSION['errors']['detail'])){
                            ?>
                            <span class="text-danger">
                                <?= $_SESSION['errors']['detail'] ?>
                            </span>
                            <?php
                             }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">author name</label>
                            <input class="form-control" name="author" id="exampleInputEmail1"
                                value="<?= $post['author']?>">
                            <?php
                             if(isset($_SESSION['errors']['author'])){
                            ?>
                            <span class="text-danger">
                                <?= $_SESSION['errors']['author'] ?>
                            </span>
                            <?php
                             }
                            ?>
                        </div>
                        <button type="submit" name="submit" value="submited"
                            class="btn btn-primary w-100">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
session_unset();
?>