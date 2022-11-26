<?php
session_start();
include "../database/env.php";

if(isset($_POST['submit'])){
  $errors = []; // errors massage
  $request = $_POST; // requesting form value
$title = $request['title'];
$detail = $request['detail'];
$author= $request['author'];

if(empty($title)){
  $msg = "please write title name";
  $errors['title'] = $msg;
}elseif(strlen($title) > 10){
  $msg = "10 character limited title";
  $errors['title'] = $msg;
}
if(empty($detail)){
  $msg = "please write detail name";
  $errors['detail'] = $msg;
}elseif(strlen($detail) > 2500){
  $msg = "10 character limited detail";
  $errors['detail'] = $msg;
}
if(empty($author)){
  $msg = "please write detail name";
  $errors['author'] = $msg;
}elseif(strlen($author) > 10){
  $msg = "10 character limited detail";
  $errors['author'] = $msg;
}
if(empty($author)){
  $author = "annonymus";
}
if(count($errors) > 0){
   $_SESSION['errors'] = $errors;
   $_SESSION['old_data'] = $request;
   header("location: ../index.php");
}else{
    $query= "INSERT INTO posts( title, detail, author) VALUES ('$title','$detail','$author')";
    $store = mysqli_query($conn, $query);
    if($store){
      header("location: ../index.php");
      $_SESSION['success'] = "your post added successfully";
    }else{
      echo "errors";
    }
} 
}else{
  echo "please click the submit button";
}


?>