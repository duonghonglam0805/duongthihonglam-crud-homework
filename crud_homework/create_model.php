<?php
require_once ("./database/database.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["name"]) && !empty($_POST["age"]) && !empty($_POST["email"]) && !empty($_POST["image_url"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $profile = $_POST["image_url"];
    // $student = array(
    //     'name'=>$name,
    //     'age'=>$age, 
    //     'email'=>$email,
    //     'profile'=>$profile
    // );  
    $result = createStudent($name,$age,$email,$profile);

    if ($result !== false) {
        echo "Sinh viên mới đã được tạo thành công: ";
    } else {
        echo "Có lỗi khi tạo sinh viên.";
    }
    header("Location: index.php");
}


