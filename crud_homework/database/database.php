<?php
/**
 * Connect to database
 */
function db() {
    global $db;
    $host     = 'localhost'; // Because MySQL is running on the same computer as the web server
    $database = 'students'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
    $user     = 'root'; // Default username to connect to MySQL is root
    $password = ''; // Default password to connect to MySQL is empty /chay bang 
    // TO DO: CREATE CONNECTION TO DATABASE
    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

}
db();
/**
 * Create new student record
 */
function createStudent($name,$age,$email,$profile) {
    global $db;
    // $name = $values['name'];
    // $age = $values['age'];
    // $email = $values['email'];
    // $profile = $values['profile'];
    try {
        $squery = $db->prepare("INSERT INTO student (name, age, email, profile) VALUES (:name, :age, :email, :profile)");
        $squery->bindParam(':name', $name);
        $squery->bindParam(':email', $email);
        $squery->bindParam(':age', $age);
        $squery->bindParam(':profile', $profile);
        $squery->execute();
        // $data = array($name ,$age,$email,$profile);
        // return $values;
        // return [
        //     'name' => $name,
        //     'age' => $age,
        //     'email' => $email,
        //     'profile' => $profile,
        // ];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



/**
 * Get all data from table student
 */
// function selectAllStudents($db) {
//     $students = array();
//     $result = $db->query("SELECT * FROM student");
//     if ($result) {
//         // Lặp qua từng dòng dữ liệu và thêm vào mảng $students
//         while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//             $students[] = $row;
//         }   
//     return $students;
// }
// }

function selectAllStudents($db) {
    try {
        $squery = $db->prepare("SELECT * FROM student");
        $squery->execute();
        $data = $squery->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    global $db;
    $squery = $db->prepare("SELECT id,name,age, email, profile FROM  student WHERE id = :id ");
    try {
        $squery->bindParam(':id', $id, PDO::PARAM_INT);
        $squery->execute();
        $data = $squery->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    global $db;
    try{
    $squery = $db->prepare("DELETE FROM student WHERE id = :id");
    $squery->bindParam(':id',$id,PDO::PARAM_INT);
    $squery->execute();
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

}


/**
 * Update students
 * 
 */
function updateStudent($name, $age, $email, $profile,$id) {
    global $db;
    try{
        $squery = $db->prepare("UPDATE student SET name= :name, age= :age, email = :email, profile= :profile WHERE id = :id");
        $squery->bindParam(':name',$name);
        $squery->bindParam(':age',$age);
        $squery->bindParam(':email',$email);
        $squery->bindParam(':profile',$profile);
        $squery->bindParam(':id',$id);
        $squery->execute();
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}
