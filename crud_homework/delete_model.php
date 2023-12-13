<?php 
    require_once ("./database/database.php");
    if(isset($_GET['id'])){
        $id = $_GET['id']  ;
        deleteStudent($id);
        echo "DELETE SUCCESSFULL";
    }else{
        echo "ERROR";
    }
    header("Location: index.php");
?>
