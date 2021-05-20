<?php
    include 'config.php';
    if($_SESSION["user_role"] == '0'){
        header("Location:http://localhost/news_project/admin/post.php");
    }
    $cat_id = $_GET["id"];

    /*sql to delete a record*/
    $sql = "DELETE FROM category WHERE category_id ='{$cat_id}'";

    if (pg_query($conn, $sql)) {
        header("Location:http://localhost/news_project/admin/category.php");
    }


?>
