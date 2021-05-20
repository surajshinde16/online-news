<?php

$host = "localhost";
$port = "5432";
$dbname = "news_project";
$user = "postgres";
$password = "root"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$conn = pg_connect($connection_string);

?>