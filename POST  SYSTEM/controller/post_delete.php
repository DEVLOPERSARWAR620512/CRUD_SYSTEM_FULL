<?php
session_start();
include_once "../database/env.php";
$id = $_GET['id'];
$query = "DELETE FROM posts WHERE id = $id";
$delete_record = mysqli_query($conn,$query);
if($delete_record){
    $_SESSION['success'] = "your post deleted";
    header("location: ../all_post.php");
}else{

}