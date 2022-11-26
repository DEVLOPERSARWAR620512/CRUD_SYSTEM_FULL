<?php
 session_start();
 if(isset($_POST['submit'])){
   
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $author= $_POST['author'];
    $errors = [];
    $id = $_POST['id'];
    if(empty($title)){
      $errors['title'] = "please insert your title";
    }
    if(empty($detail)){
      $errors['detail'] = "please insert your detail";
    }
    if(empty($author)){
        $errors['author'] = "please insert your author name";
    }
    if(count($errors) == 0 ){
        include "../database/env.php"; 
        $query = "UPDATE posts SET 
        title='$title',
        detail='$detail',
        author='$author'
        WHERE id=$id";
        $update = mysqli_query($conn,$query);
        $_SESSION['success'] =  'your post update successfully'; 
        header("location: ../all_post.php");
    }else{
        $_SESSION['errors'] = $errors;
        header("location: location: ../edit_post.php?id=$id");
    }
 }

?>