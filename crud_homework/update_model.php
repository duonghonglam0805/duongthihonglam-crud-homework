<?php
require_once ("./database/database.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["name"]) && !empty($_POST["age"]) && !empty($_POST["email"]) && !empty($_POST["image_url"]) && !empty($_POST["id"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $profile = $_POST["image_url"];
    $id=$_POST['id'];
    $result = updateStudent($name,$age,$email,$profile,$id);

    if ($result !== false) {
        echo "Update successful";
    } else {
        echo "erro";
    }
    header("Location: index.php");
}